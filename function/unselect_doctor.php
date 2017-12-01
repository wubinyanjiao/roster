<?php
include "../config.php";
$year = $_POST['year'];
$month = $_POST['month'];
$userid = $_POST['userid'];
$eorn = $_POST['eorn'];
$q = mysqli_query($con, "delete from roster where year = '$year' and month = '$month' and userid = '$userid' and eorn = '$eorn'");
echo "Successfully deleted";
?>