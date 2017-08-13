<?php 
	require 'db.php';
	session_start();
	unset($_SESSION['sname']);
         header('Location: ../login.php?logout=Successfully Logged Out');
         mysqli_close($connect);
 ?>