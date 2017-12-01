<?php include "theme/header.php";
include "function/monthname.php";
?>
<div class="panel-heading" style="text-align:center">
						<?php 
						if(isset($_POST['submit']))
							{
					       ?>
						   <h1>View CRO Roster for <?php echo getMonthName($_POST['month']);?>, <?php echo $_POST['year'];?></h1>
						   <?php
							}
							else
							{
						 ?>
						 <div class="panel-title"><h1>View CRO Roster</h1></div>
						 <?php
							}
						?>
						</div>		 
		 
		 
		 
		 <div class="col-md-12">
  				<div class="panel-body">
				 <?php
				 if(isset($_POST['submit']))
				 {
					 $month = $_POST['month'];
					 $year = $_POST['year'];
				 ?>
				
				 <form action="print.php" method="post" class="form-horizontal" target="_blank">
				 
				 <div class="form-group">
				 <label class="control-label col-sm-2" for="email">Name:</label>
                 <div class="col-sm-6">
                 <input type="text" name="name" class="form-control" value="A.K Mehta">
                 </div>
                 </div>
				 
				 <div class="form-group">
				 <label class="control-label col-sm-2" for="email">Designation:</label>
                 <div class="col-sm-6">
                 <input type="text" name="desig" class="form-control" value="Medical Director, DDUH" size="30%" required>
                 </div>
                 </div>
				 
				 <div class="form-group">
				 <label class="control-label col-sm-2" for="email">Font-size:</label>
                 <div class="col-sm-6">
                  <input type="text" name="font_size" class="form-control" value="14" size="30%" required>
                 </div>
                 </div>
				 
				 <input type="hidden" name="month" value="<?php echo $month;?>"><br>
				 <input type="hidden" name="year" value="<?php echo $year;?>">
				<table>
				 <tr>
				 <td>
                  <button type="submit" class="btn btn-primary">Print</button>
				  </form>
				  </td>
				  <td>
                <form action="function/delete_roster.php" method="post">
				 <input type="hidden" name="month" value="<?php echo $month;?>">
				 <input type="hidden" name="year" value="<?php echo $year;?>">
				 <input type="hidden" name="year" value="<?php echo $year;?>" size="30%" required>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="deleteroster" onclick='return window.confirm("Are you sure you want to delete this?");'>Delete this Roster</button>
				  </form>	
</td>
</tr>
</table>				  
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
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
						<td><?php echo $date.'/'.$month.'/'.$year;?>
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
						<td><?php echo $name2;?>,<?php echo $mobile2;?>(<?php echo $depart2;?>)</td>
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
				<?php
				 }
				 else
				 {
				?>
				<div class="tab-pane active" id="tab1">
								      <form class="form-horizontal" role="form" method="post">
										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Select Month</label>
										    <div class="col-sm-10">
										      <select class="form-control" name="month" required>
											  <option value="">Select a Month</option>
											  <option value="1">January</option>
											  <option value="2">February</option>
											  <option value="3">March</option>
											  <option value="4">April</option>
											  <option value="5">May</option>
											  <option value="6">June</option>
											  <option value="7">July</option>
											  <option value="8">August</option>
											  <option value="9">September</option>
											  <option value="10">October</option>
											  <option value="11">November</option>
											  <option value="12">December</option>
											  
											  </select>
											 
										    </div>
										  </div>
										  
										  <div class="form-group">
										    <label class="col-sm-2 control-label">Select Year</label>
										    <div class="col-sm-10">
										      <select class="form-control" name="year" required>
											  <option value="">Select Year</option>
											  <option value="2017">2017</option>
											  <option value="2018">2018</option>
											  <option value="2019">2019</option>
											  <option value="2020">2020</option>
											  </select>
										    </div>
										  </div>
										  
											
                                          <div class="form-group">
										      <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
										   </div>
										  
										</form>
								    </div>
				<?php
				 }
				 ?>
  				</div>
  			</div>



		  </div>
		

   <?php include "theme/footer.php";?>