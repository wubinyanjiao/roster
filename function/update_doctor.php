<?php
include "../config.php";
$name = $_POST['name'];
$desig= $_POST['desig'];
$depart = $_POST['depart'];
$senior = $_POST['senior'];
$mobile = $_POST['mobile'];
$id = $_POST['id'];

$q = mysqli_query($con, "update doctor set name = '$name', designation = '$desig', department = '$depart', mobile = '$mobile', senior = '$senior' where id = '$id' "); 


