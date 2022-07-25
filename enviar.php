<?php 
include 'config.php';
$codigo = $_POST['codigo'];
$autor = $_POST['autor'];
$tema = $_POST['tema'];
$carrera = $_POST['carrera'];

$db=mysql_connect("localhost","root","");
mysql_select_db("libreria",$db);
$sql="INSERT INTO books
   (codigo,autor, tema, tema)
   VALUES ('$codigo' ,'$autor','$tema' , '$tema')
   ";
mysql_query($sql,$db);
mysql_close($db);

?>