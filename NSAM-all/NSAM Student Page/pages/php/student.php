<?php
  	require 'db.php';
  	session_start();
 	$output=array();
	$stud = $_SESSION['sname'];	
	$query = "SELECT * FROM student 
			  INNER JOIN student_details 
			  ON student.usn=student_Details.student_usn
			  INNER JOIN semester
			  ON student.section_semester_sem_id=semester.sem_id
			  INNER JOIN course
			  ON semester.course_c_id=course.c_id 
			  where usn='$stud'";

	// $query = "SELECT * FROM student INNER JOIN student_details ON student.usn=student_Details.student_usn where usn='$stud'";
	$result=mysqli_query($connect,$query);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			$output[]=$row;
		}
		echo json_encode($output);
	}	
?>
