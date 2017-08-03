<?php
	require 'db.php';
	$output=array();
	$query="SELECT
			SL.id,
			SL.sub_id,
			SL.sub_name,
			SL.sub_type,
			SS.semester_sem_id,
			SS.semester_course_c_id
			FROM 
			subject_list AS SL,
			subject_sem AS SS 
			WHERE 
			SL.sub_id=SS.subject_list_sub_id";
	$result=mysqli_query($connect,$query);

	$querycourse="select * from course";
	$resultcourse=mysqli_query($connect,$querycourse);
	$coursen=array();
	$coursei=array();
	while($rowc=mysqli_fetch_array($resultcourse)){
		$coursen[]=$rowc['c_name'];
		$coursei[]=$rowc['c_id'];
	}
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
        	for($i=0;$i<count($coursei);$i++){
        		if($row['semester_course_c_id']==$coursei[$i]){
        			$row['cname']=$coursen[$i];
        		}
        	}
        	if($row['sub_type']=='0'){
        		$row['sub_type_name']="Theory";
        	}else if($row['sub_type']=='1'){
        		$row['sub_type_name']="Lab";
        	}else if($row['sub_type']=='2'){
        		$row['sub_type_name']="Elective";
        	}
            $output[]=$row;
        }
        echo json_encode($output);
    }
?>
