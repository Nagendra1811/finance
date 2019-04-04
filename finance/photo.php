<?php

  $id = $_GET['id'];
  $p = $_GET['p'];
  // do some validation here to ensure id is safe
  include("sqlconnect.php");
  
  $sql = "SELECT $p FROM customer WHERE customerid=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_array($result);
  
  header("Content-type: image/jpeg");
  echo $row[0];
?>