<?php 
include './more/admin.php';
include 'config.php';

session_start();


error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Registrado.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Error')</script>";
			}
		} else {
			echo "<script>alert('Este email o usuario ya esta registrado')</script>";
		}
		
	} else {
		echo "<script>alert('Las Contraseñas no coinciden.')</script>";
	}
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
        padding:20px;
    }

    .cont{
        display:flex;
        flex-wrap: wrap;
    }

    input{
        width: 250px;
    display: block;
    margin: 20px 5px;
    padding: 15px 20px;
    outline: none;
    border: none;
    background-color: var(--input);
    border-radius: 5px;
    font-size: 12px;
    }

    button{
        width: 250px;
    display: block;
    margin: 20px 5px;
    padding: 15px 20px;
    outline: none;
    border: none;
    background-color:#ffaf38;
    border-radius: 5px;
    font-size: 12px;
    cursor:pointer;
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
          <a href="home.php" >
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
          <a href="#" class="active">
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
        <span class="dashboard">Administradores</span>
      </div>
    </nav>

   
  <div class="main">
  <main>

  <div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="cont">
            <div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
            </div>
		
		</form>
	</div>
    <?php if (mysqli_num_rows($result)) { ?>
    <table class="records">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
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
            <td><?php echo $rows['username']; ?></td>
			      <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['password']; ?></td>
            <td>
          
                  <a  href="more/delete-admin.php?id=<?=$rows['id']?>" class="button red" ><i class='bx bx-trash'></i></a>
              </td>
          
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
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

