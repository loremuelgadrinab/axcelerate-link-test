<?php

include_once(ABSPATH . 'wp-admin/includes/admin.php');

function get_WordPress_Axcelerate_Link_Settings() {

	/*Retrieves the values for the Plugin settings from the database.*/

	$axc_host = get_option('axceleratelink_host');

    $axc_wstoken = get_option('axceleratelink_wstoken_key');

    $axc_apitoken = get_option('axceleratelink_apitoken_key');

    //$axc_user = get_option('axceleratelink_user');

    //$axc_website_ip = get_option('axceleratelink_website_ip');	

	

	return array($axc_host, $axc_wstoken, $axc_apitoken, $axc_user, $axc_website_ip); 

}



function get_WordPress_Axcelerate_Course_Page_Settings() {

	/*Retrieves the values for the course page settings from the database.*/

	$axc_sc_page = get_option('axceleratelink_short_course_detail_page');

    $axc_qc_page = get_option('axceleratelink_qualifications_course_detail_page');

    $axc_nss_page = get_option('axceleratelink_newsletter_signup_success_page'); //Newsletter Sign-up Success Page

    $axc_nsf_page = get_option('axceleratelink_newsletter_signup_fail_page'); //Newsletter Sign-up Fail Page

    $axc_default_source = get_option('axceleratelink_newsletter_signup_default_source'); //Newsletter Sign-up Default SourceCode ID

    $axc_name_title = get_option('axceleratelink_newsletter_signup_title_name'); //Newsletter Sign-up Given name field title

    $axc_emailaddress_title = get_option('axceleratelink_newsletter_signup_title_emailaddress'); //Newsletter Sign-up Email Address Field Title

    $axc_button_text = get_option('axceleratelink_newsletter_signup_button_text'); //Newsletter Sign-up Button Text

    $axc_course_detail_button_text = get_option('axceleratelink_course_detail_button_text'); //Course Detail Button Text

	

	return array($axc_sc_page, $axc_qc_page, $axc_nss_page, $axc_nsf_page, $axc_default_source, $axc_name_title, $axc_emailaddress_title, $axc_button_text, $axc_course_detail_button_text);

}



function update_WordPress_Axcelerate_Link_Settings($axc_host, $axc_wstoken, $axc_apitoken) {

	/*Updates the values for the plugin settings from the database. */

    update_option('axceleratelink_host', $axc_host);

    update_option('axceleratelink_wstoken_key', $axc_wstoken);

	update_option('axceleratelink_apitoken_key', $axc_apitoken);

    //update_option('axceleratelink_user', $axc_user);

	//update_option('axceleratelink_website_ip', $axc_website_ip);

		

	return(0);

}



function update_WordPress_Axcelerate_Course_Page_Settings($axc_sc_page, $axc_qc_page, $axc_nss_page, $axc_nsf_page, $axc_default_source, $axc_name_title, $axc_emailaddress_title, $axc_button_text, $axc_course_detail_button_text) {

	/*Updates the values for the course page settings from the database. */

    update_option('axceleratelink_short_course_detail_page', $axc_sc_page);

    update_option('axceleratelink_qualifications_course_detail_page', $axc_qc_page);

    update_option('axceleratelink_newsletter_signup_success_page', $axc_nss_page); //Newsletter Sign-up Success Page

    update_option('axceleratelink_newsletter_signup_fail_page', $axc_nsf_page); //Newsletter Sign-up Fail Page

    update_option('axceleratelink_newsletter_signup_default_source', $axc_default_source); //Newsletter Sign-up Default Contact Source

    update_option('axceleratelink_newsletter_signup_title_name', $axc_name_title); //Newsletter Sign-up Given name field title

    update_option('axceleratelink_newsletter_signup_title_emailaddress', $axc_emailaddress_title); //Newsletter Sign-up Email Address Field Title

    update_option('axceleratelink_newsletter_signup_button_text', $axc_button_text); //Newsletter Sign-up Button Text

    update_option('axceleratelink_course_detail_button_text', $axc_course_detail_button_text); //Course Detail Button Text

		

	return(0);

}



/* Get contact information as determined by filter criteria */

function get_contactid($emailaddress) {

	include_once 'axcelerate-link-dbdata.php';

	

	$settings = get_WordPress_Axcelerate_Link_Settings();

	

	/*if ((empty($type)) && (empty($searchterm))) {

		$service_url = $settings[0].'/api/courses';

	}

	if (!($type==null) && (empty($searchterm))) {

		$service_url = $settings[0].'/api/courses?type='.$type;

	}

	if ((empty($type)) && (!($searchterm==null))) {

		$service_url = $settings[0].'/api/courses?searchterm='.$searchterm;

	}

	if (!($type==null) && (!($searchterm==null))) { */

	$service_url = $settings[0].'/api/contacts?emailAddress='.$emailaddress; //.'&searchterm='.$searchterm;

	//}

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



	// Call API

	$curl_response = curl_exec($curl);

		

	$json_a = json_decode($curl_response, true);

	

	foreach ($json_a as $key => $value) {

		$contactid = $value['CONTACTID'];

	}

	

	return($contactid);

}



/* Get course information as determined by filter criteria */

function get_courses($type, $searchterm) {

	include_once 'axcelerate-link-dbdata.php';

	

	$settings = get_WordPress_Axcelerate_Link_Settings();

	

	if ((empty($type)) && (empty($searchterm))) {

		$service_url = $settings[0].'/api/courses';

	}

	if (!($type==null) && (empty($searchterm))) {

		$service_url = $settings[0].'/api/courses?type='.$type;

	}

	if ((empty($type)) && (!($searchterm==null))) {

		$service_url = $settings[0].'/api/courses?searchterm='.$searchterm;

	}

	if (!($type==null) && (!($searchterm==null))) {

		$service_url = $settings[0].'/api/courses?type='.$type.'&searchterm='.$searchterm;

	}

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



	// Call API

	$curl_response = curl_exec($curl);

		

	$json_a = json_decode($curl_response, true);

	

	return($json_a);

}



function get_course_details($courseid, $type) {

	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Link_Settings();



	$service_url = $settings[0].'/api/course/detail?id='.$courseid.'&type='.$type;

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



	// Call API

	$curl_response = curl_exec($curl);

		

	$json_a = json_decode($curl_response, true);

	

	return($json_a);

}



function add_axcelerate_user_details($user_details) {



	$file = 'testdata.txt';

	$service_url = file_get_contents($file);



	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Link_Settings();

	

	//Get contact ID if the contact already exists in Axcelerate

	$contactid = get_contactid($user_details["emailAddress"]);

	

	// Build string to add user data to Axcelerate database from the Array

	if (!empty($user_details["title"])) {

			$title = $user_details["title"];

		} elseif (empty($contactid)) {

			$title = '';

		}

		$url_string = $url_string.'&title='.$title;

	if (!empty($user_details["givenName"])) {

		$givenName = str_replace(' ','%20',$user_details["givenName"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&givenName='.$givenName;

	}

	if (!empty($user_details["middleName"])) {

		$middleName = str_replace(' ','%20',$user_details["middleName"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&middleName='.$middleName;

	}

	if (!empty($user_details["surname"])) {

		$surname = str_replace(' ','%20',$user_details["surname"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&surname='.$surname;

	}

	if (!empty($user_details["emailAddress"])) {

		$emailAddress = str_replace(' ','%20',$user_details["emailAddress"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&emailAddress='.$emailAddress;

	}

	if (!empty($user_details["dob"])) {

		//Change the formatting of the date from dd/mm/yyyy to yyyy-mm-dd

		list($day, $month, $year) = explode('/',$user_details["dob"]);

		$dob = $year.''.$month.''.$day;

		$url_string = $url_string.'&dob='.$dob;

	}

	if (!empty($user_details["sex"])) {

		//Change the formatting Male to M and Female to F

		$url_string = $url_string.'&sex='.substr($user_details["sex"],0,1);

	}

	if (!empty($user_details["phone"])) {

		$phone = str_replace(' ','%20',$user_details["phone"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&phone='.$phone;

	}

	if (!empty($user_details["mobilephone"])) {

		$mobilephone = str_replace(' ','%20',$user_details["mobilephone"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&mobilephone='.$mobilephone;

	}		

	if (!empty($user_details["workphone"])) {

		$workphone = str_replace(' ','%20',$user_details["workphone"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&workphone='.$workphone;

	}	

	if (!empty($user_details["fax"])) {

		$fax = str_replace(' ','%20',$user_details["fax"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&fax='.$fax;

	}

	if (!empty($user_details["EmergencyContact"])) {

		$EmergencyContact = str_replace(' ','%20',$user_details["EmergencyContact"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&EmergencyContact='.$EmergencyContact;

	}

	if (!empty($user_details["EmergencyContactRelation"])) {

		$EmergencyContactRelation = str_replace(' ','%20',$user_details["EmergencyContactRelation"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&EmergencyContactRelation='.$EmergencyContactRelation;

	}

	if (!empty($user_details["EmergencyContactPhone"])) {

		$EmergencyContactPhone = str_replace(' ','%20',$user_details["EmergencyContactPhone"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&EmergencyContactPhone='.$EmergencyContactPhone;

	}

	if (!empty($user_details["organisation"])) {

		$organisation = str_replace(' ','%20',$user_details["organisation"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&organisation='.$organisation;

	}

	if (!empty($user_details["position"])) {

		$position = str_replace(' ','%20',$user_details["position"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&position='.$position;

	}

	if (!empty($user_details["USI"])) {

		$USI = str_replace(' ','%20',$user_details["USI"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&USI='.$USI;

	}

	if (!empty($user_details["LUI"])) {

		$LUI = str_replace(' ','%20',$user_details["LUI"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&LUI='.$LUI;

	}		

	if (!empty($user_details["SourceCodeID"])) {

		$SourceCodeID = str_replace(' ','%20',$user_details["SourceCodeID"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&SourceCodeID='.$SourceCodeID;

	}

	if (!empty($user_details["Password"])) {

		$Password = str_replace(' ','%20',$user_details["Password"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&Password='.$Password;

	}		

	//Primary Postal Address fields

	if (!empty($user_details["buildingName"])) {

		$buildingName = str_replace(' ','%20',$user_details["buildingName"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&buildingName='.$buildingName;

	}

	if (!empty($user_details["unitNo"])) {

		$unitNo = str_replace(' ','%20',$user_details["unitNo"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&unitNo='.$unitNo;

	}

	if (!empty($user_details["streetNo"])) {

		$streetNo = str_replace(' ','%20',$user_details["streetNo"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&streetNo='.$streetNo;

	}

	if (!empty($user_details["streetName"])) {

		$streetName = str_replace(' ','%20',$user_details["streetName"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&streetName='.$streetName;

	}

	if (!empty($user_details["POBox"])) {

		$POBox = str_replace(' ','%20',$user_details["POBox"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&POBox='.$POBox;

	}

	if (!empty($user_details["city"])) {

		$city = str_replace(' ','%20',$user_details["city"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&city='.$city;

	}

	if (!empty($user_details["state"])) {

		$url_string = $url_string.'&state='.$user_details["state"];

	}

	if (!empty($user_details["postcode"])) {

		$postcode = str_replace(' ','%20',$user_details["postcode"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&postcode='.$postcode;

	}

	if (!empty($user_details["country"])) {

		$url_string = $url_string.'&country='.$user_details["country"];

	}

	//Primary Street Address fields

	if (!empty($user_details["sbuildingName"])) {

		$sbuildingName = str_replace(' ','%20',$user_details["sbuildingName"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&sbuildingName='.$sbuildingName;

	}

	if (!empty($user_details["sunitNo"])) {

		$sunitNo = str_replace(' ','%20',$user_details["sunitNo"]); //Remove any spaces that may exist in the string

		$url_string = $url_string.'&sunitNo='.$sunitNo;

	}

	if (!empty($user_details["sstreetNo"])) {

		$sstreetNo = str_replace(' ','%20',$user_details["sstreetNo"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&sstreetNo='.$sstreetNo;

	}

	if (!empty($user_details["sstreetName"])) {

		$sstreetName = str_replace(' ','%20',$user_details["sstreetName"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&sstreetName='.$sstreetName;

	}

	if (!empty($user_details["sPOBox"])) {

		$sPOBox = str_replace(' ','%20',$user_details["sPOBox"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&sPOBox='.$sPOBox;

	}

	if (!empty($user_details["scity"])) {

		$scity = str_replace(' ','%20',$user_details["scity"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&scity='.$scity;

	}

	if (!empty($user_details["sstate"])) {

		$url_string = $url_string.'&sstate='.$user_details["sstate"];

	}

	if (!empty($user_details["spostcode"])) {

		$spostcode = str_replace(' ','%20',$user_details["spostcode"]);  //Remove any spaces that may exist in the string

		$url_string = $url_string.'&spostcode='.$spostcode;

	}

	if (!empty($user_details["scountry"])) {

		$url_string = $url_string.'&scountry='.$user_details["scountry"];

	}

	//Other data fields

	if (!empty($user_details["CitizenStatus"])) {

		//$url_string = $url_string.'&CitizenStatus='.substr($user_details["CitizenStatus"],0,1);

		$url_string = $url_string.'&CitizenStatus='.$user_details["CitizenStatus"];

	}

	//Build the string to add data to the Axcelerate webservice

	if (!empty($contactid)) {

		$service_url = $settings[0].'/api/contact/'.$contactid.'/?'.$url_string;		

	} else {

		$service_url = $settings[0].'/api/contact/?'.$url_string;

	}

	

	//file_put_contents($file, $service_url);

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	if (!empty($contactid)) {

		$curl = curl_init();

		//$curl = curl_init($service_url); - Not required

		curl_setopt($curl, CURLOPT_URL, $service_url);

		curl_setopt($curl, CURLOPT_PUT, 1);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);		

	} else {

		$curl = curl_init();

		//$curl = curl_init($service_url); - Not required

		curl_setopt($curl, CURLOPT_URL, $service_url);

		curl_setopt($curl, CURLOPT_POST, 1);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	}

	

	// Call API

	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);



 	return(json_a);

}



function get_course_instances($courseid, $type) {

	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Link_Settings();

	
	$service_url = $settings[0].'/api/course/instances?id='.$courseid.'&type='.$type;
	//echo '<br>'.$service_url.'<br>';
	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	//$curl = curl_init($service_url);

	//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	//curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	



	// Call API

	$curl_response = curl_exec($curl);

			

	$json_a = json_decode($curl_response, true);
	//var_dump($json_a);
	

	return($json_a);

}


function get_course_instance_search($val_id, $val_type, $location = null) {

	//$courseTypeSelected = get_WordPress_Axcelerate_SRMS_CourseTypeSelected();
	$blogtime = current_time( 'mysql' ); 
	list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );
	$ddate = $today_year.'-'.$today_month.'-'.$today_day;
	$date1 = str_replace('-', '/', $ddate);
	$fdate = date('Y-m-d',strtotime($date1 . "+1 days"));
	$parameters = array(
		'ID' => $val_id,
		'type' => $val_type ,
		'displayLength' => "1000",
		'location' => $location,
		'startDate_min' => $fdate,
		'finishDate_min' => $fdate,
	);
	$settings = get_WordPress_Axcelerate_Link_Settings();

	
	$service_url = $settings[0].'/api/course/instance/search';
	//echo '<br>'.$service_url.'<br>';
	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	//curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	//var_dump($json_a);
	return($json_a);	
}
/* Add details to Axcelerate and sign-up individual for the newsletter. */

function axcelerate_newsletter_signup($givenname, $lastname, $emailaddress, $sourcecodeID) {



	$title = '';

	

	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Link_Settings();



	$service_url = $settings[0].'/api/contact/?title='.$title.'&givenName='.$givenname.'&surname='.$lastname.'&emailAddress='.$emailaddress.'&SourceCodeID='.$sourcecodeID;

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	$curl = curl_init();

	//$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_URL, $service_url);

	curl_setopt($curl, CURLOPT_POST, 1);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	

	// Call API

	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);



 	return(json_a);

	

}



/* Add course enquiry to Axcelerate. */

function course_enquiry($contactid, $comments, $type, $courseid, $emailto) {

	

	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Link_Settings();

	

	//Replaces spaces in comments string to be accepted by the post command.

	//$comments = str_replace(' ','%20',$comments);

	

	// Note Code ID = 4356 (Program Enquiry as defined by Axcelerate)

	// $service_url = $settings[0].'/api/course/enquire/?contactID='.$contactid.'&noteCodeID=4356&comments='.$comments.'&type='.$type.'&ID='.$courseid.'&emailTo='.$emailto;
	$service_url = $settings[0].'/api/course/enquire/';
	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$params = array(
		'contactID' => $contactid,		
		//'noteCodeID' => '4356',
		'comments' => $comments,
		'type' => $type,
		'emailTo' => $emailto,
		);

	$curl = curl_init();

	//$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_URL, $service_url);

	curl_setopt($curl, CURLOPT_POST, 1);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	

	// Call API

	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	//var_dump($json_a);

 	return(json_a);

	

}



/* Enrol contact to course in Axcelerate. */

function enrol_contact($contactid, $instanceid, $type, $payerid) {

	

	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Link_Settings();

	

	$service_url = $settings[0].'/api/course/enrol/?contactID='.$contactid.'&instanceID='.$instanceid.'&type='.$type.'&payerID='.$payerid;

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	$curl = curl_init();

	//$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_URL, $service_url);

	curl_setopt($curl, CURLOPT_POST, 1);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	

	// Call API

	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);



 	return(json_a);

	

}



/* Make payment for course in Axcelerate. */

function make_payment($payment_data) {

	

	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Link_Settings();

	

	$service_url = $settings[0].'/api/payment/?paymentAmount='.$payment_data["paymentAmount"].'contactID='.$payment_data["contactID"].'&payerID='.$payment_data["payerID"].'&instanceID='.$payment_data["InstanceID"].'&type='.$payment_data["type"].'&nameOnCard='.$payment_data["nameOnCard"].'&cardNumber='.$payment_data["cardNumber"].'&cardCCV='.$payment_data["cardCCV"].'&expiryMonth='.$payment_data["expiryMonth"].'&expiryYear='.$payment_data["expiryYear"].'&PONumber='.$payment_data["PONumber"];

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	$curl = curl_init();

	//$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_URL, $service_url);

	curl_setopt($curl, CURLOPT_POST, 1);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	

	// Call API

	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);



 	return(json_a);

	

}



/* Get all public contact sources from Axcelerate */

function get_contact_sources() {

	include_once 'axcelerate-link-dbdata.php';

	

	$settings = get_WordPress_Axcelerate_Link_Settings();

	

	$service_url = $settings[0].'/api/contact/sources';

	

	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	

	$curl = curl_init($service_url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



	// Call API

	$curl_response = curl_exec($curl);

		

	$json_a = json_decode($curl_response, true);

	

 	return(json_a);



}



/*json_to_table works with data that comes directly from the curl_response from the database. */

function json_to_table($curl_response){



	$data = json_decode($curl_response);

	$columns = array();



	echo "<table><tbody>";

	foreach ($data as $name => $values) {

		echo "<tr><td>$name</td>";

		foreach ($values as $k => $v) {

			echo "<td>$v</td>";

			$columns[$k] = $k;

		}

		echo "</tr>";

	}



	echo "</tbody><thead><tr><th>name</th>";

	foreach ($columns as $column) {

		echo "<th>$column</th>";

	}



	echo "</thead></table>";

		

	return(0);

}

function post_forgotpassword($username, $email){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/user/forgotPassword/';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$parameters = array(
		'username' => $username,
		'email' => $email,
	);
	//var_dump($parameters);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	//echo $json_a['STATUS'].'</br>';
	if($json_a['STATUS'] == 'success'){
		echo 'Forgot Password request sent successfully both for TIDE website and Axcelerate System.<br> Please check your email...';
	}
	//var_dump($json_a);
}

/* Followup */

function post_contact_followup_notes($contactID, $note){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/followUp/';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$parameters = array(
		'followUpContactID' => $contactID,
		'contactID' => $contactID,
		'followUpDate' => date("Y-m-d"),
		'note' => $note,
		'noteCodeID' => '', // to turn off the email sending when enrolling
	);
	// var_dump($parameters);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	var_dump($json_a);
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')){
        $ipaddress = getenv('HTTP_CLIENT_IP');
    }else if(getenv('HTTP_X_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    }else if(getenv('HTTP_X_FORWARDED')){
        $ipaddress = getenv('HTTP_X_FORWARDED');
    }else if(getenv('HTTP_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    }else if(getenv('HTTP_FORWARDED')){
       $ipaddress = getenv('HTTP_FORWARDED');
    }else if(getenv('REMOTE_ADDR')){
        $ipaddress = getenv('REMOTE_ADDR');
    }else{
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}

function getClientLocationByIPAddress($ipaddress, $latitude, $longitude){

	$service_url = 'ipinfo.io/'.$ipaddress.'/json';
	$blogtime = current_time( 'mysql' ); 
	list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );
 	

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	$ret_value = '';
	$long = "";
	$lat = "";
	foreach ($json_a as $key => $value) {
		if($key == 'loc'){
			$location = explode(",", $value);
			$lat = $location[0];
			$long = $location[1];
		}
	}
	$lat = $latitude;
	$long = $longitude;
	$ret_value .= 'IP Address : '.$ipaddress.'</br>';
	$ret_value .= 'Time :'.$hour.':'.$minute.':'.$second.'</br>';
	$ret_value .= 'Date :'.$today_year.'-'.$today_month.'-'.$today_day.'</br>';
	//$ret_value .= 'Location : <a href="http://maps.google.com/maps?z=12&t=m&q=loc:'.$lat.'+'.$long.'" target="_blank">Google Map</a></br>';
	return $ret_value;
}

/*
Description: enrol a contact
Author: Loremuel Gadrinab 
*/
function post_enroll_contact($contactID, $instanceID, $courseType, $entype, $invoiceID){
	$ret_msg = get_WordPress_Axcelerate_SRMS_regty_Settings();
	$settings = get_WordPress_Axcelerate_Link_Settings();
	$email_invoice = get_option('axcelerate_srms_mailinvoice');

	$service_url = $settings[0].'/api/course/enrol';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$parameters = array(
		'contactID' => $contactID,
		'instanceID' => $instanceID,
		'type' => $courseType,
		'invoiceID' => $invoiceID,
		// 'suppressEmail' => true, // to turn off the email sending when enrolling
	);
	// var_dump($parameters);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	$checker = 0;
	$invoiceID = '';
	foreach ($json_a as $key => $value) {
		if($key == 'CONTACTID'){
			$checker = 1;
		}
		if($key == 'INVOICEID'){
			$invoiceID = $value;
		}
	}	
	// var_dump($json_a);
	$retvalid = "";
	if($checker == 1){
		/*
		foreach ($json_a as $key => $value) {
			echo $key.' = '.$value.'</br>';
		}
		*/
		//$invoice = displayInvoiceDetail($invoiceID);
		//echo "Successfully Enrolled!";
		$contact_data = getContactInformation($contactID);
		if($entype == 'CreditCard'){
			if(!isTabDisabled('mail2')){
				$str_message_val = array(
					'first_name' => $contact_data['GIVENNAME'],
					'middle_name' => $contact_data['MIDDLENAME'],
					'last_name' => $contact_data['SURNAME'],
					'email' => $contact_data['EMAILADDRESS'],
					'instanceID' => $instanceID,
					'courseType' => $courseType,
					);

				sendEmail($contact_data['EMAILADDRESS'], $str_message_val, $entype, $courseType);
				//echo " Please Check your Email.";
			}
		}
		if($entype == 'DirectDeposit'){
			if(!isTabDisabled('mail3')){
				$str_message_val = array(
					'first_name' => $contact_data['GIVENNAME'],
					'middle_name' => $contact_data['MIDDLENAME'],
					'last_name' => $contact_data['SURNAME'],
					'email' => $contact_data['EMAILADDRESS'],
					'instanceID' => $instanceID,
					'courseType' => $courseType,
					);

				sendEmail($contact_data['EMAILADDRESS'], $str_message_val, $entype, $courseType);
				//echo " Please Check your Email.";
			}

		}
		/*
// send_invoice
		if($email_invoice[0] != 'true'){			
			$invoice_message = getInvoiceTemplate($contactID, $instanceID, $courseType, $invoiceID);
			$invoice_message = "hello";
			//echo $invoice_message;
			$subject = $email_invoice[3];					
			$header = "From: ".$email_invoice[2].' <'.$email_invoice[1].'>'."\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($contact_data['EMAILADDRESS'],$subject,$invoice_message,$header);			
		}
		*/
		

		$retvalid = 'success';
		echo str_replace('\"', '', $ret_msg[1]).'<br><br>';

	}else{
		echo "<span style='color:red;'>Error in your Enrolment! </span></br>";
		 //var_dump($json_a);
		foreach ($json_a as $key => $value) {
			if($key == 'MESSAGES'){
				echo "<span style='color:red;'>".$value."</span>";
			}
			if($key == 'MESSAGE'){
				echo "<span style='color:red;'>".$value."</span>";
			}
		}
		$retvalid = 'error';	
	}

	// Close the handle
	curl_close($curl);
	return $retvalid;
}

// 
function post_create_axcelerate_user($contactID, $username, $password){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/user/';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$parameters = array(
		'contactID' => $contactID,
		'username' => $username,
		'password' => $password,
		//`'roleID' => ,
		'suppressEmail' => true, // to turn off the email sending when enrolling

	);
	// var_dump($parameters);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	$checker = 0;

	foreach ($json_a as $key => $value) {
		if($key == 'CONTACTID'){
			$checker = 1;
		}
	}	
	// var_dump($json_a);

	if($checker == 1){
		//echo "<br>Axcelerate User Created!";
		echo '';
	}else{
		echo "<span style='color:red;'>Error in Creating Axcelerate User! </span></br>";
		 
		var_dump($json_a);	
	}

	// Close the handle
	curl_close($curl);


}

function setNewFileName($filename) {
    $info = pathinfo($filename);
    $ext  = empty($info['extension']) ? '' : '.' . $info['extension'];
    $name = $_POST['givenName'].'-'.$_POST['surname'].'-'.$_POST['emailAddress'];
    return $name . $ext;
}

function rename_attachment( $attachment_id ) {
    $post = get_post( $post_ID );
    $file = get_attached_file( $attachment_id );
    $path = pathinfo( $file );
    // change to $new_name = $count; if you want just the count as filename
    $new_name = $_POST['givenName'].'-'.$_POST['surname'].'-'.$_POST['emailAddress'];
    $new_file = $path['dirname'] . '/' . $new_name . '.' . $path['extension'];
    rename( $file, $new_file );    
    update_attached_file( $post_ID, $new_file );

}

function wp_modify_uploaded_file_names($image_name) {

    // Get the parent post ID, if there is one
    if( isset($_GET['post_id']) ) {
        $post_id = $_GET['post_id'];
    } elseif( isset($_POST['post_id']) ) {
        $post_id = $_POST['post_id'];
    }

    // Only do this if we got the post ID--otherwise they're probably in
    // The media section rather than uploading an image from a post.
    if(is_numeric($post_id)) {

        // Get the post slug
        $post_obj = get_post($post_id);
        $post_slug = $post_obj->post_name;

        // If we found a slug
        if($post_slug) {

            $random_number = rand(10000,99999);
            $image_name['name'] = $post_slug . '-' . $random_number . '.jpg';

        }

    }

    return $image_name;

}


/* 
Description: add contact from the contact detail form
Author: Loremuel Gadrinab 
*/
function filterCleanInput($input){
	$input = str_replace("'","",$input);
	$input = str_replace('"',"",$input);
	$input = str_replace("/","",$input);
	$input = str_replace("\"","",$input);
	$input = str_replace("\\","",$input);
	$input = str_replace("<","",$input);
	$input = str_replace(">","",$input);
	$input = str_replace("=","",$input);
	$input = str_replace("*","",$input);
	$input = str_replace(":","",$input);
	return $input;
}
function post_add_contact($wp_user_id, $courselist_off = null, $payment_off = null){ // $wp_user_id
	// require_once 'axcelerate-link-google-api.php';
	require_once 'axcelerate-link-functions.php';
	//$payment_off = get_option('axcelerate-payment-off');

	$DisabilityTypeIDs = '';
	if(isset($_POST['DisabilityTypeIDs'])){		
		foreach($_POST['DisabilityTypeIDs'] as $check) {
			$checked = filterCleanInput($check);
	        $DisabilityTypeIDs .= $checked.',';                          
	    }
	}

    $PriorEducationIDs = '';
    if(isset($_POST['priorEducationCheck'])){
    	foreach($_POST['priorEducationCheck'] as $check) {
    		$checked = filterCleanInput($check);
	        $PriorEducationIDs .= $checked.',';                          
	    }
    }

    $title = '';
    if(isset($_POST['title'])){
		$title = filterCleanInput($_POST['title']);
	}

    $givenName = '';
	if(isset($_POST['givenName'])){
		$givenName = filterCleanInput($_POST['givenName']);
	}

	$middleName = '';
	if(isset($_POST['middleName'])){
		$middleName = filterCleanInput($_POST['middleName']);
	}

	$surname = '';
	if(isset($_POST['surname'])){
		$surname = filterCleanInput($_POST['surname']);

	}

	$emailAddress = '';
	if(isset($_POST['emailAddress'])){
		$emailAddress = filterCleanInput($_POST['emailAddress']);
	}

	$dob = '';
	if(isset($_POST['dob'])){
		$dob = filterCleanInput($_POST['dob']);
	}

	$sex = '';
	if(isset($_POST['sex'])){
		$sex = filterCleanInput($_POST['sex']);
	}

	$workphone = '';
	if(isset($_POST['workphone'])){
		$workphone = filterCleanInput($_POST['workphone']);
	}

	$mobilephone = '';
	if(isset($_POST['mobilephone'])){
		$mobilephone = filterCleanInput($_POST['mobilephone']);
	}

	$phone = '';
	if(isset($_POST['phone'])){
		$phone = filterCleanInput($_POST['phone']);
	}

	$address1 = '';
	if(isset($_POST['address1'])){
		$address1 = filterCleanInput($_POST['address1']);
	}

	$address2 = '';
	if(isset($_POST['address2'])){
		$address2 = filterCleanInput($_POST['address2']);
	}

	$buildingName = '';
	if(isset($_POST['buildingName'])){
		$buildingName = filterCleanInput($_POST['buildingName']);
	}

	$unitNo = '';
	if(isset($_POST['unitNo'])){
		$unitNo = filterCleanInput($_POST['unitNo']);
	}

	$streetNo = '';
	if(isset($_POST['streetNo'])){
		$streetNo = filterCleanInput($_POST['streetNo']);
	}

	$streetName = '';
	if(isset($_POST['streetName'])){
		$streetName = filterCleanInput($_POST['streetName']);
	}

	$POBox = '';
	if(isset($_POST['POBox'])){
		$POBox = filterCleanInput($_POST['POBox']);
	}

	$city = '';
	if(isset($_POST['city'])){
		$city = filterCleanInput($_POST['city']);
	}

	$state = '';
	if(isset($_POST['state'])){
		$state = filterCleanInput($_POST['state']);
	}

	$postcode = '';
	if(isset($_POST['postcode'])){
		$postcode = filterCleanInput($_POST['postcode']);
	}

	$country = '';
	if(isset($_POST['country'])){
		$country = filterCleanInput($_POST['country']);
	}

	$saddress1 = '';
	if(isset($_POST['saddress1'])){
		$saddress1 = filterCleanInput($_POST['saddress1']);
	}

	$saddress2 = '';
	if(isset($_POST['saddress2'])){
		$saddress2 = filterCleanInput($_POST['saddress2']);
	}

	$sbuildingName = '';
	if(isset($_POST['sbuildingName'])){
		$sbuildingName = filterCleanInput($_POST['sbuildingName']);
	}

	$sunitNo = '';
	if(isset($_POST['sunitNo'])){
		$sunitNo = filterCleanInput($_POST['sunitNo']);
	}

	$sstreetNo = '';
	if(isset($_POST['sstreetNo'])){
		$sstreetNo = filterCleanInput($_POST['sstreetNo']);
	}

	$sstreetName = '';
	if(isset($_POST['sstreetName'])){
		$sstreetName = filterCleanInput($_POST['sstreetName']);
	}

	$sPOBox = '';
	if(isset($_POST['sPOBox'])){
		$sPOBox = filterCleanInput($_POST['sPOBox']);
	}

	$scity = '';
	if(isset($_POST['scity'])){
		$scity = filterCleanInput($_POST['scity']);
	}

	$sstate = '';
	if(isset($_POST['sstate'])){
		$sstate = filterCleanInput($_POST['sstate']);
	}

	$spostcode = '';
	if(isset($_POST['spostcode'])){
		$spostcode = filterCleanInput($_POST['spostcode']);
	}

	$scountry = '';
	if(isset($_POST['scountry'])){
		$scountry = filterCleanInput($_POST['scountry']);
	}
	
	$EmergencyContact = '';
	if(isset($_POST['EmergencyContact'])){
		$EmergencyContact = filterCleanInput($_POST['EmergencyContact']);
	}
	
	$EmergencyContactRelation = '';
	if(isset($_POST['EmergencyContactRelation'])){
		$EmergencyContactRelation = filterCleanInput($_POST['EmergencyContactRelation']);
	}
	
	$EmergencyContactPhone = '';
	if(isset($_POST['EmergencyContactPhone'])){
		$EmergencyContactPhone = filterCleanInput($_POST['EmergencyContactPhone']);
	}
	
	$CountryofBirthID = '';
	if(isset($_POST['CountryofBirthID'])){
		$CountryofBirthID = filterCleanInput($_POST['CountryofBirthID']);
	}
	
	$CityofBirth = '';
	if(isset($_POST['CityofBirth'])){
		$CityofBirth = filterCleanInput($_POST['CityofBirth']);
	}
	
	$CountryofCitizenID = '';
	if(isset($_POST['CountryofCitizenID'])){
		$CountryofCitizenID = filterCleanInput($_POST['CountryofCitizenID']);
	}
	
	$CitizenStatusID = '';
	if(isset($_POST['CitizenStatusID'])){
		$CitizenStatusID = filterCleanInput($_POST['CitizenStatusID']);
	}
	
	$IndigenousStatusID = '';
	if(isset($_POST['IndigenousStatusID'])){
		$IndigenousStatusID = filterCleanInput($_POST['IndigenousStatusID']);
	}
	
	$DisabilityFlag = '';
	if(isset($_POST['DisabilityFlag'])){
		$DisabilityFlag = filterCleanInput($_POST['DisabilityFlag']);
	}
	
	$LabourForceID = '';
	if(isset($_POST['LabourForceID'])){
		$LabourForceID = filterCleanInput($_POST['LabourForceID']);
	}
	
	$ANZSCOCode = '';
	if(isset($_POST['ANZSCOCode'])){
		$ANZSCOCode = filterCleanInput($_POST['ANZSCOCode']);
	}
	
	$ANZSICCode = '';
	if(isset($_POST['ANZSICCode'])){
		$ANZSICCode = filterCleanInput($_POST['ANZSICCode']);
	}
	
	$AtSchoolFlag = '';
	if(isset($_POST['AtSchoolFlag'])){
		$AtSchoolFlag = filterCleanInput($_POST['AtSchoolFlag']);
	}
	
	$AtSchoolName = '';
	if(isset($_POST['AtSchoolName'])){
		$AtSchoolName = filterCleanInput($_POST['AtSchoolName']);
	}
	
	$HighestSchoolLevelID = '';
	if(isset($_POST['HighestSchoolLevelID'])){
		$HighestSchoolLevelID = filterCleanInput($_POST['HighestSchoolLevelID']);
	}
	
	$HighestSchoolLevelYear = '';
	if(isset($_POST['HighestSchoolLevelYear'])){
		$HighestSchoolLevelYear = filterCleanInput($_POST['HighestSchoolLevelYear']);
	}
	
	$PriorEducationStatus = '';
	if(isset($_POST['PriorEducationStatus'])){
		$PriorEducationStatus = filterCleanInput($_POST['PriorEducationStatus']);
	}
	
	$LUI = '';
	if(isset($_POST['LUI'])){
		$LUI = filterCleanInput($_POST['LUI']);
	}

	$USI = '';
	if(isset($_POST['USI'])){
		$USI = filterCleanInput($_POST['USI']);
	}

	$MainLanguageID ='';
	if(isset($_POST['MainLanguageID'])){
		$MainLanguageID = filterCleanInput($_POST['MainLanguageID']);
	}
	$EnglishProficiencyID ='';
	if(isset($_POST['EnglishProficiencyID'])){
		$EnglishProficiencyID = filterCleanInput($_POST['EnglishProficiencyID']);
	}
	$EnglishAssistanceFlag ='';
	if(isset($_POST['EnglishAssistanceFlag'])){
		$EnglishAssistanceFlag = filterCleanInput($_POST['EnglishAssistanceFlag']);
	}
	$instanceID = '';
	if(isset($_POST['instanceID'])){
		$instanceID = filterCleanInput($_POST['instanceID']);
	}
	$courseType = '';
	if(isset($_POST['courseType'])){
		$courseType = filterCleanInput($_POST['courseType']);
	}
	$Username = '';
	if(isset($_POST['newusername'])){
		$Username = filterCleanInput($_POST['newusername']);
	}
	$Password = '';
	if(isset($_POST['newpassword'])){
		$Password = filterCleanInput($_POST['newpassword']);
	}
	$createUSIfield = '';
	if(isset($_POST['createUSIfield'])){
		$createUSIfield = filterCleanInput($_POST['createUSIfield']);
	}
	    
	$parameters = array(
		// Contact Details
		'title' => $title,
        'givenName' => $givenName,
        'middleName' =>  $middleName,
        'surname' =>  $surname,
        'emailAddress' =>  $emailAddress,
        'dob' =>  $dob,
        'sex' =>  $sex,
		'workphone' => $workphone,
		'mobilephone' => $mobilephone,
		'phone' => $phone,
		'address1' => $address1,
		'address2' => $address2,
		'buildingName' => $buildingName,
		'unitNo' => $unitNo,
		'streetNo' => $streetNo,
		'streetName' => $streetName,
		'POBox' => $POBox,
		'city' => $city,
		'state' => $state,
		'postcode' => $postcode,
		'country' => $country,
		'saddress1' => $saddress1,
		'saddress2' => $saddress2,
		'sbuildingName' => $sbuildingName,
		'sunitNo' => $sunitNo,
		'sstreetNo' => $sstreetNo,
		'sstreetName' => $sstreetName,
		'sPOBox' => $sPOBox,
		'scity' => $scity,
		'sstate' => $sstate,
		'spostcode' => $spostcode,
		'scountry' => $scountry,
		'EmergencyContact' => $EmergencyContact,
		'EmergencyContactRelation' => $EmergencyContactRelation,
		'EmergencyContactPhone' => $EmergencyContactPhone,
		// Personal Details
		'CountryofBirthID' => $CountryofBirthID,
		'CityofBirth' => $CityofBirth,
		'CountryofCitizenID' => $CountryofCitizenID,
		'CitizenStatusID' => $CitizenStatusID,
		'IndigenousStatusID' => $IndigenousStatusID,
		'DisabilityFlag' => $DisabilityFlag,
		'DisabilityTypeIDs' => $DisabilityTypeIDs,
		//Employment and Education
		'LabourForceID' => $LabourForceID,
		'ANZSCOCode' => $ANZSCOCode,
		'ANZSICCode' => $ANZSICCode,
		'AtSchoolFlag' => $AtSchoolFlag,
		'AtSchoolName' => $AtSchoolName,
		'HighestSchoolLevelID' => $HighestSchoolLevelID,
		'HighestSchoolLevelYear' => $HighestSchoolLevelYear,
		'PriorEducationStatus' => $PriorEducationStatus,
		'PriorEducationIDs' => $PriorEducationIDs,
		'LUI' => $LUI,
		'USI' => $USI,
		'MainLanguageID' => $MainLanguageID,
		'EnglishProficiencyID' => $EnglishProficiencyID,
		'EnglishAssistanceFlag' => $EnglishAssistanceFlag,
		'Password' => $Password,
		'suppressEmail' => true, // to turn off the email sending when enrolling
	);

	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/contact/';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	$contactID = '';
	foreach ($json_a as $key => $value) {
		if($key == 'CONTACTID'){
			$checker = 1;
			$contactID = $value;
		}
	}	
	$retvalid = "";
	if($checker == 1){
		//echo "Successfully Registered!";
		if(!isTabDisabled('mail1')){
			$str_message_val = array(
				'first_name' => $givenName,
				'middle_name' => $middleName,
				'last_name' => $surname,
				'email' => $emailAddress,
				'username' => $Username,
				'password' => $Password,
				'instanceID' => $instanceID,
				'courseType' => $courseType,
				);

			sendEmail($emailAddress, $str_message_val, 'registration&enrollment', $courseType);
			//echo ' Please check you Email for confirmation.';
		}
		//echo '<br>';
		// 
		if($Username != ''){
			post_create_axcelerate_user($contactID, $Username, $Password);
		}
		
		if($wp_user_id){
			update_user_meta( $wp_user_id, 'contactID', $contactID );
		}
		
		//echo 'test user';
		$note = '';
		$file_arr = array();
		//$googleDrive = get_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API();
		if(!empty($_FILES['fileDriverLiscence']['name'])){
			//echo 'fileDriverLiscence';
			$fileDriverLiscence = axl_gdwpm_custom_upload_filter($_FILES['fileDriverLiscence'], $givenName.$surname.'-'.$emailAddress.'-DriverLiscenceFront');
			$note .= '<br> <a href="https://www.googledrive.com/host/'.$fileDriverLiscence.'" target="_blank">Driver\'s Licence Front</a> <br> ';
			$file_arr['fileDriverLiscence'] = $fileDriverLiscence;
			//echo $note;
		}
		if(!empty($_FILES['fileDriverLiscence2']['name'])){
			//echo 'fileDriverLiscence2';
			$fileDriverLiscence2 = axl_gdwpm_custom_upload_filter($_FILES['fileDriverLiscence2'], $givenName.$surname.'-'.$emailAddress.'-DriverLiscenceBack');
			$note .= '<a href="https://www.googledrive.com/host/'.$fileDriverLiscence2.'" target="_blank">Driver\'s Licence Back</a> <br> ';
			$file_arr['fileDriverLiscence2'] = $fileDriverLiscence2;
			//echo $note;
		}
		if(!empty($_FILES['fileMedicLiscence']['name'])){
			//echo 'fileMedicLiscence';
			$fileMedicLiscence = axl_gdwpm_custom_upload_filter($_FILES['fileMedicLiscence'], $givenName.$surname.'-'.$emailAddress.'-MedicareCard');
			$note .= '<a href="https://www.googledrive.com/host/'.$fileMedicLiscence.'" target="_blank">Medicare Card</a> <br>';
			$file_arr['fileMedicLiscence'] = $fileMedicLiscence;
			//echo $note;
		}
		if(!empty($_FILES['referralform']['name'])){
			//echo 'referralform';
			//$fileReferral = axl_gdwpm_custom_upload_filter($_FILES['referralform'], $givenName.$surname.'-'.$emailAddress.'-ReferralForm', 'ReferralForm');
			$note .= '<a href="https://www.googledrive.com/host/'.$fileReferral.'" target="_blank">Referral Form</a> <br>';
			//echo $note;
		}
		//if($note != ''){
		if(get_option('axl_auto_wp_geographic_note') != 'true'){
			$note .= '</br></br><b>Client Registration Location Information:</b></br>';
			$note .= getClientLocationByIPAddress(get_client_ip(), filterCleanInput($_POST['latitude']), filterCleanInput($_POST['longitude']));
		}
		
		
		$pdf_content = setContactHTMLtoPDFdisplay($contactID, $file_arr);

		
		$filepdf = axl_gdwpm_custom_upload_filter('newfile.pdf', $givenName.$surname.'-'.$emailAddress.'-Data', 'pdf-file', $pdf_content);
		$blogtime = current_time( 'mysql' ); 
		list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );
		$ddate = $today_year.'-'.$today_month.'-'.$today_day.' :'.$hour.':'.$minute.':'.$second;
		$note .= '<br><a href="'.$filepdf.'" target="_blank">File Record : '.$ddate.'</a>';
		if($createUSIfield != ''){
			$note .= '<br><br>'.$createUSIfield;
		}
		course_enquiry($contactID, $note, '', '', '');

		// 
		if($courselist_off != 'true'){
			if($payment_off == 'true'){
				post_enroll_contact($contactID, $instanceID, $courseType, 'CreditCard', 0);
			}

		}
			
			
		//}
		
		//$retvalid = 'success';
		$retvalid = array('success', $contactID);
		//echo $retvalid;
		
	}else{
		echo "<span style='color:red;'>Error in your Registration! </span></br>";
		// var_dump($json_a);
		foreach ($json_a as $key => $value) {
			if($key == 'DETAILS'){
				echo "<span style='color:red;'>".$value."</span>";
			}
		}

		$retvalid = 'error';	
	}

	// Close the handle
	curl_close($curl);
	return $retvalid;
}

// update contact details
function post_update_contact($contactID){
	
	require_once 'axcelerate-link-functions.php';

	$DisabilityTypeIDs = '';
	if(isset($_POST['DisabilityTypeIDs'])){		
		foreach($_POST['DisabilityTypeIDs'] as $check) {
			$checked = filterCleanInput($check);
	        $DisabilityTypeIDs .= $checked.',';                          
	    }
	}

    $PriorEducationIDs = '';
    if(isset($_POST['priorEducationCheck'])){
    	foreach($_POST['priorEducationCheck'] as $check) {
    		$checked = filterCleanInput($check);
	        $PriorEducationIDs .= $checked.',';                          
	    }
    }

    $title = '';
    if(isset($_POST['title'])){
		$title = filterCleanInput($_POST['title']);
	}

    $givenName = '';
	if(isset($_POST['givenName'])){
		$givenName = filterCleanInput($_POST['givenName']);
	}

	$middleName = '';
	if(isset($_POST['middleName'])){
		$middleName = filterCleanInput($_POST['middleName']);
	}

	$surname = '';
	if(isset($_POST['surname'])){
		$surname = filterCleanInput($_POST['surname']);

	}

	$emailAddress = '';
	if(isset($_POST['emailAddress'])){
		$emailAddress = filterCleanInput($_POST['emailAddress']);
	}

	$dob = '';
	if(isset($_POST['dob'])){
		$dob = filterCleanInput($_POST['dob']);
	}

	$sex = '';
	if(isset($_POST['sex'])){
		$sex = filterCleanInput($_POST['sex']);
	}

	$workphone = '';
	if(isset($_POST['workphone'])){
		$workphone = filterCleanInput($_POST['workphone']);
	}

	$mobilephone = '';
	if(isset($_POST['mobilephone'])){
		$mobilephone = filterCleanInput($_POST['mobilephone']);
	}

	$phone = '';
	if(isset($_POST['phone'])){
		$phone = filterCleanInput($_POST['phone']);
	}

	$address1 = '';
	if(isset($_POST['address1'])){
		$address1 = filterCleanInput($_POST['address1']);
	}

	$address2 = '';
	if(isset($_POST['address2'])){
		$address2 = filterCleanInput($_POST['address2']);
	}

	$buildingName = '';
	if(isset($_POST['buildingName'])){
		$buildingName = filterCleanInput($_POST['buildingName']);
	}

	$unitNo = '';
	if(isset($_POST['unitNo'])){
		$unitNo = filterCleanInput($_POST['unitNo']);
	}

	$streetNo = '';
	if(isset($_POST['streetNo'])){
		$streetNo = filterCleanInput($_POST['streetNo']);
	}

	$streetName = '';
	if(isset($_POST['streetName'])){
		$streetName = filterCleanInput($_POST['streetName']);
	}

	$POBox = '';
	if(isset($_POST['POBox'])){
		$POBox = filterCleanInput($_POST['POBox']);
	}

	$city = '';
	if(isset($_POST['city'])){
		$city = filterCleanInput($_POST['city']);
	}

	$state = '';
	if(isset($_POST['state'])){
		$state = filterCleanInput($_POST['state']);
	}

	$postcode = '';
	if(isset($_POST['postcode'])){
		$postcode = filterCleanInput($_POST['postcode']);
	}

	$country = '';
	if(isset($_POST['country'])){
		$country = filterCleanInput($_POST['country']);
	}

	$saddress1 = '';
	if(isset($_POST['saddress1'])){
		$saddress1 = filterCleanInput($_POST['saddress1']);
	}

	$saddress2 = '';
	if(isset($_POST['saddress2'])){
		$saddress2 = filterCleanInput($_POST['saddress2']);
	}

	$sbuildingName = '';
	if(isset($_POST['sbuildingName'])){
		$sbuildingName = filterCleanInput($_POST['sbuildingName']);
	}

	$sunitNo = '';
	if(isset($_POST['sunitNo'])){
		$sunitNo = filterCleanInput($_POST['sunitNo']);
	}

	$sstreetNo = '';
	if(isset($_POST['sstreetNo'])){
		$sstreetNo = filterCleanInput($_POST['sstreetNo']);
	}

	$sstreetName = '';
	if(isset($_POST['sstreetName'])){
		$sstreetName = filterCleanInput($_POST['sstreetName']);
	}

	$sPOBox = '';
	if(isset($_POST['sPOBox'])){
		$sPOBox = filterCleanInput($_POST['sPOBox']);
	}

	$scity = '';
	if(isset($_POST['scity'])){
		$scity = filterCleanInput($_POST['scity']);
	}

	$sstate = '';
	if(isset($_POST['sstate'])){
		$sstate = filterCleanInput($_POST['sstate']);
	}

	$spostcode = '';
	if(isset($_POST['spostcode'])){
		$spostcode = filterCleanInput($_POST['spostcode']);
	}

	$scountry = '';
	if(isset($_POST['scountry'])){
		$scountry = filterCleanInput($_POST['scountry']);
	}
	
	$EmergencyContact = '';
	if(isset($_POST['EmergencyContact'])){
		$EmergencyContact = filterCleanInput($_POST['EmergencyContact']);
	}
	
	$EmergencyContactRelation = '';
	if(isset($_POST['EmergencyContactRelation'])){
		$EmergencyContactRelation = filterCleanInput($_POST['EmergencyContactRelation']);
	}
	
	$EmergencyContactPhone = '';
	if(isset($_POST['EmergencyContactPhone'])){
		$EmergencyContactPhone = filterCleanInput($_POST['EmergencyContactPhone']);
	}
	
	$CountryofBirthID = '';
	if(isset($_POST['CountryofBirthID'])){
		$CountryofBirthID = filterCleanInput($_POST['CountryofBirthID']);
	}
	
	$CityofBirth = '';
	if(isset($_POST['CityofBirth'])){
		$CityofBirth = filterCleanInput($_POST['CityofBirth']);
	}
	
	$CountryofCitizenID = '';
	if(isset($_POST['CountryofCitizenID'])){
		$CountryofCitizenID = filterCleanInput($_POST['CountryofCitizenID']);
	}
	
	$CitizenStatusID = '';
	if(isset($_POST['CitizenStatusID'])){
		$CitizenStatusID = filterCleanInput($_POST['CitizenStatusID']);
	}
	
	$IndigenousStatusID = '';
	if(isset($_POST['IndigenousStatusID'])){
		$IndigenousStatusID = filterCleanInput($_POST['IndigenousStatusID']);
	}
	
	$DisabilityFlag = '';
	if(isset($_POST['DisabilityFlag'])){
		$DisabilityFlag = filterCleanInput($_POST['DisabilityFlag']);
	}
	
	$LabourForceID = '';
	if(isset($_POST['LabourForceID'])){
		$LabourForceID = filterCleanInput($_POST['LabourForceID']);
	}
	
	$ANZSCOCode = '';
	if(isset($_POST['ANZSCOCode'])){
		$ANZSCOCode = filterCleanInput($_POST['ANZSCOCode']);
	}
	
	$ANZSICCode = '';
	if(isset($_POST['ANZSICCode'])){
		$ANZSICCode = filterCleanInput($_POST['ANZSICCode']);
	}
	
	$AtSchoolFlag = '';
	if(isset($_POST['AtSchoolFlag'])){
		$AtSchoolFlag = filterCleanInput($_POST['AtSchoolFlag']);
	}
	
	$AtSchoolName = '';
	if(isset($_POST['AtSchoolName'])){
		$AtSchoolName = filterCleanInput($_POST['AtSchoolName']);
	}
	
	$HighestSchoolLevelID = '';
	if(isset($_POST['HighestSchoolLevelID'])){
		$HighestSchoolLevelID = filterCleanInput($_POST['HighestSchoolLevelID']);
	}
	
	$HighestSchoolLevelYear = '';
	if(isset($_POST['HighestSchoolLevelYear'])){
		$HighestSchoolLevelYear = filterCleanInput($_POST['HighestSchoolLevelYear']);
	}
	
	$PriorEducationStatus = '';
	if(isset($_POST['PriorEducationStatus'])){
		$PriorEducationStatus = filterCleanInput($_POST['PriorEducationStatus']);
	}
	
	$LUI = '';
	if(isset($_POST['LUI'])){
		$LUI = filterCleanInput($_POST['LUI']);
	}

	$USI = '';
	if(isset($_POST['USI'])){
		$USI = filterCleanInput($_POST['USI']);
	}

	$MainLanguageID ='';
	if(isset($_POST['MainLanguageID'])){
		$MainLanguageID = filterCleanInput($_POST['MainLanguageID']);
	}
	$EnglishProficiencyID ='';
	if(isset($_POST['EnglishProficiencyID'])){
		$EnglishProficiencyID = filterCleanInput($_POST['EnglishProficiencyID']);
	}
	$EnglishAssistanceFlag ='';
	if(isset($_POST['EnglishAssistanceFlag'])){
		$EnglishAssistanceFlag = filterCleanInput($_POST['EnglishAssistanceFlag']);
	}

	$parameters = array(
		// Contact Details
		'title' => $title,
        'givenName' => $givenName,
        'middleName' =>  $middleName,
        'surname' =>  $surname,
        'emailAddress' =>  $emailAddress,
        'dob' =>  $dob,
        'sex' =>  $sex,
		'workphone' => $workphone,
		'mobilephone' => $mobilephone,
		'phone' => $phone,
		'address1' => $address1,
		'address2' => $address2,
		'buildingName' => $buildingName,
		'unitNo' => $unitNo,
		'streetNo' => $streetNo,
		'streetName' => $streetName,
		'POBox' => $POBox,
		'city' => $city,
		'state' => $state,
		'postcode' => $postcode,
		'country' => $country,
		'saddress1' => $saddress1,
		'saddress2' => $saddress2,
		'sbuildingName' => $sbuildingName,
		'sunitNo' => $sunitNo,
		'sstreetNo' => $sstreetNo,
		'sstreetName' => $sstreetName,
		'sPOBox' => $sPOBox,
		'scity' => $scity,
		'sstate' => $sstate,
		'spostcode' => $spostcode,
		'scountry' => $scountry,
		'EmergencyContact' => $EmergencyContact,
		'EmergencyContactRelation' => $EmergencyContactRelation,
		'EmergencyContactPhone' => $EmergencyContactPhone,
		// Personal Details
		'CountryofBirthID' => $CountryofBirthID,
		'CityofBirth' => $CityofBirth,
		'CountryofCitizenID' => $CountryofCitizenID,
		'CitizenStatusID' => $CitizenStatusID,
		'IndigenousStatusID' => $IndigenousStatusID,
		'DisabilityFlag' => $DisabilityFlag,
		'DisabilityTypeIDs' => $DisabilityTypeIDs,
		//Employment and Education
		'LabourForceID' => $LabourForceID,
		'ANZSCOCode' => $ANZSCOCode,
		'ANZSICCode' => $ANZSICCode,
		'AtSchoolFlag' => $AtSchoolFlag,
		'AtSchoolName' => $AtSchoolName,
		'HighestSchoolLevelID' => $HighestSchoolLevelID,
		'HighestSchoolLevelYear' => $HighestSchoolLevelYear,
		'PriorEducationStatus' => $PriorEducationStatus,
		'PriorEducationIDs' => $PriorEducationIDs,
		'LUI' => $LUI,
		'USI' => $USI,
		'MainLanguageID' => $MainLanguageID,
		'EnglishProficiencyID' => $EnglishProficiencyID,
		'EnglishAssistanceFlag' => $EnglishAssistanceFlag,
	);

	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/contact/'.$contactID;
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	//curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	//var_dump($json_a);
	
	$retvalid = "";
	$file_arr = array();
	if($json_a['CONTACTID']){

		$note = '';
		//$googleDrive = get_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API();
		if(!empty($_FILES['fileDriverLiscence']['name'])){
			//echo 'fileDriverLiscence';
			$fileDriverLiscence = axl_gdwpm_custom_upload_filter($_FILES['fileDriverLiscence'], $givenName.$surname.'-'.$emailAddress.'-DriverLiscenceFront');
			$note .= '<br> <a href="https://www.googledrive.com/host/'.$fileDriverLiscence.'" target="_blank">Driver\'s Licence Front</a> <br> ';
			$file_arr['fileDriverLiscence'] = $fileDriverLiscence;
			//echo $note;
		}
		if(!empty($_FILES['fileDriverLiscence2']['name'])){
			//echo 'fileDriverLiscence2';
			$fileDriverLiscence2 = axl_gdwpm_custom_upload_filter($_FILES['fileDriverLiscence2'], $givenName.$surname.'-'.$emailAddress.'-DriverLiscenceBack');
			$note .= '<a href="https://www.googledrive.com/host/'.$fileDriverLiscence2.'" target="_blank">Driver\'s Licence Back</a> <br> ';
			$file_arr['fileDriverLiscence2'] = $fileDriverLiscence2;
			//echo $note;
		}
		if(!empty($_FILES['fileMedicLiscence']['name'])){
			//echo 'fileMedicLiscence';
			$fileMedicLiscence = axl_gdwpm_custom_upload_filter($_FILES['fileMedicLiscence'], $givenName.$surname.'-'.$emailAddress.'-MedicareCard');
			$note .= '<a href="https://www.googledrive.com/host/'.$fileMedicLiscence.'" target="_blank">Medicare Card</a><br>';
			$file_arr['fileMedicLiscence'] = $fileMedicLiscence;
			//echo $note;
		}
		$pdf_content = setContactHTMLtoPDFdisplay($contactID, $file_arr);
		$filepdf = axl_gdwpm_custom_upload_filter('newfile.pdf', $givenName.$surname.'-'.$emailAddress.'-Data', 'pdf-file', $pdf_content);
		$blogtime = current_time( 'mysql' ); 
		list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );
		$ddate = $today_year.'-'.$today_month.'-'.$today_day.' :'.$hour.':'.$minute.':'.$second;
		$note .= '<br><a href="'.$filepdf.'" target="_blank">File Record : '.$ddate.'</a>';
		if($note){
			course_enquiry($contactID, $note, '', '', '');
		}
		
		echo "Your update was Successfully saved!<br>";
		$retvalid = 'success';

	}else{
			echo "<span style='color:red;'>Error in your Update! </span></br>";
		

			$retvalid = 'error';	
		}

	// Close the handle
	curl_close($curl);
	return $retvalid;
}

// 
function postCreateNewWPUser(){
	$n_username = filterCleanInput($_POST['newusername']);
	$n_email = filterCleanInput($_POST['emailAddress']);
	$n_password = filterCleanInput($_POST['newpassword']);
	$n_givenName = filterCleanInput($_POST['givenName']);
	$n_surname = filterCleanInput($_POST['surname']);
	$n_middleName = filterCleanInput($_POST['middleName']);
	$n_newusername = filterCleanInput($_POST['newusername']);
	$n_title = filterCleanInput($_POST['title']);
	$n_sex = filterCleanInput($_POST['sex']);
	$n_dob = filterCleanInput($_POST['dob']);

	$user_id = username_exists($n_username);
	$user_email = email_exists($n_email);
	if ( !$user_id and $user_email == false ) {
		//$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );

		$user_id = wp_create_user( $n_username, $n_password, $n_email );
		if ( is_wp_error( $user_id ) ){
			echo $user_id->get_error_message().'<br>';
			return false;
		}
   			
		if($user_id){
			update_user_meta( $user_id, 'first_name', $n_givenName );
			update_user_meta( $user_id, 'last_name', $n_surname );
			update_user_meta( $user_id, 'middle_name', $n_middleName );
			update_user_meta( $user_id, 'nickname', $n_newusername );
			update_user_meta( $user_id, 'title', $n_title );
			update_user_meta( $user_id, 'gender', $n_sex );
			update_user_meta( $user_id, 'dob', $n_dob );
			//echo 'created new user';
			return $user_id;
		}else{
			echo "<span style='color:red;'>not created new user</span>";
		}
	} 
	//echo 'User is aleady Exist!.';
	return false;
}

function update_WordPress_Axcelerate_Link_SRMS_Form_Settings(){
	
	// Personal Data
	// Personal Data Field Option
	update_option('axceleratelink_srms_opt_title', $_POST['al_srms_opt_title']);
	update_option('axceleratelink_srms_opt_givenName', $_POST['al_srms_opt_givenName']);
	update_option('axceleratelink_srms_opt_middleName', $_POST['al_srms_opt_middleName']);
	update_option('axceleratelink_srms_opt_surname', $_POST['al_srms_opt_surname']);
	update_option('axceleratelink_srms_opt_emailAddress', $_POST['al_srms_opt_emailAddress']);
	update_option('axceleratelink_srms_opt_dob', $_POST['al_srms_opt_dob']);
	update_option('axceleratelink_srms_opt_sex', $_POST['al_srms_opt_sex']);
	// Personal Data Field Title
	update_option('axceleratelink_srms_opt_tit_title', $_POST['al_srms_opt_tit_title']);
	update_option('axceleratelink_srms_opt_tit_givenName', $_POST['al_srms_opt_tit_givenName']);
	update_option('axceleratelink_srms_opt_tit_middleName', $_POST['al_srms_opt_tit_middleName']);
	update_option('axceleratelink_srms_opt_tit_surname', $_POST['al_srms_opt_tit_surname']);
	update_option('axceleratelink_srms_opt_tit_emailAddress', $_POST['al_srms_opt_tit_emailAddress']);
	update_option('axceleratelink_srms_opt_tit_dob', $_POST['al_srms_opt_tit_dob']);
	update_option('axceleratelink_srms_opt_tit_sex', $_POST['al_srms_opt_tit_sex']);

	// Contact Data
	// Contact Data Field Option
	update_option('axceleratelink_srms_opt_workphone', $_POST['al_srms_opt_workphone']);
	update_option('axceleratelink_srms_opt_mobilephone', $_POST['al_srms_opt_mobilephone']);
	update_option('axceleratelink_srms_opt_phone', $_POST['al_srms_opt_phone']);
	update_option('axceleratelink_srms_opt_EmergencyContact', $_POST['al_srms_opt_EmergencyContact']);
	update_option('axceleratelink_srms_opt_EmergencyContactRelation', $_POST['al_srms_opt_EmergencyContactRelation']);
	update_option('axceleratelink_srms_opt_EmergencyContactPhone', $_POST['al_srms_opt_EmergencyContactPhone']);
	// Contact Data Field Title
	update_option('axceleratelink_srms_opt_tit_workphone', $_POST['al_srms_opt_tit_workphone']);
	update_option('axceleratelink_srms_opt_tit_mobilephone', $_POST['al_srms_opt_tit_mobilephone']);
	update_option('axceleratelink_srms_opt_tit_phone', $_POST['al_srms_opt_tit_phone']);
	update_option('axceleratelink_srms_opt_tit_EmergencyContact', $_POST['al_srms_opt_tit_EmergencyContact']);
	update_option('axceleratelink_srms_opt_tit_EmergencyContactRelation', $_POST['al_srms_opt_tit_EmergencyContactRelation']);
	update_option('axceleratelink_srms_opt_tit_EmergencyContactPhone', $_POST['al_srms_opt_tit_EmergencyContactPhone']);

	// Address Data
	// Address Data Field Option
	update_option('axceleratelink_srms_opt_buildingName', $_POST['al_srms_opt_buildingName']);
	update_option('axceleratelink_srms_opt_unitNo', $_POST['al_srms_opt_unitNo']);
	update_option('axceleratelink_srms_opt_street', $_POST['al_srms_opt_street']);
	update_option('axceleratelink_srms_opt_POBox', $_POST['al_srms_opt_POBox']);
	update_option('axceleratelink_srms_opt_city', $_POST['al_srms_opt_city']);
	update_option('axceleratelink_srms_opt_state', $_POST['al_srms_opt_state']);
	update_option('axceleratelink_srms_opt_postcode', $_POST['al_srms_opt_postcode']);
	update_option('axceleratelink_srms_opt_country', $_POST['al_srms_opt_country']);
	update_option('axceleratelink_srms_opt_checkboxSamePostal', $_POST['al_srms_opt_checkboxSamePostal']);
	update_option('axceleratelink_srms_opt_sbuildingName', $_POST['al_srms_opt_sbuildingName']);
	update_option('axceleratelink_srms_opt_sunitNo', $_POST['al_srms_opt_sunitNo']);
	update_option('axceleratelink_srms_opt_sstreet', $_POST['al_srms_opt_sstreet']);
	update_option('axceleratelink_srms_opt_sPOBox', $_POST['al_srms_opt_sPOBox']);
	update_option('axceleratelink_srms_opt_scity', $_POST['al_srms_opt_scity']);
	update_option('axceleratelink_srms_opt_sstate', $_POST['al_srms_opt_sstate']);
	update_option('axceleratelink_srms_opt_spostcode', $_POST['al_srms_opt_spostcode']);
	update_option('axceleratelink_srms_opt_scountry', $_POST['al_srms_opt_scountry']);
	update_option('axceleratelink_srms_opt_upmsg', $_POST['al_srms_tab3_sub_title_msg']);
	
	// Address Data Field Title
	update_option('axceleratelink_srms_opt_tit_buildingName', $_POST['al_srms_opt_tit_buildingName']);
	update_option('axceleratelink_srms_opt_tit_unitNo', $_POST['al_srms_opt_tit_unitNo']);
	update_option('axceleratelink_srms_opt_tit_street', $_POST['al_srms_opt_tit_street']);
	update_option('axceleratelink_srms_opt_tit_POBox', $_POST['al_srms_opt_tit_POBox']);
	update_option('axceleratelink_srms_opt_tit_city', $_POST['al_srms_opt_tit_city']);
	update_option('axceleratelink_srms_opt_tit_state', $_POST['al_srms_opt_tit_state']);
	update_option('axceleratelink_srms_opt_tit_postcode', $_POST['al_srms_opt_tit_postcode']);
	update_option('axceleratelink_srms_opt_tit_country', $_POST['al_srms_opt_tit_country']);
	update_option('axceleratelink_srms_opt_tit_checkboxSamePostal', $_POST['al_srms_opt_tit_checkboxSamePostal']);
	update_option('axceleratelink_srms_opt_tit_sbuildingName', $_POST['al_srms_opt_tit_sbuildingName']);
	update_option('axceleratelink_srms_opt_tit_sunitNo', $_POST['al_srms_opt_tit_sunitNo']);
	update_option('axceleratelink_srms_opt_tit_sstreet', $_POST['al_srms_opt_tit_sstreet']);
	update_option('axceleratelink_srms_opt_tit_sPOBox', $_POST['al_srms_opt_tit_sPOBox']);
	update_option('axceleratelink_srms_opt_tit_scity', $_POST['al_srms_opt_tit_scity']);
	update_option('axceleratelink_srms_opt_tit_sstate', $_POST['al_srms_opt_tit_sstate']);
	update_option('axceleratelink_srms_opt_tit_spostcode', $_POST['al_srms_opt_tit_spostcode']);
	update_option('axceleratelink_srms_opt_tit_scountry', $_POST['al_srms_opt_tit_scountry']);

	// Demographics Data
	// Demographics Data Field Option
	update_option('axceleratelink_srms_opt_CountryofBirthID', $_POST['al_srms_opt_CountryofBirthID']);
	update_option('axceleratelink_srms_opt_CityofBirth', $_POST['al_srms_opt_CityofBirth']);
	update_option('axceleratelink_srms_opt_CountryofCitizenID', $_POST['al_srms_opt_CountryofCitizenID']);
	update_option('axceleratelink_srms_opt_CitizenStatusID', $_POST['al_srms_opt_CitizenStatusID']);
	update_option('axceleratelink_srms_opt_IndigenousStatusID', $_POST['al_srms_opt_IndigenousStatusID']);
	update_option('axceleratelink_srms_opt_DisabilityFlag', $_POST['al_srms_opt_DisabilityFlag']);
	update_option('axceleratelink_srms_opt_MainLanguageID', $_POST["al_srms_opt_MainLanguageID"]);
	update_option('axceleratelink_srms_opt_EnglishProficiencyID', $_POST["al_srms_opt_EnglishProficiencyID"]);
	update_option('axceleratelink_srms_opt_EnglishAssistanceFlag', $_POST["al_srms_opt_EnglishAssistanceFlag"]);
	update_option('axceleratelink_srms_opt_driverlicence', $_POST["al_srms_opt_driverlicence"]);
	update_option('axceleratelink_srms_opt_driverlicence2', $_POST["al_srms_opt_driverlicence2"]);
	update_option('axceleratelink_srms_opt_medicarelicence', $_POST["al_srms_opt_medicarelicence"]);
	$ref_ar = array($_POST['al_srms_opt_referralform'], $_POST['al_srms_opt_tit_referralform']);
	update_option('axceleratelink_srms_opt_payment', $ref_ar);
	
	// Demographics Data Field Title
	update_option('axceleratelink_srms_opt_tit_CountryofBirthID', $_POST['al_srms_opt_tit_CountryofBirthID']);
	update_option('axceleratelink_srms_opt_tit_CityofBirth', $_POST['al_srms_opt_tit_CityofBirth']);
	update_option('axceleratelink_srms_opt_tit_CountryofCitizenID', $_POST['al_srms_opt_tit_CountryofCitizenID']);
	update_option('axceleratelink_srms_opt_tit_CitizenStatusID', $_POST['al_srms_opt_tit_CitizenStatusID']);
	update_option('axceleratelink_srms_opt_tit_IndigenousStatusID', $_POST['al_srms_opt_tit_IndigenousStatusID']);
	update_option('axceleratelink_srms_opt_tit_DisabilityFlag', $_POST['al_srms_opt_tit_DisabilityFlag']);
	update_option('axceleratelink_srms_opt_tit_MainLanguageID', $_POST["al_srms_opt_tit_MainLanguageID"]);
	update_option('axceleratelink_srms_opt_tit_EnglishProficiencyID', $_POST["al_srms_opt_tit_EnglishProficiencyID"]);
	update_option('axceleratelink_srms_opt_tit_EnglishAssistanceFlag', $_POST["al_srms_opt_tit_EnglishAssistanceFlag"]);
	update_option('axceleratelink_srms_opt_tit_driverlicence', $_POST["al_srms_opt_tit_driverlicence"]);
	update_option('axceleratelink_srms_opt_tit_driverlicence2', $_POST["al_srms_opt_tit_driverlicence2"]);
	update_option('axceleratelink_srms_opt_tit_medicarelicence', $_POST["al_srms_opt_tit_medicarelicence"]);
	
	// Employment & Education Data
	// Employment & Education Data Field Option
	update_option('axceleratelink_srms_opt_LabourForceID', $_POST['al_srms_opt_LabourForceID']);
	update_option('axceleratelink_srms_opt_ANZSCOCode', $_POST['al_srms_opt_ANZSCOCode']);
	update_option('axceleratelink_srms_opt_ANZSICCode', $_POST['al_srms_opt_ANZSICCode']);
	update_option('axceleratelink_srms_opt_LUI', $_POST['al_srms_opt_LUI']);
	update_option('axceleratelink_srms_opt_USI', $_POST['al_srms_opt_USI']);
	update_option('axceleratelink_srms_opt_AtSchoolFlag', $_POST['al_srms_opt_AtSchoolFlag']);
	update_option('axceleratelink_srms_opt_HighestSchoolLevelID', $_POST['al_srms_opt_HighestSchoolLevelID']);
	update_option('axceleratelink_srms_opt_HighestSchoolLevelYear', $_POST['al_srms_opt_HighestSchoolLevelYear']);
	update_option('axceleratelink_srms_opt_PriorEducationStatus', $_POST['al_srms_opt_PriorEducationStatus']);
	// Employment & Education Data Field Title
	update_option('axceleratelink_srms_opt_tit_LabourForceID', $_POST['al_srms_opt_tit_LabourForceID']);
	update_option('axceleratelink_srms_opt_tit_ANZSCOCode', $_POST['al_srms_opt_tit_ANZSCOCode']);
	update_option('axceleratelink_srms_opt_tit_ANZSICCode', $_POST['al_srms_opt_tit_ANZSICCode']);
	update_option('axceleratelink_srms_opt_tit_LUI', $_POST['al_srms_opt_tit_LUI']);
	update_option('axceleratelink_srms_opt_tit_USI', $_POST['al_srms_opt_tit_USI']);
	update_option('axceleratelink_srms_opt_tit_AtSchoolFlag', $_POST['al_srms_opt_tit_AtSchoolFlag']);
	update_option('axceleratelink_srms_opt_tit_HighestSchoolLevelID', $_POST['al_srms_opt_tit_HighestSchoolLevelID']);
	update_option('axceleratelink_srms_opt_tit_HighestSchoolLevelYear', $_POST['al_srms_opt_tit_HighestSchoolLevelYear']);
	update_option('axceleratelink_srms_opt_tit_PriorEducationStatus', $_POST['al_srms_opt_tit_PriorEducationStatus']);

	//Tab Titles
	update_option('axceleratelink_srms_tab1_title', $_POST['al_srms_tab1_title']);
	update_option('axceleratelink_srms_tab2_title', $_POST['al_srms_tab2_title']);
	update_option('axceleratelink_srms_tab3_title', $_POST['al_srms_tab3_title']);
	update_option('axceleratelink_srms_tab4_title', $_POST['al_srms_tab4_title']);
	update_option('axceleratelink_srms_tab5_title', $_POST['al_srms_tab5_title']);
	update_option('axceleratelink_srms_tab6_title', $_POST['al_srms_tab6_title']);
	update_option('axceleratelink_srms_tab7_title', $_POST['al_srms_tab10_title']);
	update_option('axceleratelink_srms_tab2_sub_title1', $_POST['al_srms_tab2_sub_title1']);
	update_option('axceleratelink_srms_tab2_sub_title2', $_POST['al_srms_tab2_sub_title2']);
	update_option('axceleratelink_srms_tab3_sub_title1', $_POST['al_srms_tab3_sub_title1']);
	update_option('axceleratelink_srms_tab3_sub_title2', $_POST['al_srms_tab3_sub_title2']);

	// User Creds
	update_option('axceleratelink_srms_opt_username', $_POST['al_srms_opt_username']);
	update_option('axceleratelink_srms_opt_tit_username', $_POST['al_srms_opt_tit_username']);
	update_option('axceleratelink_srms_opt_password', $_POST['al_srms_opt_password']);
	update_option('axceleratelink_srms_opt_tit_password', $_POST['al_srms_opt_tit_password']);

	// terms
	$term_ar = array($_POST['axl_srms_opt_terms'], $_POST['axl_srms_opt_terms_msg'], $_POST['axl_srms_opt_terms_val']);
	update_option('axl_srms_opt_terms', $term_ar);
	

	$countries = '';
	if($_POST['countries']){
		foreach($_POST['countries'] as $check) {
	        $countries .= $check.';';                          
	    }
	}
	update_option('axceleratelink_srms_list_dis_countries', $countries);

	$dem_countries = '';
		if($_POST['dem_countries']){
		foreach($_POST['dem_countries'] as $check) {
	        $dem_countries .= $check.';';                          
	    }
	}
		update_option('axceleratelink_srms_list_dis_dem_countries', $dem_countries);

	$languages = '';
		if($_POST['languages']){
		foreach($_POST['languages'] as $check) {
	        $languages .= $check.';';                          
	    }
	}
	update_option('axceleratelink_srms_list_dis_language', $languages);

	$requires = '';
		if($_POST['al_srms_field_req']){
		foreach($_POST['al_srms_field_req'] as $check) {
	        $requires .= $check.';';                          
	    }
	}
	update_option('axceleratelink_srms_list_field_req', $requires);

	// front end Tab Opt.
	update_option('axceleratelink_srms_opt_dis_tab2', $_POST['al_srms_opt_dis_tab2']);
	update_option('axceleratelink_srms_opt_dis_tab3', $_POST['al_srms_opt_dis_tab3']);
	update_option('axceleratelink_srms_opt_dis_tab4', $_POST['al_srms_opt_dis_tab4']);
	update_option('axceleratelink_srms_opt_dis_tab5', $_POST['al_srms_opt_dis_tab5']);

	$upload_dir_payment = "";
	if(!empty($_FILES["fileToUploadPayment"]["name"])){
		//echo 'dsfsdf';
		$upload_dir_payment = wp_upload_dir(); 
		$target_dir = $upload_dir_payment['basedir']."/axl-srms-file/";
		if (!file_exists($target_dir)) {
			mkdir($target_dir, 0777);
		}
		//echo $upload_dir_payment;
		$target_path = $target_dir . basename( $_FILES['fileToUploadPayment']['name']); 

		if(move_uploaded_file($_FILES['fileToUploadPayment']['tmp_name'], $target_path)) {
		   $upload_dir_payment = $upload_dir_payment['baseurl']."/axl-srms-file/".str_replace(' ', '%20', basename( $_FILES['fileToUploadPayment']['name']));
		} else{
		   $upload_dir_payment = "";
		   echo "Please create a directory in your 'wp-content/uploads/' folder named 'axl-srms-file'";

		}
	}

	$arr_payment_opt = array(
		$_POST['al_srms_opt_tit_payment0'],
		$_POST['al_srms_opt_tit_payment1'],
		$_POST['al_srms_opt_tit_payment2'],
		$_POST['al_srms_opt_tit_payment3'],
		$_POST['al_srms_opt_tit_payment4'],
		$_POST['al_srms_opt_tit_payment5'],
		$_POST['al_srms_opt_tit_payment6'],
		$_POST['al_srms_opt_tit_payment7'],
		$upload_dir_payment,
	);
	update_option('axceleratelink_srms_opt_tit_payment', $arr_payment_opt);
	update_option('axcelerate-payment-off', $_POST['axcelerate-payment-off']);

	// toolkit
	update_option('axcelerate_username_tk', array($_POST['al_srms_username_tk'],$_POST['al_srms_username_tkmsg']));
	update_option('axcelerate_password_tk', array($_POST['al_srms_password_tk'],$_POST['al_srms_password_tkmsg']));
	update_option('axcelerate_title_tk', array($_POST['al_srms_title_tk'],$_POST['al_srms_title_tkmsg']));
	update_option('axcelerate_givenname_tk', array($_POST['al_srms_givenname_tk'],$_POST['al_srms_givenname_tkmsg']));
	update_option('axcelerate_middlename_tk', array($_POST['al_srms_middlename_tk'],$_POST['al_srms_middlename_tkmsg']));
	update_option('axcelerate_surname_tk', array($_POST['al_srms_surname_tk'],$_POST['al_srms_surname_tkmsg']));
	update_option('axcelerate_email_tk', array($_POST['al_srms_email_tk'],$_POST['al_srms_email_tkmsg']));
	update_option('axcelerate_dob_tk', array($_POST['al_srms_dob_tk'],$_POST['al_srms_dob_tkmsg']));
	update_option('axcelerate_gender_tk', array($_POST['al_srms_gender_tk'],$_POST['al_srms_gender_tkmsg']));
	update_option('axcelerate_workphone_tk', array($_POST['al_srms_workphone_tk'],$_POST['al_srms_workphone_tkmsg']));
	update_option('axcelerate_mobphone_tk', array($_POST['al_srms_mobphone_tk'],$_POST['al_srms_mobphone_tkmsg']));
	update_option('axcelerate_homephone_tk', array($_POST['al_srms_homephone_tk'],$_POST['al_srms_homephone_tkmsg']));
	update_option('axcelerate_contact_tk', array($_POST['al_srms_contact_tk'],$_POST['al_srms_contact_tkmsg']));
	update_option('axcelerate_relation_tk', array($_POST['al_srms_relation_tk'],$_POST['al_srms_relation_tkmsg']));
	update_option('axcelerate_contactphone_tk', array($_POST['al_srms_contactphone_tk'],$_POST['al_srms_contactphone_tkmsg']));
	update_option('axcelerate_buildingName_tk', array($_POST['al_srms_buildingName_tk'],$_POST['al_srms_buildingName_tkmsg']));
	update_option('axcelerate_unitNo_tk', array($_POST['al_srms_unitNo_tk'],$_POST['al_srms_unitNo_tkmsg']));
	update_option('axcelerate_street_tk', array($_POST['al_srms_street_tk'],$_POST['al_srms_street_tkmsg']));
	update_option('axcelerate_POBox_tk', array($_POST['al_srms_POBox_tk'],$_POST['al_srms_POBox_tkmsg']));
	update_option('axcelerate_city_tk', array($_POST['al_srms_city_tk'],$_POST['al_srms_city_tkmsg']));
	update_option('axcelerate_state_tk', array($_POST['al_srms_state_tk'],$_POST['al_srms_state_tkmsg']));
	update_option('axcelerate_postcode_tk', array($_POST['al_srms_postcode_tk'],$_POST['al_srms_postcode_tkmsg']));
	update_option('axcelerate_country_tk', array($_POST['al_srms_country_tk'],$_POST['al_srms_country_tkmsg']));
	update_option('axcelerate_checkboxSamePostal_tk', array($_POST['al_srms_checkboxSamePostal_tk'],$_POST['al_srms_checkboxSamePostal_tkmsg']));
	update_option('axcelerate_sbuildingName_tk', array($_POST['al_srms_sbuildingName_tk'],$_POST['al_srms_sbuildingName_tkmsg']));
	update_option('axcelerate_sunitNo_tk', array($_POST['al_srms_sunitNo_tk'],$_POST['al_srms_sunitNo_tkmsg']));
	update_option('axcelerate_sstreet_tk', array($_POST['al_srms_sstreet_tk'],$_POST['al_srms_sstreet_tkmsg']));
	update_option('axcelerate_sPOBox_tk', array($_POST['al_srms_sPOBox_tk'],$_POST['al_srms_sPOBox_tkmsg']));
	update_option('axcelerate_scity_tk', array($_POST['al_srms_scity_tk'],$_POST['al_srms_scity_tkmsg']));
	update_option('axcelerate_sstate_tk', array($_POST['al_srms_sstate_tk'],$_POST['al_srms_sstate_tkmsg']));
	update_option('axcelerate_spostcode_tk', array($_POST['al_srms_spostcode_tk'],$_POST['al_srms_spostcode_tkmsg']));
	update_option('axcelerate_scountry_tk', array($_POST['al_srms_scountry_tk'],$_POST['al_srms_scountry_tkmsg']));
	update_option('axcelerate_CountryofBirthID_tk', array($_POST['al_srms_CountryofBirthID_tk'],$_POST['al_srms_CountryofBirthID_tkmsg']));
	update_option('axcelerate_CityofBirth_tk', array($_POST['al_srms_CityofBirth_tk'],$_POST['al_srms_CityofBirth_tkmsg']));
	update_option('axcelerate_CountryofCitizenID_tk', array($_POST['al_srms_CountryofCitizenID_tk'],$_POST['al_srms_CountryofCitizenID_tkmsg']));
	update_option('axcelerate_CitizenStatusID_tk', array($_POST['al_srms_CitizenStatusID_tk'],$_POST['al_srms_CitizenStatusID_tkmsg']));
	update_option('axcelerate_IndigenousStatusID_tk', array($_POST['al_srms_IndigenousStatusID_tk'],$_POST['al_srms_IndigenousStatusID_tkmsg']));
	update_option('axcelerate_MainLanguageID_tk', array($_POST['al_srms_MainLanguageID_tk'],$_POST['al_srms_MainLanguageID_tkmsg']));
	update_option('axcelerate_EnglishProficiencyID_tk', array($_POST['al_srms_EnglishProficiencyID_tk'],$_POST['al_srms_EnglishProficiencyID_tkmsg']));
	update_option('axcelerate_EnglishAssistanceFlag_tk', array($_POST['al_srms_EnglishAssistanceFlag_tk'],$_POST['al_srms_EnglishAssistanceFlag_tkmsg']));
	update_option('axcelerate_DisabilityFlag_tk', array($_POST['al_srms_DisabilityFlag_tk'],$_POST['al_srms_DisabilityFlag_tkmsg']));
	update_option('axcelerate_driverlicence_tk', array($_POST['al_srms_driverlicence_tk'],$_POST['al_srms_driverlicence_tkmsg']));
	update_option('axcelerate_driverlicence2_tk', array($_POST['al_srms_driverlicence2_tk'],$_POST['al_srms_driverlicence2_tkmsg']));
	update_option('axcelerate_medicarelicence_tk', array($_POST['al_srms_medicarelicence_tk'],$_POST['al_srms_medicarelicence_tkmsg']));
	update_option('axcelerate_referralform_tk', array($_POST['al_srms_referralform_tk'],$_POST['al_srms_referralform_tkmsg']));
	update_option('axcelerate_LabourForceID_tk', array($_POST['al_srms_LabourForceID_tk'],$_POST['al_srms_LabourForceID_tkmsg']));
	update_option('axcelerate_ANZSCOCode_tk', array($_POST['al_srms_ANZSCOCode_tk'],$_POST['al_srms_ANZSCOCode_tkmsg']));
	update_option('axcelerate_ANZSICCode_tk', array($_POST['al_srms_ANZSICCode_tk'],$_POST['al_srms_ANZSICCode_tkmsg']));
	update_option('axcelerate_LUI_tk', array($_POST['al_srms_LUI_tk'],$_POST['al_srms_LUI_tkmsg']));
	update_option('axcelerate_USI_tk', array($_POST['al_srms_USI_tk'],$_POST['al_srms_USI_tkmsg']));
	update_option('axcelerate_AtSchoolFlag_tk', array($_POST['al_srms_AtSchoolFlag_tk'],$_POST['al_srms_AtSchoolFlag_tkmsg']));
	update_option('axcelerate_HighestSchoolLevelID_tk', array($_POST['al_srms_HighestSchoolLevelID_tk'],$_POST['al_srms_HighestSchoolLevelID_tkmsg']));
	update_option('axcelerate_HighestSchoolLevelYear_tk', array($_POST['al_srms_HighestSchoolLevelYear_tk'],$_POST['al_srms_HighestSchoolLevelYear_tkmsg']));
	update_option('axcelerate_PriorEducationStatus_tk', array($_POST['al_srms_PriorEducationStatus_tk'],$_POST['al_srms_PriorEducationStatus_tkmsg']));
	update_option('axcelerate_paymenttitle_tk', array($_POST['al_srms_paymenttitle_tk'],$_POST['al_srms_paymenttitle_tkmsg']));
	update_option('axcelerate_cardname_tk', array($_POST['al_srms_cardname_tk'],$_POST['al_srms_cardname_tkmsg']));
	update_option('axcelerate_cardnumber_tk', array($_POST['al_srms_cardnumber_tk'],$_POST['al_srms_cardnumber_tkmsg']));
	update_option('axcelerate_cardccv_tk', array($_POST['al_srms_cardccv_tk'],$_POST['al_srms_cardccv_tkmsg']));
	update_option('axcelerate_cardexpyear_tk', array($_POST['al_srms_cardexpyear_tk'],$_POST['al_srms_cardexpyear_tkmsg']));
	update_option('axcelerate_cardexpmonth_tk', array($_POST['al_srms_cardexpmonth_tk'],$_POST['al_srms_cardexpmonth_tkmsg']));

}

function get_axl_req_fields($field){
	$val = get_option('axceleratelink_srms_list_field_req');
	$pres_val = explode(";",$val);
	$ret_pres = '';
	foreach ($pres_val as $pres){
		if($pres == $field){
			$ret_pres = $pres;
		}
	}
	return $ret_pres;
}
// Sections
function update_WordPress_Axcelerate_Link_SRMS_Course_Settings(){
	update_option('axceleratelink_srms_srms_section1_title', $_POST['al_srms_section1_title']);
	update_option('axceleratelink_srms_section1_desc', $_POST['al_srms_section1_desc']);
	update_option('axceleratelink_srms_coursetype_selected', $_POST['al_srms_course_type_select']);
	update_option('axcelerate-courselist-off', $_POST['axcelerate-courselist-off']);

}

function update_WordPress_Axcelerate_Link_SRMS_Account_Settings(){
	update_option('axceleratelink_srms_srms_section2_title', $_POST['al_srms_section2_title']);
	update_option('axceleratelink_srms_section2_desc', $_POST['al_srms_section2_desc']);
	update_option('axceleratelink_srms_section3_desc', $_POST['al_srms_section3_desc']);
	$arr_msg = array(
	$_POST['al_srms_client_msg0'],
	$_POST['al_srms_client_msg1'],
	$_POST['al_srms_client_msg2'],
	$_POST['al_srms_client_msg3'],
		);
	update_option('axceleratelink_srms_client_msg', $arr_msg);

}

function update_WordPress_Axcelerate_Link_SRMS_Custom_CSS_Settings(){

	// Custom CSS
	// Colors
	$csscolors = '';
	update_option('axceleratelink_srms_css_form_texts_color', $_POST['al_css_form_texts_color']);
	update_option('axceleratelink_srms_css_form_tab_navigation_color', $_POST['al_css_form_tab_navigation_color']);
	update_option('axceleratelink_srms_css_form_tab_title_color', $_POST['al_css_form_tab_title_color']);
	update_option('axceleratelink_srms_css_form_tab_sub_title_color', $_POST['al_css_form_tab_sub_title_color']);
	update_option('axceleratelink_srms_css_form_labels_color', $_POST['al_css_form_labels_color']);
	update_option('axceleratelink_srms_css_form_nextprev_text_color', $_POST['al_css_form_nextprev_text_color']);
	update_option('axceleratelink_srms_css_form_nextprev_background_color', $_POST['al_css_form_nextprev_background_color']);
	update_option('axceleratelink_srms_css_course_texts_color', $_POST['al_css_course_texts_color']);
	update_option('axceleratelink_srms_css_course_title_color', $_POST['al_css_course_title_color']);
	update_option('axceleratelink_srms_css_course_list_color', $_POST['al_css_course_list_color']);
	update_option('axceleratelink_srms_css_course_thead_color', $_POST['al_css_course_thead_color']);
	update_option('axceleratelink_srms_css_course_ttext_color', $_POST['al_css_course_ttext_color']);
	update_option('axceleratelink_srms_css_course_enrolbuttontxt_color', $_POST['al_css_course_enrolbuttontxt_color']);
	update_option('axceleratelink_srms_css_course_enrolbuttontxt_background_color', $_POST['al_css_course_enrolbuttontxt_background_color']);
	update_option('axceleratelink_srms_css_course_enrolbuttontxt_hover_color', $_POST['al_css_course_enrolbuttontxt_hover_color']);
	update_option('axceleratelink_srms_css_course_enrolbutton_background_hover', $_POST['al_css_course_enrolbuttonback_hover_color']);
	update_option('axceleratelink_srms_css_ac_title_color', $_POST['al_css_ac_title_color']);
	update_option('axceleratelink_srms_css_ac_sub_title_color', $_POST['al_css_ac_sub_title_color']);
	update_option('axceleratelink_srms_css_ac_texts_color', $_POST['al_css_ac_texts_color']);
	update_option('axceleratelink_srms_css_form_nextprev_hover_color', $_POST['al_css_form_nextprev_hover_color']);
	
	// Fonts
	update_option('axceleratelink_srms_css_form_labels_font', $_POST['al_css_form_labels_font']);
	update_option('axceleratelink_srms_css_form_tab_navigation_font', $_POST['al_css_form_tab_navigation_font']);
	update_option('axceleratelink_srms_css_form_tab_title_font', $_POST['al_css_form_tab_title_font']);
	update_option('axceleratelink_srms_css_form_tab_sub_title_font', $_POST['al_css_form_tab_sub_title_font']);
	update_option('axceleratelink_srms_css_form_labels_font', $_POST['al_css_form_labels_font']);
	update_option('axceleratelink_srms_css_form_nextprev_text_font', $_POST['al_css_form_nextprev_text_font']);
	update_option('axceleratelink_srms_css_course_text_font', $_POST['al_css_course_text_font']);
	update_option('axceleratelink_srms_css_course_title_font', $_POST['al_css_course_title_font']);
	update_option('axceleratelink_srms_css_course_list_font', $_POST['al_css_course_list_font']);
	update_option('axceleratelink_srms_css_course_thead_font', $_POST['al_css_course_thead_font']);
	update_option('axceleratelink_srms_css_course_ttext_font', $_POST['al_css_course_ttext_font']);
	update_option('axceleratelink_srms_css_course_enrolbuttontxt_font', $_POST['al_css_course_enrolbuttontxt_font']);
	update_option('axceleratelink_srms_css_ac_title_font' ,$_POST['al_css_ac_title_font']);
	update_option('axceleratelink_srms_css_ac_sub_title_font' ,$_POST['al_css_ac_sub_title_font']);
	update_option('axceleratelink_srms_css_ac_text_font' ,$_POST['al_css_ac_text_font']);

}

function update_WordPress_Axcelerate_Link_SRMS_Email_Settings(){
	// Mail
	update_option('axcelerate_srms_mailsent_sender', $_POST['al_srms_mailsent_sender']);
	update_option('axcelerate_srms_mailsent_subject', $_POST['al_srms_mailsent_subject']);
	update_option('axcelerate_srms_mailsent_content', $_POST['al_srms_mailsent_content']);
	update_option('axcelerate_srms_mailsent_sender2', $_POST['al_srms_mailsent_sender2']);
	update_option('axcelerate_srms_mailsent_subject2', $_POST['al_srms_mailsent_subject2']);
	update_option('axcelerate_srms_mailsent_content2', $_POST['al_srms_mailsent_content2']);
	update_option('axceleratelink_srms_opt_dis_mail1', $_POST['al_srms_opt_dis_mail1']);
	update_option('axceleratelink_srms_opt_dis_mail2', $_POST['al_srms_opt_dis_mail2']);
	update_option('axceleratelink_srms_opt_dis_mail3', $_POST['al_srms_opt_dis_mail3']);
	update_option('axcelerate_srms_mail_sendername', $_POST['al_srms_mail_sendername']);
	update_option('axcelerate_srms_mail_sendername2', $_POST['al_srms_mail_sendername2']);
	$mail_arr = array(
			$_POST['al_srms_opt_dis_mailelo1'],
			$_POST['al_srms_mailsent_contenteloa1'],
			$_POST['al_srms_opt_dis_mailelo2'],
			$_POST['al_srms_mailsent_contenteloa2'],
		);
	update_option('axcelerate_srms_mail_elopt', $mail_arr);
	$mail_arr2 = array(
			$_POST['al_srms_mailsent_sender3'],
			$_POST['al_srms_mail_sendername3'],
			$_POST['al_srms_mailsent_subject3'],
			$_POST['al_srms_mailsent_content3'],
		);
	update_option('axcelerate_srms_mail_dd_settings', $mail_arr2);

	$mail_invoice = array(
			$_POST['al_srms_mailinvoice_opt'],
			$_POST['al_srms_mailinvoice_sender'],
			$_POST['al_srms_mailinvoice_sendername'],
			$_POST['al_srms_mailinvoice_subject'],
			$_POST['al_srms_mailinvoice_planid'],
		);
	update_option('axcelerate_srms_mailinvoice', $mail_invoice);
	
}

function get_WordPress_Axcelerate_SRMS_CourseTypeSelected(){
	return get_option('axceleratelink_srms_coursetype_selected');
}

function update_WordPress_Axcelerate_Link_SRMS_regty_Settings(){
	$arrs = array(
		$_POST['al_srms_tyreg_content'],
		$_POST['al_srms_tyreg_content2'],
		$_POST['al_srms_tyreg_content3'],
	);
	update_option('axceleratelink_tyreg_content', $arrs);
}

function get_WordPress_Axcelerate_SRMS_regty_Settings(){
	return get_option('axceleratelink_tyreg_content');
}

function update_WordPress_Axcelerate_Link_SRMS_Optiont_Settings(){
	update_option('axceleratelink_set_loading_msg', $_POST['axl_setting_loading_msg']);
	update_option('axceleratelink_set_username_msg', $_POST['axl_setting_username_msg']);
	update_option('axceleratelink_set_emailadd_msg', $_POST['axl_setting_emailadd_msg']);
	update_option('axl_auto_wp_ucreate', $_POST['axcelerate-link-u-create']);
	update_option('axl_auto_wp_geographic_note', $_POST['axcelerate-link-geographic']);
	update_option('axcelerate-link-tooltip', $_POST['axcelerate-link-tooltip']);
	
}

function get_WordPress_Axcelerate_Link_SRMS_Optiont_Settings(){
	$data[0] = get_option('axceleratelink_set_loading_msg');
	$data[1] = get_option('axceleratelink_set_username_msg');
	$data[2] = get_option('axceleratelink_set_emailadd_msg');
	$data[3] = get_option('axl_auto_wp_ucreate');
	$data[4] = get_option('axl_auto_wp_geographic_note');
	$data[5] = get_option('axcelerate-link-tooltip');
	return $data;
}

function update_WordPress_Axcelerate_Login_Widget_Settings(){
	update_option('redirect_page', $_POST['redirect_page']);
	update_option('logout_redirect_page', $_POST['logout_redirect_page']);
	update_option('axcelerate-link-url', $_POST['axcelerate-link-url']);
	update_option('axcelerate-link-update-user', $_POST['user_editpage']);
	update_option('axcelerate-link-add-user', $_POST['user_addpage']);
	update_option('axcelerate-link-url-opt', $_POST['axcelerate-link-url-opt']);
	
	
}

function get_WordPress_Axcelerate_Login_Widget_Settings(){
	$data[0] = get_option('redirect_page');
	$data[1] = get_option('logout_redirect_page');
	$data[2] = get_option('axcelerate-link-url');
	$data[3] = get_option('axcelerate-link-update-user');
	$data[4] = get_option('axcelerate-link-add-user');
	$data[5] = get_option('axcelerate-link-url-opt');
	return $data;
}

function get_WordPress_Axcelerate_Link_SRMS_CustomCSS_Colors(){
	$data[0] = get_option('axceleratelink_srms_css_form_texts_color');
	$data[1] = get_option('axceleratelink_srms_css_form_tab_navigation_color');
	$data[2] = get_option('axceleratelink_srms_css_form_tab_title_color');
	$data[3] = get_option('axceleratelink_srms_css_form_tab_sub_title_color');
	$data[4] = get_option('axceleratelink_srms_css_form_labels_color');
	$data[5] = get_option('axceleratelink_srms_css_form_nextprev_text_color');
	$data[6] = get_option('axceleratelink_srms_css_form_nextprev_background_color');
	$data[7] = get_option('axceleratelink_srms_css_course_texts_color');
	$data[8] = get_option('axceleratelink_srms_css_course_title_color');
	$data[9] = get_option('axceleratelink_srms_css_course_list_color');
	$data[10] = get_option('axceleratelink_srms_css_course_thead_color');
	$data[11] = get_option('axceleratelink_srms_css_course_ttext_color');
	$data[12] = get_option('axceleratelink_srms_css_course_enrolbuttontxt_color');
	$data[13] = get_option('axceleratelink_srms_css_course_enrolbuttontxt_background_color');
	$data[14] = get_option('axceleratelink_srms_css_course_enrolbuttontxt_hover_color');
	$data[15] = get_option('axceleratelink_srms_css_course_enrolbutton_background_hover');
	$data[16] = get_option('axceleratelink_srms_css_ac_title_color');
	$data[17] = get_option('axceleratelink_srms_css_ac_sub_title_color');
	$data[18] = get_option('axceleratelink_srms_css_ac_texts_color');
	$data[19] = get_option('axceleratelink_srms_css_form_nextprev_hover_color');
	return $data;
}
function get_WordPress_Axcelerate_Link_SRMS_CustomCSS_Fonts(){
	$data[0] = get_option('axceleratelink_srms_css_form_labels_font');
	$data[1] = get_option('axceleratelink_srms_css_form_tab_navigation_font');
	$data[2] = get_option('axceleratelink_srms_css_form_tab_title_font');
	$data[3] = get_option('axceleratelink_srms_css_form_tab_sub_title_font');
	$data[4] = get_option('axceleratelink_srms_css_form_labels_font');
	$data[5] = get_option('axceleratelink_srms_css_form_nextprev_text_font');
	$data[6] = get_option('axceleratelink_srms_css_course_text_font');
	$data[7] = get_option('axceleratelink_srms_css_course_title_font');
	$data[8] = get_option('axceleratelink_srms_css_course_list_font');
	$data[9] = get_option('axceleratelink_srms_css_course_thead_font');
	$data[10] = get_option('axceleratelink_srms_css_course_ttext_font');
	$data[11] = get_option('axceleratelink_srms_css_course_enrolbuttontxt_font');
	$data[12] = get_option('axceleratelink_srms_css_ac_title_font');
	$data[13] = get_option('axceleratelink_srms_css_ac_sub_title_font');
	$data[14] = get_option('axceleratelink_srms_css_ac_text_font');
	return $data;
}

function get_WordPress_Axcelerate_Link_SRMS_Form_Mail_Info(){
	$data[0] = get_option('axcelerate_srms_mailsent_sender');
	$data[1] = get_option('axcelerate_srms_mailsent_subject');
	$data[2] = get_option('axcelerate_srms_mailsent_content');
	$data[3] = get_option('axcelerate_srms_mailsent_sender2');
	$data[4] = get_option('axcelerate_srms_mailsent_subject2');
	$data[5] = get_option('axcelerate_srms_mailsent_content2');
	$data[6] = get_option('axcelerate_srms_mail_sendername');
	$data[7] = get_option('axcelerate_srms_mail_sendername2');
	$var = get_option('axcelerate_srms_mail_elopt');
	$data[8] = $var[0];
	$data[9] = $var[1];
	$data[10] = $var[2];
	$data[11] = $var[3];
	$val = get_option('axcelerate_srms_mail_dd_settings');
	$data[12] = $val[0];
	$data[13] = $val[1];
	$data[14] = $val[2];
	$data[15] = $val[3];
	return $data;
}

function get_WordPress_Axcelerate_Link_SRMS_Form_Section_tile(){
	$data[0] = get_option('axceleratelink_srms_srms_section1_title');
	$data[1] = get_option('axceleratelink_srms_srms_section2_title');
	return $data;
}

function get_WordPress_Axcelerate_Link_SRMS_Form_Section_desc(){
	$data[0] = get_option('axceleratelink_srms_section1_desc');
	$data[1] = get_option('axceleratelink_srms_section2_desc');
	$data[2] = get_option('axceleratelink_srms_section3_desc');
	return $data;
}

function update_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API_settings(){
	$upload_dir = "";
	if(!empty($_FILES["fileToUpload"]["name"])){
		$upload_dir = wp_upload_dir(); 
		$target_dir = $upload_dir['basedir']."/axl-srms-goolgle/";
		if (!file_exists($target_dir)) {
			mkdir($target_dir, 0777);
		}
		$target_path = $target_dir . basename( $_FILES['fileToUpload']['name']); 

		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {
		   $upload_dir = $upload_dir['baseurl']."/axl-srms-goolgle/".str_replace(' ', '%20', basename( $_FILES['fileToUpload']['name']));
		} else{
		   $upload_dir = "";
		   echo "Please create a directory in your 'wp-content/uploads/' folder named 'axl-srms-goolgle'";

		}
	}
	// google drives
	$array = array( 
		$_POST['al_srms_gdrive_email'], 
		$_POST['al_srms_gdrive_clientid'], 
		$_POST['al_srms_gdrive_accname'], 
		$upload_dir, 
		$_POST['al_srms_gdrive_folder']
	);

	update_option('axceleratelink_srms_gdrive', $array);
}

function get_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API(){
	$data = get_option('axceleratelink_srms_gdrive');
	return $data;
}


function get_WordPress_Axcelerate_Link_SRMS_Form_UserCred_Data_Opt(){
	$data[0] = get_option('axceleratelink_srms_opt_username');
	$data[1] = get_option('axceleratelink_srms_opt_password');
	return $data;
}

function get_WordPress_Axcelerate_Link_SRMS_Form_UserCred_Data_Tit(){
	$data[0] = get_option('axceleratelink_srms_opt_tit_username');
	$data[1] = get_option('axceleratelink_srms_opt_tit_password');
	return $data;
}

// Personal Data Field Option
function get_WordPress_Axcelerate_Link_SRMS_Form_Personal_Data_Opt() {
    $data[0] = get_option('axceleratelink_srms_opt_title');
	$data[1] = get_option('axceleratelink_srms_opt_givenName');
	$data[2] = get_option('axceleratelink_srms_opt_middleName');
	$data[3] = get_option('axceleratelink_srms_opt_surname');
	$data[4] = get_option('axceleratelink_srms_opt_emailAddress');
	$data[5] = get_option('axceleratelink_srms_opt_dob');
	$data[6] = get_option('axceleratelink_srms_opt_sex');
	return $data;
}

// Personal Data Field Title
function get_WordPress_Axcelerate_Link_SRMS_Form_Personal_Data_Tit() {	
    $data[0] = get_option('axceleratelink_srms_opt_tit_title');
	$data[1] = get_option('axceleratelink_srms_opt_tit_givenName');
	$data[2] = get_option('axceleratelink_srms_opt_tit_middleName');
	$data[3] = get_option('axceleratelink_srms_opt_tit_surname');
	$data[4] = get_option('axceleratelink_srms_opt_tit_emailAddress');
	$data[5] = get_option('axceleratelink_srms_opt_tit_dob');
	$data[6] = get_option('axceleratelink_srms_opt_tit_sex');
	return $data;
}

// Contact Data Field Option
function get_WordPress_Axcelerate_Link_SRMS_Form_Contact_Data_Opt(){
	$data[0] = get_option('axceleratelink_srms_opt_workphone');
	$data[1] = get_option('axceleratelink_srms_opt_mobilephone');
	$data[2] = get_option('axceleratelink_srms_opt_phone');
	$data[3] = get_option('axceleratelink_srms_opt_EmergencyContact');
	$data[4] = get_option('axceleratelink_srms_opt_EmergencyContactRelation');
	$data[5] = get_option('axceleratelink_srms_opt_EmergencyContactPhone');
	return $data;
}

// Contact Data Field Title
function get_WordPress_Axcelerate_Link_SRMS_Form_Contact_Data_Tit(){
	$data[0] = get_option('axceleratelink_srms_opt_tit_workphone');
	$data[1] = get_option('axceleratelink_srms_opt_tit_mobilephone');
	$data[2] = get_option('axceleratelink_srms_opt_tit_phone');
	$data[3] = get_option('axceleratelink_srms_opt_tit_EmergencyContact');
	$data[4] = get_option('axceleratelink_srms_opt_tit_EmergencyContactRelation');
	$data[5] = get_option('axceleratelink_srms_opt_tit_EmergencyContactPhone');
	return $data;
}

// Address Data Field Option
function get_WordPress_Axcelerate_Link_SRMS_Form_Address_Data_Opt(){
	$data[0] = get_option('axceleratelink_srms_opt_buildingName');
	$data[1] = get_option('axceleratelink_srms_opt_unitNo');
	$data[2] = get_option('axceleratelink_srms_opt_street');
	$data[3] = get_option('axceleratelink_srms_opt_POBox');
	$data[4] = get_option('axceleratelink_srms_opt_city');
	$data[5] = get_option('axceleratelink_srms_opt_state');
	$data[6] = get_option('axceleratelink_srms_opt_postcode');
	$data[7] = get_option('axceleratelink_srms_opt_country');
	$data[8] = get_option('axceleratelink_srms_opt_checkboxSamePostal');
	$data[9] = get_option('axceleratelink_srms_opt_sbuildingName');
	$data[10] = get_option('axceleratelink_srms_opt_sunitNo');
	$data[11] = get_option('axceleratelink_srms_opt_sstreet');
	$data[12] = get_option('axceleratelink_srms_opt_sPOBox');
	$data[13] = get_option('axceleratelink_srms_opt_scity');
	$data[14] = get_option('axceleratelink_srms_opt_sstate');
	$data[15] = get_option('axceleratelink_srms_opt_spostcode');
	$data[16] = get_option('axceleratelink_srms_opt_scountry');
	return $data;
}

// Address Data Field Title
function get_WordPress_Axcelerate_Link_SRMS_Form_Address_Data_Tit(){
	$data[0] = get_option('axceleratelink_srms_opt_tit_buildingName');
	$data[1] = get_option('axceleratelink_srms_opt_tit_unitNo');
	$data[2] = get_option('axceleratelink_srms_opt_tit_street');
	$data[3] = get_option('axceleratelink_srms_opt_tit_POBox');
	$data[4] = get_option('axceleratelink_srms_opt_tit_city');
	$data[5] = get_option('axceleratelink_srms_opt_tit_state');
	$data[6] = get_option('axceleratelink_srms_opt_tit_postcode');
	$data[7] = get_option('axceleratelink_srms_opt_tit_country');
	$data[8] = get_option('axceleratelink_srms_opt_tit_checkboxSamePostal');
	$data[9] = get_option('axceleratelink_srms_opt_tit_sbuildingName');
	$data[10] = get_option('axceleratelink_srms_opt_tit_sunitNo');
	$data[11] = get_option('axceleratelink_srms_opt_tit_sstreet');
	$data[12] = get_option('axceleratelink_srms_opt_tit_sPOBox');
	$data[13] = get_option('axceleratelink_srms_opt_tit_scity');
	$data[14] = get_option('axceleratelink_srms_opt_tit_sstate');
	$data[15] = get_option('axceleratelink_srms_opt_tit_spostcode');
	$data[16] = get_option('axceleratelink_srms_opt_tit_scountry');
	return $data;
}

// Demographics Data Field Option
function get_WordPress_Axcelerate_Link_SRMS_Form_Demographics_Data_Opt(){
	$data[0] = get_option('axceleratelink_srms_opt_CountryofBirthID');
	$data[1] = get_option('axceleratelink_srms_opt_CityofBirth');
	$data[2] = get_option('axceleratelink_srms_opt_CountryofCitizenID');
	$data[3] = get_option('axceleratelink_srms_opt_CitizenStatusID');
	$data[4] = get_option('axceleratelink_srms_opt_IndigenousStatusID');
	$data[5] = get_option('axceleratelink_srms_opt_DisabilityFlag');
	$data[6] = get_option('axceleratelink_srms_opt_MainLanguageID');
	$data[7] = get_option('axceleratelink_srms_opt_EnglishProficiencyID');
	$data[8] = get_option('axceleratelink_srms_opt_EnglishAssistanceFlag');
	$data[9] = get_option('axceleratelink_srms_opt_driverlicence');
	$data[10] = get_option('axceleratelink_srms_opt_medicarelicence');
	$data[11] = get_option('axceleratelink_srms_opt_driverlicence2');
	return $data;
}

// Demographics Data Field Title
function get_WordPress_Axcelerate_Link_SRMS_Form_Demographics_Data_Tit(){
	$data[0] = get_option('axceleratelink_srms_opt_tit_CountryofBirthID');
	$data[1] = get_option('axceleratelink_srms_opt_tit_CityofBirth');
	$data[2] = get_option('axceleratelink_srms_opt_tit_CountryofCitizenID');
	$data[3] = get_option('axceleratelink_srms_opt_tit_CitizenStatusID');
	$data[4] = get_option('axceleratelink_srms_opt_tit_IndigenousStatusID');
	$data[5] = get_option('axceleratelink_srms_opt_tit_DisabilityFlag');
	$data[6] = get_option('axceleratelink_srms_opt_tit_MainLanguageID');
	$data[7] = get_option('axceleratelink_srms_opt_tit_EnglishProficiencyID');
	$data[8] = get_option('axceleratelink_srms_opt_tit_EnglishAssistanceFlag');
	$data[9] = get_option('axceleratelink_srms_opt_tit_driverlicence');
	$data[10] = get_option('axceleratelink_srms_opt_tit_medicarelicence');
	$data[11] = get_option('axceleratelink_srms_opt_tit_driverlicence2');
	return $data;
}

// Employment & Education Data Field Option
function get_WordPress_Axcelerate_Link_SRMS_Form_EmploymentEducation_Data_Opt(){
	$data[0] = get_option('axceleratelink_srms_opt_LabourForceID');
	$data[1] = get_option('axceleratelink_srms_opt_ANZSCOCode');
	$data[2] = get_option('axceleratelink_srms_opt_ANZSICCode');
	$data[3] = get_option('axceleratelink_srms_opt_LUI');
	$data[4] = get_option('axceleratelink_srms_opt_USI');
	$data[5] = get_option('axceleratelink_srms_opt_AtSchoolFlag');
	$data[6] = get_option('axceleratelink_srms_opt_HighestSchoolLevelID');
	$data[7] = get_option('axceleratelink_srms_opt_HighestSchoolLevelYear');
	$data[8] = get_option('axceleratelink_srms_opt_PriorEducationStatus');
	return $data;
} 

// Employment & Education Data Field Title
function get_WordPress_Axcelerate_Link_SRMS_Form_EmploymentEducation_Data_Tit(){
	$data[0] = get_option('axceleratelink_srms_opt_tit_LabourForceID');
	$data[1] = get_option('axceleratelink_srms_opt_tit_ANZSCOCode');
	$data[2] = get_option('axceleratelink_srms_opt_tit_ANZSICCode');
	$data[3] = get_option('axceleratelink_srms_opt_tit_LUI');
	$data[4] = get_option('axceleratelink_srms_opt_tit_USI');
	$data[5] = get_option('axceleratelink_srms_opt_tit_AtSchoolFlag');
	$data[6] = get_option('axceleratelink_srms_opt_tit_HighestSchoolLevelID');
	$data[7] = get_option('axceleratelink_srms_opt_tit_HighestSchoolLevelYear');
	$data[8] = get_option('axceleratelink_srms_opt_tit_PriorEducationStatus');
	return $data;
} 

// Tab Title
function get_WordPress_Axcelerate_Link_SRMS_Form_Tab_tile(){
	$data[0] = get_option('axceleratelink_srms_tab1_title');
	$data[1] = get_option('axceleratelink_srms_tab2_title');
	$data[2] = get_option('axceleratelink_srms_tab3_title');
	$data[3] = get_option('axceleratelink_srms_tab4_title');
	$data[4] = get_option('axceleratelink_srms_tab5_title');
	$data[5] = get_option('axceleratelink_srms_tab6_title');
	$data[6] = get_option('axceleratelink_srms_tab7_title');
	return $data;

}

// Disabled Tab Opt
function get_WordPress_Axcelerate_Link_SRMS_Form_Frontend_isDisabled_Tab(){
	$data[0] = get_option('axceleratelink_srms_opt_dis_tab2');
	$data[1] = get_option('axceleratelink_srms_opt_dis_tab3');
	$data[2] = get_option('axceleratelink_srms_opt_dis_tab4');
	$data[3] = get_option('axceleratelink_srms_opt_dis_tab5');
	return $data;
}

// Tab Sub Title
function get_WordPress_Axcelerate_Link_SRMS_Form_Tab2_Sub_tile(){
	$data[0] = get_option('axceleratelink_srms_tab2_sub_title1');
	$data[1] = get_option('axceleratelink_srms_tab2_sub_title2');
	return $data;
}

function get_WordPress_Axcelerate_Link_SRMS_Form_Tab3_Sub_tile(){
	$data[0] = get_option('axceleratelink_srms_tab3_sub_title1');
	$data[1] = get_option('axceleratelink_srms_tab3_sub_title2');
	return $data;
}

function get_WordPress_Axcelerate_Link_SRMS_Country_Dis_Dem_List() {
	return get_option('axceleratelink_srms_list_dis_dem_countries');
}

function get_WordPress_Axcelerate_Link_SRMS_Country_Dis_List() {
	return get_option('axceleratelink_srms_list_dis_countries');
}

function isCountryDisabled($country_value, $type){
	if($type == "Address"){
		$Dis_Country = get_WordPress_Axcelerate_Link_SRMS_Country_Dis_List();
	}
	if($type == "Demographics"){
		$Dis_Country = get_WordPress_Axcelerate_Link_SRMS_Country_Dis_Dem_List();
	}
	$pres_country = explode(";",$Dis_Country);
	foreach ($pres_country as $country){
		if($country == $country_value){
			return true;
		}
	}
	return false;
}

function get_WordPress_Axcelerate_Link_SRMS_Language_Dis_List(){
	return get_option('axceleratelink_srms_list_dis_language');
}

function isLanguageDisabled($language_value){
	$Dis_Language = get_WordPress_Axcelerate_Link_SRMS_Language_Dis_List();
	$pres_lang = explode(";",$Dis_Language);
	foreach ($pres_lang as $lang){
		if($lang == $language_value){
			return true;
		}
	}
	return false;
}

function isTabDisabled($tabNumber){
	return get_option('axceleratelink_srms_opt_dis_'.$tabNumber);
}

function getAxcelerateInstanceActivity(){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/course/instance/search/';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);
	$parameters = array(
		'ID' => '151204', 
	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	//curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	var_dump( $json_a);
	// return $json_a;
}

function addAxcelerateInstanceActivity(){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/course/instance/';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);
	$parameters = array(
		'ID' => '1234', 
		'type' => "el",
		'name' => "TEst Activity",
		'startDate' =>"2015-06-28",
		'finishDate' => "2016-06-28",
		'startTime' => "1",
		'finishTime' => "2",
		'trainerContactID' => '234234',
		'contactID' => '23434'
	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	var_dump( $json_a);
}

function getAxcelerateAllCOurses(){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$courseTypeSelected = get_WordPress_Axcelerate_SRMS_CourseTypeSelected();

	if(!$courseTypeSelected){
		$courseTypeSelected = 'all';
	}
	$service_url = $settings[0].'/api/courses?displayLength=11197&type='.$courseTypeSelected;
	
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);
	// default is type = all
	$parameters = array(
		'type' >= $courseTypeSelected,
		'displayLength' => '10000', 
	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	//var_dump($json_a);

	return $json_a;
}

function getAxcelerateAllCOursesActiviIDandType(){
	$response_data = getAxcelerateAllCOurses();
	/*
	$filtered_response = array();
	if($response_data){
		foreach ($response_data as $data) {	
			foreach ($data as $key => $value) {
				if($key == 'ID' || $key == 'TYPE'){		
					$filtered_response[$key] = $value;	
					//echo $key. ' = '.$value;
					//echo '<br>-----';
				}
			}
																			
		}
	}else{
		*/
	if(!$response_data){
		echo 'Please Refresh the Page...';
	}
}

function checkAvailableCourses($data){
	error_reporting(0);
	@ini_set(‘display_errors’, 0);
	
	$filtered_response = array();
	foreach ($data as $key => $value) {			
		$filtered_response[$key] = $value;																	
	}
	//
	foreach ($filtered_response as $key => $value) {
		if(date("Y-m-d", strtotime($value['STARTDATE'])) >=  date("Y-m-d")){	
			if($value['PARTICIPANTVACANCY']){
				if($value['PARTICIPANTVACANCY'] != '' || $value['PARTICIPANTVACANCY'] > '0' || $value['PARTICIPANTVACANCY'] != NULL || $value['PARTICIPANTVACANCY'] != ' ' || $value['PARTICIPANTVACANCY'] > 0 || strpos($value['PARTICIPANTVACANCY'],'-') != 0 || $value['PARTICIPANTVACANCY'] != null){
													
					return true;
				}
			}
		}
	}
	return false;
}

function checkConctactExistViaEmail($emailAddress){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/contacts/?emailAddress='.$emailAddress;
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	//var_dump($json_a);
	$contactID = '';
	foreach ($json_a as $data) {
		foreach ($data as $key => $value) {
			// echo $key.' = '.$value;
			if($key == 'CONTACTID'){
				$contactID = $value;
			}
		}
		
	}	

	return $contactID;
}

function checkCOntactUsernameExist($username){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/users/';
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$parameters = array(
		'username' => $username
	);
	// var_dump($parameters);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	//var_dump($json_a);
	$contactID = '';
	foreach ($json_a as $data) {
		foreach ($data as $key => $value) {
			//echo $key.' = '.$value.'<br>';
			if($key == 'CONTACTID'){
				$contactID = $value;
			}
		}
		
	}	

	return $contactID;
	
}


function getCourseInstanceDetail($instanceID, $type){
	
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/course/instance/detail?instanceID='.$instanceID.'&type='.$type;
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	return $json_a;
}

function postCustomWPLogin($username, $password){
	error_reporting(0);
	@ini_set(‘display_errors’, 0);

	$creds = array();
	$creds['user_login'] = $username;
	$creds['user_password'] = $password;
	$creds['remember'] = true;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) ){
		echo $user->get_error_message();    
	}else{
		$userID = $user->ID;
		$user_info = get_userdata($userID);

		wp_set_current_user( $userID, $user_info->user_login );
		wp_set_auth_cookie( $userID, true, false);
		do_action( 'wp_login', $user_info->user_login );

	}

}
// add_action( 'after_setup_theme', 'postCustomWPLogin' );  

function getContactInformation($contactID){
	
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/contact/'.$contactID;
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);

	return $json_a;
}


function sendEmail($email, $data, $type, $ctype = null){
	
	$Mail_info = get_WordPress_Axcelerate_Link_SRMS_Form_Mail_Info();
	$instance = getCourseInstanceDetail($data['instanceID'], $data['courseType']);
	$to = $email;
	$stg_link = get_WordPress_Axcelerate_Login_Widget_Settings();
	if($type == 'registration&enrollment'){
		$subject = $Mail_info[1];		
		$txt = $Mail_info[2];
		if($Mail_info[8] && $ctype == 'el'){
			$txt = $Mail_info[9];
		}
		$headers = "From: ".$Mail_info[6].' <'.$Mail_info[0].'>'."\r\n";
	}

	if ($type == 'CreditCard') {
		$subject = $Mail_info[4];
		$txt = $Mail_info[5];
		if($Mail_info[10] && $ctype == 'el'){
			$txt = $Mail_info[11];
		}
		$headers = "From: ".$Mail_info[7].' <'.$Mail_info[3].'>'."\r\n";
	}

	if ($type == 'DirectDeposit'){
		$subject = $Mail_info[14];
		$txt = $Mail_info[15];
		$headers = "From: ".$Mail_info[13].' <'.$Mail_info[12].'>'."\r\n";
	}
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$txt = str_replace('[[first_name]]', $data['first_name'], $txt);
	$txt = str_replace('[[last_name]]', $data['last_name'], $txt);
	$txt = str_replace('[[username]]', $data['username'], $txt);
	$txt = str_replace('[[middle_name]]', $data['middle_name'], $txt);
	$txt = str_replace('[[password]]', $data['password'], $txt);
	$txt = str_replace('[[email]]', $email, $txt);
	$txt = str_replace('[[course_name]]', $instance['NAME'], $txt);
	$txt = str_replace('[[course_location]]', $instance['LOCATION'], $txt);
	$txt = str_replace('[[course_startdate]]', date("d-m-Y", strtotime($instance['STARTDATE'])), $txt);
	$txt = str_replace('[[course_finishdate]]', date("d-m-Y", strtotime($instance['FINISHDATE'])), $txt);
	$txt = str_replace('[[course_cost]]', money_format('%(#5.2n',$instance['COST']), $txt);
	$txt = str_replace('[[axcelerate_portal_link]]', '<a href="'.$stg_link[2].'" target="_blank">stg.axcelerate.com.au/management/</a>', $txt);
	$txt = str_replace('[[/n]]', '<br>', $txt);

	//echo '<br>sending email...';
	mail($to,$subject,$txt,$headers);
}

function getContactAttachmentList(){
	$searched = '';
	if( isset($_POST['s']) ){
        $searched = $_POST['s'];
	} 
	$users = get_users( 'role=subscriber' );
	//`var_dump($users);
	$data = array();
	if($searched){

		foreach ($users as $key) {
			if (stripos(get_user_meta( $key->ID, 'first_name', true ).' '.get_user_meta( $key->ID, 'last_name', true ), $searched) !== false) {
				// echo $searched;
				$data[] = array( 
					'ID' => $key->ID,
					'fullname' => get_user_meta( $key->ID, 'first_name', true ).' '.get_user_meta( $key->ID, 'last_name', true ), 
					'email' => esc_html( $key->user_email ), 
		            'driver' => get_user_meta( $key->ID, 'drivers', true ), 
		            'medic' => get_user_meta( $key->ID, 'medics', true )
		            );
			}
		}

	}else{
		foreach ($users as $key) {
		
			$data[] = array( 
				'ID' => $key->ID,
				'fullname' => get_user_meta( $key->ID, 'first_name', true ).' '.get_user_meta( $key->ID, 'last_name', true ), 
				'email' => esc_html( $key->user_email ), 
	            'driver' => get_user_meta( $key->ID, 'drivers', true ), 
	            'medic' => get_user_meta( $key->ID, 'medics', true )
	            );
		}
	}
	
	return $data;
}

function getRandomCharacter(){
	$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                     .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789'); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
 
    return $rand;
}

function getTrainer($contactID){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/trainer/'.$contactID;
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	//var_dump($json_a);
	return $json_a['NAME'];
}

function post_payment_enroll(){
	$payment_type = filterCleanInput($_POST['payment_type']);
	$instance = getCourseInstanceDetail(filterCleanInput($_POST['instanceID']), filterCleanInput($_POST['courseType']));
	if($instance['PARTICIPANTVACANCY'] > 0){
		if($payment_type == 'Credit Card'){
			$ret_msg = get_WordPress_Axcelerate_SRMS_regty_Settings();
			$payer = '';
			if(is_user_logged_in()){
				$user_ID = get_current_user_id();
				$logged_contacttype = get_user_meta( $user_ID, 'contact-type', true );
				if($logged_contacttype == 'JSA'){	
					$payer = get_user_meta( $user_ID, 'contactID', true );
				}
			}
			$parameters = array(
				'paymentAmount' => filterCleanInput($_POST['payment_amount']),
				'contactID' => filterCleanInput($_POST['contactID']),
				'payerID' => $payer,
				'instanceID' => filterCleanInput($_POST['instanceID']),
				'type' => filterCleanInput($_POST['courseType']),
				'nameOnCard' => filterCleanInput($_POST['payment_name_on_card']),
				'cardNumber' => filterCleanInput($_POST['payment_card_number']),
				'cardCCV' => filterCleanInput($_POST['payment_ccv_number']),
				'expiryMonth' =>filterCleanInput($_POST['payment_expiry_month']),
				'expiryYear' => filterCleanInput($_POST['payment_expiry_year']),
				'PONumber' => date('Y-m-d-H-i-s'),
			);
			//var_dump($parameters);
			//echo '<br><br>';
			$settings = get_WordPress_Axcelerate_Link_Settings();

			$service_url = $settings[0].'/api/payment/';
			
			$headers = array(

				'wstoken: '.$settings[1], 

				'apitoken: '.$settings[2]

			);
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $service_url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
			
			$curl_response = curl_exec($curl);

			$json_a = json_decode($curl_response, true);
			//var_dump($json_a);
			if($json_a['STATUS']){
				echo str_replace('\"', '', $ret_msg[2]).'<br>';
				post_enroll_contact(filterCleanInput($_POST['contactID']), filterCleanInput($_POST['instanceID']), filterCleanInput($_POST['courseType']), 'CreditCard', $json_a['INVOICEID']);
				if($instance['PARTICIPANTVACANCY'] == '1' || $instance['PARTICIPANTVACANCY'] == 1){
					checkCourseVanacy($_POST['instanceID']);
				}
				return 'success';
			}else{
				echo '<span style="color:red;">Your Payment is not successful, please try again!...</br>';
				echo $json_a['MESSAGES'].'</br>';
				echo $json_a['DETAILS'].'</span>';

				return 'null';
			}

		}
		if($payment_type == 'Direct Deposit'){
			post_enroll_contact(filterCleanInput($_POST['contactID']), filterCleanInput($_POST['instanceID']), filterCleanInput($_POST['courseType']), 'DirectDeposit', 0);
			return 'success';	
		}

	}else{
		//echo '</br>The Course Vacancy is not Available!</br>';
		return 'no-vacant';
	}
	
	//return $json_a['providerMessage'];
}

function getInvoiceDetail($invoiceID){
	$settings = get_WordPress_Axcelerate_Link_Settings();

	$service_url = $settings[0].'/api/accounting/invoice/'.$invoiceID;
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	return $json_a;
}

function displayInvoiceDetail($invoiceID){
	$data = getInvoiceDetail($invoiceID);
	$data_items = $data['ITEMS'];
	$data_items = $data_items[0];
	$strs = '<table><tr style="background-color: gray;color:white;"><th>Invoice To:</th><th>Note:</th></tr><tr><td>'.$data['CONTACTNAME'].'<br>'.$data['SHIPSTREET'].'<br>'.$data['SHIPCITY'].' '.$data['STATE'].' '.$data['SHIPPOSTCODE'].'</td><td>'.$data['COMMENT'].'</td></tr></table>';
	$strs .= '<table><tr style="background-color: gray;color:white;"><th>Invoice No.</th><th>Invoice Date</th><th>Due Date</th></tr><tr><td>'.$data['INVOICENR'].'</td><td>'.$data['INVOICEDATE'].'</td><td>'.$data['DUEDATE'].'</td></tr></table>';
	$strs .= '<table><tr style="background-color: gray;color:white;"><th>Qty.</th><th>Description</th><th>Amount</th><th>GST</th><th>Total</th></tr>';
	$strs .= '<tr><td>'.$data_items['QTY'].'</td><td>'.$data_items['DESCRIPTION'].'</td><td>$'.number_format($data_items['UNITPRICENETT'], 2, '.', '').'</td><td>$'.number_format($data_items['TOTALTAX'], 2, '.', '').'</td><td>$'.number_format($data_items['TOTALGROSS'], 2, '.', '').'</td></tr>';
	$strs .= '<tr><td colspan="2" style="text-align: right;">Total Due</td><td>$'.number_format($data_items['TOTALNETT'], 2, '.', '').'</td><td>$'.number_format($data_items['TOTALTAX'], 2, '.', '').'</td><td>$'.number_format($data_items['TOTALGROSS'], 2, '.', '').'</td></tr>';
	$strs .= '<tr><td colspan="2" style="text-align: right;">Payment/Credit</td><td></td><td></td><td>$'.number_format($data['BALANCE'] - $data_items['TOTALGROSS'], 2, '.', '').'</td></tr>';
	$strs .= '<tr><td colspan="2" style="text-align: right;">Balance Due</td><td></td><td></td><td>$'.number_format($data['BALANCE'], 2, '.', '').'</td></tr>';
	
	$strs .= '</table>';
	return $strs;
}

function checkCourseVanacy($instanceID){
	$isexisted = get_option('axcelerate-check-course-vacancy');
	$c_check = '';
	foreach ($isexisted as $keyd => $valued) {
		if($keyd == $instanceID){
			$c_check = 'OK';			
		}
	}
	if($c_check == 'OK'){
		unset($isexisted[$instanceID]);
		update_option('axcelerate-check-course-vacancy', $isexisted);
	}
}
function checkCourceisVacant($instanceID){
	$isexisted = get_option('axcelerate-check-course-vacancy');
	$c_check = '';
	$t_check = '';
	$ret_val = '';
	$minutes_to_add = 30;
	$ds_date = date('Y-m-d H:i');
	$time = new DateTime($ds_date);
	$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
	$stamp = $time->format('Y-m-d H:i');
	foreach ($isexisted as $keyd => $valued) {
		if($keyd == $instanceID){
			$c_check = 'OK';
			$t_check = $valued;
		}
	}
	if($c_check == 'OK'){
		if (date('Y-m-d H:i') > $t_check){
			unset($isexisted[$instanceID]);
			update_option('axcelerate-check-course-vacancy', $isexisted);
			//echo 'remove<br>';
			$isexisted[$instanceID] = $stamp;
			update_option('axcelerate-check-course-vacancy', $isexisted);
			
		}else{
			$ret_val = 'true';
		}					
	}else{					
		$isexisted[$instanceID] = $stamp;
		update_option('axcelerate-check-course-vacancy', $isexisted);
		//echo 'added<br>';
	}
	//var_dump($isexisted);
	return $ret_val;
}

function getTemplate($contactID, $instanceID, $type){
	$settings = get_WordPress_Axcelerate_Link_Settings();
	$email_invoice = get_option('axcelerate_srms_mailinvoice');

	$service_url = $settings[0].'/api/template/?planID='.$email_invoice[4].'&contactID='.$contactID.'&instanceID='.$instanceID.'&type='.$type;
	
	$headers = array(

		'wstoken: '.$settings[1], 

		'apitoken: '.$settings[2]

	);
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $service_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);	
	
	$curl_response = curl_exec($curl);

	$json_a = json_decode($curl_response, true);
	return $json_a;
}

function getInvoiceTemplate($contactID, $instanceID, $type, $invoiceID){
	$template = getTemplate($contactID, $instanceID, $type);
	$template = $template[0];
	//var_dump($template);
	$invoice = getInvoiceDetail($invoiceID);
	$items = $invoice['ITEMS'];
	$Qty = '';
	$Description = '';
	$Nett = '';
	$Tax = '';
	$Gross = '';
	$AllNett = 0;
	$AllTax = 0;
	$AllGross = 0;
	foreach ($items as $item) {
		$Qty .= $item['QTY'].'</br>';
		$Description .= $item['DESCRIPTION'].'</br>';
		$Nett .= number_format($item['TOTALNETT'], 2, '.', '').'</br>';
		$AllNett += $item['TOTALNETT'];
		$Tax .= number_format($item['TOTALTAX'], 2, '.', '').'</br>';
		$AllTax += $item['TOTALTAX'];
		$Gross .= number_format($item['TOTALGROSS'], 2, '.', '').'</br>';
		$AllGross += $item['TOTALGROSS'];
	}
	$array_value = array(
		'[Bill To Organisation]',
		'[Bill To Name]',
		'[Bill To Address]',
		'[Invoice Comment]',
		'[Invoice Number]',
		'[Invoice Date]',
		'[Invoice Due Date]',
		'[Order Number]',
		'[Invoice Item Qty]',
		'[Invoice Item Description]',
		'[Invoice Item Total Nett]',
		'[Invoice Item Total Tax]',
		'[Invoice Item Total Gross]',
		'[Invoice Total Nett]',
		'[Invoice Total Tax]',	
		'[Invoice Total Gross]',
		'[Invoice Total Paid]',
		'[Invoice Balance Due]'
 
		);
	$array_replace = array(
		$invoice['ORGANISATION'],
		$invoice['CONTACTNAME'],
		$invoice['SHIPSTREET'].', '.$invoice['SHIPCITY'].' '.$invoice['STATE'].' '.$invoice['SHIPPOSTCODE'],
		$invoice['COMMENT'],
		$invoice['INVOICENR'],
		$invoice['INVOICEDATE'],
		$invoice['DUEDATE'],
		$invoice['ORDERNR'],
		$Qty,
		$Description,
		$Nett,
		$Tax,
		$Gross,
		number_format($AllNett, 2, '.', ''),
		number_format($AllTax, 2, '.', ''),
		number_format($AllGross, 2, '.', ''),
		number_format($invoice['BALANCE'] - $AllGross, 2, '.', ''),
		number_format($invoice['BALANCE'], 2, '.', '')
		);
	$form_ret = str_replace($array_value, $array_replace, $template['CONTENT']);

	return $form_ret;

}
?>