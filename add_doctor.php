<?php 
$msg = "please fill all the field";
include "theme/header.php";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$depart = $_POST['depart'];
	$desig = $_POST['desig'];
	$mobile = $_POST['mobile'];
	$senior = $_POST['senior'];
$q = mysqli_query($con, "insert into doctor (name,department,designation,mobile,senior) values ('$name','$depart','$desig','$mobile','$senior')")or die(mysqli_error($con));
$msg  =  "<span style='color:green'>Successfully Added</span>";
	}
?>
<br>
<div class="panel-heading">
						 <div class="panel-title" style="text-align:center"><h1>Add Doctors</h1></div>
						</div>

	<div id="about" class="container-fluid">
  <div class="row">
  <div class="col-sm-2">
      
    </div>
    <div class="col-sm-8">
	<?php echo $msg;?>
       <form class="form-horizontal" role="form" method="post">
										  <div class="form-group">
										    <label for="name" class="col-sm-2 control-label">Name</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" name="name" required>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="name" class="col-sm-2 control-label">Designation</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" name="desig" required>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="name" class="col-sm-2 control-label">Department</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" name="depart" required>
										    </div>
										  </div>
										 <div class="form-group">
										    <label for="name" class="col-sm-2 control-label">Mobile No.</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" name="mobile" required>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="name" class="col-sm-2 control-label">Senior</label>
										    <div class="col-sm-2">
										      Yes :<input type="radio" name="senior" value="Yes" required>
										      No :<input type="radio" name="senior" value="No" required>
										    </div>
										  </div>
										
                                          <div class="col-md-6">
										     <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
										   </div>
										  
										</form>
    </div>
    <div class="col-sm-2">
      
    </div>
  </div>
</div>		

<?php 
include "theme/footer.php";
?>