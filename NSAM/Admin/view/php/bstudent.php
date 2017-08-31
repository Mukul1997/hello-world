<?php 
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"mydb");

if(isset($_POST['importsub']))
{
    $file=$_FILES['file']['tmp_name'];
    $fp=fopen($file,"r");

    while(($data = fgetcsv($fp,1000,",")) !== false)
    {
        $usn= $data[0];
        $dob=$data[1];
        $name=$data[2];
		$mob=$data[3];
		$address=$data[4];
		$mail=$data[5];
		$sec=$data[6];
		$sem=$data[7];
		
		$father=$data[8];
		$mother=$data[9];
		$blood=$data[10];
		$sex=$data[11];
		$pmob=$data[12];
		$rel=$data[13];
		$nation=$data[14];
		$padd=$data[15];
		$cadd=$data[16];
		
        $dates=date('y-m-d', strtotime($dob));
		
       $sql="insert into student (usn, dob, name, mob, address, email, section_sec_id, section_semester_sem_id ) values ('$usn','$dates', '$name', '$mob', '$address', '$mail', '$sec', '$sem')";
       $sql1="insert into student_details (student_usn, father_name, mother_name, blood_group, sex, parent_mob, religion, nationality, permanent_address, comm_address) values ('$usn','$father','$mother','$blood','$sex','$pmob','$rel','$nation','$padd','$cadd')";
       $res1=mysqli_query($connect,$sql);
       $res2=mysqli_query($connect,$sql1);
    }

    echo ("Successful");
}
?>