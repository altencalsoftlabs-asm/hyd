<?php

if($_POST['submit']=='Next') {

$prefix=$_POST['stud_prefix'];
$fname=$_POST['stud_firstname'];
$lname=$_POST['stud_lastname'];
$email=$_POST['stud_email'];
$phone=$_POST['stud_phone'];

$stud_gender =$_POST['stud_gender'];

$country=$_POST['stud_country'];
$addr_01=$_POST['stud_addr_01'];
$city=$_POST['stud_city'];
$post_code=$_POST['stud_post_code'];
$state=$_POST['stud_state'];



$data = array(
	'FirstName'=> $fname,
	'LastName'=> $lname,
	'EmailAddress'=> $email, 
	'SalutoryIntroduction'=> $prefix,
	'MobileNumber'=> $phone,
	'Gender'=> $stud_gender,
	'Address'=> [array(
		'Address1'=> $addr_01,
		'City'=> $city,
		'Country'=> $country, 
		'State'=> $state,
		'PostalCode'=> $post_code
	)]
);


$payload = json_encode($data);


$username='gayam.r@altencalsoftlabs.com';
$password='Nina@123';

/*$username='sujiths';
$password='Sujith@130';*/

$ch = curl_init('https://ekiw-test.fa.us2.oraclecloud.com/crmRestApi/resources/11.13.17.11/contacts');
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
	'Authorization: Basic '. base64_encode("$username:$password"),
    'Content-Length: ' . strlen($payload))
);
 
// Submit the POST request
$result = curl_exec($ch);


$res_contact=json_decode($result);


$contact_id=$res_contact->PartyId;
$contact_name=$res_contact->ContactName;
$contact_email=$res_contact->EmailAddress;
$contact_mobile=$res_contact->MobileNumber;
$contact_gender=$res_contact->Gender;
$contact_country=$res_contact->Address[0]->Country;
$contact_address=$res_contact->Address[0]->Address1;
$contact_city=$res_contact->Address[0]->City;
$contact_state=$res_contact->Address[0]->State;
$contact_postcode=$res_contact->Address[0]->PostalCode;


$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code

// Close cURL session handle
curl_close($ch);
}
else {
	
	header('Location: http://localhost/dashboard/wcc_contact.php');
	exit;	
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="WCCLead" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylesheets/wcc_css.css">
</head>
<body style="background-image: url(https://www.sunywcc.edu/cms/wp-content/themes/wcc2/img/news-wallpaper2.png?);">
<div class="container">
  <div>
    <image src="https://www.sunywcc.edu/cms/wp-content/themes/wcc2/img/desktop-logo.svg" />
  </div>
  <form name="wccFormLead" method="post" action="wcc_thankyou.php">
    <div class="row">
      <h2 class="wcc_heading"><u>WCC Inquiry Form</u></h2>
    </div>
    <br>
    <div class="row">
      <div class="col-25">
        <label for="program">Select the program<span style="color:#FF0000">*</span></label>
      </div>
      <div class="col-75">
        <select id="program" name="stud_program" required>
          <option value=""></option>
          <option value="300000023486314">Computer Science Group</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="sttype">Student Type<span style="color:#FF0000">*</span></label>
      </div>
      <div class="col-75">
        <select id="stutype" name="stud_type" required>
          <option value=""></option>
          <option value="Career">Career</option>
          <option value="Student">Student</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fpname">Full Time/Part Time<span style="color:#FF0000">*</span></label>
      </div>
      <div class="col-75">
        <input type="text" id="fptime" name="stud_fptime" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="event">Event <span style="color:#FF0000">*</span></label>
      </div>
      <div class="col-75">
        <input type="text" id="event" name="stud_event" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pchs">Previous College/High School<span style="color:#FF0000">*</span></label>
      </div>
      <div class="col-75">
        <input type="text" id="pchs" name="stud_pchs" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="adterm">Year of High School Graduation<span style="color:#FF0000">*</span></label>
      </div>
      <div class="col-75">
        <select id="adterm" name="stud_yhsg" required>
          <option value=""></option>
          <option value="2000">2000</option>
          <option value="2001">2001</option>
          <option value="2003">2003</option>
          <option value="2004">2004</option>
          <option value="2005">2005</option>
          <option value="2006">2006</option>
          <option value="2007">2007</option>
          <option value="2008">2008</option>
          <option value="2009">2009</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2011">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
        </select>
      </div>
    </div>



    <input type="hidden" id="contact_id" name="contact_id" value="<?php echo $contact_id;?>">
    <input type="hidden" id="contact_name" name="contact_name" value="<?php echo $contact_name;?>">
    <input type="hidden" id="contact_email" name="contact_email" value="<?php echo $contact_email;?>">
    <input type="hidden" id="contact_mobile" name="contact_mobile" value="<?php echo $contact_mobile;?>">
	<input type="hidden" id="contact_gender" name="contact_gender" value="<?php echo $contact_gender;?>">
    <input type="hidden" id="contact_country" name="contact_country" value="<?php echo $contact_country;?>">
    <input type="hidden" id="contact_address" name="contact_address" value="<?php echo $contact_address;?>">
    <input type="hidden" id="contact_city" name="contact_city" value="<?php echo $contact_city;?>">
    <input type="hidden" id="contact_state" name="contact_state" value="<?php echo $contact_state;?>">
    <input type="hidden" id="contact_postcode" name="contact_postcode" value="<?php echo $contact_postcode;?>">
    <br>
    <div class="row">
      <div class="col-75"> &nbsp;
        <!--<button type="reset" value="Reset">Reset</button>-->
      </div>
      <div class="col-25">
        <input type="submit" value="Submit" name="submit" />
      </div>
    </div>
  </form>
</div>
</body>
</html>
