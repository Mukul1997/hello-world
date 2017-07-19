<?php  
 require 'db.php';  
 $data = json_decode(file_get_contents("php://input"));  
 
  if(count($data) > 0)  
  {  
      $date = mysqli_real_escape_string($connect, $data->selectedDate);
      $section = mysqli_real_escape_string($connect, $data->sec_attend);
      $subject = mysqli_real_escape_string($connect, $data->sub_attend);
      $period = mysqli_real_escape_string($connect, $data->selectedPeriod);
      $sem = mysqli_real_escape_string($connect, $data->sem_attend);

      $stid = 'st001';   //get session id here
      $a=1;
      $usn='4nm15cs100';
      $query="INSERT INTO attendance(date_attend, period, status, Student_usn, staff_staff_id, section_sec_id, section_semester_sem_id, subject_list_sub_id) VALUES ('$date','$period','$a','$usn','$stid','$section','$sem','$subject')";  
     //$query="INSERT INTO sample(subject,staff,section,semester,course) VALUES('$subject','$staff','$section','$semester','$course')";  
            if(mysqli_query($connect, $query))  
            {  
              //echo ($query);   
                echo "Data Inserted...";  
            }  
            else  
            {  
                 echo "Error". mysqli_connect_error(); 
            } 


       
      }  
 ?> 