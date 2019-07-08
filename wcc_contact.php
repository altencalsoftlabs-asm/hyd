<!DOCTYPE html>
<html>
<head>
<meta name="WCCContact" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylesheets/wcc_css.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
</head>
<body style="background-image: url(https://www.sunywcc.edu/cms/wp-content/themes/wcc2/img/news-wallpaper2.png?);">
<div class="container">
<div><image src="https://www.sunywcc.edu/cms/wp-content/themes/wcc2/img/desktop-logo.svg" /></div>
	<form name="wccFormContact"  method="post" action="wcc_lead.php" >
		<div class="row">
			<h2 class="wcc_heading"><u>WCC Contact Form</u></h2>
		</div>
		
		<br>
		
		<div class="row">
			<div class="col-25">
				<label for="prefix">Prefix<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<select id="prefix" name="stud_prefix" required> 
					<option value=""></option>
					<option value="MR.">Mr.</option>
					<option value="MRS.">Mrs.</option>
					<option value="MS.">Ms.</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-25">
				<label for="fname">First Name<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="fname" name="stud_firstname" placeholder="First Name" required>
			</div>
		</div>
		
		<div class="row">
			<div class="col-25">
				<label for="lname">Last Name<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="lname" name="stud_lastname" placeholder="Last Name" required>
			</div>
		</div>
		
		<div class="row">
			<div class="col-25">
				<label for="email">Email<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="email" name="stud_email" placeholder="Valid Email" required>
			</div>
		</div>

		<div class="row">
			<div class="col-25">
				<label for="phone">Phone Number<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="phone" name="stud_phone" required>
			</div>
		</div>
			<div class="row">
			<div class="col-25">
				<label for="bdate">Date of Birth<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="datepicker" name="stud_bdate" required>
			</div>
		</div>

				<div class="row">
			<div class="col-25">
				<label for="gender">Gender<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<select id="gender" name="stud_gender" required> 
					<option value=""></option>
					<option value="MALE">Male</option>
					<option value="FEMALE">Female</option>
					<option value="OTHERS">Others</option>
				</select>
			</div>
		</div>
	
		
		<div class="row">
			<div class="col-25">
				<label for="country">Country<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<select id="country" name="stud_country">
					<option value="US">USA</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-25">
				<label for="address_01">Address Line 1<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="address_01" name="stud_addr_01" required>
			</div>
		</div>		
		
		<div class="row">
			<div class="col-25">
				<label for="city">City<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="city" name="stud_city" required>
			</div>
		</div>
		
		<div class="row">
			<div class="col-25">
				<label for="state">State<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<select id="state" name="stud_state">
					<option value="CA">CA</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="postcode">Postal Code<span style="color:#FF0000">*</span></label>
			</div>
			<div class="col-75">
				<input type="text" id="postcode" name="stud_post_code" required>
			</div>
		</div>

		<br>
		
		<div class="row">
			<div class="col-75">
				<input type="submit" value="Next" name="submit" />
			</div>
			<div class="col-25">
				<button type="reset" value="Reset">Reset</button>
			</div>
		</div>
	</form>
</div>
</body>
</html>



								