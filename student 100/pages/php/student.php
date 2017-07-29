<?php
  require 'db.php';
  session_start();
 $output=array();
 $output1=array();
 $output2=array();
 //$data = json_decode(file_get_contents("php://input"));
 if(count($data) > 0){
	$studid = $_SESSION['sname'];
	
	$query1 = "SELECT * student where usn = '$studid'";
	$query2 = "SELECT * student_details where student_usn = '$studid'";
	$result1=mysqli_query($connect,$query1);
	$result2=mysqli_query($connect,$query2);

	if(mysqli_num_rows($result1) > 0){
		while($row=mysqli_fetch_array($result1)){
			$output1[]=$row;
		}

		//echo json_encode($output);
	}
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_array($result)){
			$output2[]=$row;
		}

		//echo json_encode($output);
	}
	$output[0] = $output1;
	$output[1] = $output2;
	echo json_encode($output);
 }	
?>