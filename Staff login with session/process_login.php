<?php 
	session_start();
	include("db.php");
	$uname = $_POST['uname'];
	$pass=$_POST['pass'];
	$check_login=mysql_query("select * from abc where uname='$uname' and pass='$pass'");
	$check_login_count=mysql_num_rows($check_login);
	if ($check_login_count==1) {
		while ($row=mysql_fetch_array($check_login)) {
			
		
			$uname=$row['admin_id'];
			$_SESSION['uname']=$uname;
		}
		header("Location:index.php");
	}
	
else
{
	$err_msg = 'Invalid Credentials';
	header("Location:login.php?err_msg=".$err_msg);
}


 ?>