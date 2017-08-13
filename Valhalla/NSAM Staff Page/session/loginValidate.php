<?php
   require 'db.php';
  if(isset($_POST['Login'])) {
    session_start();
    
    $user = $_POST['s_name'];
    $pass = $_POST['s_pass'];
    
    // $valid_date = date( 'Y/m/d', strtotime($pass));
	$query = "SELECT * FROM staff WHERE staff_id = '$user' AND pwd = '$pass'";
    $res = mysqli_query($connect, $query) or die(mysql_error());
    if(mysqli_num_rows($res) == 1) {

        while($row = mysqli_fetch_assoc($res))
        {
           $_SESSION['st_name'] = $row["name"];
        }
        $_SESSION['sname'] = $user;
        
        header('Location: dashboard.php?success=Login Successful'); 
    }
    else
         header('Location: login.php?invalid=Login Failed');

   }
?>