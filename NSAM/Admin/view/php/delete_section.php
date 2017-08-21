<?php
	require 'db.php';
	$output=array();
	$data=json_decode(file_get_contents("php://input"));
	if(count($data)>0){
		$id=mysqli_real_escape_string($connect,$data->id);
		$query="DELETE FROM section WHERE id='$id'";
		if(mysqli_query($connect,$query)){
			echo "Section deleted successfully!!!";
		}else{
			echo "Section could not be deleted";
		}
	}
	
?>
