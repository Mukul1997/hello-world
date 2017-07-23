<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "nsam_db");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $usn = mysqli_real_escape_string($connect, $data->u_roll);       
      $name = mysqli_real_escape_string($connect, $data->u_name);
      $email = mysqli_real_escape_string($connect, $data->u_email);       
      $course = mysqli_real_escape_string($connect, $data->u_course);  
      $btn_name = $data->btnName;  
      if($btn_name == "ADD")  
      {  
           $query = "INSERT INTO tbl_user(usn, name, email, course) VALUES ('$usn', '$name', '$email', '$course')";  
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
           $query = "UPDATE tbl_user SET usn = '$usn', name = '$name', email = '$email', course = '$course' WHERE id = '$id'";  
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