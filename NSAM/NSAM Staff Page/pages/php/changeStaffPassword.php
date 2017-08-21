<?php  
 
 require 'db.php';  
 session_start();
 $staffid=$_SESSION['sname'];
 $data = json_decode(file_get_contents("php://input"));  
 
  if(count($data) > 0)  
  {  
      
      $password = mysqli_real_escape_string($connect, $data->password);       
          
      
    $query="update 
            staff
            set 
            pwd='$password'
            where 
            staff_id='$staffid'
            "; 
     
           if(mysqli_query($connect, $query))  
           {  
                echo "Password Changed";  
           }  
           else  
           {  
                echo "Oops password couldn't be changed";  
           }  
       
  }  
 ?> 