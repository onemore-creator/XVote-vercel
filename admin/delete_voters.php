<?php
include('../database/dbcon.php');
$voters_id=$_GET['voters_id'];
mysql_query("delete from voters where voters_id='$voters_id'") or die(mysql_error());
header('location:voters.php');
?>