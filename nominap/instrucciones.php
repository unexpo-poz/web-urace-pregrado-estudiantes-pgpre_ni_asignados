<php?
include_once ('../inc/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>Instrucciones </title>
<style type="text/css">
<!--
.instruc {
  font-family:Arial; 
  font-size: 13px; 
  font-weight: normal;
  background-color: #FFFFCC;
}
.act { 
  text-align: center; 
  font-family:Arial; 
  font-size: 12px; 
  font-weight: normal;
  background-color:#99CCFF;
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


<body onLoad="javascript:self.focus();">
<table border="0" width="680">
	<tr><td class="act" style="font-size:14px; font-weight:bold;">

	INSTRUCCIONES</td></tr>
	<tr><td class="instruc">
        <ul>
            <li style="list-style-type: square;">
            INGRESE el nombre de la DEPENDENCIA donde trabaja.</li>
			<li style="list-style-type: square;">
            INGRESE el nombre del SUPERVISOR.</li>
           <li style="list-style-type: square;">
		   Para generar una o varias filas y empezar la carga de datos debe pulsar el botón
            <span id="F" class="act"> <input name="button_enviar" type="button" class="boton"  disabled value="a&ntilde;adir" /></span>. Luego de esto se debe ingresar la <font style="background-color: #FF3366; color:black;"><b>ACTIVIDAD REALIZADA, DIA, HORA ENTRADA y HORA SALIDA </b></font>    del dia que realizó el trabajo.</li>

            <li style="list-style-type: square;">
            Si desea borrar una fila debe hacer click en el botón <input type="button" value="borrar" class="boton"  disabled="disabled"/>.</li>
            <li style="list-style-type: square;">
			Para realizar el cálculo de la <font style="background-color: #FF3366; color:black;">HORA TOTAL</font>  trabajada debe pulsar el botón <input  type="button" name="sumar" value="sumar" class="boton" size="10"  disabled="disabled">.</li>             
			<li style="list-style-type: square;">

            Para cargar los datos al sistema e imprimir la planilla se debe pulsar el bot&oacute;n  <input  disabled="disabled"  type="button" class="boton" value="Guardar" >.</li>
			<br><b> NOTA:</b><br>
			<li style="list-style-type: square;"><b>La planilla debe ser firmada por el supervisor y posteriormente entregada en URDBEPO (antiguo DOBE).</b></li>
			<li style="list-style-type: square;"><b>El procedimiento anterior puede ser realizado las veces que se desee, hasta cumplir con el límite de horas reglamentario.</b></li>
        </ul>
        </td>
    </tr>
	<tr><td align="center">
	<input type="button" value="Cerrar" onClick="javascript:self.close();">
	</table></body>

</html>
