<?php

require 'db.php';
$output=array();

$query="SELECT DISTINCT `section_semester_sem_id` from `assign_subject` where `staff_staff_id` = 'st001'";
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_array($result)){
		$output[]=$row;
	}

	echo json_encode($output);
}

?>