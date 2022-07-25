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
    <title>Bienvenido | Admin</title>
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="assents/homes.css">
    <!--Iconos-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
    .main{
        padding-top:150px;
    }

    main{
        overflow-y:scroll;
        max-height:400px;
    }
   </style>
   </head>
<body>
  <!--Menu Lateral-->
  <div class="sidebar">
    <div class="logo-details sidebar-button">
      <i class='bx bxl-gmail'></i>
      <span class="logo_name">onfortianos</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-home-smile'></i>
            <span class="links_name">Inicio</span>
          </a>
        </li>
        <li>
          <a href="libros.php">
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
        <span class="dashboard">Bienvenido <?php echo $_SESSION['username']?> <!--Nombre con Php--></span>
      </div>
    </nav>

<!--Tarjetas de Datos de la web-->
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Libros Registrados</div>
            <div class="number">408</div>
          </div>
          <i class='bx bx-library icons'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Libros Prestados</div>
            <div class="number">38</div>
           
          </div>
          <i class='bx bx-book-reader icons'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Administradores</div>
            <div class="number">12</div>
    
          </div>
          <i class='bx bxs-user-check icons'></i>
        </div>
      </div>
  <!--Tabla-->
  <main>
  <h2>Libros Registrados</h2>
   
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
          
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</div>
    
</main>

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

