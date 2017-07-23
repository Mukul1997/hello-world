<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $usn = mysqli_real_escape_string($connect, $data->u_roll);
      $date = mysqli_real_escape_string($connect, $data->u_dob);       
      $name = mysqli_real_escape_string($connect, $data->u_name);
      $mobile = mysqli_real_escape_string($connect, $data->u_mob);
      $address = mysqli_real_escape_string($connect, $data->u_add);
      $email = mysqli_real_escape_string($connect, $data->u_email);       
      $section = mysqli_real_escape_string($connect, $data->u_sec);
      $sem = mysqli_real_escape_string($connect, $data->u_sem);  
      $btn_name = $data->btnName;  
      if($btn_name == "ADD")  
      {  
           $query = "INSERT INTO student(usn, dob, name, mob, address, email, section, section_sec_id, section_semester_sem_id) VALUES ('$usn', '$date','$name','$mobile','$address', '$email', '$section', '$sem')";  
           if(mysqli_query($connect, $query))  
           {  
                echo "Data Inserted...";  
           }  
           else  
           {  
                echo 'Error';  
           }  
      }  
      if($btn_name == 'Update')  
      {  
           $id = $data->id;  
           $query = "UPDATE student SET usn = '$usn', dob = '$date', name = '$name', mob = '$mobile', address = '$address', email = '$email', section_sec_id = '$section', section_semester_sem_id = '$sem' WHERE id = '$id'";  
           if(mysqli_query($connect, $query))  
           {  
                echo 'Data Updated...';  
           }  
           else  
           {  
                echo 'Error';  
           }  
      }  
 }  
 ?> 