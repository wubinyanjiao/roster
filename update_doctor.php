<?php 
include "theme/header.php";
?>

<br>
<div class="panel-heading">
						 <div class="panel-title" style="text-align:center"><h1>Update Doctors</h1></div>
						</div>
<div class="col-md-12">

				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
		  				
		  				<div class="panel-body">
		  					<div id="rootwizard">
								<div class="tab-content">
								<table cellpadding="0" cellspacing="0" border="1" class="table table-bordered">
						<thead>
							<tr>
					            <th>S.N</th>
								<th>Name</th>
								<th>Designation</th>
								<th>Department</th>
								<th>Mobile</th>
								<th>Senior</th>
								<th>Update</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i = 0;
					$q = mysqli_query($con, "select * from doctor");		
					while($row = mysqli_fetch_array($q))
					{
						$i++;
						$name = $row['name'];
						$desig = $row['designation'];
						$depart = $row['department'];
						$mobile = $row['mobile'];
						$senior = $row['senior'];
						$id = $row['id'];
					?>
					<tr>
					<td><?php echo $i;?></td>
					<td><input class="form-control" type="text" id="name<?php echo $i;?>" value="<?php echo $name;?>"></td>
					<td><input class="form-control" type="text" id="desig<?php echo $i;?>" value="<?php echo $desig;?>"></td>
					<td><input class="form-control" type="text" id="depart<?php echo $i;?>" value="<?php echo $depart;?>"></td>
					<td><input class="form-control" type="text" id="mobile<?php echo $i;?>" value="<?php echo $mobile;?>"></td>
					<td><input class="form-control" type="text" id="senior<?php echo $i;?>" value="<?php echo $senior;?>"></td>
					<td><button class="btn btn-primary" id="update<?php echo $i;?>">Update</button>
					<script>
$(document).ready(function(){
    $("#update<?php echo $i;?>").click(function(){
		$("#update<?php echo $i;?>").text("Updating");
		var a = $("#name<?php echo $i;?>").val();
		var b = $("#desig<?php echo $i;?>").val();
		var c = $("#depart<?php echo $i;?>").val();
		var d = $("#mobile<?php echo $i;?>").val();
		var e = $("#senior<?php echo $i;?>").val();
        $.post("function/update_doctor.php",
        {
          name	 : a,
          desig  : b,
          depart : c,
          mobile : d,
          senior : e,
		  id     : "<?php echo $id;?>"
        },
        function(data){
			$("#update<?php echo $i;?>").text("Updated");
			$("#update<?php echo $i;?>").css("background-color","green");
			$("#update<?php echo $i;?>").hover(function(){
			$(this).text("Update Again");
			}, function(){
        $(this).text("Update");
			});
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
								</div>	
								</div>	
								</div>	
								</div>	
			
<?php 
include "theme/footer.php";
?>