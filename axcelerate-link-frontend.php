<?php



function show_courses($type, $view, $show_more_info_option, $searchterm) {



	include_once 'axcelerate-link-dbdata.php';

	

	$response = get_courses($type, $searchterm);

	$settings = get_WordPress_Axcelerate_Course_Page_Settings();

	

	//Set the variables so the program can get the page name (used for dynamic hyperlinks)

	//$page1 = get_post($settings[1]);

	switch ($type) {

		case 'w':

			$page = get_post($settings[0]);

			break;

		case 'p':

			$page = get_post($settings[1]);						

			break;

		default:

			echo $type.' type does not exist';

			break;

		}

	

	//Determine the URl to call for the course type that have been selected.

	$url = get_site_url().'/'.$page->post_name;

	//echo $url;



	//Determine what view the user has defined and passed through the $view parameter

	switch ($view) {

		case 'list1': //Course Name as heading (with hyperlink) with Course Code, Delivery Mode and a Short Description

			foreach ($response as $key => $value) {

				if ($show_more_info_option==='yes') {

					echo "<h1><b>".$value['NAME']."</b></h1><br>";

				} else {

					echo "<h1><b><a href='".$url."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'>".$value['NAME']."</a></b></h1><br>";

				}

				echo "<b>Course Code:</b> ".$value['CODE']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Delivery Mode:</b> ".$value['DELIVERY']."&nbsp;&nbsp;&nbsp;&nbsp;";

				if ($show_more_info_option==='yes') {

					//echo "<a href='".$url."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'><button class='mi-button' type='button'>".$settings[8]."</button></a><br>";	
					echo "<a href='".$url."?srmsform_type=courseDisplay&course_name=".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'><button class='mi-button' type='button'>Enrol Now</button></a><br>";	

					echo "<br><br>";

				}

				echo $value['SHORTDESCRIPTION']."<br>";

				if ($show_more_info_option==='yes') {

					// echo "<a href='".$url."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'><button class='mi-button' type='button'>".$settings[8]."</button></a><br>";	
					echo "<a href='".$url."?srmsform_type=courseDisplay&course_name=".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'><button class='mi-button' type='button'>Enrol Now</button></a><br>";	

				}

				echo "<br>";

			}

			break;

		case 'list2': //Course Name as heading with a Short Description with hyperlink

			foreach ($response as $key => $value) {

				echo "<h2><a href='".$url."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'>".$value['NAME']."</a></h2><br>";

				//echo "<b>Course Code:</b> ".$value['CODE']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Delivery Mode:</b> ".$value['DELIVERY']."<br><br>";

				echo $value['SHORTDESCRIPTION']."<br>";

				echo "<br>";

			}

			break;

		case 'list3': //Course Name as heading only with hyperlink

			foreach ($response as $key => $value) {

				echo "<h2><a href='".$url."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'>".$value['NAME']."</a></h2><br>";

			}

			break;

		case 'list4': //Course Name as heading (with no hyperlink) with Course Code, Delivery Mode and a Short Description

			foreach ($response as $key => $value) {

				echo "<h2>".$value['NAME']."</h2><br>";

				echo "<b>Course Code:</b> ".$value['CODE']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Delivery Mode:</b> ".$value['DELIVERY']."<br><br>";

				echo $value['SHORTDESCRIPTION']."<br>";

				echo "<br>";

			}

			break;

		case 'list5': //Course Name as heading only (no hyperlink)

			foreach ($response as $key => $value) {

				echo "<h2>".$value['NAME']."</h2><br>";

			}

			break;

		case 'list6': //Course Code, Delivery Mode and a Short Description without the heading (no hyperlink)

			foreach ($response as $key => $value) {

				echo "<b>Course Code:</b> ".$value['CODE']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Delivery Mode:</b> ".$value['DELIVERY']."<br><br>";

				echo $value['SHORTDESCRIPTION']."<br>";

				echo "<br>";

			}

			break;

			case 'similarcourses': //Course Name as a hyperlink

			foreach ($response as $key => $value) {

				echo "<a href='./".$page->post_name."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'>".$value['NAME']."</a><br>";

			}

			break;

		default:

			echo $view.' does not exist';

			break;

	}

	return(0);

}



function show_course_details($id, $type, $view, $displaycost) {



	include_once 'axcelerate-link-dbdata.php';



	$response = get_course_details($id, $type);



	switch ($view) {

		case 'list1': //Course Name as heading with Course Code and Outline

			echo "<h1>".$response[NAME]."</h1><br>";

			echo "Code: ".$response[CODE]."<br>";

			echo $response[OUTLINE]."<br>";

			if ($displaycost==='yes') {

				echo "<h1>Cost: $".money_format('%!i',$response[COST])."</h1><br>";

			}

			break;

		case 'list2': //Course Name as heading and Outline

			echo "<h1>".$response[NAME]."</h1><br>";

			echo $response[OUTLINE]."<br>";

			if ($displaycost==='yes') {

				echo "<h1>Cost: $".money_format('%!i',$response[COST])."</h1><br>";

			}

			break;

		case 'list3': //Outline Only

			echo $response[OUTLINE]."<br>";

			echo "<br>";

			if ($displaycost==='yes') {

				echo "<h1>Cost: $".money_format('%!i',$response[COST])."</h1><br>";

			}

			break;

		case 'list4': //Course Name as heading with no hyperlink

			echo "<h1>".$response[NAME]."</h1><br><br>";

			//echo "<b>Code: </b>".$response[CODE]."<br>";

			//echo "<b>Price:</b> $".money_format('%!i',$response[COST])."<br><br>";

			//echo "<h2>Description</h2>".$response[DESCRIPTION]."<br>";

			break;

		default:

			echo $view.' does not exist';

			break;

	}

	

	return(0);

}



function show_course_instances($courseid, $type, $view) {



	include_once 'axcelerate-link-dbdata.php';

	setlocale(LC_MONETARY, 'en_US');

	

	$response = get_course_instances($courseid, $type);

	$filtered_response = array();

		

	//Filter the contents of the returned array according to date criteria. ie Where course start date is after today.

	if (!empty($response)) {

		foreach ($response as $key => $value) {

			//Loop through each record of the returned array

		

			if (($value['STARTDATE'] >= date("Y-m-d")) && ($value['STARTDATE'] <= date("Y-m-d", strtotime("+3 months")))) {

				//Copy record from returned array that meets the date criteria.

				$filtered_response[$key] = $value;

			}

		}

	} 

	

	if (!empty($filtered_response)) {

		

		switch ($view) {

			case 'list1': //Course instance location as heading with Dates and name

				foreach ($filtered_response as $key => $value) {

					//echo "<h2><a href='/development/".$page->post_name."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'>".$value['NAME']."</a></h2><br>";

					echo "<h2>".$value['LOCATION']."</h2><br>";

					echo "<b>Start Date:</b> ".$value['STARTDATE']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Finish Date:</b> ".$value['FINISHDATE']."<br><br>";

					echo $value['NAME']."<br>";

					echo "<a href='../enrol-page1/?&instance_id=".$value['INSTANCEID']."&course_type=".$type."'><button type='button'>Sign Up</button></a><br>";

					echo "<br>";

				}

				break;

			case 'table': //Course instance location as heading with Dates and name

				echo "<table><thead><tr>";

				echo "<th align=\"center\">Location</th><th align=\"center\">Start Date</th><th>Finish Date</th><th align=\"right\">Fee</th><th align=\"center\">Availability</th><th align=\"center\"></th>";

				echo "</tr></thead><tbody>";

				foreach ($filtered_response as $key => $value) {

					//echo "<h2><a href='/development/".$page->post_name."?".$value['NAME']."&course_id=".$value['ID']."&course_type=".$value['TYPE']."'>".$value['NAME']."</a></h2><br>";

					echo "<tr>";

					echo "<td align=\"left\">".$value['LOCATION']."</td><td align=\"center\">".date("d-m-Y", strtotime($value['STARTDATE']))."</td><td align=\"center\">".date("d-m-Y", strtotime($value['FINISHDATE']))."</td><td align=\"right\">".money_format('%(#5.2n',$value['COST'])."</td><td align=\"center\">".$value['PARTICIPANTVACANCY']."</td><td align=\"center\"><button type='button'>Enrol</button></td>";

					echo "</tr>";

				}

				echo "</tbody></table>";

				break;

			default:

				echo $view.' does not exist';

				break;

		}

	} else {

		echo "No dates have been scheduled for this course.";

	}

	

	return(0);

}



function call_newsletter_signup($name, $emailaddress) {



	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Course_Page_Settings();

	$pages = get_WordPress_Axcelerate_Course_Page_Settings();

	

	$sourcecodeID = $settings[4];

	

	//Spilt the given name and surname from the $name string 

	list($givenname, $surname) = explode(" ",$name);

	

	//If only one name is passed through the variable then trigger the error page otherwise add data to Axcelerate database.

	if (isset($surname)) {

		$response = axcelerate_newsletter_signup($givenname, $surname, $emailaddress, $sourcecodeID);

	

		//Determine if the adding of the contact was successful.

		if (isset($response['CONTACTID'])) {

			//If successful show successful page as determined by plugin admin pages menu.

			$page = get_post($pages[2]);

		} else {

			//If unsuccessful show fail page as determined by plugin admin pages menu.

			$page = get_post($pages[3]); }

	} else {

		$page = get_post($pages[3]);

	}

	

	//Set the URL to call and call it.

	$url = get_site_url().'/'.$page->post_name;

	echo '<script type="text/javascript" language="Javascript">';

	echo 'window.location.href="'.$url.'"';

	echo '</script>';

	

	return(0);

}



function call_contact_enquiry($firstname, $surname, $emailaddress, $comment, $type, $courseid) {



	include_once 'axcelerate-link-dbdata.php';



	$settings = get_WordPress_Axcelerate_Course_Page_Settings();

	$pages = get_WordPress_Axcelerate_Course_Page_Settings();



	$contactid = get_contactid($emailaddress);

	

	//If no Contact ID is found, then add the user to Axcelerate

	if (empty($contactid)) {

		//Build user data array

		$user_details_array = array ("givenName" => $firstname, 'surname' => $surname, 'emailAddress' => $emailaddress);

		//Add user in Axcelerate

		$user_response = add_axcelerate_user_details($user_details_array);

		$contactid = get_contactid($emailaddress);

	}

	

	$enquiry_reponse = course_enquiry($contactid, $comment, $type, $courseid, $emailaddress);

	

	return(0);

}



function extract_data_from_form($cf7)

{

	include_once 'axcelerate-link-dbdata.php';



	$file = 'testdata.txt';

	//$current = file_get_contents($file);



	$submission = WPCF7_Submission::get_instance();

    if($submission) {

		$posted_data = $submission->get_posted_data();



		//Determine which form is being used.

		$formname = $posted_data['FormName'];		



		switch ($posted_data['FormName']){

				case 'CEFWD':

					//call_contact_enquiry('Andrew','Russell','arussell@tide.com.au','Test from CEFWD','w','11802');

					//Extract data from the form data array

					$givenname = $posted_data["givenName"];

					$surname = $posted_data["surname"];

					$emailaddress = $posted_data["emailAddress"];

					$comments = $posted_data["comments"];

					$courseid = $posted_data["ID"];

					$coursetype = $posted_data["type"];

						

					//Add the contents of the form to the Axcelerate Database

					call_contact_enquiry($givenname,$surname,$emailaddress,$comments,$coursetype,$courseid);

					break;

				case 'CEF':

					//Call function to add contact to Axcelerate

					$user_response = add_axcelerate_user_details($posted_data);

					$contactid = get_contactid($posted_data["emailAddress"]);

					$current .= 'Contact ID: '.$contactid;

					$current .= 'Instance ID: '.$posted_data["InstanceID"];

					$current .= 'Course Type: '.$posted_data["CourseType"];

					//break;

				//case 'CEFP':

					//$contactid = get_contactid($posted_data["emailAddress"]);

					$current .= 'Payment Method: '.$posted_data["PaymentMethod"];

					if (isset($posted_data["PaymentMethod"])) {

						$current .= 'Payer ID: '.$contactid;

						$enrol_response = enrol_contact($contactid,$posted_data["InstanceID"],$posted_data["CourseType"],$contactid);

						if($posted_data["PaymentMethod"] == 'Pay now by Credit card') {

							$current .= 'Name on Card: '.$posted_data["nameOnCard"];

							//$payment_details_array = array ("paymentAmount" => $posted_data["paymentAmount"], 'contactID' => $contactid, 'payerID' => $contactid, 'instanceID' => $posted_data["InstanceID"], 'type' => $posted_data["CourseType"], 'nameOnCard' => $posted_data["nameOnCard"], 'cardNumber' => $posted_data["cardNumber"], 'cardCCV' => $posted_data["cardCCV"], 'expiryMonth' => $posted_data["expiryMonth"], 'expiryYear' => $posted_data["expiryYear"], 'PONumber' => $posted_data["PONumber"]);

							//$payment_response = make_payment($payment_details_array);

						}

					}

					file_put_contents($file, $current);



					break;

				//default:

				//		call_contact_enquiry('Andrew','Russell','arussell@tide.com.au','Test from default','w','11802');

				

			}

	}

}



?>