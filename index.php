<?php 
include "theme/header.php";
?>
<div class="jumbotron text-center">
  <!--<h1 style="background-color:skyblue;">Deen Dayal Upadhayay Hospital</h1>
  <p style="background-color:skyblue;">Online Roster Generator</p> -->
  <br>
  <br>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Introduction</h2>
	  <br>
      <h4>
	  This website provide you to easily generate and print the CRO roster for Deen Dayal Upadhayay Hospital. Here  is some tips and help to create a error free roster. I am Shivrajan Singh and I will help you to create roster. There is too many bugs in the previous version hence I launched a new version of CRO roster but there is possibilities of having more bugs in this web app so please contact me as soon as possible so that I can fix them. It is recommended that please read the full help and tips section before creating any roster and if you still feeling any trouble in creating Roster ..please contact me any time.
	  </h4><br>
     <p><span style="font-size:16pt"><span style="font-family:Calibri,sans-serif">What is new in this version :-</span></span>
</p>
<strong>
<p><span style="font-size:14pt"><span style="font-family:Calibri,sans-serif">- Update roster section is removed (How to update a roster is explained further)</span></span>
</p>
<p><span style="font-size:14pt"><span style="font-family:Calibri,sans-serif">- Date and Day are visibile during the selection of Doctors.</span></span>
</p>
<p><span style="font-size:14pt"><span style="font-family:Calibri,sans-serif">- Day Name are visible to three letters only</span></span>
</p>
<p><span style="font-size:14pt"><span style="font-family:Calibri,sans-serif">- If holiday is in Saturday or Sunday you don&rsquo;t need to select extra doctors</span></span>
</p>
<p><span style="font-size:14pt"><span style="font-family:Calibri,sans-serif">- A new userfreindly interface introduced</span></span>
</p>
<p><span style="font-size:14pt"><span style="font-family:Calibri,sans-serif">- Help and tips section added.</span></span>
</p>
</strong>
      <br><a href="#contact" class="btn btn-default btn-lg" >Contact me Now</a>  <a href="#help" class="btn btn-default btn-lg" >Help</a>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey"  id="help">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Tips and Help</h2><br>
      <h4><strong>Question 1:</strong> How to create a roster?</h4>
      <p><strong>Answer:</strong>Just click on the "create" button and select the year, month and holiday (if any), in the next step just select the doctors name and after selecting you will see the date, day name  and holiday name  you are selecting.<br> 
	  <span style="color:red;"><strong>Note:</strong>Please go slowly during the selection of doctors it may take some seconds to select the doctor for the perticular date..Please don's select other doctor during the selection process. 
	  <br>
	  also, if date is not shown after the selection of a doctor, it may be posible that there is some error so you need to unselect and select it again, or the no. of day is finished for that month.</span>
	  </p>
	  <BR>
	  <h4><strong>Question 2:- </strong></h4>How to view a roster </h4>
	  <p><strong>Answer:- </strong>To view a roster just click on 'view' link in the menu, enter the year and month and click on submit button. 
	  if you are currently creating a roster then it is recommended that first complete the roster and then click on the "view" link. </p>
	  <br>
	    <h4><strong>Question 3:- </strong> How to update a roster?</h4>
		<p><strong>Answer:- </strong> I have removed the update button, instead of this you can update your roster while creating your roster. Once you have completed your roster <b><u>please don't close that current page</b></u>, just click on 'view' link it will open the new link on the new tab now enter there year and month and view the roster, if you want to update your roster, revert to your previous page (Create roster) and unselect the Name which you want to remove and select the another name, it will automatically assign that date to new one.. 
		
		for example :- 
		if you want to change the date for the NameA from 5/01/2017 to 10/01/2017, and you have selected NameA for 5/01/2017 and NameB for 10/01/2017 then unselect the both name first, now two dates are free.. first 5/01/2017 and second 10/01/2017. Now select that name which you want to assign for 5/01/2017 say it is 'NameC' then 5/01/2017 will assign to NameC and then select NameA, then you will see that NameA is assigned to date 10/01/2017. and also NameB is removed from the roster. 
		<br>
		  <span style="color:red;"><strong>Note:</strong>Please never close the page <b><u>"CREATE"</b></u> untill you are satisfied with the roster you have created.</span>
	  </p>
    </div>
  </div>
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Delhi/NCR, Noida Sec-15</p>
      <p><span class="glyphicon glyphicon-phone"></span> +91 8791524846</p>
      <p><span class="glyphicon glyphicon-envelope"></span>shivrajansingh@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include "theme/footer.php";
?>