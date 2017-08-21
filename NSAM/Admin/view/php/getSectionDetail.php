<?php
	require 'db.php';
	$output=array();
		
		$query="SELECT
				SC.sec_name,
				SC.semester_sem_id,
				SC.id,
				SE.course_c_id
				FROM 
				semester AS SE,
				section AS SC 
				WHERE 
				SC.semester_sem_id=SE.sem_id";
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
            		if($row['course_c_id']==$coursei[$i]){
            			$row['cname']=$coursen[$i];
            		}
            	}
                $output[]=$row;
            }
            echo json_encode($output);
        }
	
	
?>
