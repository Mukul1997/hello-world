<?php 
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"mydb");

if(isset($_POST['importsub1']))
{
    $file=$_FILES['file']['tmp_name'];
    $fp=fopen($file,"r");

    while(($data = fgetcsv($fp,1000,",")) !== false)
    {
        $stid= $data[0];
        $pass=$data[1];
        $name=$data[2];
		$mob=$data[3];
		$mail=$data[4];
		$doj=$data[5];
        $dates=date('y-m-d', strtotime($doj));
		
       $sql="insert into staff (staff_id, pwd, st_name, st_mob, st_email, st_join_date ) values ('$stid','$pass', '$name', '$mob', '$mail', '$dates')";
       $res1=mysqli_query($connect,$sql);
       
    }
    echo("successful");
}
?>

