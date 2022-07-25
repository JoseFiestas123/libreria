<?php 
include 'more/read.php';

session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Libros| Admin</title>
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="assents/homes.css">
    <!--Iconos-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <style>
    .main{
        padding-top:150px;
    }

    main{
        overflow-y:scroll;
        max-height:400px;
    }
   </style>
<body>
  <!--Menu Lateral-->
  <div class="sidebar">
    <div class="logo-details sidebar-button">
      <i class='bx bxl-gmail'></i>
      <span class="logo_name">onfortianos</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="home.php">
            <i class='bx bx-home-smile'></i>
            <span class="links_name">Inicio</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
            <i class='bx bx-book-alt'></i>
            <span class="links_name">Libros</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-run'></i>
            <span class="links_name">Prestados</span>
          </a>
        </li>
        <li>
          <a href="admins.php">
            <i class='bx bxs-user-check'></i>
            <span class="links_name">Administradores</span>
          </a>
        </li>
    
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Cerrar Sesión</span>
          </a>
        </li>
      </ul>
  </div>
    <!--Texto + NameUser-->
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Libros Registrados</span>
      </div>
    </nav>



  <!--Tabla-->
  <div class="main">
  <main>
  
  <button type="button" class="button blue mobile" id="cadastrarCliente">Nuevo Libro</button>
  <?php if (mysqli_num_rows($result)) { ?>
  <table class="records">
      <thead>
          <tr>
              <th>Id</th>
              <th>ISBN</th>
              <th>Titulo</th>
              <th>Autor</th>
              <th>Tema</th>
              <th>Carrera</th>
              <th>Acción</th>
          </tr>
      </thead>
      <tbody>
      <?php 
                   $i = 0;
                   while($rows = mysqli_fetch_assoc($result)){
                   $i++;
                 ?>
          <tr>
          <th scope="row"><?=$i?></th>
          <td><?php echo $rows['codigo']; ?></td>
                <td><?php echo $rows['title']; ?></td>
          <td><?php echo $rows['autor']; ?></td>
                <td><?php echo $rows['tema']; ?></td>
        <td><?php echo $rows['carrera']; ?></td>
              <td>
                  <a  href="more/edit.php?id=<?=$rows['id']?>" class="button blue" ><i class='bx bx-edit'></i></a>
                  <a  href="more/delete.php?id=<?=$rows['id']?>" class="button red" ><i class='bx bx-trash'></i></a>
              </td>
          </tr>
          <?php } ?>
      </tbody>
  </table>
  <?php } ?>
</div>
  <div class="modal" id="modal">
      <div class="modal-content">
          <header class="modal-header">
              <h2>Nuevo Libro</h2>
              <span class="modal-close" id="modalClose">&#10006;</span>
          </header>
          <form  action="more/enviar.php" method="post" class="modal-form">
              <input type="text" class="modal-field"  name="codigo" placeholder="ISBN" require>
              <input type="texy"  class="modal-field" placeholder="Titulo" name="title" require>
              <input type="text" class="modal-field" name="autor" placeholder="Autor" require>
              <select name="tema" class="modal-field" require>
                <option value="tema" selected disabled>Elije el tema</option>
                <option value="Novela">Novela</option>
                <option value="Revista">Revista</option>
                <option value="Wikihow">Wikihow</option>
                <option value="Otro">Otro</option>
                </select>
              <select name="carrera" id="lang" class="modal-field" require>
                <option value="carrera" selected disabled>Elije la Carrera</option>
                <option value="Medicina">Medicina</option>
                <option value="Sistemas">Sistemas</option>
                <option value="Mecanica">Mecanica</option>
                </select>
                <footer class="modal-footer">
            <input type="submit" class="button green" name="submit" value="Agregar">
          </footer>

          </form>
      </div>
  </div>
</main>
  </div>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bxl-gmail" ,"bxl-gmail");
}else
  sidebarBtn.classList.replace("bxl-gmail", "bxl-gmail");
}

'use strict'

const openModal = () => document.getElementById('modal')
    .classList.add('active')

const closeModal = () => document.getElementById('modal')
    .classList.remove('active')

document.getElementById('cadastrarCliente')
    .addEventListener('click', openModal)

document.getElementById('modalClose')
    .addEventListener('click', closeModal)
 </script>

</body>
</html>

