<?php

include("conecta.php");/* Conexion  */ 

$link=mysql_connect($hostName, $userName, $password);

mysql_select_db ($base, $link);

?>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Modificando</title>

<meta http-equiv="refresh" content="7;URL=dashboard.php">

<style type="text/css">

<!--

.style1 {

	font-family: Arial, Helvetica, sans-serif;

	color: #3366FF;

}
body {
	background-color: #E6E7E8;
}

-->

</style>

</head>

<body>

<?php

$elusuario = $_POST ['usuario'];

if (!isset($elusuario) or $elusuario ==''){ 

echo "Accion Incorrecta 1";

echo "</html></body> \n"; 

exit; }



$ipe = $_POST ['ipe'];


$descripcion = $_POST ['descripcion'];
$descripcion = utf8_decode($descripcion);



$tiempo = date('Y-m-d H:i:s');
$target_path = "archivos/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{ 
echo "<span style='color:green;'>El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido</span><br>";
}else{
echo "Se ha mantenido archivo  '$imagen' 	<br>";
} 

$imagensubida = basename( $_FILES['uploadedfile']['name']);
$laimagen = $imagensubida;



 

?>   

<?php
//limpiar tabla
mysql_query("TRUNCATE TABLE tabla_carga");

//cargar de manera ordenada


mysql_query("LOAD DATA INFILE '/var/www/html/sgv/archivos/".$imagensubida."' INTO TABLE tabla_carga fields TERMINATED BY '|' ".
"(@col1,@col2,@col3,@col4,@col9,@col16,@col21) ".
"set ".
"rut=@col1,".
"dv=@col2,".
"fecha_proceso=@col3,".
"tramo=@col16,".
"nombre=@col21,".
"sin_uso_1=@col4,".
"fecha_vencimiento=@col9,".
"activo=1,".
"fecha_carga=(select now());");


$hoy=date('Y-m-d H:i:s');
$qqq = mysql_query("SELECT * FROM tabla_carga "); 
while ($filaq = mysql_fetch_row($qqq)){ 
$rut = "$filaq[2]";
$dv =  "$filaq[3]";
$nombre = "$filaq[4]";



} 




?> 



</body>

</html>