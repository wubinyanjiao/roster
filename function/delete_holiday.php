<?php
include "../config.php";
$id = $_POST['id'];
$q = mysqli_query($con, "delete from holidays where id = '$id'")or die("cannot delete");
echo "Successfully deleted";
?>