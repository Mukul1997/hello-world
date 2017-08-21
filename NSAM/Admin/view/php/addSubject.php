<?php
	require 'db.php';
	$output=array();
	$data=json_decode(file_get_contents("php://input"));
	if(count($data)>0){
		$cid=mysqli_real_escape_string($connect,$data->cid);
		$sem=mysqli_real_escape_string($connect,$data->sem);
		$subname=mysqli_real_escape_string($connect,$data->subname);
		$subid=mysqli_real_escape_string($connect,$data->subid);
		$subtype=mysqli_real_escape_string($connect,$data->subtype);
		$button=mysqli_real_escape_string($connect,$data->button);
		$subname=strtoupper($subname);
		$subid=strtoupper($subid);
		if($button=="ADD"){
			$querytest="SELECT * FROM subject_list WHERE sub_id='$subid' AND sub_name='$subname' AND sub_type='$subtype'";
			$resulttest=mysqli_query($connect,$querytest);
			if(mysqli_num_rows($resulttest)>0){
				echo "Subject already exists";
			}else{
				$queryid="SELECT MAX(id) AS maxid from subject_list";
				$resultid=mysqli_query($connect,$queryid);
				if(mysqli_num_rows($resultid)>0){
					$row=mysqli_fetch_assoc($resultid);
					$newid=$row["maxid"]+1;

				}else{
					$newid=1;
				}

				$querysl="INSERT INTO subject_list(id,sub_id,sub_name,sub_type) VALUES('$newid','$subid','$subname','$subtype')";
				mysqli_query($connect,$querysl);
				$queryss="INSERT INTO subject_sem(subject_list_sub_id,semester_sem_id,semester_course_c_id) VALUES('$subid','$sem','$cid')";
				if(mysqli_query($connect,$queryss)){
					echo "Subject inserted successfully!!!";
				}else{
					echo "Subject could not be inserted";
				}
				
			}
		}
		if($button=="UPDATE"){
			$id=mysqli_real_escape_string($connect,$data->id);
			$oldsubid=mysqli_real_escape_string($connect,$data->oldsubid);
			$querysl="UPDATE subject_list SET sub_id='$subid',sub_name='$subname',sub_type='$subtype' WHERE id='$id'";
			mysqli_query($connect,$querysl);
			$queryssdel="DELETE FROM subject_sem WHERE subject_list_sub_id='$oldsubid'";
			mysqli_query($connect,$queryssdel);
			$queryss="INSERT INTO subject_sem(subject_list_sub_id,semester_sem_id,semester_course_c_id) VALUES('$subid','$sem','$cid')";
			if(mysqli_query($connect,$queryss)){
				echo "Subject updated successfully!!!";
			}else{
				echo "Subject could not be updated";
			}
		}
	}
	
?>
