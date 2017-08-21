<?php 
	require 'conn.php';
	session_start();
	unset($_SESSION['name']);
         header('Location: ../index.php?logout=Successfully Logged Out');
         mysqli_close($connect);
 ?>