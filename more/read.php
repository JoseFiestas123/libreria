<?php  

include "config.php";

$sql = "SELECT * FROM books ORDER BY id DESC";
$result = mysqli_query($conn, $sql);