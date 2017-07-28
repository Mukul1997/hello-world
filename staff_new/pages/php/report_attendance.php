<?php

require 'db.php';

$usn=array();
$dates=array();
$output=array();
$data = json_decode(file_get_contents("php://input"));
$status=array();
if(count($data) > 0)
{
	$date1 = mysqli_real_escape_string($connect, $data->selectedFromDate);
	$date2 = mysqli_real_escape_string($connect, $data->selectedToDate);
	$section = mysqli_real_escape_string($connect, $data->sec_attend);
	$sem = mysqli_real_escape_string($connect, $data->sem_attend);
	$staff = mysqli_real_escape_string($connect, $data->staffid);
	$subject = mysqli_real_escape_string($connect, $data->sub_attend);
    
	//$valid_date = date( 'Y/m/d', strtotime($date));
    //$date = strtotime("+1 day", strtotime("2007-02-28"));
    //echo date("Y-m-d", $date);
    //echo($subject);
    // echo("\n");
    // echo($valid_date);

    //$query="SELECT date_attend, status, student FROM attendance WHERE staff_staff_id = '$staff' AND date_attend = '$date' AND section_sec_id = '$section' AND section_semester_sem_id = '$sem' AND subject_list_sub_id = '$subject'";

    // $query_date="SELECT unique date_attend FROM attendance WHERE date_attend BETWEEN '$date1' AND '$date2' AND staff_staff_id = '$staff' AND section_sec_id = '$section' AND section_semester_sem_id = '$sem' AND subject_list_sub_id = '$subject' GROUP BY Student_usn";
    $querydate="Select distinct date_attend from attendance where date_attend BETWEEN '$date1' AND '$date2' AND staff_staff_id = '$staff' AND section_sec_id = '$section' AND section_semester_sem_id = '$sem' AND subject_list_sub_id = '$subject'";
	$resultdate=mysqli_query($connect,$querydate);
	$queryusn="Select distinct Student_usn,status from attendance where date_attend BETWEEN '$date1' AND '$date2' AND staff_staff_id = '$staff' AND section_sec_id = '$section' AND section_semester_sem_id = '$sem' AND subject_list_sub_id = '$subject'";
	$resultusn=mysqli_query($connect,$queryusn);
	// echo $result_date;
	// $query_usn="SELECT distinct Student_usn FROM attendance WHERE date_attend BETWEEN '$date1' AND '$date2' AND staff_staff_id = '$staff' AND section_sec_id = '$section' AND section_semester_sem_id = '$sem' AND subject_list_sub_id = '$subject' GROUP BY Student_usn";
    
	if(mysqli_num_rows($resultusn) > 0){
		while($row=mysqli_fetch_assoc($resultusn)){
			$usn[]=$row;
			// $status[]=$row[1];
		}
		
	}
	if(mysqli_num_rows($resultdate) > 0){
		while($row=mysqli_fetch_assoc($resultdate)){
			$dates[]=$row;
		}
			
	}
	$output[]=$usn;
	$output[]=$dates;
	// $output[]=$status;
	echo json_encode($output);
} 

?>