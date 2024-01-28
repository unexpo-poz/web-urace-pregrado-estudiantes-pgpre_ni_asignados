<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html><head>
<?php
include_once('inc/config.php');
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL0111  = "select * from FECHA  " ;
$conex->ExecSQL($mSQL0111,__LINE__,true);
$result0111 = $conex->result;
//$lapsoProceso=$result0111[0][2];
?>



	<title>Formulario Planilla Relación de Pago</title>
	<script type="text/javascript" src="asrequest.js"></script>
<?php



$prueba=$_POST['prueba'];
 //if ( isset($_POST[enviar2]) ){
$FECHA=$_POST['fecha'];
$FECHA1=$_POST['fecha1'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL  = "select * from FECHA   ";
$conex->ExecSQL($mSQL,__LINE__,true);
$result24 = $conex->result;
?>	
	
<?php
$TLF=$_POST['tlf'];
$EMAIL=$_POST['email'];
$CEDULA1=$_POST['cedula1'];
$validar=$_POST['validar'];
//echo $validar;
$NOMBRE=$_POST['nombre'];
$CEDULA=$_POST['cedula'];
$lapso=$_POST['lapso'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL  = "select NOMBRES,APELLIDOS,SEMESTRE,NRO_CTA,C_UNI_CA,TIPO_CTA,TIPO,NOMBRES2,APELLIDOS2,TELEFONO1,CORREO1 from DACE002 a, AYU_CUENTA b,AYU_ESTUDIANTES d where a.CI_E='$validar' and ";
$mSQL .= "b.CI_E='$validar' and ";
$mSQL .= "d.CI_E='$validar' and d.LAPSO='$lapsoProceso' ";
$conex->ExecSQL($mSQL,__LINE__,true);
$result = $conex->result;
$filas = $conex->filas;
if (isset($_POST['validar']) )
{
if($filas==NULL)  die ("<script language=\"javascript\">alert('CEDULA  INVALIDA O INCORRECTA. No aparece en el sistema de nominas, por favor verifique sus datos. En otro caso  dirijase a la oficina de URDBEPO (antiguo DOBE)'); self.close();</script> ");}
//if (!empty($result[0][9])){
$a=$result[0][4];
$b= $result[0][5];
if($b==1) $cuenta="ahorro";
if($b==0) $cuenta="corriente";  
$mSQL = "SELECT a.CARRERA1,b.NOMBRE_AYU,b.MONTO,b.TIPO_AYU,b.LIMITE_HORA FROM TBLACA010 a,AYU_MONTO b WHERE a.C_UNI_CA='".$result[0][4]."' and b.TIPO_AYU='".$result[0][6]."' " ;
$conex->ExecSQL($mSQL,__LINE__,true);
$result1 = $conex->result;
$monto_hora= $result1[0][2];
$nro=$result1[0][3];
/*
if($aa==0) $nro=NULL;
if($aa==1) $nro="1";
if($aa==2) $nro="2";
if($aa==3) $nro="3";
if($aa==4) $nro="4";
*/
//echo $result1[0][4];
?>

<?php
$fecha=$_POST['fecha'];
$lapso=$_POST['lapso'];
$validar=$_POST['validar'];
//require_once("inc/odbcss_c.php");
//$conex = new ODBC_Conn("NOMINA","ANDRES","ANDRES",TRUE,"PRUEBA.LOG");
//$mSQL8  = "select FECHA_LAP_INI, FECHA_LAP_FIN, LAPSO from ASISTENCIAS where CI_E='$validar' AND LAPSO='$lapso' ";
//$conex->ExecSQL($mSQL8,__LINE__,true);
//$result8 = $conex->result;
//echo $result8[0][0];
 $cad = $result24[0][0];
$separar = explode('-',$cad);
$mes=$separar[1];

require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
	$mSQL33  = "SELECT MAX(nro)  from ASISTENCIAS where CI_E='$validar' and LAPSO='$lapsoProceso' and MES='$mes' ";
$conex->ExecSQL($mSQL33,__LINE__,true);
$result33 = $conex->result;
$filas33 = $conex->filas;

if ($result33[0][0]==NULL) $result33[0][0]=0;

$mSQL44  = "SELECT distinct *  from ASISTENCIAS where CI_E='$validar' and LAPSO='$lapsoProceso' and MES='$mes' ";
$conex->ExecSQL($mSQL44,__LINE__,true);
$result44 = $conex->result;
$filas44 = $conex->filas;

?>

<?php 

$validar1=$_POST['validar1'];
$TLF=$_POST['tlf'];
$EMAIL=$_POST['email'];
$LAPSO1=$_POST['lapso1'];
$lapso=$_POST['lapso'];
$validar=$_POST['validar'];
$SUPERVISOR=$_POST['supervisor'];
$FECHA=$_POST['fecha'];
$FECHA1=$_POST['fecha1'];
$DEPENDENCIA=$_POST['dependencia'];
$TOTALHORAS=$_POST['totalhoras1'];
$CEDULA=$_POST['cedula'];
$CEDULA1=$_POST['cedula1'];
$minutos=$_POST['minutos'];
$N=$_POST['contador'];
$COD=$_POST['cod'];
$fechaini=$_POST['fechaini'];
$fechafin=$_POST['fechafin'];
$normal="0";
$monto=$_POST['monto'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$montototal=$monto*$TOTALHORAS;
//echo $TOTALHORAS;
//echo $monto_hora;
//echo $montototal;

for($k=1;$k<=$N;$k++)
{
	$ACT[$k]=$_POST['act'.$k.''];
	$fechas[$k]=$_POST['fechas'.$k.''];
	$hi[$k]=$_POST['hi'.$k.''];
	$hf[$k]=$_POST['hf'.$k.''];
	$mi[$k]=$_POST['mi'.$k.''];
	$mf[$k]=$_POST['mf'.$k.''];
	$pf[$k]=$_POST['pf'.$k.''];
	$pi[$k]=$_POST['pi'.$k.''];
	$numero[$k]=$_POST['contador1'.$k.''];
	$mSQL3  = "INSERT  INTO ASISTENCIAS (CODIGO,CI_E,FECHA_LAP_INI,FECHA_LAP_FIN,DEPENDENCIA,NOM_SUPERVISOR,HORA_TOTAL,LAPSO,ACT_REALIZADA,FECHA,HORA_ENTR,HORA_SALIDA,MES,MIN_ENT,MIN_SAL,MIN_TOTAL,am_pm_1,am_pm_2,RETRASADOS )      VALUES  ('$COD','$CEDULA1','".$result24[0][0]."', '".$result24[0][1]."','$DEPENDENCIA','$SUPERVISOR','$TOTALHORAS','$LAPSO1','$ACT[$k]','$fechas[$k]','$hi[$k]','$hf[$k]','$mes','$mi[$k]','$mf[$k]' ,'$minutos','$pi[$k]','$pf[$k]', '$normal' ) " ;	
$conex->ExecSQL($mSQL3,__LINE__,true);
$result3 = $conex->result;
}

$mSQL2  = "select distinct DEPENDENCIA,NOM_SUPERVISOR from ASISTENCIAS where CI_E='$validar' and LAPSO='$lapsoProceso' and MES='$mes' ";
$conex->ExecSQL($mSQL2,__LINE__,true);
$result2 = $conex->result;



?>

<?php
$tot=$_POST['tot'];
$limite_hora=$result1[0][4];
//if($tot < $limite_hora)
//{//inicio while
$mSQL20  = "select distinct HORA_TOTAL from ASISTENCIAS where CI_E='$validar' and LAPSO='$lapsoProceso' and MES='$mes' ";
$conex->ExecSQL($mSQL20,__LINE__,true);
$result20 = $conex->result;
$filas20 = $conex->filas;
for($w=0;$w <= $filas20 ;$w++)
{
//$EEE= $result20[$w][0]+$EEE;
//echo "EEE=$EEE";
$sumahoras=$result20[$w][0]+$sumahoras;
if ($sumahoras>=$limite_hora) $sumahoras=$limite_hora;

		 
//echo  $result20[$w][0];
//echo"sumahoras:$sumahoras";
}

/*}
if ($sumahoras>=$limite_hora){
?>
<script languaje="Javascript">
alert("ya supero su limite de horas");
/*lapso=form.lapso1.value ;
		validar=form.validar1.value ;
		fechaini=form.fechaini.value ;
		fechafin=form.fechafin.value ;
		mes=form.mes1.value;campo2="+lapso+"&campo3="+validar+"&campo4="+fechaini+"&campo5="+fechafin+"&campo7="+mes+"&campo8="+codigo
		codigo=form.cod.value ;
		
window.open("planilla_asistencia_fin.php?campo2=<?php echo $lapsoProceso; ?>&campo3=<?php echo $validar;?>&campo7=<?php echo $mes;?>","planillac","left=0,top=0,width=790,height=500,scrollbars=1,resizable=1,status=1");
		window.close();
</script>


<?php

}*/




$tot=$_POST['tot'];
//echo  $horascuenta;

$mSQL71  = "UPDATE ASISTENCIAS SET HORA_TOTAL='$sumahoras' where CI_E='$validar'  and MES='$mes' and LAPSO='$lapsoProceso' " ;
$conex->ExecSQL($mSQL71,__LINE__,true);
$result71 = $conex->result;

require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");

	$mSQL330  = "SELECT ACT_REALIZADA,FECHA_LAP_INI,FECHA_LAP_FIN,DEPENDENCIA,NOM_SUPERVISOR,HORA_TOTAL,LAPSO,CI_E,FECHA,HORA_ENTR,HORA_SALIDA,MES,MIN_TOTAL,MIN_ENT,MIN_SAL,am_pm_1, am_pm_2  from ASISTENCIAS where CI_E='$validar' and LAPSO='$lapsoProceso' and MES='$mes' order by FECHA asc ";
$conex->ExecSQL($mSQL330,__LINE__,true);
$result330 = $conex->result;
$filas330 = $conex->filas;


$mSQL3301  = "SELECT MIN_TOTAL from ASISTENCIAS where CI_E='$validar' and LAPSO='$lapsoProceso' and MES='$mes' ";
$conex->ExecSQL($mSQL3301,__LINE__,true);
$result3301 = $conex->result;
if ($result3301[0][0]==NULL) $result3301[0][0]=0;
//$result3301[0][0]=$min;
//echo $result3301[0][0];
//echo $result3301[1][0];
?>

<style type="text/css">
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

  .datospf {
  text-align: left; 
  font-family:Arial; 
  font-size: 11px;
  font-weight: normal;
  background-color:#FFFFFF; 
  border-style: solid;
  border-width: 1px;
  border-color: #96BBF3;
  }
  .enc_p {
  color:#FFFFFF;
  text-align: center; 
  font-family:Helvetica; 
  font-size: 14px; 
  font-weight: bold;
  background-color:#3366CC;
  height:20px;
  font-variant: small-caps;
  }
  .enc_leg {
  color:#3366CC;
  text-align: center; 
  font-family:Helvetica; 
  font-size: 14px; 
  font-weight: bold;
  background-color:#FFFFFF;
  height:20px;
  font-variant: small-caps;
  }
  .datosp {
  text-align: left; 
  font-family:Arial; 
  font-size: 12px;
  font-weight: normal; 
  font-variant: small-caps;
  }
  .datospd {
  text-align: center; 
  font-family:Arial; 
  font-size: 12px;
  font-weight: normal; 
  font-variant: small-caps;
  }
  .act { 
  text-align: center; 
  font-family:Arial; 
  font-size: 12px; 
  font-weight: normal;
  background-color:#99CCFF;
}


-->
</style>



<script language="javascript" type="text/javascript"> 



 function Validar(Cadena){  
     var Fecha= new String(Cadena)   // Crea un string  
     var RealFecha= new Date()   // Para sacar la fecha de hoy  
     // Cadena Año  
     var Ano= new String(Fecha.substring(Fecha.lastIndexOf("-")+1,Fecha.length))  
     // Cadena Mes  
     var Mes= new String(Fecha.substring(Fecha.indexOf("-")+1,Fecha.lastIndexOf("-")))  
     // Cadena Día  
     var Dia= new String(Fecha.substring(0,Fecha.indexOf("-")))
	 
   
     // Valido el año  
     if (isNaN(Ano) || Ano.length<4 || parseFloat(Ano)<1900){  
             alert('Año inválido')  
         return false  
     }  
     // Valido el Mes  
     if (isNaN(Mes) || parseFloat(Mes)<1 || parseFloat(Mes)>12){  
         alert('Mes inválido')  
         return false  
     }  
     // Valido el Dia  
     if (isNaN(Dia) || parseInt(Dia, 10)<1 || parseInt(Dia, 10)>31){  
         alert('Día inválido')  
         return false  
     }  
     if (Mes==4 || Mes==6 || Mes==9 || Mes==11 || Mes==2) {  
         if (Mes==2 && Dia > 28 || Dia>30) {  
             alert('Día inválido')  
             return false  
         }  
     }  
       
    
 }  

 function vacio(cadena)  
   {                                    // DECLARACION DE CONSTANTES  
     var blanco = " \n\t" + String.fromCharCode(13); // blancos  
                                        // DECLARACION DE VARIABLES  
     var i;                             // indice en cadena  
     var es_vacio;                      // cadena es vacio o no  
     for(i = 0, es_vacio = true; (i < cadena.length) && es_vacio; i++) // INICIO  
       es_vacio = blanco.indexOf(cadena.charAt(i)) != - 1;  
     return(es_vacio);  
   }    
   
    function email(cadena, otros)  
   {                                    // DECLARACION-INICIALIZACION VARIABLES  
     var i, j;                          // indice en cadena  
     var es_email = 0 < cadena.length;  // cadena es email o no  
     i = salta_alfanumerico(cadena, 0, otros); // INICIO  
     if(es_email = 0 < i)               // lee "alfanum*"  
       if(es_email = (i < cadena.length))  
         if(es_email = cadena.charAt(i) == '@') // lee "alfanum@*"  
           {  
             i++;  
             j = salta_alfanumerico(cadena, i, otros);  
             if(es_email = i < j)       // lee "alfanum@alfanum*"  
               if(es_email = j < cadena.length)  
                 if(es_email = cadena.charAt(j) == '\.')  
                   {                    // lee "alfanum@alfanum.*"  
                     j++;  
                     i = salta_alfanumerico(cadena, j, otros);  
                     if(es_email = j < i) // lee "alfanum@alfanum.alfanum*"  
                       while(es_email && (i < cadena.length))  
                         if(es_email = cadena.charAt(i) == '\.')  
                           {  
                             i++;  
                             j = salta_alfanumerico(cadena, i, otros);  
                             if(es_email = i < j) // lee "alfanum@alfanum.alfanum[.alfanum]*"  
                               i = j;  
                           }  
                   }  
           }  
     return(es_email);  
   }  
    function salta_alfanumerico(cadena, i, otros)  
   {                                    // DECLARACION DE VARIABLES  
     var j;                             // indice en cadena  
     var car;                           // caracter de cadena  
     var alfanum;                       // cadena[j] es alfanumerico u otros  
     for(j = i, alfanum = true; (j < cadena.length) && alfanum; j++) // INICIO  
       {  
         car = cadena.charAt(j);  
         alfanum = alfanumerico(car) || (otros.indexOf(car) != -1);  
       }  
     if(!alfanum)                       // lee "alfanumX"  
       j--;  
     return(j);  
   }  
     
 /* dice si car es alfanumerico                                               */  
 function alfanumerico(car)  
   {  
     return(alfabetico(car) || numerico(car));  
   }  
   
   
 /* dice si car es alfabetico                                                 */  
 function alfabetico(car)               // DECLARACION DE CONSTANTES  
   {                                    // caracteres alfabeticos  
     var alfa = "ABCDEFGHIJKLMNOPQRSTUWXYZabcdefghijklmnopqrstuvxyz";  
     return(alfa.indexOf(car) != - 1);  // INICIO  
   }  
   
   
 /* dice si car es numerico                                                   */  
 function numerico(car)  
   {                                    // DECLARACION DE CONSTANTES  
     var num = "0123456789";            // caracteres numericos  
     return(num.indexOf(car) != - 1);   // INICIO  
   }  
   
   
    function ValidaCampos(form)  
   {  
     if( vacio(form.dependencia.value) ||  vacio(form.supervisor.value) ||  vacio(form. totalhoras.value) )  
       alert("complete los campos marcados con *."); 
	      
     else    
       return(true); 
        
     return(false);  
	 
   }  
   </script>





 <script languaje="javaScript">
var numero = 1;    
var fila = 0;
var contador=0;   
var contador1=<?php echo $result33[0][0]; ?>;

function InsertRow() {
if (contador < 20)
{
numero = numero + 1;
fila = fila +1;
contador=contador+1;
contador1=contador1+1;
var newRow = document.getElementById("thetable").insertRow(fila); // Insert the third row
var newCell1 = newRow.insertCell(0); // Insert the first cell
newCell1.innerHTML ='<tr ><textarea   name="act'+fila+'"  onkeyup="this.value = this.value.slice(0, 140)" cols="40" id="act'+fila+'" "></textarea><input type="hidden" name="contador" value="'+contador+'">'; // First cell's innerHTML
var newCell2 = newRow.insertCell(1); // Insert the second cell
newCell2.innerHTML = '<input type="text" name="fechas'+fila+'" id="fechas'+fila+'" size="10" maxlength="2" onKeyUp="fecha30()"  style=" font-size:12px;font-family:Arial" > &nbsp;&nbsp;Ej:dd'; // Second cell's innerHTML
var newCell3 = newRow.insertCell(2); // Insert the second cell
newCell3.innerHTML = '&nbsp;<input type="text" name="hi'+fila+'" maxlength="2" size="1" onKeyUp="hora1()" id="h1'+fila+'" />:<input type="text" name="mi'+fila+'" maxlength="2" size="1" onKeyUp="min1()" id="m1'+fila+'" /><tr><select  name="pi'+fila+'" id="pi'+fila+'" class="datospf" ><option value="1">am</option><option value="2">pm</option></select></tr>'; // Second cell's innerHTML
var newCell4 = newRow.insertCell(3); // Insert the second cell
newCell4.innerHTML = '&nbsp;<input type="text" name="hf'+fila+'" size="1" maxlength="2" onKeyUp="hora2()" id="h2'+fila+'" />:<input type="text" name="mf'+fila+'" maxlength="2" size="1" onKeyUp="min2()" id="m2'+fila+'" /><tr><select name="pf'+fila+'" id="pf'+fila+'" class="datospf" ><option value="1">am</option><option value="2">pm</option></select></tr>'; // Second cell's innerHTML
var newCell5 = newRow.insertCell(4); // Insert the second cell
newCell5.innerHTML = '<input type="text" disabled="disabled"  name="numero" value="'+contador1+'" size="1" maxlength="2" >  <input type="hidden" name="contador1'+fila+'" id="contador1'+fila+'" value="'+contador1+'">   <input type="hidden" name="contador2"  value="'+contador1+'">'; // Second cell's innerHTML
}
}


function fecha30(){
for(j=1;j<=fila;j++){
var fechas =document.getElementById("fechas"+j).value;
if (fechas>31){document.getElementById("fechas"+j).value="";}
if(!/^([0-9])*$/.test(document.getElementById("fechas"+j).value)){
document.getElementById("fechas"+j).value="";}
}
}

function hora1(){
for(j=1;j<=fila;j++){
var hora_12 =document.getElementById("h1"+j).value;
if (hora_12>12){document.getElementById("h1"+j).value="";}
if(!/^([0-9])*$/.test(document.getElementById("h1"+j).value)){
document.getElementById("h1"+j).value="";}
}
}

function hora2(){
for(j=1;j<=fila;j++){
var hora_2 =document.getElementById("h2"+j).value;
if (hora_2>12){document.getElementById("h2"+j).value="";}
if(!/^([0-9])*$/.test(document.getElementById("h2"+j).value)){
document.getElementById("h2"+j).value="";}
}
}


function min1(){
for(j=1;j<=fila;j++){
var min_1 =document.getElementById("m1"+j).value;
if (min_1>59){document.getElementById("m1"+j).value="";}
if(!/^([0-9])*$/.test(document.getElementById("m1"+j).value)){
document.getElementById("m1"+j).value="";}
}
}

function min2(){
for(j=1;j<=fila;j++){
var min_2 =document.getElementById("m2"+j).value;
if (min_2>59){document.getElementById("m2"+j).value="";}
if(!/^([0-9])*$/.test(document.getElementById("m2"+j).value)){
document.getElementById("m2"+j).value="";}
}
}







function sumarhoras(){
var h=0;
var horas=0;
var suma11=0;
var minutos=0;
var limite=0;
var conta=0;
var cuenta =document.getElementById("ejemplo").value;
var limite=document.getElementById("tipodenomina").value;
var conta=parseInt(document.getElementById("conta").value);
for(j=1;j<=fila;j++){

var hi =parseInt(document.getElementById("h1"+j).value);
var hf =parseInt(document.getElementById("h2"+j).value);
var mi =parseInt(document.getElementById("m1"+j).value);
var mf =parseInt(document.getElementById("m2"+j).value);
var pi =document.getElementById("pi"+j).value;
var pf =document.getElementById("pf"+j).value;
var fechas =document.getElementById("fechas"+j).value;




if (document.getElementById("h1"+j).value.charAt(0)==0 && document.getElementById("h1"+j).value.charAt(1)>=1 && document.getElementById("h1"+j).value.charAt(1)<=9 ){
//alert ("")
hi = document.getElementById("h1"+j).value.charAt(1);
document.getElementById("h1"+j).value = hi;
}

if (document.getElementById("h2"+j).value.charAt(0)==0 && document.getElementById("h2"+j).value.charAt(1)>=1 && document.getElementById("h2"+j).value.charAt(1)<=9 ){
//alert ("")
hf = document.getElementById("h2"+j).value.charAt(1);
document.getElementById("h2"+j).value = hf;
}



if (document.getElementById("fechas"+j).value=="" ){
alert ("Complete el campo Día  vacío") 
return false
}

if(!/^([0-9])*$/.test(document.getElementById("fechas"+j).value)){
alert("El valor del campo Día (" + document.getElementById("fechas"+j).value + ") no es un numero.")
return false
}

if (document.getElementById("fechas"+j).value>31 ){
alert ("El rango de la fecha es entre 1-31")
return false
}

if (document.getElementById("fechas"+j).value.length==1 ){
document.getElementById("fechas"+j).value="0"+document.getElementById("fechas"+j).value+"";
//return false
}

if (document.getElementById("h1"+j).value=="" ){
alert ("Complete el campo HORA  vacío")
return false
}

 if(!/^([0-9])*$/.test(document.getElementById("h1"+j).value)){
alert("El valor del campo HORA (" + document.getElementById("h1"+j).value + ") no es un numero.")
return false
}




if (document.getElementById("h1"+j).value>12 ){
alert ("El rango de la hora es entre 1-12")
return false
}

if (document.getElementById("h2"+j).value=="" ){
alert ("Complete el campo HORA  vacío")
return false
}

 if(!/^([0-9])*$/.test(document.getElementById("h2"+j).value)){
alert("El valor del campo HORA (" + document.getElementById("h2"+j).value + ") no es un numero.")
return false
}

if (document.getElementById("h2"+j).value>12 ){
alert ("El rango de la hora es entre 1-12")
return false
}


if (document.getElementById("m1"+j).value=="" ){
alert ("Complete el campo MINUTOS  vacío")
return false
}

if(!/^([0-9])*$/.test(document.getElementById("m1"+j).value)){
alert("El valor del campo MINUTOS (" + document.getElementById("m1"+j).value + ")   no es un numero.")
return false
}

if (document.getElementById("m1"+j).value>59 ){
alert ("El rango de los minutos es entre 00-59")
return false
}

if (document.getElementById("m2"+j).value=="" ){
alert ("Complete el campo MINUTOS  vacío")
return false
}

if(!/^([0-9])*$/.test(document.getElementById("m2"+j).value)){
alert("El valor del campo MINUTOS (" + document.getElementById("m2"+j).value + ") no es un numero.")
return false
}

if (document.getElementById("m2"+j).value>59 ){
alert ("El rango de los minutos es entre 00-59")
return false
}
if (<?php echo $result[0][6]; ?>!=1 ){
    if(pi == 2 && hi!=12)
	  hi = hi + 12;
	if(pf == 2 && hf!=12)
	  hf = hf + 12;
	if( hf == 12 && pf == 1)
	  hf = 0;
	if( hi == 12 && pi == 1)
	{
	  hi = 0;
	 }
	
	
var	res = (hf-hi)*60 +( mf - mi);

	if(res > 60) 
	{
	  var mres = res%60; 
	  var hres = (res-mres)/60;
	   
	}
	else
	{
	 res = Math.abs(res);
	  var mres = res%60;
	  var hres = (res-mres)/60;
	}
//alert("hola");
horas=horas+hres;
if(j>1){conta=0;}
minutos=minutos+mres+conta;

if(minutos == 60)
{
  horas=horas+1;
  minutos=0;
}
if(minutos > 60)
{
  
  minutos = (minutos+(minutos / 60))-1;
  minutos = parseInt(minutos);
  horas=horas+((minutos)/60);
  horas = parseInt(horas);
  minutos=minutos%60;
  
  
}
}


if (<?php echo $result[0][6]; ?>==1 ){//  para validar si es preparador
if(pi == 2 && hi!=12)
	  hi = hi + 12;
	if(pf == 2 && hf!=12)
	  hf = hf + 12;
	if( hf == 12 && pf == 1)
	  hf = 0;
	if( hi == 12 && pi == 1)
	{
	  hi = 0;
	 }
	
	
var	res = (hf-hi)*60 +( mf - mi);

	if(res > 50) 
	{
	  var mres = res%50; 
	  var hres = parseInt((res-mres)/50);
	   
	}
	else
	{
	 res = Math.abs(res);
	  var mres = res%50;
	  var hres = (res-mres)/50;
	}
//alert("hola");
horas=horas+hres;
if(j>1){conta=0;}
minutos=minutos+mres+conta;

if(minutos == 50)
{
  horas=horas+1;
  minutos=0;
}
if(minutos > 50)
{
  
  minutos = (minutos+(minutos / 50))-1;
  minutos = parseInt(minutos);
  horas=horas+((minutos)/50);
  horas = parseInt(horas);
  minutos=minutos%50;
  
  
}
}//  fin validacion si es preparador


		
}


  if (horas > limite)
  {
  alert("LLEGÓ AL LIMITE DE HORAS CORRESPONDIENTE ");
  horas=limite;
  //window.close();
  }
suma11=parseInt(horas)+parseInt(cuenta);
if (suma11>limite){
alert("Ha superado el limite de Horas correspondiente. Se habian ingresado ("+cuenta+") horas anteriormente.");
suma11=limite;
}

if (suma11==limite){
alert("Ha igualado el limite de Horas correspondiente.");
suma11=limite;
}

document.getElementById("horas").value=horas;
document.getElementById("minutos").value=minutos;
//document.getElementById("ejemplo").value=suma11;
document.getElementById("horas11").value=horas;
document.getElementById("n").value=suma11;
document.getElementById("n1").value=suma11;
document.getElementById("min").value=minutos;
}


		
function removeRow()

     {
          // grab the element again!
          var tbl = document.getElementById('thetable');
          // grab the length!
          var lastRow = tbl.rows.length;
          // delete the last row if there is more than one row!
          if (lastRow > 3) 
          {
          tbl.deleteRow(lastRow - 3);
			 fila=fila-1;      
			 numero=numero-1;
			 contador=contador-1; 
			 contador1=contador1-1;   
          }
     }
	 
	
</script>
<script type="text/javascript" src="js/funciones.js"></script>

<script languaje="Javascript">
<!--

  function planilla_open(f) {
	
	if (document.getElementById("dependencia").value=="" || document.getElementById("supervisor").value=="" || document.getElementById("horas").value=="" )
	 {
	alert("Complete todos los campos");
	return false
	}
	
		lapso=f.lapso1.value ;
		validar=f.validar1.value ;
		fechaini=f.fechaini.value ;
		fechafin=f.fechafin.value ;
		mes=f.mes1.value;
		codigo=f.cod.value ;
		
		
		document.solicitud.submit();
		//window.open("planilla_asistencia_fin.php?campo2="+lapso+"&campo3="+validar+"&campo4="+fechaini+"&campo5="+fechafin+"&campo7="+mes+"&campo8="+codigo,"planillac","left=0,top=0,width=800,height=500,scrollbars=1,resizable=1,status=1");
		
		return true;
		
		//window.close();
	}
//-->
  </script>
  
 
  
  
<script language="javascript">
	function aaa() {
	
	window.open("instrucciones.php","planillac","left=0,top=0,width=790,height=320,scrollbars=1,resizable=1,status=1");
	}
	</script>
<script language="javascript">	
///////////////////////////////////////////captura de eventos
	
function manejador(elEvento) {
  var tecla=0;
  var evento = elEvento || window.event;
  //alert("["+ evento.keyCode+"]");
  //alert("["+evento.type+"] El código de la tecla pulsada es " + evento.keyCode);
  if (evento.keyCode!="") {InicializarCrono4 ();} 
 // else { if (tecla==1) {j=0;} }
  
} 
document.onkeyup = manejador;
document.onkeydown = manejador;



function procesaEvento(elEvento) {
 var evento = elEvento || window.event;
  if(elEvento.type == "click") {
    InicializarCrono4 ();
  }
  else if(elEvento.type == "mouseover") {
    InicializarCrono4 ();
  }
}
 
document.onclick = procesaEvento;
document.onmouseover = procesaEvento;

	//CRONOMETRO
	var CronoID3 = null
	var CronoEjecutandose3 = false
	var decimas3, segundos3, minutos3
	i3=1
	// *****************************************
	function DetenerCrono3 (){
	//alert("La pagina se cerrara por falta de uso");
	//window.close();
  		//if(CronoEjecutandose3)
 	 	  //clearTimeout(CronoID3)
 	 //no va-CronoEjecutandose3 = false

	}
	//*******************************************
	function InicializarCrono3 () {
		decimas3 = 9
		segundos3 = 59
		minutos3 = 10
		}


	//*******************************************
	function MostrarCrono3 () {
  		//incrementa el crono
  		decimas3--
		if ( decimas3 < 0 ){
			decimas3 = 9
			segundos3--
			if ( segundos3 < 0 ){
				segundos3 = 59
				minutos3--
				if ( minutos3 < 0 ) {
				//alert("hd");
				//window.close();
					DetenerCrono3()
					//InicializarCrono3 ()
					
					return true
					} 
				}
		 	}
		 //configura la salida
		 var ValorCrono3 = ""
		 ValorCrono3 = (minutos3 < 10) ? "0" + minutos3 : minutos3
		 ValorCrono3 += (segundos3 < 10) ? ":0" + segundos3 : ":" + segundos3
  		 document.solicitud.display3.value = ValorCrono3
  		 CronoID3 = setTimeout("MostrarCrono3()", 100)
		 CronoEjecutandose3 = true
		 
		 return true
		 }	
//****************************************************************************
	function IniciarCrono3 () {
		/*DetenerCrono3 ()
		if (i3<=1){
		InicializarCrono3()
		i3=2;
		}
		MostrarCrono3 ()
		*/
		if(i3==1){
			i3=2;
			InicializarCrono3()
			}
		if(!CronoEjecutandose3){
			MostrarCrono3()
			CronoEjecutandose3 = false
			}
		else{
			DetenerCrono3()

			CronoEjecutandose3 = false
			}

		}
//********************************************************************
		// *****************************************
	function DetenerCrono4 (){
  		if(CronoEjecutandose3)
  		clearTimeout(CronoID3)
		}
//*******************************************
	function InicializarCrono4 () {
		//inicializa contadores globales
		decimas3 = 9
		segundos3 = 59
		minutos3 = 10
		CronoEjecutandose3 = false
		//pone a cero los marcadores
		document.solicitud.display3.value = '00:00'
		//document.crono.parcial4.value = '00'
		}

  

	////////////////////////////////////////////////////////////////
</script>
</head>

<?php 

//$hi=$_POST['hi'];
//$hf=$_POST['hf'];
//$mi=$_POST['mi'];
//$mf=$_POST['mf'];
//$pi=$_POST['pi'];
//$pf=$_POST['pf'];

 //   if($pi == "pm" && $hi!=12)
	//  $hi = $hi + 12;
//	if($pf == "pm" && $hf!=12)
	//  $hf = $hf + 12;
	//if( $hf == 12 & $pf == "am")
	  //$hf = 0;
	//if( $hi == 12 & $pi == "am")
	//{
	 // $hi = 0;
	 //}
	
	//$res = ($hf-$hi)*60 + ($mf - $mi);
	//if($res > 60) 
//	{
	//  $mres = $res%60; 
	  //$hres = ($res-$mres)/60;
	//}
	//else
	//{
	  //$res = abs($res);
	  //$mres = $res%60; 
	//  $hres = ($res-$mres)/60;
	//}
//?>

<body  onload="IniciarCrono3()">

<!-- -->

<div style="display block;" align="center">
	<form name="solicitud" action="planilladeasistencia.php" method="post"  onSubmit="return ValidaCampos(this) && Validar(this.fecha.value) && validacion()&& planilla_open(this.form) "  >
		<table border="1px" align="center" width="850px" style="border-collapse: collapse;border-color:black;">
			<tr>
			<td width="35">
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<img border="0" src="unex15.gif" 
		     width="70" height="70"></p></td>
			  <td class="act" colspan="2">
				
				
					Universidad Nacional Experimental Polit&eacute;cnica<BR>
					"Antonio Jos&eacute; de Sucre"<BR>

					Vicerrectorado Puerto Ordaz<BR>
					Unidad Regional de Desarrollo y Bienestar Estudiantil 
			  </td>
				
			</tr>
			<tr>
				<td class="enc_p" colspan="8">FORMULARIO CONTROL DE ASISTENCIAS <?php echo $lapsoProceso; ?> </td>

			</tr>
		</table>
		
		<table  align="center">
<td
		 onClick="aaa();"
		OnMouseOver='this.style.backgroundColor="#99CCFF";this.style.color="#000000";'
		OnMouseOut='this.style.backgroundColor="#FFFFFF"; this.style.color="#FF0033";' class="datospf"
		style="font-size: 11px; color:#FF0033; font-variant:small-caps; cursor:pointer;";> Haz clic aqu&iacute; para leer las Instrucciones </td>
</table>
	 <tr><td>
		<fieldset align="center" style="width:510px;">
		<legend class="enc_leg">Datos del Estudiante</legend>
		<table border="0px" align="center" width="830">
			<tr>
            	<td width="176" class="datosp">
				CEDULA:                </td>
               	<td width="252" class="datosp">  
		              	NOMBRE1:  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    NOMBRE2:              </td>
			    <td width="202" class="datosp">  
	              	ESPECIALIDAD:                </td>
				<td width="200" class="datosp">  
	              	LAPSO MENSUAL :                </td>
		 	</tr>
            <tr>
           	  <td width="176" class="datosp">
           	  <input type=text    disabled="disabled" name='cedula' size="10" id="ci_e" class="datospf" maxlength="10"  value="<?php echo $validar;?>"><input type="hidden" name="validar1" id="validar1" value="<?php echo $validar;?>"	>				  	        </td>
           	  <td width="252" class="datosp"><input disabled="disabled" type=text name='nombre2' size="15" class="datospf" maxlength="45" value="<?php echo $result[0][0]; ?>">    &nbsp; &nbsp;  &nbsp;          	   <input disabled="disabled" type=text name='nombre2' size="15" class="datospf" maxlength="45" value="<?php echo $result[0][7]; ?>">       	      </td><td style="font-family:Arial">
					<input type=text name='especialidad' size="20" class="datospf"  disabled="disabled" value="<?php echo $result1[0][0]; ?>">				</td>
			  <td  class="datosp" style=" font-size:12px;font-family:Arial">Del:
				  	
			<input type="text" name="fecha" disabled="disabled" size="10" value="<?php echo $result24[0][0]; ?>" class="datospf"><input type="hidden" name="fechaini" id="cero"  size="10" value="<?php echo $result24[0][0]; ?>" class="datospf">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ej: dd-mm-aaaa	 </td>	
            </tr>
			<tr>

				<td width="176" class="datosp">TELEFONO:                </td>
                 <td width="252" class="datosp">
	                APELLIDO1:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; APELLIDO2:                </td>
					 <td width="202" class="datosp">
	                   SEMESTRE:                 </td>
					 <td width="200" class="datosp">&nbsp;</td>
		  	</tr>
            <tr>
			  <td width="176" class="datosp">

              <input type=text name='tlf' size="12" class="datospf"  disabled="disabled" maxlength="12" value="<?php echo $result[0][9]; ?>"></td>
              <td width="252" class="datosp"> <input type=text name='nombre'  disabled="disabled" size="15" class="datospf" maxlength="45" value="<?php echo $result[0][1]; ?>"> &nbsp;  &nbsp;  &nbsp;  <input type=text name='nombre'  disabled="disabled" size="15" class="datospf" maxlength="45" value="<?php echo $result[0][8]; ?>"></td>
					<td width="202" class="datosp">
              <input type=text name='semestre' size="15" class="datospf" maxlength="10" disabled="disabled" value="<?php echo $result[0][2]; ?>">                 </td>
					<td width="200" class="datosp"  style=" font-size:12px;font-family:Arial">Al: &nbsp;<span class="datosp" style=" font-size:12px;font-family:Arial">
					  <input type="text" name="fecha1" disabled="disabled" size="10" value="<?php echo $result24[0][1]; ?>" class="datospf"><input  type="hidden" name="fechafin"  id="uno" size="10" value="<?php echo $result24[0][1]; ?>" class="datospf">
			  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ej: dd-mm-aaaa			  </td> 
		  	</tr>
			<tr>
				<td width="176" height="43" class="datosp">TIPO DE NOMINA:</td>

                <td width="252" class="datosp">
					TIPO DE CUENTA:				  </td>
			    <td width= "202" class="datosp"> Nro. CUENTA:</td>
	          <td width= "200" class="datosp"><input type="hidden" name="cedula1"  value="<?php echo $validar; ?>" > 
		      <input type="hidden" name="lapso1" id="lapso1"  value="<?php echo $lapsoProceso; ?>" > <input type="hidden" name="cod"  id="cod" value="<?php echo $nro; ?>" ><input type="hidden" name="monto"  value="<?php echo $monto_hora; ?>" ><input type="hidden" name="mes1"  id="mes1" value="<?php echo $mes; ?>" >
		      <input type="hidden" name="limitehora"  value="<?php echo $limite_hora; ?>" >  </td>
			</tr>
            <tr>

			  <td width="176" class="datosp" valign="top">
           	  <input type=text name='ema' size="30" class="datospf"  disabled="disabled" maxlength="50" value="<?php echo $result1[0][1]; ?>"></td>
							<td width="252" class="datosp">
			  <input type=text name='em' size="15"  disabled="disabled" class="datospf" maxlength="50" value="<?php echo $cuenta; ?>"></td>
					        <td width="202" class="datosp">
              <input type=text name='email' size="30" class="datospf" maxlength="30" disabled="disabled" value="<?php echo $result[0][3];?>">                 </td>
				
				<td width="200" class="datosp">  
					<input style="font-size: 10px"  type="hidden" disabled="disabled" id="boton" name="enviar2"  class="boton" value="Aplicar"   > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <input style="font-size: 12px"   type="hidden" class="boton" value="Guardar" onClick="planilla_open(this.form) &&  ValidaCampos(this)"><input style="font-size: 12px"   type="hidden" class="boton" value="Ver Planilla" onClick="ver_planilla()">			  </td>
		  <tr>
			  <td width="176" height="20" class="datosp">DEPENDENCIA:*</td>
			  <td width="252" height="20" class="datosp">SUPERVISOR:*</td>
			  <td width="202" height="20" class="datosp">CORREO:</td>
		  </tr>
			  <tr>
			  <td><input type=text name='dependencia' size="30" id="dependencia" class="datospf" maxlength="30" value="<?php echo $result2[0][0]; ?>"></td>
			  <td><input type=text name='supervisor' size="30" id="supervisor" class="datospf" maxlength="30"  value="<?php echo $result2[0][1]; ?>"></td>
			  <td><input  type=text name='email' size="35"  disabled="disabled" class="datospf" maxlength="50" value="<?php echo $result[0][10]; ?>"></td>
			  <td>&nbsp;</td>
			  </tr>
			<tr>
			  <td><input    type="hidden" name='tiponom' id="tipodenomina" size="30" class="datospf"   maxlength="50" value="<?php echo $result1[0][4]; ?>">
			  <input type="hidden" name="display3"></td>
			  <td><input    type="hidden" name='prueba' id="" size="30" class="datospf"   maxlength="50" value="1"></td>
			  <td><input type="hidden" name="hora" value="<?php echo $hora; ?> "><input    type="hidden"   name="hora_n"  id="n1"  size="5" maxlength="2" value="" class="boton"/><input    type="hidden"   name="min"  id="min"  >     
			  <input    type="hidden"   name="conta"  id="conta"   value="<?php echo $result3301[0][0];?>"  ></td>
			</tr>
		</table>
		<br>
		CONTROL DIARIO DE ASISTENCIA
		<br><br><br>
		<table width="800" class="re" >
		<tr>
		<td width="38">Nro:</td>
		<td width="391">Actividades Realizadas:</td>
		<td width="116">Dia:</td>
		<td width="113"> Entrada:</td>
		<td width="118"> Salida:</td>
		
		</tr>
		<?php
	$i = 0;
	while ($i  < $filas330) {
	if($result330[$i][15]==1) $p1="am";
if($result330[$i][15]==2) $p1="pm";
if($result330[$i][16]==1) $p2="am"; 
if($result330[$i][16]==2) $p2="pm";
$r=$i+1;
print <<<TABLA
	<tr>
		<td>{$r}</td>
		<td>{$result330[$i][0]}</td>
		<td >{$result330[$i][8]}</td>
		<td >{$result330[$i][9]}:{$result330[$i][13]}&nbsp;{$p1}</td>
		<td >{$result330[$i][10]}:{$result330[$i][14]}&nbsp;{$p2}</td>
		
		</tr>
		
		
	
TABLA;

	$i++;
	}		
?>
		</table>
		<table width="800" class="re" id="thetable" valign="top">
		<tr>
		<td width="391"></td>
		<td width="116"></td>
		<td width="113"> </td>
		<td width="118"> </td>
		<td width="38"></td>
		</tr> 
		
	<tr>
	<td colspan="5" align="center"><input name="button_enviar" type="button" class="boton"  onClick="InsertRow()" value="A&ntilde;adir Fila" />
	<input type="button" value="Borrar Fila" class="boton" onClick="removeRow()"/></td>
   </tr>
   <tr><td colspan="5"  align="right"><input  type="button" name="sumar" value="Sumar Horas" class="boton" size="10" onClick="sumarhoras();"></td>
	 </tr>
	</table> 
	 <table align="right"> 
	 <tr><td colspan="5"><font size="-7"  ><b>  NOTA: EL TIEMPO LABORADO DEBE SER EN HORARIO ADMINISTRATIVO (HORAS DE 60 MINNUTOS)</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Horas:<input    type="hidden"   name="totalhoras"  id="horas"  size="5" maxlength="2" value="" class="boton"/><input    type="text"  disabled="disabled" readonly="readonly" name="totalh"  id="n"  size="5" maxlength="2"                              value="<?php echo $sumahoras;?>" class="boton"/>:<input    type="text"  disabled="disabled" readonly="readonly" name="minutos"  id="minutos"            value="<?php echo $result3301[0][0];?>" size="5" maxlength="2" class="boton"/> 
	 <input  type="hidden" name="totalhoras1" id="horas11" value="" size="5" maxlength="2"    /> 
	 <input  type="hidden" name="tot" id="ejemplo" value="<?php echo $sumahoras;?>"  class="boton"/></td>
	 
	 </tr>
	 </table>
	 <table width="179" align="center">
	 <td width="171" class="datosp">  
					<input style="font-size: 10px"  type="hidden" disabled="disabled" id="boton" name="enviar2"  class="boton" value="Aplicar"   > 
		    <input style="font-size: 12px"  type="button" class="boton" value="Guardar" onClick="planilla_open(this.form) &&  ValidaCampos(this)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="font-size: 12px"  type="button" class="boton" value="Ver Planilla" onClick="ver_planilla()">			  </td>
	 </table>
	</table > 
	<?php
	if (false) {
?>
<script language="javascript">
	if (confirm("YA ha igualado el limite de horas reglamentario. Desea abrir la planilla de asistencia?")){
   
 
		lapso=document.getElementById("lapso1").value ;
		validar=document.getElementById("validar1").value;
		fechaini=document.getElementById("cero").value;
		fechafin=document.getElementById("uno").value
		mes=document.getElementById("mes1").value;
		codigo=document.getElementById("cod").value;
		window.open("planilla_asistencia_fin.php?campo2="+lapso+"&campo3="+validar+"&campo4="+fechaini+"&campo5="+fechafin+"&campo7="+mes+"&campo8="+codigo,"planillac","left=0,top=0,width=800,height=500,scrollbars=1,resizable=1,status=1");	
		
		 self.close();
	 
	}
	else
	{
	self.close();
	
  
  }
  
 

		
		</script>
		<?
		}
	?>
	
	<script language="javascript">

   function ver_planilla(){
 
		lapso=document.getElementById("lapso1").value ;
		validar=document.getElementById("validar1").value;
		fechaini=document.getElementById("cero").value;
		fechafin=document.getElementById("uno").value
		mes=document.getElementById("mes1").value;
		codigo=document.getElementById("cod").value;
		window.open("planilla_asistencia_fin.php?campo2="+lapso+"&campo3="+validar+"&campo4="+fechaini+"&campo5="+fechafin+"&campo7="+mes+"&campo8="+codigo,"planillac","left=0,top=0,width=800,height=500,scrollbars=1,resizable=1,status=1");	
		
		
  
  }
  
		</script>
		
		</fieldset>
		
  </form>
	</div>
</body>
</html>