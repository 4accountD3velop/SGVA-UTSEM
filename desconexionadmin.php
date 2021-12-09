<?php

session_start();
if($_SESSION['idUsuario']){
	session_destroy();
	header("location:index.php");
}
else{
	header("location:index.php");
}


?>