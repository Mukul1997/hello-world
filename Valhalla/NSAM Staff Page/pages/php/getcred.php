<?php
  session_start();
  $output = array();
  $output[0] =  $_SESSION['sname'];
  $output[1] =  $_SESSION['sta_name'];
  echo json_encode($output);
?>