<?php 
	require 'db.php';
	$output=array();



	$query="SELECT `date`,  `period`,  `status`,  `Student_usn`,  `staff_staff_id`,  `section_sec_id`,  `section_semester_sem_id`,  `subject_list_sub_id` FROM `attendance` ";

	$result=mysqli_query($connect,$query);

	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			$output[]=$row;
		}
		
		echo json_encode($output);

		
	}


 ?>
