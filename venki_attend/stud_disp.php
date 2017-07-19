<?php

$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0)
{
	echo json_encode($array);
}
?>