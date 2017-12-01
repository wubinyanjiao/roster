<?php include "theme/header.php";
include "function/monthname.php";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>
<div class="panel-heading" style="text-align:center">
						<?php 
						if(isset($_POST['submit']))
							{
					       ?>
						   <h1>Create CRO Roster for <?php echo getMonthName($_POST['month']);?>, <?php echo $_POST['year'];?></h1>
						   <?php
							}
							else
							{
						 ?>
						 <div class="panel-title"><h1>Create CRO Roster</h1></div>
						 <?php
							}
						?>
						</div>
		  <div class="col-md-12">

				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
		  			
		  				<div class="panel-body">
		  					<div id="rootwizard">
								<div class="tab-content">
								   
									<?php
									if(isset($_POST['submit']))
									{
										$month = $_POST['month'];
										$year  = $_POST['year'];
										
								
								if(isset($_POST['hname']))
								{
									    $holiday = $_POST['hname'];
									    $hdate = $_POST['hdate'];
						$count = count($holiday);
				
						for($k =0;$k<$count; $k++)
						{
							$hday = $holiday[$k];
							$hdate1 = $hdate[$k];
							if($hday != '')
							{
								$ch = mysqli_query($con, "select * from holidays where holiday = '$hday' and date = '$hdate1' and month = '$month' and year = '$year'");
								$check = mysqli_num_rows($ch);
								if($check == 0)
								{
							$q = mysqli_query($con, "insert into holidays(holiday,date,month,year)values('$hday', '$hdate1','$month','$year')");
								}
							}
						}
								}
						//calculating no. of sat,sun and holidays
						$coh = mysqli_query($con, "select * from holidays where month='$month' and year = '$year'");
						$holiday_in_selected_month = mysqli_num_rows($coh);
						$total_holiday = 0;
						while($holyrow = mysqli_fetch_array($coh))
						{
							$holy_date = $holyrow['date'];
							$holy_day = date('l', strtotime($year.'-'.$month.'-'.$holy_date));
							if($holy_day == "Saturday" || $holy_day == "Sunday")
							{
								continue;
							}
							else
							{
								$total_holiday ++;
							}
						}
						
						$total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
						$sat = 0;
						$sun = 0;
						for($x=1;$x<=$total_days;$x++)
						{
						$day = date('l', strtotime($year.'-'.$month.'-'.$x));
						if($day == "Saturday")
						{
							$sat++;
						}
						if($day == "Sunday")
						{
							$sun++;
						}
						}
						$atd = mysqli_query($con, "insert into countdoctor (sat,sun,holiday,month,year) values('$sat','$sun','$total_holiday','$month','$year')");
						?>	
			<div class="bs-example">
   <div id="myTab">
        <span><a data-toggle="tab" href="#sectionA" type="button" class="btn btn-primary" id="evening">Roster for Evening Shift</a></span>
        <span><a data-toggle="tab" href="#sectionB" type="button" class="btn btn-primary" id="night">Roster for Night Shift</a></span>
        <span><a data-toggle="tab" href="#sectionC" type="button" class="btn btn-primary" id="holiday">View Holiday in <?php echo getMonthName($month);?>,<?php echo $year;?></a></span>
    </div>
  <br>
   <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
		<h2>Select Doctors for Evening Shift</h2>
		<h4>Total Saturday = <?php echo $sat;?>, Total Sunday = <?php echo $sun;?> and Total holiday(s) = <?php echo $holiday_in_selected_month;?> (<strong><span id="selecteddr">0</span></strong> out of <?php echo $sat+$sun+$total_holiday;?>    doctors selected)</h4> 
		<?php
		if($holiday_in_selected_month  > $total_holiday )
		{
	    ?>
		<p class="alert alert-danger" style="color:red">Note:- It seems that some of holiday day is in saturday or sunday, so you don't need to select extra day for holiday<p>
		<?php 
		}
		?>

		<table cellpadding="0" cellspacing="0" border="1" class="table table-bordered">
						<thead>
							<tr>
					            <th>S.N</th>
								<th>Name</th>
								<th>Selected Date,day and Holiday(if any)</th>
								<th>Select</th>
							</tr>
						</thead>
						<tbody>
						<?php
									    $i = 0;
										
										$q = mysqli_query($con, "SELECT * FROM doctor");
										while($row = mysqli_fetch_array($q))
										{
											$name = $row['name'];
											$senior = $row['senior'];
											$id     = $row['id'];
											if($senior == 'Yes')
								        {
											$i++;
										
									?>
									<style>
									#deselect<?php echo $i;?>
									{
										display:none;
									}
									</style>
									<tr>
									<td><?php echo $i;?></td>
									<td><strong><?php echo $name;?></strong></td>
									<td id="date<?php echo $i;?>">

<?php 
$q = mysqli_query($con, "select * from roster where userid= '$id' and eorn = 'Evening' and month = '$month' and year = '$year'");
$count = mysqli_num_rows($q);
if($count > 0)
{
$row_d = mysqli_fetch_array($q);
$r_day = $row_d['day'];
$r_date = $row_d['date'];
echo $r_date;
}
else
{
continue;
}
?>


</td>
									
									<td><button class="btn btn-primary" type="submit" id="select<?php echo $i;?>">Select</button>
									<button class="btn btn-primary" type="submit" id="deselect<?php echo $i;?>">Select</button>
									</td>
<script>
$(document).ready(function(){
    $("#select<?php echo $i;?>").click(function(){
		$("#select<?php echo $i;?>").text("Selecting");
		var a = $("#selecteddr").text();
		a++;
        $.post("function/create_roster.php",
        {
          userid: "<?php echo $id;?>",
          year  : "<?php echo $year;?>",
          month : "<?php echo $month;?>",
          eorn  : "Evening"
        },
        function(data){
			$("#selecteddr").text(a);
			
			$("#select<?php echo $i;?>").hide();
			$("#deselect<?php echo $i;?>").show();
			$("#deselect<?php echo $i;?>").text("Selected");
			$("#deselect<?php echo $i;?>").css("background-color","green");
			$("#deselect<?php echo $i;?>").hover(function(){
			$(this).text("Deselect");
			}, function(){
        $(this).text("Selected");
			});
			$("#date<?php echo $i;?>").html(data);
			
        });
		
    });
});
</script>
<script>
$(document).ready(function(){
    $("#deselect<?php echo $i;?>").click(function(){
		var a = $("#selecteddr").text();
		a--;
		$("#deselect<?php echo $i;?>").text("Deselecting");
        $.post("function/unselect_doctor.php",
        {
          userid: "<?php echo $id;?>",
          year  : "<?php echo $year;?>",
          month : "<?php echo $month;?>",
          eorn  : "Evening"
        },
        function(data){
			$("#selecteddr").text(a);
			$("#deselect<?php echo $i;?>").hide();
			$("#select<?php echo $i;?>").text("Select");
			$("#select<?php echo $i;?>").show();
			$("#date<?php echo $i;?>").html("");
        });
    });
});
</script>									</tr>
								   
									<?php									
										
										}
										}
										?>
									</tbody>
									</table>
											
		                              </div>
			<div id="sectionB" class="tab-pane fade">
		<h2>Select Doctors for Night Shift</h2>
		<h4>Total <?php echo cal_days_in_month(CAL_GREGORIAN,$month,$year);?> days in <?php echo getMonthName($month).','.$year;?> , (<strong><span id="caldr">0</span></strong> out of <?php echo cal_days_in_month(CAL_GREGORIAN,$month,$year);?> selected)</h4>
		<table cellpadding="0" cellspacing="0" border="1" class="table table-bordered">
						<thead>
							<tr>
					            <th>S.N</th>
								<th>Name</th>
								<th>Selected Date and Day</th>
								<th>Select</th>
							</tr>
						</thead>
						<tbody>
						<?php
									    $j = 0;
										$q1 = mysqli_query($con, "SELECT * FROM doctor");
										while($row1 = mysqli_fetch_array($q1))
										{
											$name1 = $row1['name'];
											
											$senior1 = $row1['senior'];
											$id1     = $row1['id'];
											
											if($senior1 == 'No')
								        {
											$j++;
									?>
									<style>
									#deselectd<?php echo $j;?>
									{
										display:none;
									}
									</style>
									<tr>
									<td><?php echo $j;?></td>
									<td><strong><?php echo $name1;?></strong></td>
									<td id="dateresult<?php echo $j;?>"></td>
									
									
									<td><button class="btn btn-primary" type="submit" id="selectd<?php echo $j;?>">Select</button>
									<button class="btn btn-primary" type="submit" id="deselectd<?php echo $j;?>">Select</button>
									</td>
<script>
$(document).ready(function(){
    $("#selectd<?php echo $j;?>").click(function(){
		$("#selectd<?php echo $j;?>").text("Selecting");
		var b  = $("#caldr").text();
		b++;
        $.post("function/create_roster.php",
        {
          userid: "<?php echo $id1;?>",
          year  : "<?php echo $year;?>",
          month : "<?php echo $month;?>",
          eorn  : "Night"
        },
        function(data){
			$("#caldr").text(b);
			$("#selectd<?php echo $j;?>").hide();
			$("#deselectd<?php echo $j;?>").show();
			$("#deselectd<?php echo $j;?>").text("Selected");
			$("#deselectd<?php echo $j;?>").css("background-color","green");
			$("#deselectd<?php echo $j;?>").hover(function(){
			$(this).text("Deselect");
			}, function(){
        $(this).text("Selected");
			});
			$("#dateresult<?php echo $j;?>").html(data);
        });
    });
});
</script>
<script>
$(document).ready(function(){
    $("#deselectd<?php echo $j;?>").click(function(){
		var b = $("#caldr").text();
		b--;
		$("#deselectd<?php echo $j;?>").text("Deselecting");
        $.post("function/unselect_doctor.php",
        {
          userid: "<?php echo $id1;?>",
          year  : "<?php echo $year;?>",
          month : "<?php echo $month;?>",
          eorn  : "Night"
        },
        function(data){
			$("#caldr").text(b);
			$("#deselectd<?php echo $j;?>").hide();
			$("#selectd<?php echo $j;?>").text("Select");
			$("#selectd<?php echo $j;?>").show();
			$("#dateresult<?php echo $j;?>").html("");
        });
    });
});
</script>	
									</tr>
								   
									<?php									
										}
										}
										?>
									</tbody>
									</table>
											
		                              </div>
									  <div id="sectionC" class="tab-pane fade">
									  <h2>Holidays in <?php echo getMonthName($month);?></h2>
		<table cellpadding="0" cellspacing="0" border="1" class="table table-bordered">
						<thead>
							<tr>
					            <th>S.N</th>
								<th>Date</th>
								<th>Holiday Name</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						
						<?php
									    $j = 0;
										$q = mysqli_query($con, "SELECT * FROM holidays WHERE month = '$month' and year = '$year'");
										$a = 0;
										while($row = mysqli_fetch_array($q))
										{
											$a++;
											$holiday_id = $row['id'];
											$holiday = $row['holiday'];
											$hodate = $row['date'];
										?>
										<tr id="holiday_list<?php echo $a;?>">
										<td><?php echo $a;?></td>
										<td><?php echo $hodate;?></td>
										<td><?php echo $holiday;?></td>
										<td><button class="btn btn-primary" type="submit" id="delete_holiday<?php echo $a;?>">Delete</button>
									</td>
<script>
$(document).ready(function(){
    $("#delete_holiday<?php echo $a;?>").click(function(){
		$("#delete_holiday<?php echo $a;?>").text("Deleting");
        $.post("function/delete_holiday.php",
        {
          id : "<?php echo $holiday_id;?>"
        },
        function(data){
			$("#holiday_list<?php echo $a;?>").hide();
			
        });
		
    });
});
</script>
										</tr>
										<?php
										}
										?>
										</tbody>
										</table>
									  </div>
	                                 </div>
								</div>	
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
										  <script>
										  function add_fields() {
   $( ".addmore" ).append('<br /><div class="form-group"><label class="col-sm-2 control-label">Holiday Name</label><div class="col-sm-2"><input type="text" name="hname[]" class="form-control"></div><label class="col-sm-2 control-label">Holiday Date</label><div class="col-sm-2"><input type="number" max=31 name="hdate[]" class="form-control"></div></div>');
  
}
$(document).ready(function(){
	$("#removeh").click(function(){
		$("#removediv").html("");
	})
})
									  </script>
										 <div id="removediv" class="addmore">
										  <div class="form-group">
										    <label class="col-sm-2 control-label">Holiday Name</label>
										    <div class="col-sm-2">
											<input type="text" name="hname[]" class="form-control">
											</div>
											 <label class="col-sm-2 control-label">Holiday Date</label>
										    <div class="col-sm-2">
											<input type="number" max=31 name="hdate[]" class="form-control">
											</div>
											</div>
											 
											</div>
											
                                          <div class="form-group">
										      <button type="submit" name="submit" class="btn btn-primary" >Submit</button>&nbsp;&nbsp;&nbsp;<a onclick="add_fields()" class="btn btn-primary" >Add More Holidays</a>&nbsp;&nbsp;&nbsp;<a id="removeh" class="btn btn-primary" >Remove Holidays</a>
										   </div>
										  
										</form>
								    </div>
								    
									<?php
									}
									?>
							</div>
		  				</div>
		  			</div>
					</div>
				</div>


	  		<!--  Page content -->
		  </div>
		  </div>
		
		  
		
									
   <?php 
	include "theme/footer.php";?>