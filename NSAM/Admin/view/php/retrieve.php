 <?php  
 //select.php  
 $connect = mysqli_connect("localhost", "root", "", "myserver");  
 $output = array();  
 $query = "SELECT * FROM student";  
 $result = mysqli_query($connect, $query);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>