<?php
include "../config.php";
$year = $_POST['year'];
$month = $_POST['month'];
$userid = $_POST['userid'];
$eorn = $_POST['eorn'];
$j=1;
$no_of_days =cal_days_in_month(CAL_GREGORIAN,$month,$year);
if($eorn == "Evening")
{
while($j <= $no_of_days)
{
	$date = $j;
    $day = date('D', strtotime($year.'-'.$month.'-'.$j));
	$hname = "No";
	$hdate = '0000';
	$hd = mysqli_query($con, "select * from holidays where date = '$date' and month = '$month' and year = '$year'");
	$chd = mysqli_num_rows($hd);
	if($chd != 0)
	{
	$hdr = mysqli_fetch_array($hd);
	$hname = $hdr['holiday'];
	$hdate = $hdr['date'];
	}
	if($day == 'Sat' || $day == 'Sun' || $date == $hdate)
	     {
		$ch = mysqli_query($con, "select * from roster where date = '$date' and eorn = 'Evening'");
	    $check = mysqli_num_rows($ch);
	    if($check == 0)
	      {
			  $ch2  = mysqli_query($con, "select * from roster where userid = '$userid' and month = '$month' and year = '$year'");
			  $check2 = mysqli_num_rows($ch2);
			  if($check2 == 0)
			  {
		$q = mysqli_query($con, "insert into roster (userid,month,year,date,day,eorn,holiday) values('$userid', '$month', '$year', '$date', '$day', '$eorn', '$hname')");
		
		if($hname == "No")
		{
			$hname = "";
		}
		else
		{
			$hname = ", $hname";
		}
    echo "$date/$month/$year," .$day.$hname;
	break;
	      }
		  }
	      }
	$j++;
}
}
else
{
while($j <= $no_of_days)
{
	$date = $j;
    $day = date('D', strtotime($year.'-'.$month.'-'.$j));
	$ch3 = mysqli_query($con, "select * from roster where date = '$date' and month = '$month' and year = '$year' and eorn = 'Night'");
	    $check3 = mysqli_num_rows($ch3);
	    if($check3 == 0)
	      {
			$ch4  = mysqli_query($con, "select * from roster where userid = '$userid' and month = '$month'");
			  $check4 = mysqli_num_rows($ch4);
			  if($check4 == 0)
			  {
	$q = mysqli_query($con, "insert into roster (userid,month,year,date,day,eorn,holiday) values('$userid', '$month', '$year', '$date', '$day', '$eorn', 'No')");
   echo "$date/$month/$year, $day";
         break;
		  }
		  }
$j++;
}
}
?>