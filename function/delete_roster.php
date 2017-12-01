<?php
include "../config.php";
if(isset($_POST['deleteroster']))
{
$month = $_POST['month'];
$year = $_POST['year'];
$delroster = mysqli_query($con, "delete from roster where month = '$month' and year = '$year'");
$delholiday = mysqli_query($con, "delete from holidays where month = '$month' and year = '$year'");

echo "<script>alert('Successfully Deleted')</script>";
echo "<script>window.location = '/viewRoster.php';</script>";
}
?>