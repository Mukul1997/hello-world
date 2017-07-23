<?php

require 'db.php';
$output=array();



$query="SELECT `usn`,  `name` FROM `student` WHERE `section_sec_id` = '2'";

$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		$output[]=$row;
		
	}
	
	echo json_encode($output);

	
}

?>