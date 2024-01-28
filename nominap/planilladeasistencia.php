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


	<title>ORTSI</title>
	<script type="text/javascript" src="asrequest.js"></script>
	
	

	<?php
	
	
	
	
	$hora = date("H:i:s");
     $h1=explode(':', $hora);
	 $hora_i0=$h1[0];
	 $hora_i1=$h1[1];
	 $hora_i2=$h1[2];

$hora1=$_POST['hora'];
$h2=explode(':', $hora1);
$hora_f0=$h2[0];
$hora_f1=$h2[1];
$hora_f2=$h2[2];
//echo "$hora<<$hora1<br>";
if($hora_i0==$hora_f0 && $hora_i1==$hora_f1)
{
$resta_seg=$hora_i2-$hora_f2;
$h=1;
}
if($hora_i0==$hora_f0 && $hora_i1==($hora_f1+1) && $h!=1)
{
$resta_seg=$hora_i2-$hora_f2;
if($resta_seg<0) {
$r_seg= abs($resta_seg);
$resta_seg= $r_seg;
}
}
//echo "h:$h<br>";
//echo "resta:$resta_seg";

	$mes=$_POST['mes1'];
	$validar1=$_POST['validar1'];
	$contador=$_POST['contador'];
	//print_r($_POST);
	//if($filas33<$contador){
	
	$ii=$_POST['i'];
$validar1=$_POST['validar1'];
$TLF=$_POST['tlf'];
$EMAIL=$_POST['email'];
$LAPSO1=$_POST['lapso1'];
$lapso=$_POST['lapso'];
$validar=$_POST['validar'];
$SUPERVISOR=$_POST['supervisor'];
$FECHA=$_POST['fechaini'];
$FECHA1=$_POST['fechafin'];
$DEPENDENCIA=$_POST['dependencia'];
$TOTALHORAS=$_POST['totalhoras1'];
$CEDULA=$_POST['cedula'];
$CEDULA1=$_POST['cedula1'];
$minutos=$_POST['minutos'];
$N=$_POST['contador'];
$COD=$_POST['cod'];
$mes=$_POST['mes1'];
$fechaini=$_POST['fechaini'];
$fechafin=$_POST['fechafin'];
$normal="0";
$monto=$_POST['monto'];
	require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
	$mSQL33  = "SELECT *  from ASISTENCIAS where CI_E='$validar1' and LAPSO='$lapsoProceso' and MES='$mes' ";
$conex->ExecSQL($mSQL33,__LINE__,true);
$result33 = $conex->result;
$filas33 = $conex->filas;

/*if ($result33[0][0]!=NULL){
$result=$result33[0][0];
for ($i=$result;$i<=$filas33;$i++){

//echo "i:$i<br>";
//echo $result33[$i][0];
if ($result33[$i][0]==$i) $nn=1;
}
//$resta= $filas33 - $N;
//if ($resta <0 )  $resta=0;
}*/


//echo "n:$N";
//echo "resta:$resta<br>";
//echo "fila:$filas33<br>";



//echo "nn=$nn";
//('$COD','$CEDULA1','$FECHA', '$FECHA1','$DEPENDENCIA','$SUPERVISOR','$TOTALHORAS','$LAPSO1','$ACT[$k]','$fechas[$k]','$hi[$k]','$hf[$k]','$mes','$mi[$k]','$mf[$k]',$pi[$k]','$pf[$k]

	?>
	
	
	
	
	<?php 
	$contador2=$_POST['contador2'];
	//print_r($_POST);
	//echo "inserta:$inserta <br>";
	//echo "resta:$resta<br>";
	//echo "n:$N<br>";
	//echo "filas:$filas33==numero:$contador2";
	//echo $filas33;
	//echo $contador2;
	if($filas33!=$contador2){
	
	$ii=$_POST['i'];
$validar1=$_POST['validar1'];
$TLF=$_POST['tlf'];
$EMAIL=$_POST['email'];
$LAPSO1=$_POST['lapso1'];
$lapso=$_POST['lapso'];
$validar=$_POST['validar'];
$SUPERVISOR=$_POST['supervisor'];
$FECHA=$_POST['fechaini'];
$FECHA1=$_POST['fechafin'];
$DEPENDENCIA=$_POST['dependencia'];
$TOTALHORAS=$_POST['totalhoras1'];
$CEDULA=$_POST['cedula'];
$CEDULA1=$_POST['cedula1'];
$minutos=$_POST['min'];
$N=$_POST['contador'];
$COD=$_POST['cod'];
$mes=$_POST['mes1'];
$fechaini=$_POST['fechaini'];
$fechafin=$_POST['fechafin'];
$normal="0";
$monto=$_POST['monto'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$montototal=$monto*$TOTALHORAS;

//echo $minutos;



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
	$mSQL30  = "INSERT  INTO ASISTENCIAS (CODIGO,CI_E,FECHA_LAP_INI,FECHA_LAP_FIN,DEPENDENCIA,NOM_SUPERVISOR,HORA_TOTAL,LAPSO,ACT_REALIZADA,FECHA,HORA_ENTR,HORA_SALIDA,MES,MIN_ENT,MIN_SAL,MIN_TOTAL,am_pm_1,am_pm_2,RETRASADOS,NRO )      VALUES  ('$COD','$CEDULA1','$FECHA', '$FECHA1','$DEPENDENCIA','$SUPERVISOR','$TOTALHORAS','$LAPSO1','$ACT[$k]','$fechas[$k]','$hi[$k]','$hf[$k]','$mes','$mi[$k]','$mf[$k]' ,'$minutos','$pi[$k]','$pf[$k]', '$normal', '$numero[$k]' ) " ;	
$conex->ExecSQL($mSQL30,__LINE__,true);
$result30 = $conex->result;
}


$mes=$_POST['mes1'];
	$CEDULA1=$_POST['cedula1'];
$totalh=$_POST['hora_n'];	
	require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL711  = "UPDATE ASISTENCIAS SET HORA_TOTAL='$totalh' where CI_E='$CEDULA1'  and MES='$mes' and LAPSO='$lapsoProceso' " ;
$conex->ExecSQL($mSQL711,__LINE__,true);
$result711 = $conex->result;

	
$mSQL7111  = "UPDATE ASISTENCIAS SET DEPENDENCIA='$DEPENDENCIA' , NOM_SUPERVISOR='$SUPERVISOR' where CI_E='$CEDULA1'  and MES='$mes' and LAPSO='$lapsoProceso' " ;
$conex->ExecSQL($mSQL7111,__LINE__,true);
$result7111 = $conex->result;

$mSQL71110  = "UPDATE ASISTENCIAS SET MIN_TOTAL='$minutos'  where CI_E='$CEDULA1'  and MES='$mes' and LAPSO='$lapsoProceso' " ;
$conex->ExecSQL($mSQL71110,__LINE__,true);
$result71110 = $conex->result;


	$CEDULA1=$_POST['cedula1'];
$tot=$_POST['tot'];
$limite_hora=$_POST['limitehora'];
//if($tot < $limite_hora)
//{//inicio while
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL20  = "select distinct HORA_TOTAL from ASISTENCIAS where CI_E='$CEDULA1' and LAPSO='$lapsoProceso' and MES='$mes'";
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
$tot=$_POST['tot'];

$CEDULA1=$_POST['cedula1'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL71  = "UPDATE ASISTENCIAS SET HORA_TOTAL='$sumahoras' where CI_E='$CEDULA1'  and MES='$mes' and LAPSO='$lapsoProceso' " ;
$conex->ExecSQL($mSQL71,__LINE__,true);
$result71 = $conex->result;
} //fin del if($filas33!=NULL){
?>


	
	
<?php
 //if ( isset($_POST[enviar2]) ){
$FECHA=$_POST['fechaini'];
$FECHA1=$_POST['fechafin'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL  = "select * from FECHA   ";
$conex->ExecSQL($mSQL,__LINE__,true);
$result24 = $conex->result;


$mes=$_POST['mes1'];
$validar1=$_POST['validar1'];
$TLF=$_POST['tlf'];
$EMAIL=$_POST['email'];
$LAPSO1=$lapsoProceso;
$lapso=$lapsoProceso;
$validar=$_POST['validar1'];
$SUPERVISOR=$_POST['supervisor'];
//$FECHA=$_GET['campo4'];
//$FECHA1=$_GET['campo5'];
$DEPENDENCIA=$_POST['dependencia'];
$TOTALHORAS=$_POST['totalhoras'];
$CEDULA=$_POST['cedula'];
$CEDULA1=$_POST['cedula1'];
$minutos=$_POST['minutos'];
$N=$_POST['contador'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");
$mSQL  = "select NOMBRES,APELLIDOS,SEMESTRE,NRO_CTA,C_UNI_CA,TIPO_CTA,TIPO,NOMBRES2,APELLIDOS2,TELEFONO1,CORREO1 from DACE002 a, AYU_CUENTA b,AYU_ESTUDIANTES d where a.CI_E='$validar1' and ";
$mSQL .= "b.CI_E='$validar1' and ";
//$mSQL .= "c.CI_E='$validar' and ";
$mSQL .= "d.CI_E='$validar1' and d.LAPSO='$lapsoProceso' ";
$conex->ExecSQL($mSQL,__LINE__,true);
$result = $conex->result;

//if (!empty($result[0][9])){
$a=$result[0][4];
$b= $result[0][5];
if($b==1) $cuenta="ahorro";
if($b==0) $cuenta="corriente";  
$mSQL = "SELECT CARRERA1,NOMBRE_AYU FROM TBLACA010 a,AYU_MONTO b WHERE a.C_UNI_CA='".$result[0][4]."' and b.TIPO_AYU='".$result[0][6]."'" ;
$conex->ExecSQL($mSQL,__LINE__,true);
$result1 = $conex->result;

//$mes=$_GET[campo7];
//$validar1=$_GET[campo3];
$TLF=$_POST['tlf'];
$EMAIL=$_POST['email'];
$LAPSO1=$_POST['lapso1'];
//$lapso=$_GET[campo2];
//$validar=$_GET[campo3];
$SUPERVISOR=$_POST['supervisor'];
//$FECHA=$_GET['campo4'];
//$FECHA1=$_GET['campo5'];
$DEPENDENCIA=$_POST['dependencia'];
$TOTALHORAS=$_POST['totalhoras'];
$CEDULA=$_POST['cedula'];
$CEDULA1=$_POST['cedula1'];
$minutos=$_POST['minutos'];
$N=$_POST['contador'];
require_once("inc/odbcss_c.php");
$conex = new ODBC_Conn("$basededatos","$usuariodb","$clavedb",TRUE,"$laBitacora");

	$mSQL3  = "SELECT ACT_REALIZADA,FECHA_LAP_INI,FECHA_LAP_FIN,DEPENDENCIA,NOM_SUPERVISOR,HORA_TOTAL,LAPSO,CI_E,FECHA,HORA_ENTR,HORA_SALIDA,MES,MIN_TOTAL,MIN_ENT,MIN_SAL,am_pm_1, am_pm_2  from ASISTENCIAS where CI_E='$validar1' and LAPSO='$lapsoProceso' and MES='$mes' order by FECHA asc ";
$conex->ExecSQL($mSQL3,__LINE__,true);
$result3 = $conex->result;
$filas = $conex->filas;
$contador=0;
 
while($result3[$contador][0]!=NULL)
{
$contador++;

}

$mSQL2  = "select DEPENDENCIA,NOM_SUPERVISOR from ASISTENCIAS where CI_E='$validar1'";
$conex->ExecSQL($mSQL2,__LINE__,true);
$result2 = $conex->result;
/*$mSQL20  = "select sum(HORA_TOTAL) from ASISTENCIAS where CI_E='$validar' and LAPSO='$lapsoProceso' and MES='$mes'";
$conex->ExecSQL($mSQL20,__LINE__,true);
$result20 = $conex->result;
*/


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
  background-color:white;
}


-->
</style>


<script language="javascript">
planillac.close();
</script>

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
     if(vacio(form.telf.value) || vacio(form.dependencia.value) ||  vacio(form.supervisor.value) || vacio(form.fecha1.value)  )  
       alert("complete todos los campos marcados con *."); 
	   else if(!email(form.email2.value, "-_"))  
       alert("Dirección de correo electrónico incorrecta.");    
     else    
       return(true); 
        
     return(false);  
	 
   }  
   </script>





 <script languaje="javaScript">
var numero = 1;    
var fila = 0;
var contador=0;   

function InsertRow() {
if (contador < 16)
{
numero = numero + 1;
fila = fila +1;
contador=contador+1;
var newRow = document.getElementById("thetable").insertRow(fila); // Insert the third row
var newCell1 = newRow.insertCell(0); // Insert the first cell
newCell1.innerHTML ='<tr><textarea name="act'+fila+'" cols="40" id="act'+fila+'" value"<?php echo $result3[0][7]; ?>"></textarea><input type="hidden" name="contador" value="'+contador+'">'; // First cell's innerHTML
var newCell2 = newRow.insertCell(1); // Insert the second cell
newCell2.innerHTML = '<input type="text" name="fechas'+fila+'" id="fechas'+fila+'" size="10" maxlength="10" style=" font-size:12px;font-family:Arial"> &nbsp;dd-mm-aaaa'; // Second cell's innerHTML
var newCell3 = newRow.insertCell(2); // Insert the second cell
newCell3.innerHTML = '&nbsp;<input type="text" name="hi'+fila+'" size="1" id="h1'+fila+'"/>:<input type="text" name="mi'+fila+'" size="1" id="m1'+fila+'"/><tr><select id="pi'+fila+'" class="datospf" ><option value="1">am</option><option value="2">pm</option></select></tr>'; // Second cell's innerHTML
var newCell4 = newRow.insertCell(3); // Insert the second cell
newCell4.innerHTML = '&nbsp;<input type="text" name="hf'+fila+'" size="1" id="h2'+fila+'"/>:<input type="text" name="mf'+fila+'" size="1" id="m2'+fila+'"/><tr><select id="pf'+fila+'" class="datospf" ><option value="1">am</option><option value="2">pm</option></select></tr>'; // Second cell's innerHTML
var newCell5 = newRow.insertCell(4); // Insert the second cell
newCell5.innerHTML = '<input type="text" name="numero" value="'+contador+'" size="1" maxlength="2" >'; // Second cell's innerHTML
}
}

function sumarhoras(){
var horas=0;
var minutos=0;
for(j=1;j<=fila;j++){
var hi =parseInt(document.getElementById("h1"+j).value);
var hf =parseInt(document.getElementById("h2"+j).value);
var mi =parseInt(document.getElementById("m1"+j).value);
var mf =parseInt(document.getElementById("m2"+j).value);
var pi =document.getElementById("pi"+j).value;
var pf =document.getElementById("pf"+j).value;

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
	
	
var	res = (hf-hi)*60 + mf - mi;

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
minutos=minutos+mres;
if(minutos == 60)
{
  horas++;
  minutos=0;
}
if(minutos > 60)
{
  horas=horas+minutos/60;
  minutos=minutos%60;
}	
}	
document.getElementById("horas").value=horas;
document.getElementById("minutos").value=minutos;


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
          }
     }	
</script>
<script type="text/javascript" src="js/funciones.js"></script>
</head>



<body >


<!-- -->

<div style="display block;" align="center">
	<form name="solicitud" action="" method="post" onSubmit="return ValidaCampos(this) && Validar(this.fecha.value)">
		<table border="0px" align="center" width="870px" style="border-collapse: collapse;border-color:black;">
			<tr>
			<td width="35">
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<img border="0" src="/img/logo_unexpo.png" width="90" height="70"></p></td>
			  <td class="act" colspan="2">
				
				
					Universidad Nacional Experimental Polit&eacute;cnica<BR>
					"Antonio Jos&eacute; de Sucre"<BR>

					Vicerrectorado Puerto Ordaz<BR>
					Unidad Regional de Desarrollo y Bienestar Estudiantil 
				</td>
				
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
			
				<td   align="center" colspan="8">PLANILLA CONTROL DE ASISTENCIAS </td>

			</tr>
			
		</table>
		
	  <tr><td>
		<fieldset align="center" style="width:580px;">
		<legend class="enc_leg"><font color="#000000">Datos del Estudiante</font></legend>
		<table border="0px" align="center" width="860">
			<tr>
            	<td width="170" class="datosp">
				<b>CEDULA: </b>               </td>
               	<td width="250" class="datosp">  
		             <b> 	NOMBRE1:  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     NOMBRE2: </b>              </td>
			    <td width="177" class="datosp">  
	             <b> 	ESPECIALIDAD:      </b>          </td>
				<td width="215" class="datosp">  
	             <b> 	LAPSO MENSUAl : </b>               </td>
		 	</tr>
            <tr>
           	  <td width="170" class="datosp"><font class="datosp">
           	  <?php echo $validar1;?>			</font>		  	        </td>
           	  <td width="250" class="datosp"><font class="datosp"><?php echo $result[0][0]; ?>    &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;        	   <?php echo $result[0][7]; ?></font>
       	      </td><td style="font-family:Arial"><font class="datosp">
					<?php echo $result1[0][0]; ?>	</font>			</td>
			  <td  class="datosp" style=" font-size:12px;font-family:Arial"><b>Desde:</b>
				  	
		<font class="datosp">	<?php echo $FECHA; ?></font>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	 </td>	
            </tr>
			<tr>

				<td width="170" class="datosp"><b>TELEFONO: </b>                </td>
                 <td width="250" class="datosp">
	               <b> APELLIDO1:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; APELLIDO2:   </b>             </td>
					 <td width="177" class="datosp">
	                  <b> SEMESTRE:   </b>              </td>
					 <td width="215" class="datosp">&nbsp;</td>
		  	</tr>
            <tr>
			  <td width="170" class="datosp">

             <font class="datosp"> <?php echo $result[0][9]; ?></font></td>
              <td width="250" class="datosp"> <font class="datosp"><?php echo $result[0][1]; ?> &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <?php echo $result[0][8]; ?></font></td>
					<td width="177" class="datosp"><font class="datosp">
              <?php echo $result[0][2]; ?>     </font>            </td>
					<td width="215" class="datosp"  style=" font-size:12px;font-family:Arial"><b>Hasta:</b> &nbsp;<span class="datosp" style=" font-size:12px;font-family:Arial">
				<font class="datosp">	  <?php echo $FECHA1; ?></font>
			  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 			  </td> 
		  	</tr>
			<tr>
				<td width="170" height="43" class="datosp"><b>TIPO DE NOMINA:</b></td>

                <td width="250" class="datosp">
					<b>TIPO DE CUENTA:		</b>		  </td>
			    <td width= "177" class="datosp"><b> Nro. CUENTA:</b></td>
		       <td width= "215" class="datosp"><input  type="hidden" name="cedula1"  value="<?php echo $validar; ?>" > 
		      <input type="hidden" name="lapso1"  value="<?php echo $lapsoProceso; ?>" > <input type="hidden" name="cod"  value="<?php echo $nro; ?>" ><input type="hidden" name="monto"  value="<?php echo $monto_hora; ?>" ><b>CORREO:</b></td>
		  	</tr>
            <tr>

				<td width="170" class="datosp" valign="top">
           	<font class="datosp">  <?php echo $result1[0][1]; ?>	</font>				</td>
							<td width="250" class="datosp">
			<font class="datosp">  <?php echo $cuenta; ?></font></td>
					        <td width="177" class="datosp">
           <font class="datosp">   <?php echo $result[0][3];?>     </font>            </td>
				
				<td width="215" class="datosp"><?php echo $result[0][10]; ?></td>
		  <tr>
			  <td width="170" height="20" class="datosp"><b>DEPENDENCIA:*</b></td>
			  <td width="250" height="20" class="datosp"><b>SUPERVISOR:*</b></td>
			  <td width="177" height="20" class="datosp">&nbsp;</td>
		  </tr>
			  <tr>
			  <td><font class="datosp"><?php echo $result3[0][3]; ?></font></td>
			  <td><font class="datosp"><?php echo $result3[0][4]; ?></font></td>
			  <td><input  type="hidden" name='va'  size="30" class="datospf"  value="<?php echo $va; ?>"></td>
			  
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td></td>
			  <td></td>
			  <td align="center"><a href='' onClick="window.print()"  class="datosp"><img src="imagenes/images.jpg" alt="Versión imprimible" width="27" height="26" style="vertical-align: middle;" border="0" />Imprimir Pagina</a></td>
			</tr>
		</table>
		<br>
		CONTROL DIARIO DE ASISTENCIA
		<br><br><br>
		<table  width="850" class="re" id="thetable" valign="top" border="0"  >
		<tr>
		<td width="37">Nro:</td>
		<td width="255">Actividades Realizadas:</td>
		<td width="40"> Dia:</td>
		<td width="96">Hora Entrada:</td>
		<td width="84">Hora Salida:</td>
		
		</tr>
<?  
	$i = 0;
	while ($i  < $filas) {
	if($result3[$i][15]==1) $p1="am";
if($result3[$i][15]==2) $p1="pm";
if($result3[$i][16]==1) $p2="am"; 
if($result3[$i][16]==2) $p2="pm";
$r=$i+1;
print <<<TABLA
	<tr>
		<td>{$r}</td>
		<td>{$result3[$i][0]}</td>
		<td >{$result3[$i][8]}</td>
		<td >{$result3[$i][9]}:{$result3[$i][13]}&nbsp;{$p1}</td>
		<td >{$result3[$i][10]}:{$result3[$i][14] }&nbsp;{$p2}</td>
		
	</tr>
TABLA;

	$i++;
	}		
?>
</table>
	<tr>
	  <td colspan="5" align="center">&nbsp;</td>
	</tr>
   <tr><td colspan="5" align="center"><input type="hidden" name="i" value="<?php echo $i;?>"></td>
   
	 </tr>
	 
	 <table align="right"> 
	 <tr><td colspan="5"><font size="-7"  ><b>  NOTA: EL TIEMPO LABORADO DEBE SER EN HORARIO ADMINISTRATIVO (HORAS DE 60 MINNUTOS)</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Horas:<?php echo $result3[0][5]; ?></td>
	 </tr>
	 </table>
	 

	</table > 
	
		</fieldset>
		
		<table border="0px" align="center" width="500px">
		<br><br><br><br><br>
	<tr>
	<td   class="datosp"  align="left"><a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>	
	<td   class="datosp" align="right" ><a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
	
	</tr>	
<tr>
	<td   class="datosp"  align="left"> Firma del Supervisor</td>
	<td   class="datosp"  align="right"> Firma del Estudiante</td>	
	</tr>
	</table>	
  </form>
	</div>
</body>
</html>


