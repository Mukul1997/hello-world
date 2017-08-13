<?php
	require 'db.php';
	$output=array();
	$data=json_decode(file_get_contents("php://input"));
	if(count($data)>0){
		$sectionname=mysqli_real_escape_string($connect,$data->sectionname);
		$sem=mysqli_real_escape_string($connect,$data->sem);
		$button=mysqli_real_escape_string($connect,$data->button);
		$sname=strtoupper($sectionname);
		if($button=="ADD"){
			$querytest="SELECT * FROM section WHERE sec_name='$sname' AND semester_sem_id='$sem'";
			$resulttest=mysqli_query($connect,$querytest);
			if(mysqli_num_rows($resulttest)>0){
				echo "section already exists";
			}else{
				$queryid="SELECT MAX(id) AS maxid from section";
				$resultid=mysqli_query($connect,$queryid);
				if(mysqli_num_rows($resultid)>0){
					$row=mysqli_fetch_assoc($resultid);
					$newid=$row["maxid"]+1;

				}else{
					$newid=1;
				}

				$querysid="SELECT sec_id FROM section WHERE sec_name='$sname'";
				$resultsid=mysqli_query($connect,$querysid);
				if(mysqli_num_rows($resultsid)>0){
					$row=mysqli_fetch_assoc($resultsid);
					$secid=$row['sec_id'];
				}else{
					$querymaxsid="SELECT MAX(CAST(sec_id AS UNSIGNED)) as maxsid from section";
					$resultmaxsid=mysqli_query($connect,$querymaxsid);
					if(mysqli_num_rows($resultmaxsid)>0){
						$row=mysqli_fetch_assoc($resultmaxsid);
						$secid=$row["maxsid"]+1;
					}else{
						$secid="1";
					}
				}
				$querysection="INSERT INTO section(id,sec_id,sec_name,semester_sem_id) VALUES('$newid','$secid','$sname','$sem')";
				if(mysqli_query($connect,$querysection)){
					echo "Section inserted successfully!!!";
				}else{
					echo "Section could not be inserted";
				}
				
			}
		}
		if($button=="UPDATE"){
			$id=mysqli_real_escape_string($connect,$data->id);
			$queryusection="UPDATE section SET sec_name='$sname',semester_sem_id='$sem' WHERE id='$id'";
			if(mysqli_query($connect,$queryusection)){
			echo "Section updated successfully!!!";
			}else{
				echo "Section could not be updated";
			}
		}
	}
	
?>
