<?php
include_once('inc/vImage.php'); 
include_once('inc/config.php'); 

imprima_enc();
if ($inscHabilitada){
	imprima_form();
}
else {
	print <<<x001
		<div style="font-family:arial; font-size:16px; color:red;text-align:center;">
		Disculpe, el proceso culminó.
		</div>
x001
;
}
imprima_final();

function imprima_enc(){
	global $tProceso, $lapsoProceso, $tLapso, $enProduccion;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php
	global $noCache;
	print $noCache;
?>
<title><?php echo $tProceso . $lapsoProceso; ?></title>

<script languaje="Javascript">
<!--
	/*if ((navigator.userAgent.indexOf("Opera")>=0) || (navigator.userAgent.indexOf("Safari")>=0)){
		alert("Disculpe, su cliente http no esta soportado en este sistema. Use Mozilla, Netscape o Internet Explorer"); 
		location.replace("no-soportado.php");	//	return; 
	}*/
// -->
</script>

  <script language="Javascript" src="md5.js">
   <!--
    alert('Error con el fichero js');
    // -->
  </script>
  <script languaje="Javascript">
<!--

  function validar(f) {
	if ((f.cedula_v.value == "")||(f.contra_v.value == "")) {
		alert("Por favor, escriba su cédula y apellido antes de pulsar el botón Entrar");
		return false;
	} 
	else {
		f.contra.value = f.contra_v.value.toUpperCase();
		f.contra_v.value = "";
		f.cedula.value = f.cedula_v.value;
		f.cedula_v.value = "";
		f.vImageCodP.value = f.vImageCodC.value;
		f.vImageCodC.value = "";
		window.open("","planillab","left=0,top=0,width=790,height=500,scrollbars=1,resizable=1,status=1");
		<?php if ($enProduccion){ ?>
		setTimeout("location.reload()",90000);
		<?php } ?>
		return true;
	}

}
//-->
  </script>          
<style type="text/css">
<!--
#prueba {
  overflow:hidden;
  color:#00FFFF;
  background:#F7F7F7;
}

.instruc {
  font-family:Arial; 
  font-size: 13px; 
  font-weight: normal;
  background-color: #254B72;
  color: #FFFFFF
}
.normal {
  font-family:Arial; 
  font-size: 14px; 
  font-weight: normal;
  color: #242744;
}
.boton {
  text-align: center; 
  font-family:Arial; 
  font-size: 11px;
  font-weight: normal;
  background-color:#e0e0e0; 
  font-variant: small-caps;
  height: 20px;
  padding: 0px;

}

-->
</style>  

</head>


<body <?php global $botonDerecho; echo $botonDerecho; ?>>

<table id="table1" style="border-collapse: collapse;background: url(imagenes/fondo_index.png) no-repeat" border="0" cellpadding="0" cellspacing="1" width="100%" align="center"><tbody>
   
	
	<td width="750" colspan="3">
          <p align="center" style="font-family:arial; font-weight:bold; font-size:20px;color:#FFFFFF;" class="instruc">
<?php			echo $tProceso .' '. $tLapso; 
?>		  </p>
    </td>
  </tr>

  
<?php
}
function imprima_form(){
?>		
  <tr>
      <td width="777" align="center" colspan="3">
	  <!-- <span style="color:red;font-family:Arial;font-size:14pt;font-weight:bold;">Asignados por Razon Social</span> -->
      <form method="post" name="chequeo" onSubmit="return validar(this)" action="planilla_r.php" target="planillab">
<table style="border-collapse:collapse;padding-left:350px;" border="0" cellpadding="0" cellspacing="1" width="80%" ><tr><td>
			<br><table style="padding-left:280px;"class="normal">
				<tr>
					<td>
						C&eacute;dula:
					</td>
					<td>
						<input name="cedula_v" size="10" tabindex="1" type="text">
					</td>
				<tr>
				<tr>
					<td>
						Apellidos:
					</td>
					<td>
						<input name="contra_v" size="30" tabindex="2" type="text">
					</td>
				<tr>
			</table>
<br>
			<table style="padding-left:280px;" class="normal">
				<tr>
					<td>
						C&oacute;digo de Seguridad: <img src="inc/img.php?size=4" height="30" style="vertical-align: middle;">
					</td>
					<td>
						<input name="vImageCodC" size="5" tabindex="3" type="text">
					</td>
				<tr>
				<tr>
					<td>
						<input value="Entrar" name="b_enviar" tabindex="3" type="submit">
					</td>
				</tr>
			</table>
</td></tr></table>
  
			   
			  <input value="x" name="cedula" type="hidden"> 
			  <input value="x" name="contra" type="hidden">
			  <input value="" name="vImageCodP" type="hidden"> 
  </form>

<?php //imprima_form
}

function imprima_final(){
global $lapsoProceso
?>
	  </td>
    </tr>
	
    <tr>
	
      <td class ="instruc" style="padding-left:30px;padding-top:10px;" width="100%"><b>NOTAS:</b>
      <ul style="list-style-type: square;">
			<li>Este es un sistema de Preinscripci&oacute;n, solo para cargar datos personales</li>

			<li>Para ingresar al sistema de Preinscripci&oacute;n debes introducir los datos tal y como se muestran en la lista de estudiantes asignados. No utilizar acentos.</li>

			 <!-- <li>Para ver el listado de estudiantes asignados a ingresar al semestre <?php echo $lapsoProceso; ?> haz click <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/web/descargas/nuevo_ingreso/lista_nuevos_2013-1.pdf" target="_blank" style="font-weight:bold;color:#FFFF00;">AQUI</a></li>  -->
 
			<li>Si en la lista de ingreso tus datos no son correctos, acude a la Unidad Regional de Admisi&oacute;n y Control de Estudios con tu Cedula laminada para solucionar tu problema lo antes posible.</li>
            
			<li>Puedes volver a ingresar las veces que lo requieras <B>durante el periodo de preinscripciones</B> para cambiar los datos o imprimir tu planilla.</li>
			
			<li>Tus datos personales se usar&aacute;n en el registro acad&eacute;mico de la UNEXPO (Inscripciones, Constancias, T&iacute;tulo), es por ello que debes suministrar datos reales tal y como aparecen en tus documentos.</li>
			
        </ul>
	</td>
	   <td class ="instruc" width="15%">&nbsp;</td>
  </td></tr></tbody></table>
</body>
<?php
//Evitar que la pagina se guarde en cache del cliente
global $noCacheFin;
print $noCacheFin;
?>
</html>
<?php
} //imprima_final	 
?>
