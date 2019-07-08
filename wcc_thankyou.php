<?php

if($_POST['submit']=='Submit') {

$conId=$_POST['contact_id'];
$conName=$_POST['contact_name'];
$conEmail=$_POST['contact_email'];

$conMobile=$_POST['contact_mobile'];
$program=$_POST['stud_program'];

$conGender=$_POST['contact_gender'];
$conCountry=$_POST['contact_country'];
$conAddress=$_POST['contact_address'];
$conCity=$_POST['contact_city'];

$conState=$_POST['contact_state'];
$conPostcode=$_POST['contact_postcode'];


$stud_type=$_POST['stud_type'];

$stud_event=$_POST['stud_event'];
$stud_pchs=$_POST['stud_pchs'];

$stud_yhsg=$_POST['stud_yhsg'];



// Prepare new cURL resource
$data = array(
  'Rank'=> 'HOT',
  'PrimaryContactId'=> $conId,
  //'Name'=> $conName,
  'CustomerPartyName'=> $conName, 
  'Description'=> 'Prospective Student: '.$conName,
  'PrimaryContactPartyName'=> $conName,
  'PrimaryContactCountry'=> $conCountry,
  'PrimaryContactAddress1'=> $conAddress,
  'PrimaryContactCity'=> $conCity,
  'PrimaryContactPostalCode'=> $conPostcode,
  'PrimaryContactState'=> $conState,
  'PrimaryContactEmailAddress'=> $conEmail,
  'PrimaryPhoneNumber'=>$conMobile,
  'PrimaryProductGroupId' =>$program,
	'StudentType_c'=>$stud_type,  
	'Event_c'=>$stud_event,
	'PreviousCollegeHighSchool_c'=>$stud_pchs,
	'YearOfHighSchoolGraduation_c'=>$stud_yhsg
	
 
);

/*'CampusInformation_c'=>$stud_campinfo,
	'AdmitTerm_c'=>$stud_admitterm,
	'Gender'=>$stud_gender*/
 
$payload = json_encode($data);

$username='gayam.r@altencalsoftlabs.com';
$password='Nina@123';

/*$username='sujiths';
$password='Sujith@130';*/

$ch = curl_init('https://ekiw-test.fa.us2.oraclecloud.com/crmRestApi/resources/11.13.17.11/leads');
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

/*echo "<pre>";
print_r($result);
exit;*/

$res_lead=json_decode($result);



$leadNumber=$res_lead->LeadNumber;


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
<meta name="WCCthankyou" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylesheets/wcc_css.css">
</head>
<body style="background-image: url(https://www.sunywcc.edu/cms/wp-content/themes/wcc2/img/news-wallpaper2.png?);">
<div class="container">
<div><image src="https://www.sunywcc.edu/cms/wp-content/themes/wcc2/img/desktop-logo.svg" /></div>
<div class="row">
<h2 class="wcc_heading">WCC Thanks You.</h2>
<br>
<p style="border: 5px solid #ffffff; border-radius: 15px; padding: 15px;">
Hi <span style="color:#00578a; font-weight: bold;"><?php echo $conName;?></span>,<br><br>
Thank you for registering with us.<br>
We will get back to you once the process completes.<br>
<br>
Thank You,<br>
<span style="color:#00578a; font-weight: bold; font-size:30px;">WCC</span>
</p>
</div>
<br>
</div>
</body>
</html>



