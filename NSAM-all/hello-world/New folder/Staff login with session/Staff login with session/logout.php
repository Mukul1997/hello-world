<?php 
	session_start();
	unset($_SESSION['sname']);
         header('Location: index.php?logout=Successfully logged out');
         mysqli_close($con);
 ?>