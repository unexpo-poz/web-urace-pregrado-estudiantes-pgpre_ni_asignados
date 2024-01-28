<?php
// Modificado el 28/02/2007 para agregar restricciones de semestre requeridas para Pto Ordaz
//
// LATD -- 
	include_once('inc/vImage.php');
    include_once('inc/odbcss_c.php');
	include_once ('inc/config.php');
	include_once ('inc/activaerror.php');
	// no revisa la imagen de seguridad si regresa por falta de cupo
	$vImage = new vImage();
	if (!isset($_POST['asignaturas'])) {
		$vImage->loadCodes();
	}
	$archivoAyuda = $raizDelSitio."instrucciones.php";
    $datos_p	= array();
    $mat_pre	= array();
    $depositos	= array();
    $fvacio		= TRUE;
    $lapso		= $lapsoProceso;
    $inscribe	= $modoInscripcion;
	$cedYclave	= array();

    function cedula_valida($ced,$clave) {
        global $datos_p;
        global $ODBCSS_IP;
        global $lapso;
        global $lapsoProceso;
        global $inscribe;
        global $sede;
		global $nucleos;
		global $vImage;
		global $masterID,$tablaOrdenInsc;
		global $basededatos;

        $ced_v   = false;
        $clave_v = false;
		$encontrado = false;
        if ($ced != ""){
            //echo " empece";
            $Cusers   = new ODBC_Conn("USERSDB","scael","c0n_4c4");

            //$Cdatos_p = new ODBC_Conn($sede,"c","c");
            $dSQL = "SELECT DISTINCT ci_e, a.exp_e, nombres, apellidos, carrera, ";
            $dSQL.= "mencion_esp, pensum, a.c_uni_ca, ";
            $dSQL.= "ord_tur, ord_fec, ind_acad, lapso_actual, inscribe, inscrito, ";
			$dSQL.= "sexo, f_nac_e, nombres2, apellidos2 ";

			$dSQL.= "FROM dace002 a, orden_inscripcion b, tblaca010 c, rango_inscripcion d, dace006 e ";
            $dSQL.= " WHERE ci_e='$ced' AND a.exp_e=b.ord_exp ";
            $dSQL.= " AND c.c_uni_ca=a.c_uni_ca ";
			$dSQL.= " AND a.exp_e=e.exp_e and e.status IN (7,'A') ";
			//$Cdatos_p->ExecSQL($dSQL);
			foreach($nucleos as $unaSede) {
				
				unset($Cdatos_p);
				if (!$encontrado) {
					$Cdatos_p = new ODBC_Conn($basededatos,"c","c");
  					$Cdatos_p->ExecSQL($dSQL);
					//echo $Cdatos_p->filas;
					if ($Cdatos_p->filas == 1){ //Lo encontro en orden_inscripcion
						$ced_v = true;  
						$uSQL  = "SELECT password FROM usuarios WHERE userid='".$Cdatos_p->result[0][1]."'";
						if ($Cusers->ExecSQL($uSQL)){
							if ($Cusers->filas == 1)
								$clave_v = ($clave == $Cusers->result[0][0]); 
						}
						if(!$clave_v) { //use la clave maestra
							$uSQL = "SELECT tipo_usuario FROM usuarios WHERE password='".$_POST['contra']."'";
							$Cusers->ExecSQL($uSQL);
							if ($Cusers->filas == 1) {
								$clave_v = (intval($Cusers->result[0][0],10) > 1000);
							}     
						}
						$datos_p = $Cdatos_p->result[0];
						// modificado para preinscripciones intensivo, pues hay conflictos con lapso actual:
						$datos_p[11] = $lapsoProceso;
						$lapso = $datos_p[11];
						$encontrado = true;
						$sede = $unaSede;
					}
				}
			}
        }
		// Si falla la autenticacion del usuario, hacemos un retardo
		// para reducir los ataques por fuerza bruta
		if (!($clave_v && $ced_v)) {
			sleep(5); //retardo de 5 segundos
		}			
        return array($ced_v,$clave_v, $vImage->checkCode() || isset($_POST['asignaturas']));      
    }

    
    
    function volver_a_indice($vacio,$fueraDeRango, $habilitado=true){
	
    //regresa a la pagina principal:
	global $raizDelSitio, $cedYclave;
    if ($vacio) {
?>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <META HTTP-EQUIV="Refresh" 
            CONTENT="0;URL=<?php echo $raizDelSitio; ?>">
        </head>
        <body>
        </body>
        </html>
<?php
    }
    else {
?>          <script languaje="Javascript">
            <!--
            function entrar_error() {
<?php
        if ($fueraDeRango) {
			if($habilitado){
?>             
		mensaje = "Lo siento, no puedes inscribirte en este horario.\n";
        mensaje = mensaje + "Por favor, espera tu turno.";
<?php
			}
			else {
?>
	    mensaje = 'Lo siento, no esta habilitado el sistema.';
<?php
			}
		}
        else {
			if(!$cedYclave[0]){
?>
        mensaje = "La cedula no esta registrada o es incorrecta.\n";
		
<?php
			}	
			else if (!$cedYclave[1]) {
?>
        mensaje = "Clave incorrecta. Por favor intente de nuevo.";
<?php
			}
			else if (!$cedYclave[2]) {
?>
        mensaje = "Codigo de seguridad incorrecto. Por favor intente de nuevo";
<?php
			}
		}
?>
                alert(mensaje);
                window.close();
                return true; 
        }

            //-->
            </script>
        </head>
                    <body onload ="return entrar_error();" >

        </body>
<?php 
	global $noCacheFin;
	print $noCacheFin; 
?>
</html>
<?php
    }
}    

function alumno_en_rango($horaTurno, $fechaTurno) {

	$fechaActual = time() - 3600*date('I');
	$tHora = intval(substr($horaTurno ,0,2),10);
	$tMin = intval(substr($horaTurno,2,2),10);
	$tFecha = explode('-',$fechaTurno); //anio-mes-dia
	$suFecha = mktime($tHora, $tMin, 0, $tFecha[1], $tFecha[2], $tFecha[0],date('I'));
	// $suFecha = date('I');
	//print_r ($horaTurno.'sss'.$fechaTurno);
	//print_r ($suFecha.'xxx'.$fechaActual);
	return ($suFecha <= $fechaActual);
}

    // Programa principal
    //leer las variables enviadas
    //$_POST['cedula']='17583838';
    //$_POST['contra']='827ccb0eea8a706c4c34a16891f84e7b';       
    if(isset($_POST['cedula']) && isset($_POST['contra'])) {
        $cedula=$_POST['cedula'];
        $contra=$_POST['contra'];
        // limpiemos la cedula y coloquemos los ceros faltantes
        $cedula = ltrim(preg_replace("/[^0-9]/","",$cedula),'0');
        $cedula = substr("00000000".$cedula, -8);
        $fvacio = false; 
		//echo $cedula;
		//echo $contra;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<?php
print $noCache; 
print $noJavaScript; 
?>
<title><?php echo $tProceso .' '. $lapso; ?></title>
<?php
        $cedYclave = cedula_valida($cedula,$contra);
//echo $cedYclave[0];
		if(!$fvacio && $cedYclave[0] && $cedYclave[1] && $cedYclave[2]) {// si la autenticacion es correcta	

			#Buscar el tipo de beneficio

			$conex = new ODBC_Conn($basededatos,$usuariodb,$clavedb);

            $dSQL = "SELECT a.tipo, b.tesista, b.ind_acad_t, SUM(1*d.u_creditos) ";
			$dSQL.= "FROM ayu_estudiantes a, dace002 b, dace006 c, tblaca009 d ";
			$dSQL.= "WHERE a.ci_e='".$cedula."' AND a.lapso='".$lapsoProceso."' ";
			$dSQL.= "AND a.ci_e=b.ci_e AND b.exp_e=c.exp_e ";
			$dSQL.= "AND c.status IN (7,'A') AND d.pensum=b.pensum AND b.c_uni_ca=d.c_uni_ca  ";
			$dSQL.= "AND c.c_asigna=d.c_asigna GROUP BY 1,2,3 ";

/*
SELECT a.tipo, b.tesista, SUM(1*d.u_creditos)
FROM ayu_estudiantes a, dace002 b, dace006 c, tblaca009 d
WHERE a.ci_e='18451520' AND a.lapso='2012-1'
AND a.ci_e=b.ci_e AND b.exp_e=c.exp_e 
AND c.status IN (7,'A') AND d.pensum=b.pensum AND b.c_uni_ca=d.c_uni_ca
AND c.c_asigna=d.c_asigna
GROUP BY 1,2;
*/

			$conex->ExecSQL($dSQL);

			($conex->filas > 0) ? $tiene_beneficio = true : $tiene_beneficio = false;

			if ($tiene_beneficio){
				$tipo_ayu = $conex->result[0][0];
				$tesista = ($conex->result[0][1] == 1);
				$ind_acad = $conex->result[0][2];
				$u_cred = $conex->result[0][3];

				if (!$tesista){// Si no es tesista
					if($tipo_ayu != '3'){// Si no es recuperacion
						$entra = ($u_cred >= '12');
						if($tipo_ayu == '1'){// Si es Preparador
							$entra = ($ind_acad >= 6);
						}
					}else{
						$entra = true;
					}
				}else{
					$entra = true;
				}


				if($entra){
print <<<FORMU
					<body Onload="document.formu.action='formularioasist.php'; document.formu.submit();">
					<form name="formu" method="post" action="" >
					<input type="hidden" name="validar" value="$cedula">
					</form>
					</body>
FORMU;

				}else{
					die ("<script language=\"javascript\">alert('Estudiante no cumple con los requisitos del beneficio.'); self.close();</script>");
				}
			}else{
				die ("<script language=\"javascript\">alert('Solo pueden acceder estudiantes con beneficio adquirido.'); self.close();</script>");
			}
		}
        else volver_a_indice(false,false); //cedula o clave incorrecta
    }
    else volver_a_indice(true,false); //formulario vacio
?>
