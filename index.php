<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: home.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Oops! Email o Password incorrecto.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Monfort</title>
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--Iconos-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="assents/styles.css">
</head>
<body>
    <header>
        <!--Menu-->
        <nav> 
            <ul>
                <center>
                <li><a href="" class="active">Inicio</a></li>
                <li><a href="">Nosotros</a></li>
                <li><a href="">Contacto</a></li>
                <li><button id="bdark" class="mode">Modo Oscuro</button></li>
            </center>
            </ul>
        </nav>
        <!--Contenedor de texto-->
       <div class="content">
        <div class="one">
           <div class="text">
            <h2>Biblioteca de <br> Monfort</h2>
            <p>Inicia sesión, administrador <br> de biblioteca.</p>
           </div>
      
        </div>
        <!--Formulario de Sesión-->
        <div class="to">
            <form action="" method="post">
                <input type="email" placeholder="Escribe tu email" value="<?php echo $email; ?>" name="email">
                <input type="password" placeholder="Contraseña" value="<?php echo $_POST['password']; ?>" name="password">
                <input type="submit" name="submit" value="Iniciar Sesión" class="iniciar">
            </form>
        </div>
       </div>
    </header>

    <script src="assents/mode.js"></script>
</body>
</html>