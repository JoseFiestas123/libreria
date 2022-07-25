<?php 
error_reporting(0);
$codigo=$_POST["codigo"];
$autor=$_POST["autor"];
$tema=$_POST["tema"];
$title=$_POST["title"];
$carrera=$_POST["carrera"];
if ($codigo=="1") {
   echo'<script>alert("Ingresa un Codigo...")</script>';
   }
else {
   $db=mysql_connect("localhost","root","");
   mysql_select_db("libreria",$db);
   $sql="INSERT INTO books
      (codigo,title,autor, tema, carrera)
      VALUES ('$codigo','$title','$autor','$tema' , '$carrera')
      ";
   mysql_query($sql,$db);
   mysql_close($db);
   echo "

   <script>
   alert('Creado con exito');
</script>
  <META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../libros.php'>

     ";
}
?>