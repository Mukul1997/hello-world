 <?php  
 //delete.php  
 $connect = mysqli_connect("localhost", "root", "", "nsam_db");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $u_roll = $data->u_roll
      $query = "DELETE FROM tbl_user WHERE usn='$u_roll'";  
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