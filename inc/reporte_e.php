<?php
    include_once('inc/odbcss_c.php');
	include_once ('inc/config.php');
	global $raizDelSitio, $tLapso, $tProceso, $vicerrectorado;
	global $botonDerecho, $nombreDependencia;
	global $conexion, $dsnPregrado, $IdUsuario, $ClaveUsuario;
	global $pais_nombre, $SQLdisca, $afrodescen, $laBitacora;
	
	//foreach($_POST as $nombre_campo => $valor){
	//	echo $nombre_campo ."==>". $valor;
	//	echo "<br>";
	//}

	//se conecta a la base de datos de pregrado
	$conexion = new ODBC_Conn($dsnPregrado, $IdUsuario, $ClaveUsuario);
	
	//SEXO
	($_d['sexoS'] == "0") ? $sexo = "FEMENINO" : $sexo = "MASCULINO";
		
	//Pais de Nacimiento
	$SQLpais = "SELECT pai_nombre from paises " ;
	$SQLpais.= "where codigo = $_d[p_nac_e]";
	@$conexion->ExecSQL($SQLpais);
	$conexPais = $conexion->result;
	$pais_nombre = $conexPais[0][0];
	
	//Estado de Nacimiento
	if (is_numeric("$_d[ent_fed]")){
	$SQLestado = "SELECT edo_nombre from estados " ;
	$SQLestado.= "where codigo = $_d[ent_fed] and cod_pais = $_d[p_nac_e]";
	@$conexion->ExecSQL($SQLestado);
	$conexEDO = $conexion->result;
	$edo_nombre = $conexEDO[0][0];
					
	//Ciudad de Nacimiento
	$SQLciudad = "SELECT cd_nombre from ciudades " ;
	$SQLciudad.= "where codigo = $_d[l_nac_e] and cod_pais = $_d[p_nac_e]";
	@$conexion->ExecSQL($SQLciudad);
	$conexCD = $conexion->result;
	$cd_nombre = $conexCD[0][0];
	} else {
		$edo_nombre = "$_d[l_nac_e]";
		$cd_nombre = "$_d[l_nac_e]";
	}
	
	//Municipio de Nacimiento
	$SQLmpio = "SELECT mpio_nombre from municipios " ;
	$SQLmpio.= "where codigo = $_d[depend_p_e] and cod_edo = $_d[ent_fed]";
	@$conexion->ExecSQL($SQLmpio);
	$conexMPIO = $conexion->result;
	$mpio_nombre = $conexMPIO[0][0];
	
	//Parroquia de Nacimiento
	$SQLpqia = "SELECT pquia_nombre from parroquia " ;
	$SQLpqia.= "where cdo_pquia = $_d[tot_raz_v] and cod_edo = $_d[ent_fed] and cod_mpio=$_d[depend_p_e]";
	@$conexion->ExecSQL($SQLpqia);
	$conexPQUIA = $conexion->result;
	$pquia_nombre = $conexPQUIA[0][0];
	
	//Ciudad de Dirección Permanente
	if (is_numeric("$_d[estado]"))
	{
		//Esatdo de Dirección Permanente
		$SQLedoD = "SELECT edo_nombre from estados " ;
		$SQLedoD.= "where codigo = $_d[estado]";
		@$conexion->ExecSQL($SQLedoD);
		$conexEdoD = $conexion->result;
		$estadoDir = $conexEdoD[0][0];
		
		//Ciudad de Dirección Permanente
		$SQLcdD = "SELECT cd_nombre from ciudades " ;
		$SQLcdD.= "where codigo = $_d[ciudad] and cod_edo = $_d[estado]";
		@$conexion->ExecSQL($SQLcdD);
		$conexCdD = $conexion->result;
		$ciudadDir = $conexCdD[0][0];
		
		//Municipio de Dirección Permanente
		$SQLmpioD = "SELECT mpio_nombre from municipios " ;
		$SQLmpioD.= "where codigo = $_d[tot_hab_n] and cod_edo = $_d[estado]";
		@$conexion->ExecSQL($SQLmpioD);
		//print_r ($_d);
		$conexMpioD = $conexion->result;
		$municipioDir = $conexMpioD[0][0];
		
		//Parroquia de Dirección Permanente
		$SQLpquiaD = "SELECT pquia_nombre from parroquia " ;
		$SQLpquiaD.= "where cdo_pquia = $_d[edo_nac_e] and cod_mpio = $_d[tot_hab_n] and cod_edo = $_d[estado]";
		@$conexion->ExecSQL($SQLpquiaD);
		//print_r ($_d);
		$conexPquiaD = $conexion->result;
		$parroquiaDir = $conexPquiaD[0][0];
		
	} else {
		$estadoDir = "$_d[estado]";
		$ciudadDir = "$_d[ciudad]";
		$municipioDir = "$_d[tot_hab_n]";
		$parroquiaDir = "$_d[edo_nac_e]";
	}
	
	
	
	
	//País de Ubicación del Plantel
	$SQLpaisP = "SELECT pai_nombre from paises " ;
	$SQLpaisP.= "where codigo = $_d[codigo_p]";
	$conexion->ExecSQL($SQLpaisP);
	@$conexPaisP = $conexion->result;
	$pais_nombre_p = $conexPaisP[0][0];

	//Estado de Ubicación del Plantel
	if (is_numeric("$_d[codigo_e]"))
	{
		$SQLedoP = "SELECT edo_nombre from estados " ;
		$SQLedoP.= "where codigo = $_d[codigo_e]";
		@$conexion->ExecSQL($SQLedoP);
		$conexEdoP = $conexion->result;
		$edo_nombre_e = $conexEdoP[0][0];
		
		//Ciudad de Ubicación del Plantel
		$SQLcdP = "SELECT cd_nombre from ciudades " ;
		$SQLcdP.= "where codigo = $_d[codigo_c] and cod_pais = $_d[codigo_p]";
		@$conexion->ExecSQL($SQLcdP);
		$conexCdP = $conexion->result;
		$cd_nombre_p = $conexCdP[0][0];
		
		//Municipio de Ubicación del Plantel
		$SQLmpioP = "SELECT mpio_nombre from municipios " ;
		$SQLmpioP.= "where codigo = $_d[codigo_m] and cod_pais = $_d[codigo_p] and cod_edo = $_d[codigo_e]";
		@$conexion->ExecSQL($SQLmpioP);
		//print_r ($_d);
		$conexMpioP = $conexion->result;
		$mpio_nombre_p = $conexMpioP[0][0];
		
		//Parroquia de Nacimiento
		$SQLpqiaP = "SELECT pquia_nombre from parroquia " ;
		$SQLpqiaP.= "where cdo_pquia = $_d[codigo_pquia] and cod_edo = $_d[codigo_e] and cod_mpio=$_d[codigo_m]";
		@$conexion->ExecSQL($SQLpqiaP);
		$conexPQUIAP = $conexion->result;
		$pquia_nombre_p = $conexPQUIAP[0][0];
	} else {
		$edo_nombre_e = "$_d[codigo_e]";
		$cd_nombre_p = "$_d[codigo_c]";
		$mpio_nombre_p = "$_d[codigo_m]";
	}
	
	//Tipo de Discapacidad
	//se conecta a la base de datos NINGRESO
	if ($_d['tipo_disca'] != ''){//se condiciona que tipo de discapacidad no este vacio
		$Cdatos_p   = new ODBC_Conn($dsnPregrado, $IdUsuario, $ClaveUsuario);
		$SQLdisca = "SELECT descripcion from discapacidad " ;
		$SQLdisca.= "where numero = '$_d[tipo_disca]'";
		$Cdatos_p->ExecSQL($SQLdisca);
		$conexDISCA = $Cdatos_p->result;
		$disca_nombre = $conexDISCA[0][0];
		$discapacidad = 'SI';
	} else {
		$discapacidad = 'NO';
		$disca_nombre = '';
	}
	
	//afrodescendiente
	if ($_d['afrodescen'] != '') {
		$auxiliar = substr($_d['afrodescen'],0, 4);
		if ($auxiliar == 'OTRO'){
			$afrodescen = 'SI - '.substr($_d['afrodescen'], 4);//sustraigo lo que le resta
		} else $afrodescen = 'SI - '.$_d['afrodescen'];
	} else $afrodescen = "NO -";
			
	//carrera
	//echo "carrera: ".$_d['carrera']; 
	switch($_d['c_uni_ca']){		
		case 2 : $nomb_carrera = "INGENIERIA MECANICA"; break;
		case 3 : $nomb_carrera = "INGENIERIA ELECTRICA"; break;
		case 4 : $nomb_carrera = "INGENIERIA METALURGIA"; break;
		case 5 : $nomb_carrera = "INGENIERIA ELECTRONICA"; break;
		case 6 : $nomb_carrera = "INGENIERIA INDUSTRIAL"; break;
	}
	
	/*switch($_d['opcion_cnu']){
			case '1' : $opcion_cnu = 'PRIMERA'; break;
			case '2''SEGUNDA' : opcion_cnu.value = ; break;
			case 'TERCERA' : opcion_cnu.value = '3'; break;
			case 'CUARTA' : opcion_cnu.value = '4'; break;
			case 'QUINTA' : opcion_cnu.value = '5'; break;
			case 'SEXTA' : opcion_cnu.value = '6'; break;
			case 'NINGUNA' : opcion_cnu.value = '0'; break;
		}*/
	
    $fecha = date('d/m/Y', time() - 3600*date('I'));
    $h = "4.5";
	$hm = $h*60;
	$ms = $hm*60;
	$hora = gmdate("g:i A",time()-($ms));

	$titulo = $tProceso ." " . $tLapso;
	print <<<P001
<table border="0" width="700" id="table1" cellspacing="1" cellpadding="0" 
 style="border-collapse: collapse;border-color:white;">
    <tr><td>
		<table border="0" width="750">
		<tr>
		<td width="125">
		<p align="right" style="margin-top: 0; margin-bottom: 0">
		<img border="0" src="imagenes/unex1bw.jpg" 
		     width="50" height="50"></p></td>
		<td width="500">
		<p class="titulo">
		Universidad Nacional Experimental Polit&eacute;cnica</p>
		<p class="titulo">
		Vicerrectorado $vicerrectorado</font></p>
		<p class="titulo">
		$nombreDependencia</font></td>
		<td width="125">&nbsp;</td>
		</tr><tr><td colspan="3" style="background-color:#F0F0F0;">
		<font style="font-size:2px;"> &nbsp;</font></td></tr>
	    </table></td>
    </tr>
    <tr>
        <td width="750" class="tit14"> 
         $titulo </td>
    </tr>
    <tr>
        <td width="750" class="inact" style="text-align:right;"> 
         Fecha: $fecha &nbsp; $hora </td>
    </tr>
    <tr>
        <td width="750" class="titulo"> 
         Preinscripci&oacute;n procesada correctamente. Se han agregado los siguientes datos a tu registro: </td>
    </tr>
    <tr>
		<td width="750">
		<hr size="1">
        <div class="tit14" style="text-align:left; background: #F0F0F0">
		Datos Personales:</div>
        <table id="datos_personales" align="center" border="0" cellpadding="0" cellspacing="1" 
		 width="740" style="border-collapse:collapse;border-color:white; border-style:solid;">
			<tr class="datospBN">
				<td style="width: 320px;" >Apellidos:</td>
                <td style="width: 220px;" >Nombres:</td>
                <td style="width: 150px;" >C&eacute;dula:</td>
                <td style="width: 220px;" >Fecha de Nacimiento:</td>
				<td style="width: 220px;" >Edad:</td>
            </tr>
            <tr class="datospBN">
				<td style="width: 220px;" ><span class="datospfBN">{$_d['apellidos']} {$_d['apellidos2']}</span>
				</td>
                <td style="width: 220px;" ><span class="datospfBN">{$_d['nombres']} {$_d['nombres2']}</span>
				</td>
                <td style="width: 150px;" ><span class="datospfBN">
					{$_d['nac_eS']} &nbsp;-&nbsp; {$_d['ci_e']} </span>
				</td>
				
                <!--<td style="width: 150px;" >&nbsp;
					<input name="exp_e" maxlength="12" id="exp_e" 
					 class="datospf" style="width: 130px;" type="hidden" 
					 value="{$_d['exp_e']}">
				</td>-->
				
				<td style="width: 220px;" >
					<input type="hidden" name="f_nac_e" value="{$_d['f_nac_e']}">
					<span class="datospfBN">
					{$_d['diaN']}&nbsp; / &nbsp; {$_d['mesN']} 
					&nbsp; / &nbsp; {$_d['anioN']} </span>
				</td>
				<td style="width: 220px;" >
					<span class="datospfBN">{$_d['edad']}</span>
				</td>
            </tr>
			<tr class="datospBN">
				
                <td style="width: 220px;" >Pa&iacute;s de Nacimiento:</td>
				<td style="width: 150px;" colspan="2" >Estado de Nacimiento:</td>
                <td style="width: 150px;" colspan="2" >Ciudad de Nacimiento:</td>
            </tr>
            <tr class="datospBN">
				
                <td style="width: 220px;" >
					<span class="datospfBN">$pais_nombre</span>
				</td>
                <td style="width: 150px;" colspan="2" >
					<span class="datospfBN">$edo_nombre</span>
				</td>
				<td style="width: 150px;" colspan="2" >
					<span class="datospfBN">$cd_nombre</span>
				</td>               
			</tr>
			
			
			<tr class="datospBN">
				<td style="width: 150px;" colspan="3" >Municipio de Nacimiento:</td>
				<td style="width: 150px;" colspan="3" >Parroquia de Nacimiento:</td>
            </tr>
            <tr class="datospBN">
				<td style="width: 150px;" colspan="3" >
					<span class="datospfBN">$mpio_nombre</span>
				</td>
                <td style="width: 150px;" colspan="3" >
					<span class="datospfBN">$pquia_nombre</span>
				</td>
			</tr>
			
			
            <tr class="datospBN">
				
				
				<td style="width: 150px;" >Especialidad a Cursar:</td>
				<td style="width: 150px;" >Estado Civil:</td>
				<td style="width: 150px;" >Sexo:</td>
                <td style="width: 220px;" >Correo Electr&oacute;nico:</td>
                <td style="width: 150px; ">&nbsp;</td>
            </tr>
            <tr class="datospBN">
				
				<td style="width: 150px;" >
					<span class="datospfBN">$nomb_carrera</span>
					<input type="hidden" name="conducta" value="{$_d['conducta']}" >
				</td>
				
				<td style="width: 220px;" >
					<span class="datospfBN">{$_d['edo_c_eS']}</span>
				</td>
				<td style="width: 220px;" >
					<span class="datospfBN">$sexo</span>
				</td>
                <td style="width: 220px;" ><span class="datospfBN">
					{$_d['correo1']}</span>
				</td>
                <td style="width: 150px;" ><span class="datospfBN">
					&nbsp;</span>
				</td>
                <td style="width: 150px;" >&nbsp;</td>
			</tr>
		</table>
	</td></tr>
	<tr>
    <td width="750">
		<hr size ="1">
        <div class="tit14" style="text-align:left; background: #F0F0F0">
		Direcci&oacute;n Permanente:</div>
        <table id="dir_1" align="center" border="0" cellpadding="1" cellspacing="2" 
		 width="740" style="border-collapse:collapse;border-color:white; border-style:solid;">
            <tbody>
                <tr class="datospBN">
                    <td colspan="2" style="width: 400px;" >
                        Avenida/Calle:</td>
                    <td style="width: 200px;" >
                        Barrio/Urbanizaci&oacute;n:</td>
					<td style="width: 200px;" >
                        Manzana/Edificio:</td>
                    <td style="width: 140px;" >
                        Casa/Apto Nro:</td>
                </tr>
                <tr class="datospBN">
                    <td colspan="2" style="width: 400px;" >
						<span class="datospfBN">{$_d['avenida']}</span>
				    </td>
                    <td style="width: 200px;" >
						<span class="datospfBN">{$_d['urbanizacion']}</span>
					</td>
					<td style="width: 200px;" >
						<span class="datospfBN">{$_d['manzana']}</span>
					</td>
                    <td style="width: 140px;" >
						<span class="datospfBN">{$_d['nrocasa']}</span>
					</td>
				</tr>
                <tr class="datospBN">
                    <td style="width: 200px;" >
                        Ciudad:</td>
                    <td style="width: 200px;" >
                        Estado:</td>
                    <td style="width: 200px;" colspan="2" >
                        Municipio:</td>
                    <td style="width: 140px;" >
                        &nbsp;</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 200px;" >
						<span class="datospfBN">$ciudadDir</span>
				    </td>
                    <td style="width: 200px;" >
						<span class="datospfBN">$estadoDir</span>
				    </td>
                    <td style="width: 200px;" colspan="2" >
						<span class="datospfBN">$municipioDir</span>
                    <td style="width: 140px;" >&nbsp;
					</td>
				</tr>
				<tr class="datospBN">
                    <td style="width: 200px;" colspan="2" >
                        Parroqu&iacute;a:</td>
                    <td style="width: 200px;" >
                        Tel&eacute;fono:</td>
                    <td style="width: 140px;" >
                        &nbsp;</td>
					<td style="width: 200px;" >
                        &nbsp;</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 200px;" colspan="2" >
						<span class="datospfBN">$parroquiaDir</span>
				    </td>
                    <td style="width: 200px;" >
						<span class="datospfBN">
						{$_d['codT']}&nbsp; - &nbsp;{$_d['telefono']}</span>
                    <td style="width: 140px;" >&nbsp;
					</td>
					<td style="width: 200px;" >&nbsp;
				    </td>
				</tr>
			</tbody>
		</table>
    </td>
    </tr>
	<tr>
    <td width="750">
		<hr size ="1">
        <div class="tit14" style="text-align:left; background: #F0F0F0">
		Direcci&oacute;n de Residencia:
			<span style="color:gray; font-variant:normal;">
			(completar s&oacute;lo si es diferente a la 
			 Direcci&oacute;n Permanente)</span>
		</div>
        <table id="dir_2" align="center" border="0" cellpadding="1" cellspacing="2" 
		 width="740" style="border-collapse:collapse;border-color:white; border-style:solid;">
            <tbody>
                <tr class="datospBN">
                    <td colspan="2" style="width: 400px;" >
                        Avenida/Calle:</td>
                    <td style="width: 200px;" >
                        Barrio/Urbanizaci&oacute;n/Edificio:</td>
                    <td style="width: 140px;" >
                        Casa/Apto Nro:</td>
                </tr>
                <tr class="datospBN">
                    <td colspan="2" style="width: 400px;" >
						<span class="datospfBN">{$_d['avCalleR']}</span>&nbsp;
				    </td>
                    <td style="width: 200px;" >
						<span class="datospfBN">{$_d['barrioR']}</span>&nbsp;
                    <td style="width: 140px;" >
						<span class="datospfBN">{$_d['casaR']}</span>&nbsp;
					</td>
				</tr>
                <tr class="datospBN">
                    <td style="width: 200px;" >
                        Ciudad:</td>
                    <td style="width: 200px;" >
                        Estado:</td>
                    <td style="width: 200px;" >
                        Tel&eacute;fono:</td>
                    <td style="width: 140px;" >
                        &nbsp;</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 200px;" >
						<span class="datospfBN">{$_d['ciudadR']}</span>&nbsp;
				    </td>
                    <td style="width: 200px;" >
						<span class="datospfBN">{$_d['estadoR']}</span>&nbsp;
				    </td>
                    <td style="width: 200px;" >
						<span class="datospfBN">
						{$_d['codTR']}&nbsp; - &nbsp;{$_d['telefonoR']}</span>
                    <td style="width: 140px;" >&nbsp;
					</td>
				</tr>
			</tbody>
		</table>
    </td>
    </tr>
	<tr>
	
    <td width="750">
		<hr size ="1">
        <div class="tit14" style="text-align:left; background: #F0F0F0">
		Datos Acad&eacute;micos:
		</div>
		
        <table id="dAcad" align="center" border="0" cellpadding="1" cellspacing="2" 
		 width="740" style="border-collapse:collapse;border-color:white; border-style:solid;">
            <tbody>
                <tr class="datospBN">
                    <td style="width: 450px;" colspan="4" >
                        Nombre del Plantel de Procedencia:</td>
                    <td style="width: 145px;" >
                        Tipo de Plantel:</td>
                    <td style="width: 145px;" >
                        Opcion CNU:</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 450px;" colspan="4" >
						<span class="datospfBN">{$_d['plantel']}</span>
				    </td>
                    <td style="width: 165px;" >
						<span class="datospfBN">{$_d['tipo_plantel']}</span>
					</td>
                    <td style="width: 125px;" >
						<span class="datospfBN">{$_d['opcion_cnu']}</span>
					</td>
				</tr>
				<tr class="datospBN">
					<td style="width: 120px;" colspan="4" >
                        Indice Acad&eacute;mico:</td>
					<td style="width: 125px;" >
                        Asignado por:</td>
                </tr>
                <tr class="datospBN">
					<td style="width: 120px;" colspan="4" >
						<span class="datospfBN">{$_d['ind_cnu']}</span>
					</td>
					<td style="width: 125px;vertical-align:top;" >
						<span class="datospfBN">{$_d['ingreso']}</span>
					</td>
				</tr>
                <tr class="datospBN">
                    <td colspan="4" style="width: 150px;" >
                        Sistema de Estudio:</td>
                    <td style="width: 150px;" >
                        Turno:</td>
                    <td style="width: 150px;" >
                        T&iacute;tulo Obtenido:</td>
                    <td style="width: 195px;" >
                        Promedio de Bachillerato:</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 140px; vertical-align:top;" colspan="4" >
						<span class="datospfBN">{$_d['sistema_estudio']}</span>
				    </td>
                    <td style="width: 140px; vertical-align:top;" >
						<span class="datospfBN">{$_d['turno_estudio']}</span>
					</td>
                    <td style="width: 140px; vertical-align:top;" >
						<span class="datospfBN">{$_d['titulo_b']}</span>
				    </td>
                    <td style="width: 165px;vertical-align:top;" >
						<span class="datospfBN">{$_d['promedio']}</span>
					</td>
                    
				</tr>
				<tr class="datospBN">
					<td colspan="5" style="width: 150px;" >
                        Datos de Ubicación del Plantel:</td>
                </tr>
                <tr class="datospBN">
                    <td colspan="4" style="width: 150px;" >
                        País del Plantel:</td>
                    <td style="width: 150px;" >
                        Estado del Plantel:</td>
                    <td style="width: 150px;" >
                        Ciudad del Plantel:</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 140px; vertical-align:top;" colspan="4" >
						<span class="datospfBN">$pais_nombre_p</span>
				    </td>
                    <td style="width: 140px; vertical-align:top;" >
						<span class="datospfBN">$edo_nombre_e</span>
					</td>
                    <td style="width: 140px; vertical-align:top;" >
						<span class="datospfBN">$cd_nombre_p</span>
				    </td>
				</tr>
				<tr class="datospBN">
					<td style="width: 125px;" colspan="4" >
                        Municipio del Plantel:</td>
					<td style="width: 125px;" colspan="2" >
                        Parroqu&iacute;a del Plantel:</td>
                    <td style="width: 195px;" >
                        Año de Egreso:</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 165px;vertical-align:top;" colspan="4" >
						<span class="datospfBN">$mpio_nombre_p</span>
                    </td>
					<td style="width: 165px;vertical-align:top;" colspan="2" >
						<span class="datospfBN">$pquia_nombre_p</span>
                    </td>
					<td style="width: 125px;vertical-align:top;" >
						<span class="datospfBN">{$_d['ano_egre_cole']}</span>
					</td>
				</tr>
			</tbody>
		</table>
    </td>
    </tr>	
	<tr>
    <td width="750">
		<hr size ="1">
        <div class="tit14" style="text-align:left; background: #F0F0F0">
		Datos Socioecon&oacute;micos:
		</div>
        <table id="dSocioE" align="center" border="0" cellpadding="1" cellspacing="2" 
		 width="740" style="border-collapse:collapse;border-color:white; border-style:solid;">
            <tbody>
                <tr class="datospBN">
                    <td style="width: 185px;" >
                        Instrucci&oacute;n del Padre:</td>
                    <td style="width: 185px;" >
                        Ocupaci&oacute;n del Padre:</td>
                    <td style="width: 185px;" >
                        Instrucci&oacute;n de la Madre:</td>
                    <td style="width: 185px;" >
                        Ocupaci&oacute;n de la Madre:</td>
                </tr>
                <tr class="datospBN">
                    <td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN">{$_d['instr_padre']}</span>
				    </td>
                    <td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN">{$_d['ocup_padre']}</span>
					</td>
                    <td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN">{$_d['instr_madre']}</span>
				    </td>
                    <td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN">{$_d['ocup_madre']}</span>
					</td>
				</tr>
				<tr class="datospBN">
                    <td colspan="2" style="width: 370px;" >Tipo de Vivienda que Habita:</td>
                    <td colspan="2" style="width: 370px;" >Ingreso Familiar Mensual:</td>
				</tr>
				<tr class="datospBN">
                    <td colspan="2" style="width: 370px; vertical-align:top;" >
						<span class="datospfBN">{$_d['tipo_vivienda']}</span>
						<span class="datospfBN">{$_d['monto_alq']}</span>
					</td>
                    <td colspan="2" style="width: 370px; vertical-align:top;" >
						<span class="datospfBN">{$_d['ingreso_fBs']}</span>
				    </td>
				</tr>
				
				<tr class="datospBN">
                    <td style="width: 185px;" >Posee Beca:</td>
                    <td style="width: 185px;" >Afrodescendiente:</td>
					<td style="width: 185px;" >Etnia Indigena:</td>
					<td style="width: 185px;" >Trabaja:</td>
				</tr>
				
				<tr class="datospBN">
                     <td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN">{$_d['becario']} - {$_d['organismo']}</span>
				    </td>
					 <td style="width: 185px; vertical-align:top;" >
					 	<span class="datospfBN">$afrodescen</span>
				    </td>
					 <td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN">{$_d['etnia_indigenaS']} - {$_d['etnia_indigena']}</span>
				    </td>
					<td style="width: 185px; vertical-align:top;" >
					 <span class="datospfBN">{$_d['trabajaS']} - {$_d['turno_trabajo']}</span>
					</td>
				</tr>
				
				<tr class="datospBN">
				<td style="width: 185px;" >Discapacidad:</td>
				</tr>
				
				<tr class="datospBN">
                     <td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN">$discapacidad - $disca_nombre</span>
				    </td>
					<td style="width: 185px; vertical-align:top;" >
						<span class="datospfBN"><b>Carnet</b>: {$_d['carnet_disca']}</span>
				    </td>		
				</tr>
			</tbody>
		</table>
	</td></tr>
	<tr  class="datosp" style="background-color:white;">
		<td width="740">&nbsp;
			<hr size="1" width="740">
	</tr>
	<tr class="datosp" style="background-color:white;">
		<td>
P001
;
	// en 'inc/recaudos.php' esta la lista de los recaudos y la fecha en que 
	// el estudiante debe asistir para formalizar su inscripcion. Editar a
	// conveniencia cada semestre.
	include_once('inc/recaudos.php');
	print <<<P002
		</td>
	</tr>
	<tr class="datosp" style="background-color:white;">
		<td>        
		<table id="tBoton" align="center" border="0" cellpadding="1" cellspacing="2"
		 width="740" style="border-collapse:collapse;border-color:white; border-style:solid; background:white;">
			<tr><td style="width: 200px">
				<input class="boton" type="reset" value="Imprimir"
					onclick="window.print();"></td>
				<td style="width: 200px">
				<input class="boton" type="button" value="Regresar y Modificar Datos" id="Regresar" 
					onclick="this.style.display='none'; document.datos_p.submit();">
				</td>
				<td style="width: 200px">
				<input class="boton" type="button" value="Cerrar" id="Cerrar" 
					onclick="window.close();">
				</td>
			</tr>
		</table></td>
	</tr>
	</body>
	</table>
P002
; 
?>