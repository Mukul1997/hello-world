<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $usn = mysqli_real_escape_string($connect, $data->u_roll);
      $pass = mysqli_real_escape_string($connect, $data->u_pass);       
      $name = mysqli_real_escape_string($connect, $data->u_name);
      $mobile = mysqli_real_escape_string($connect, $data->u_mob);
      $email = mysqli_real_escape_string($connect, $data->u_email);  
      $btn_name = $data->btnName;  
      if($btn_name == "ADD")  
      {  
           $query = "INSERT INTO staff(staff_id, pwd, st_name, st_mob, st_email) VALUES ('$usn', '$pass','$name','$mobile', '$email')";  
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
           $query = "UPDATE staff SET staff_id = '$usn', pwd = '$pass', st_name = '$name', st_mob = '$mobile', st_email = '$email' WHERE id = '$id'";  
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

 <!-- 
 $stmt = $dbh->prepare("INSERT INTO Customers (CustomerName,Address,City) 
VALUES (:nam, :add, :cit)");
$stmt->bindParam(':nam', $txtNam);
$stmt->bindParam(':add', $txtAdd);
$stmt->bindParam(':cit', $txtCit);
$stmt->execute();
-->