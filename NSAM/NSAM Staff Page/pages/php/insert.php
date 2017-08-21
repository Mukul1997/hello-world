<?php  
 
  require 'db.php';  
  session_start();
  $staff=$_SESSION['sname'];
  $data = json_decode(file_get_contents("php://input"));  
 
  if(count($data) > 0)  
  {  
      $course = mysqli_real_escape_string($connect, $data->cour);
      $semester = mysqli_real_escape_string($connect, $data->sem);       
      $section = mysqli_real_escape_string($connect, $data->sec);
      $subject = mysqli_real_escape_string($connect, $data->sub);
           
     $query="INSERT INTO assign_subject(sub_id,staff_staff_id,section_sec_id,section_semester_sem_id,course_c_id) VALUES('$subject','$staff','$section','$semester','$course')";  
     
           if(mysqli_query($connect, $query))  
           {  
                echo "Data Inserted...";  
           }  
           else  
           {  
                echo "Error";  
           }  
       
      }  
 ?> 