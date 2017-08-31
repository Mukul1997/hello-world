<?php
  	require 'db.php';
  	$output=array();

	$query="SELECT COUNT(*) AS total FROM staff";
	
	$res=mysqli_query($connect,$query);

	if(mysqli_num_rows($res)>0){
		while($row=mysqli_fetch_array($res)){
			$output[]=$row;
		}
		//echo json_encode($output);
	}
	echo json_encode($output);	
?>
