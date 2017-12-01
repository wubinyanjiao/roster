<?php
include "config.php";
include "function/monthname.php";
$month = $_POST['month'];
$year  = $_POST['year'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRO Roster for <?php echo getMonthName($month);?>,<?php echo $year;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<style>
	html,body{
		width:100%;
		font-size:10ppx;
	}
	</style>
  </head>
  <body style="background-color:white;" onload="window.print()">
  	
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo" style="background-color:white;text-align:center;top:2%;">
	                 <h3 style="font-size:14px">
					  <strong>OFFICE OF THE MEDICAL DIRECTOR,
					 DDU Hospital</strong></h3>
					 <h4 style="font-size:10px"> GOVT.OF NCT OF DELHI HARI NAGAR, NEW DELHI -110064</h4>
					 <p><span style="text-align:left">F/No.PS/MD/CRO/DDUH/2017/ </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:right;">Date:____   </span></p>
					 
	                  <h4 style="text-align:center;font-size:12px"><strong>CRO Roster for Month of <?php echo getMonthName($month);?>, <?php echo $year;?></strong></h4>
	              </div>
				  <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example" style="font-size:<?php echo $_POST['font_size'];?>px;font-weight:bolder">
						<thead>
							<tr>
							    <th>Date(Day)</th>
								<th>Evening</th>
								<th>Night</th>	
								<th>Night off</th>	
							</tr>
						</thead>
						<tbody>
						<?php
						$q = mysqli_query($con, "select distinct date from roster where month = '$month' and year = '$year' order by date");
						$count = mysqli_num_rows($q);
						if($count == 0)
						{
							echo "No Roster Found";
							die();
						}
						while($row = mysqli_fetch_array($q))
						{
							$date = $row['date'];
							$qw2 = mysqli_query($con, "select * from roster where date = '$date' and month = '$month' and year = '$year'");
						//$ce = mysqli_num_rows($qw);
							$row3 = mysqli_fetch_array($qw2); 
							$day3 = $row3['day'];
							$holiday3 = $row3['holiday'];
						?>
						<tr>
						<td><?php echo $date.'/'.$month ?>
						(<?php echo $day3;?>)<?php if($holiday3 != "No"){echo $holiday3;}?>
						</td> 
						<?php 
						$qw = mysqli_query($con, "select * from roster where date = '$date' and month = '$month' and year = '$year' and eorn = 'Evening'");
						$ce = mysqli_num_rows($qw);
							$row1 = mysqli_fetch_array($qw); 
							$userid = $row1['userid'];
							$day = $row1['day'];
							$eorn = $row1['eorn'];
							$holiday = $row1['holiday'];
							$qq = mysqli_query($con, "select * from doctor where id = '$userid'");
							$data = mysqli_fetch_array($qq);
							$name = $data['name'];
							$mobile = $data['mobile'];
							$depart = $data['department'];
						if($ce == 0)
						{
						?>
						<td></td>
						<?php
						}
						else
						{
						?>
						<td><?php echo $name;?>,<?php echo $mobile;?>(<?php echo $depart;?>)</td>
						<?php
						}
						$qw1 = mysqli_query($con, "select * from roster where date = '$date' and month = '$month' and year = '$year' and eorn = 'Night'");
						//$ce = mysqli_num_rows($qw);
							$row2 = mysqli_fetch_array($qw1); 
							$userid2 = $row2['userid'];
							$day2 = $row2['day'];
							$eorn2 = $row2['eorn'];
							$holiday2 = $row2['holiday'];
							$qq2 = mysqli_query($con, "select * from doctor where id = '$userid2'");
							$data2 = mysqli_fetch_array($qq2);
							$name2 = $data2['name'];
							$mobile2 = $data2['mobile'];
							$depart2 = $data2['department'];
						?>
						<td><?php echo $name2;?><?php echo $mobile2;?>,<?php echo $depart2;?></td>
						<?php
						if($date == 1)
						{
						$m = $month;
						$y = $year;
						if($m == 1)
						{
							$y = $y-1;
							$m = 12;
							$d = cal_days_in_month(CAL_GREGORIAN,$m,$y);
						}
						else
						{
							$m = $m-1;
							$d = cal_days_in_month(CAL_GREGORIAN,$m,$y);
						}
						$qw4 = mysqli_query($con, "select * from roster where date = '$d' and month = '$m' and year = '$y' and eorn = 'Night'");
						//$checknf = mysqli_num_rows($qw4);
							$row4 = mysqli_fetch_array($qw4); 
							$userid4 = $row4['userid'];
							$qq4 = mysqli_query($con, "select * from doctor where id = '$userid4'");
							$data4 = mysqli_fetch_array($qq4);
							$name4 = $data4['name'];
						?>
						<td><?php echo $name4;?></td>
						<?php
						}
						else
						{
					$d  = $date-1;
					$qw4 = mysqli_query($con, "select * from roster where date = '$d' and month = '$month' and year = '$year' and eorn = 'Night'");
						//$checknf = mysqli_num_rows($qw4);
							$row4 = mysqli_fetch_array($qw4); 
							$userid4 = $row4['userid'];
							$qq4 = mysqli_query($con, "select * from doctor where id = '$userid4'");
							$data4 = mysqli_fetch_array($qq4);
							$name4 = $data4['name'];
							?>
							<td><?php echo $name4;?></td>
						<?php
						}
						?>
						</tr>
						<?php
						}
						
						?>
						</tbody>
					</table>
					<div class="logo" style="background-color:white;">
				
					  <ul>
					   <li>The roster has been formed in alphabetical manner of the first name.</li>
					   <li>In case of exchange of duty, mutual exchange may be done and be informed to MS (A & E)</li>
                       </ul>
					
                  <p style="left:10%;position:absolute;">
                   Copy AMS (HOO)<br>-MS(A E)<br>Concerned officer <br>-Hod Casualty and Casualty notice board
                   </p>
                   <p style="right:10%;position:absolute;">
				   <?php echo $_POST['name'];?> 
				   <br><?php echo $_POST['desig'];?>
				   </p>
				  
	             
	           </div>
	        </div>
	     </div>
	     </div>
	    
	

	


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>