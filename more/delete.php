<?php 
if(isset($_GET['id'])){
    include "../config.php";
     function validate($data){
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
     }
 
     $id = validate($_GET['id']);
 
     $sql = "DELETE FROM books
             WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
          echo "<script>
          alert('Se Elimino Correctamente');
      </script>";
      header("location:../libros.php");
    }else {
        echo "<script>
        alert('Ocurrio un Error');
    </script>";
    }
 
 }else {
     header("Location: ../libros.php");
 }