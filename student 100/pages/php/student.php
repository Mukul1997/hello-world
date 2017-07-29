<?php
  	require 'db.php';
  	session_start();
 	$output=array();
	$stud = $_SESSION['sname'];	
	$query = "SELECT * FROM student WHERE usn = '$stud'";
	$result=mysqli_query($connect,$query);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			$output[]=$row;
		}
		echo json_encode($output);
	}	
?>