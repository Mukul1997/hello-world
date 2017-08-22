<?php
  	require 'db.php';
  	session_start();
  	$subject=array();
  	$totalClass=array();
  	$attendClass=array();
 	$output=array();
	$stud = $_SESSION['sname'];

	$sub_query="SELECT DISTINCT sub_name FROM attendance
	      	    INNER JOIN subject_list
	      	    ON attendance.subject_list_sub_id=subject_list.sub_id
	      	    WHERE Student_usn='$stud'";
	
	$total_query="SELECT COUNT(*) AS total FROM attendance
	      	    WHERE Student_usn='$stud'";
	
	$attend_query="SELECT COUNT(*) AS atten FROM attendance
	      	    WHERE Student_usn='$stud'
	      	    AND status='1'";	
	
	$res1=mysqli_query($connect,$sub_query);
	$res2=mysqli_query($connect,$total_query);
	$res3=mysqli_query($connect,$attend_query);
	
	if(mysqli_num_rows($res1)>0){
		while($row=mysqli_fetch_array($res1)){
			$subject[]=$row;
		}
		//echo json_encode($output);
	}

	if(mysqli_num_rows($res2)>0){
		while($row=mysqli_fetch_array($res2)){
			$totalClass[]=$row;
		}
		//echo json_encode($output);
	}

	if(mysqli_num_rows($res3)>0){
		while($row=mysqli_fetch_array($res3)){
			$attendClass[]=$row;
		}
		//echo json_encode($output);
	}

	$output[]=$subject;
	$output[]=$totalClass;
	$output[]=$attendClass;

	echo json_encode($output);	
?>
