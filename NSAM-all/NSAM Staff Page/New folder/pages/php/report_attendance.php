<?php

require 'db.php';

$usn=array();
$dates=array();
$output=array();
$sta=array();
$data = json_decode(file_get_contents("php://input"));

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
	$queryusn="Select distinct Student_usn from attendance where date_attend BETWEEN '$date1' AND '$date2' AND staff_staff_id = '$staff' AND section_sec_id = '$section' AND section_semester_sem_id = '$sem' AND subject_list_sub_id = '$subject' group by Student_usn";
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
	foreach($usn as $x){
		$us=implode(',',$x);
		
		if($us){
				
				
				$query="Select status from attendance where date_attend BETWEEN '$date1' AND '$date2' AND staff_staff_id = '$staff' AND section_sec_id = '$section' AND section_semester_sem_id = '$sem' AND subject_list_sub_id = '$subject' AND Student_usn='$us' group by date_attend";
				$result=mysqli_query($connect,$query);
				if(mysqli_num_rows($result) > 0){
					$status=array();
					while($row=mysqli_fetch_assoc($result)){
						
						$status[]=$row;
					// $status[]=$row[1];
					}
					$sta[]=$status;
					
				}
		}
	}
	$output[]=$sta;
	// $output[]=$dates;
	// $output[]=$status;
	
	echo json_encode($output);
} 

?>