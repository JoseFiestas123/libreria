<?php 

error_reporting(0);
 $db=mysql_connect("localhost","root","");
 mysql_select_db("libreria",$db);

$id=$_GET['id'];
$sql="select * from books where id='".$id."'";
$resultado=mysql_query($sql);
while ($fila=mysql_fetch_assoc($resultado)) {
?>
  <head>
    <meta charset="UTF-8">
    <title>Bienvenido | Admin</title>
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="../assents/homes.css">
    <!--Iconos-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>
        body{
            background:#101010;
        }
        .bx-pointer{
            background:#4498ff;
            padding:10px;
            font-size:25px;
            margin-right:10px;
            border-radius:50px;
        }
     </style>
   </head>
   
        <div class="modal-content">
            <header class="modal-header">
                <h2><i class='bx bx-pointer'></i>Editar</h2>

            </header>
<form >
<input type="hidden" class="modal-field"  name="id" placeholder="ISBN" require value="<?php echo $fila['id'] ?>" >
                <input type="text" class="modal-field"  name="codigo" placeholder="ISBN" require  value="<?php echo $fila['codigo'] ?>" >
                <input type="texy"  class="modal-field" placeholder="Titulo" name="title" require value="<?php echo $fila['title'] ?>" >
                <input type="text" class="modal-field" name="autor" placeholder="Autor" require value="<?php echo $fila['autor'] ?>" >
                <select name="tema" class="modal-field" require >
                  <option value="<?php  echo $fila['tema'] ?>" selected><?php  echo $fila['tema'] ?></option>
                  <option value="novela">Novela</option>
                  <option value="revista">Revista</option>
                  <option value="wikihow">Wikihow</option>
                  <option value="wikihow">Otro</option>
                  </select>
                <select name="carrera" id="lang" class="modal-field" require>

                  <option value="<?php  echo $fila['carrera'] ?>" selected><?php  echo $fila['carrera'] ?></option>
                  <option value="Medicina">Medicina</option>
                  <option value="Sistemas">Sistemas</option>
                  <option value="Mecanica">Mecanica</option>
                  </select>
                  <footer class="modal-footer">
                  <input type="submit" class="button blue" name="submit" value="Actualizar">
            </footer>
  
            </form>
            <?php } ?>
</div>
</div>

<?php 
$idp=$_GET['id'];
$codigo=$_GET["codigo"];
$autor=$_GET["autor"];
$tema=$_GET["tema"];
$title=$_GET["title"];
$carrera=$_GET["carrera"];
if ($codigo!=null||$autor!=null||$tema!=null||$title!=null||$carrera!=null) {
    $sql2="update books set codigo='".$codigo."', autor='".$autor."', tema='".$tema."', title='".$title."', carrera='".$carrera."'  where id='".$idp."'";

    mysql_query($sql2);
    if ($codigo=1) {
        header("location:../libros.php");
    }
}
?>


