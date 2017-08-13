<?php
   require 'conn.php';
  if(isset($_POST['login'])) {    
    session_start();
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    $_SESSION['name'] = $name;
    
	$query = "SELECT * FROM admin WHERE name = '$name' AND pass = md5('$pass')";
    $res = mysqli_query($connect, $query) or die(mysql_error());
    if(mysqli_num_rows($res) == 1) {      
        header('Location: dashboard.php?success=Login Successful'); 
    }
    else
         header('Location: index.php?invalid=Login Failed');
   }
?>