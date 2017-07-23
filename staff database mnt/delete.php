 <?php  
 //delete.php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $id = $data->id;  
      $query = "DELETE FROM staff WHERE id='$id'";  
      if(mysqli_query($connect, $query))  
      {  
           echo 'Data Deleted';  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?>

  <!-- 
 $query = $dbh->prepare("INSERT INTO Customers (CustomerName,Address,City) 
VALUES (:nam, :add, :cit)");
$stmt->bindParam(':nam', $txtNam);
$stmt->bindParam(':add', $txtAdd);
$stmt->bindParam(':cit', $txtCit);
$stmt->execute();
-->