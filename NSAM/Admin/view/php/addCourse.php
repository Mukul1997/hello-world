<?php
	require 'db.php';
	$output=array();
	$data=json_decode(file_get_contents("php://input"));
	if(count($data)>0){
		$coursename=mysqli_real_escape_string($connect,$data->coursename);
		$semnumber=mysqli_real_escape_string($connect,$data->semnumber);
		$button=mysqli_real_escape_string($connect,$data->button);
		$cname=strtoupper($coursename);
		if($button=="ADD"){
			$querytest="SELECT * FROM course WHERE c_name='$cname'";
			$resulttest=mysqli_query($connect,$querytest);
			if(mysqli_num_rows($resulttest)>0){
				echo "course already exists";
			}else{
				$queryid="SELECT MAX(id) AS maxid from course";
				$resultid=mysqli_query($connect,$queryid);
				if(mysqli_num_rows($resultid)>0){
					$row=mysqli_fetch_assoc($resultid);
					$newcid="c_".($row["maxid"]+1);
					$newid=$row["maxid"]+1;
				}else{
					$newcid="c_1";
				}
				$querycourse="INSERT INTO course(c_id,c_name,id) VALUES('$newcid','$cname','$newid')";
				mysqli_query($connect,$querycourse);
				for($i=1;$i<=$semnumber;$i++){
					//$semid=substr($newcid,2)."_".$i;
					$semid=$newid."_".$i;
					$querysem="INSERT INTO semester(sem_id,course_c_id) VALUES('$semid','$newcid')";
					$resultsem=mysqli_query($connect,$querysem);
				}
				echo "Course inserted successfully";
			}
		}
		if($button=="UPDATE"){
			$id=mysqli_real_escape_string($connect,$data->id);
			$cid=mysqli_real_escape_string($connect,$data->cid);
			$queryucourse="UPDATE course SET c_name='$cname' WHERE id='$id'";
			mysqli_query($connect,$queryucourse);
			// $querycid="SELECT c_id FROM course WHERE c_name='$cname'";
			// $resultcid=mysqli_query($connect,$querycid);
			// $row=mysqli_fetch_assoc($resultcid);
			// $cid=$row['c_id'];
			$querydel="DELETE FROM semester WHERE course_c_id='$cid'";
			mysqli_query($connect,$querydel);
			for($i=1;$i<=$semnumber;$i++){
				//$semid=substr($cid,2)."_".$i;
				$semid=$id."_".$i;
				$querysem="INSERT INTO semester(sem_id,course_c_id) VALUES('$semid','$cid')";
				$resultsem=mysqli_query($connect,$querysem);
			}
			echo "Course updated successfully!!";
		}
	}
	
?>
