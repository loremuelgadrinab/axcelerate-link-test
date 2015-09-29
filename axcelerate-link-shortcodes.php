<?php



	//Include the php file that stores the function required for this script.

	include_once('axcelerate-link-frontend.php');

 

	if($_POST['axceleratelink_signup_hidden'] == 'Y') {

        //Extract data from form and call function to update the data to the database.

		$settings[0] = $_POST['name'];

		$settings[1] = $_POST['emailaddress'];

		

		$response = call_newsletter_signup($settings[0], $settings[1]);

		
	}
	function form_registration($action_value = null){
		//echo " sdcsdfsdf";
		//include('axcelerate_link_array_list.php');
		//include('axcelerate-link-srms-form-fields.php');
		//include_once 'axcelerate-link-dbdata.php';
		$set_options = get_WordPress_Axcelerate_Link_SRMS_Optiont_Settings();
		$Tab_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab_tile();
		$Tab2_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab2_Sub_tile();
		$Tab3_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab3_Sub_tile();
		$set_buttons = get_option('axceleratelink_srms_buttons');
		$upmsg = get_option('axceleratelink_srms_opt_upmsg');
		$courselist_off = get_option('axcelerate-courselist-off');
		$payment_off = get_option('axcelerate-payment-off');
		$form_ret = '';

		$form_ret .= "<form id='srmsform' action='".trim(strtok(str_replace( '%7E', '~', $_SERVER['REQUEST_URI']), '?')).$action_value."' method='post' enctype='multipart/form-data'>";				
		$form_ret .= getFieldHiddenValues();
		$form_ret .= "<div class='srms-form' id='registration-section' style='display: block;'>";
		$form_ret .= "<div class='form-nav-menu'><ul>";
		$form_ret .= "<li id='nav-menu-personal-details'><a class='headmenulink' href='#personal-details'><span class='headmenu active' id='head1'>".($Tab_Title[0] ? $Tab_Title[0] : '')."</span></a></li>";
		if(!isTabDisabled('tab2')){
			$form_ret .= "<li id='nav-menu-contact-details'><a class='headmenulink' href='#contact-details'><span class='headmenu' id='head2'>".($Tab_Title[1] ? $Tab_Title[1] : '')."</span></a></li>";
		}
		if(!isTabDisabled('tab3')){
			$form_ret .= "<li id='nav-menu-address-details'><a class='headmenulink' href='#address-details'><span class='headmenu' id='head3'>".($Tab_Title[2] ? $Tab_Title[2] : '')."</span></a></li>";
		}
		if(!isTabDisabled('tab4')){
			$form_ret .= "<li id='nav-menu-demographics'><a class='headmenulink' href='#demographics'><span class='headmenu' id='head4'>".($Tab_Title[3] ? $Tab_Title[3] : '')."</span></a></li>";
		}
		if(!isTabDisabled('tab5')){
			$form_ret .= "<li id='nav-menu-employment-and-education'><a class='headmenulink' href='#employment-and-education'><span class='headmenu' id='head5'>".($Tab_Title[4] ? $Tab_Title[4] : '')."</span></a></li>";
		}
		
		$form_ret .= "<li id='nav-menu-confirmations'><a class='headmenulink' href='#confirmations'><span class='headmenu' id='head7'>".($Tab_Title[5] ? $Tab_Title[5] : '')."</span></a></li>";
		if( $payment_off != 'true'){
			$form_ret .= "<li id='nav-menu-payment'><a class='headmenulink' href='#'><span class='headmenu' id='head8'>".($Tab_Title[6] ? $Tab_Title[6] : '')."</span></a></li>";
		}
		$form_ret .= "</ul></div>";
		$form_ret .= '<input type="hidden" name="ajax_url" id="ajax_url" value="'.admin_url('admin-ajax.php').'">';

		//Personal Details
		$form_ret .= "<div id='personal-details' class='form-wrapper' style='display: block;'>";
		$form_ret .= "<h2><strong>".($Tab_Title[0] ? $Tab_Title[0] : '')."</strong></h2>";
		$form_ret .= getFieldUsername();
		$form_ret .= getFieldPassword();
		$form_ret .= getFieldTitle();
		$form_ret .= getFieldGivenName();
		$form_ret .= getFieldMiddleName();
		$form_ret .= getFieldSurame();
		$form_ret .= getFieldEmailAddress();
		$form_ret .= getFieldDOB();
		$form_ret .= getFieldGender();
		$form_ret .= getFirstNavLink();
		$form_ret .= "</div>";

		// Contact Details
		if(!isTabDisabled('tab2')){
			$form_ret .= "<div id='contact-details' class='form-wrapper' style='display: none;'>";
			$form_ret .= "<h2><strong>".($Tab_Title[1] ? $Tab_Title[1] : '')."</strong></h2>";
			$form_ret .= "<h3>".($Tab2_Sub_Title[0] ? $Tab2_Sub_Title[0] : "")."</h3>";
			$form_ret .= getFieldWorkPhoneNumber();
			$form_ret .= getFieldMobileNumber();
			$form_ret .= getFieldHomePhoneNumber();
			$form_ret .= "<br><h3>".($Tab2_Sub_Title[1] ? $Tab2_Sub_Title[1] : "")."</h3>";
			$form_ret .= getFieldContactName();
			$form_ret .= getFieldContactRelationship();
			$form_ret .= getFieldContactPhoneNumber();
			$form_ret .= getThisNavLink('tab2');
			$form_ret .= "</div>";
		}

		// Address Details
		if(!isTabDisabled('tab3')){
			$form_ret .= "<div id='address-details' class='form-wrapper' style='display: none;'>";
			$form_ret .= "<h2><strong>".($Tab_Title[2] ? $Tab_Title[2] : '')."</strong></h2>";
			$form_ret .= "<div id='postal-address' class='address-wrap' style=''>";
			$form_ret .= "<h3>".($Tab3_Sub_Title[1] ? $Tab3_Sub_Title[1] : "")."</h3>";
			if($upmsg){
				$form_ret .= '<br>'.$upmsg.'<br>';
			}
			$form_ret .= getFieldStreetAddressBuildingName();
			$form_ret .= getFieldStreetAddressUnitNumber();
			$form_ret .= getFieldStreetAddressStreet();
			//$form_ret .= getFieldStreetAddressPOBox();
			$form_ret .= getFieldStreetAddressCity();
			$form_ret .= getFieldStreetAddressState();
			$form_ret .= getFieldStreetAddressPostCode();
			$form_ret .= getFieldStreetAddressCountry();
			
			$form_ret .= "</div>";
			$form_ret .= "<div id='street-address' class='address-wrap' style=''>";	
			

			$form_ret .= "<br><h3>".($Tab3_Sub_Title[0] ? $Tab3_Sub_Title[0] : "")."</h3>";
			$form_ret .= getFieldPortalAddressCheckboxLink();
			$form_ret .= getFieldPortalAddressBuildingName();
			$form_ret .= getFieldPortalAddressUnitNumber();
			$form_ret .= getFieldPortalAddressStreet();
			$form_ret .= getFieldPortalAddressPOBox();
			$form_ret .= getFieldPortalAddressCity();
			$form_ret .= getFieldPortalAddressState();
			$form_ret .= getFieldPortalAddressPostCode();
			$form_ret .= getFieldPortalAddressCountry();
			$form_ret .= "</div>";
			$form_ret .= getThisNavLink('tab3');
			$form_ret .= "</div>";
		}			

		// Demographics
		if(!isTabDisabled('tab4')){
			$form_ret .= "<div id='demographics' class='form-wrapper' style='display: none;'>";
			$form_ret .= "<h2><strong>".($Tab_Title[3] ? $Tab_Title[3] : '')."</strong></h2>";				
			$form_ret .= getFieldDriverLicence();
			$form_ret .= getFieldDriverLicence2();
			$form_ret .= getFieldMedicLicence();
			if($logged_contacttype == 'JSA'){
				$form_ret .= getFieldPaymentOption();
			}
			$form_ret .= getFieldCountryOfBirth();
			$form_ret .= getFieldCityOfBirth();
			$form_ret .= getFieldCountryOfCitizenship();
			$form_ret .= getFieldAustCitizenshipStatus();
			$form_ret .= getFieldAboriginalIslander();
			$form_ret .= getFieldMainLanguageID();
			$form_ret .= getFieldEnglishProficiencyID();
			$form_ret .= getFieldEnglishAssistanceFlag();
			$form_ret .= getFieldDisabilities();
			$form_ret .= getThisNavLink('tab4');
			$form_ret .= "</div>";
		}

		//Employment and Education
		if(!isTabDisabled('tab5')){
			$form_ret .= "<div id='employment-and-education' class='form-wrapper' style='display: none;'>";
			$form_ret .= "<h2><strong>".($Tab_Title[4] ? $Tab_Title[4] : '')."</strong></h2>";
			$form_ret .= getFieldEmploymentStatus();
			$form_ret .= getFieldOccupationIdentifier();
			$form_ret .= getFieldIndustryofEmployment();
			$form_ret .= getFieldLearnerUniqueIdentifier();
			$form_ret .= getFieldUniqueStudentIdentifier();
			$form_ret .= getFieldAttendingOtherSchool();
			$form_ret .= getFieldHighestCompletedLevel();
			$form_ret .= getFieldSchoolYearCompleted();
			$form_ret .= getFieldPriorEducation();
			$form_ret .= getThisNavLink('tab5');
			$form_ret .= "</div>";
		}
		
		//Confirmations
		$form_ret .= "<div id='confirmations' class='form-wrapper' style='display: none;'>";
		$form_ret .= "<h2><strong>".($Tab_Title[5] ? $Tab_Title[5] : '')."</strong></h2>";			
		$form_ret .= getConfirmationAllFieldsDisplay($logged_contacttype, $courselist_off);
		$form_ret .= getTermsCondField();
		$form_ret .= getCaptchaField();
		$form_ret .= "<a href='#employment-and-education' class='back_linkmenu'>PREV</a>";
		$form_ret .= "</br><input type='submit' value='".$set_buttons[5]."' id='registration_submit' data-value='".$set_options[0]."'>";

		$form_ret .= "</div>";
		$form_ret .= "</div>";

		$form_ret .= "</form>";
		$form_ret .= "<div id='srms-legend' style='margin-top: 100px;'>";
		$form_ret .= '<span class="red">*</span> mandatory</div>';
		$form_ret .= "</div>";

		return $form_ret;

	}

	/* 
	Description: Shortcode to display the enrollment form to add new contact
	Author: Loremuel Gadrinab 
	*/

	function SRMS_form_func( ) {
		include('axcelerate_link_array_list.php');
		include('axcelerate-link-srms-form-fields.php');
		include_once 'axcelerate-link-dbdata.php';
		
		$Tab_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab_tile();
		$Tab2_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab2_Sub_tile();
		$Tab3_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab3_Sub_tile();
		$googleDrive = get_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API();
		$Section_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Section_tile();
		$Section_Desc = get_WordPress_Axcelerate_Link_SRMS_Form_Section_desc();
		$regty_content = get_WordPress_Axcelerate_SRMS_regty_Settings();
		$set_options = get_WordPress_Axcelerate_Link_SRMS_Optiont_Settings();
		$disable_create_wp_user = get_option('axl_auto_wp_ucreate');
		$arr_msg_cli = get_option('axceleratelink_srms_client_msg');
		$set_buttons = get_option('axceleratelink_srms_buttons');
		$courselist_off = get_option('axcelerate-courselist-off');
		$payment_off = get_option('axcelerate-payment-off');
		$regty_validation = "";

		$user_ID = "";
		$ret_payment = "";
		$ret_payment_logged = "";
		$logged_contacttype = "";
		unset($_SESSION["contactID"]);
		if(is_user_logged_in()){
			$user_ID = get_current_user_id();
			$logged_contacttype = get_user_meta( $user_ID, 'contact-type', true );
			//if($logged_contacttype == 'JSA'){	
		}
		//test values
		
		getAxcelerateAllCOursesActiviIDandType();

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			// enroll a registered WP and contact
			if($_POST['srmsform_type'] == 'enrollContact'){
				if($payment_off == 'true'){
					$ret_payment_logged = post_enroll_contact(filterCleanInput($_POST['contactID']), filterCleanInput($_POST['instanceID']), filterCleanInput($_POST['courseType']), 'CreditCard', 0);
				}else{
					$ret_payment_logged = post_payment_enroll();	
				}			
				// $regty_validation = post_enroll_contact(filterCleanInput($_POST['contactID']), filterCleanInput($_POST['instanceID']), filterCleanInput($_POST['courseType']), 'enrollmentonly');
			}

			if($_POST['srmsform_type'] == 'userLogin'){
				postCustomWPLogin(filterCleanInput($_POST['username']), filterCleanInput($_POST['password']));
				//echo 'trying to loggin..';
			}
			if($_POST['srmsform_type'] == 'registrationAndEnrrollment'){
				// if email not exist, enroll new contact
				$getContactIDViaEmail = checkConctactExistViaEmail($_POST['emailAddress']);				
				if(!$getContactIDViaEmail){ // register a new user
					if($_POST['givenName'] != '' && $_POST['surname'] != '' && $_POST['emailAddress'] != ''){   	
						 if($disable_create_wp_user){
						 	$regty_validation = post_add_contact('', $courselist_off, $payment_off);
						 }else{
							 $WPuserCreated = postCreateNewWPUser();
							 if($WPuserCreated){
							 	$regty_validation = post_add_contact($WPuserCreated, $courselist_off, $payment_off);
							 	$_SESSION["contactID"] = $regty_validation[1];
							 }else{
							 	echo 'User is aleady Exist!.';
							 }
						 }
					}else{
					    echo "Please fill up the required fields!";
					}
				}else{
					//echo $_POST['emailAddress'].' is already registered!';
					echo 'You are already registered, Please Login!';
				}
			}
			// payment
			if($_POST['srmsform_type'] == 'payment'){
				$ret_payment = post_payment_enroll();
			}
		}

		// for forgotpassword connect too axcelerate API
		if($_GET['axcelerate'] == 'forgotpassword'){
			// echo $_GET['user_login'].' | '.$_GET['user_email'];
			post_forgotpassword( $_GET['user_login'], $_GET['user_email']);
		}

		//testAPI(); // test
		$form_ret = "<div class='srms-form-wrap'>";
		
		$form_ret .= getCustomCSSField();

//		$this_page_id = get_the_ID();
//echo get_option('axcelerate-link-add-user').'-'.$this_page_id;

		//success POST method
		if($regty_validation[0] == 'success' || $_GET['srmsform_type'] == 'payment'){
			clearstatcache();
			if($regty_validation[0] != 'error'){
				$dis_contact_id = '';
				if($regty_validation[1]){
					$dis_contact_id = $regty_validation[1];
				}
				if($_GET['contactID']){
					$dis_contact_id = $_GET['contactID'];
				}
				if(isset($_SESSION["contactID"])){
					$dis_contact_id = $_SESSION["contactID"];
				}
				$form_ret .= "<div class='thankyou-section'>";
				if($regty_validation[0] == 'success'){
					$form_ret .= str_replace('\"', '', $regty_content[0]);
				}
				if($courselist_off != 'true' && $payment_off != 'true'){
					if($ret_payment == "" || $ret_payment == "null"){
						$form_ret .= '</br><h1 style="margin-top: 30px;">Payment</h1>';
						$form_ret .= "<form id='srmsform' action='".trim(strtok(str_replace( '%7E', '~', $_SERVER['REQUEST_URI']), '?'))."?srmsform_type=payment&instanceID=".$_GET['instanceID']."&courseType=".$_GET['courseType']."&contactID=".$dis_contact_id."' method='post' enctype='multipart/form-data'>";	
						$form_ret .= '<input type="hidden" name="srmsform_type" value="payment">';
						$form_ret .= '<input type="hidden" name="instanceID" value="'.$_GET['instanceID'].'">';
						$form_ret .= '<input type="hidden" name="courseType" value="'.$_GET['courseType'].'">';
						$form_ret .= '<input type="hidden" name="contactID" value="'.$dis_contact_id.'">';
						if($logged_contacttype == 'JSA'){
							$form_ret .= getFieldPayerSelect();
						}
						$form_ret .= getFieldTableDisplayCourseInstanceDetail($_GET['instanceID'], $_GET['courseType']);
						$form_ret .= getFieldPayment($logged_contacttype);
						$form_ret .= "</br></br><input type='submit' value='".$set_buttons[7]."' id='registration_submit' data-value='".$set_options[0]."'>";
						$form_ret .= "</form></div>";
					}
					if ($ret_payment == 'no-vacant') {
						$form_ret .= '<br>Sorry, The course vacancy is now not available! Your payment is nulled.<br>';

					}
				}
			}
		}

		//Course Section
		if(!$_GET['srmsform_type'] && $regty_validation == "" || $_GET['srmsform'] == 'course-search'){
			$form_ret .= '<div id="loading"></div>';
			$form_ret .= "<div id='course-section' class='course-form-wrap' >";
			if($courselist_off == 'true'){
				$form_ret .= form_registration();
			}else{
				$form_ret .= "<h2>".$Section_Title[0]."</h2>";	
				if($Section_Desc[0]){
					$form_ret .= '<p>'.$Section_Desc[0].'</p>';
				}	
				$form_ret .= getFieldCoursesDropdown();	
			}		
			
			$form_ret .= "</div>";
		}
		
		if($_GET['srmsform_type'] == 'test'){
			$form_ret .= displayInvoiceDetail('179202');			
		}
		//Course Section
		if($_GET['srmsform_type'] == 'courseDisplay' && $_GET['course_id'] && $_GET['course_type'] && $_GET['course_name']){
			$form_ret .= "<div id='course-section' class='course-form-wrap' >";
			$form_ret .= getFieldShowThisCourse($_GET['course_id'],$_GET['course_type'],$_GET['course_name']);		
			$form_ret .= "</div>";
		}

		//Account Confirmation
		if($_GET['srmsform_type'] == 'selectedCourse'){
			clearstatcache();
			$isnovacant = '';			
			if($_GET['vacancy'] == '1'){
				$isnovacant = checkCourceisVacant($_GET['instanceID']);							
			}
			if ($isnovacant == ''){

				echo "<div id='account-section' class='account-form-wrap' style='width: 100%'>";
				if($ret_payment_logged == 'success'){
					//echo '<br><a href="'.trim(strtok(str_replace( '%7E', '~', $_SERVER['REQUEST_URI']), '?')).'">Back to Select Courses</a><hr>';
				}elseif ($ret_payment_logged == 'no-vacant') {
					echo '<br>Sorry, The course vacancy is now not available! Your payment is nulled.<br>';

				}else{
					echo "<h2>".$Section_Title[1]."</h2>";
					if($Section_Desc[1]){
						echo '<p>'.$Section_Desc[1].'</p>';
					}		
					echo  getFieldTableDisplayCourseInstanceDetail($_GET['instanceID'], $_GET['courseType']);
					if ( $user_ID != "") {
						if($logged_contacttype == 'JSA'){
							//if($Section_Desc[2]){
							//	echo '<p>'.$Section_Desc[2].'</p>';
							//}	
							echo '<h2>New Client</h2>';
							echo '<p>Please Create an Account to proceed.</p>';
							echo getFieldAccountCondition();
						}else{
							echo getFieldTableWPUserLoggedInInfo($logged_contacttype, $payment_off);					
						}
					}else{
						//if($Section_Desc[2]){
						//	echo '<p>'.$Section_Desc[2].'</p>';
						//}	
						//if(!$disable_create_wp_user){
						echo '<div id="account-section-x1" style="">';
						echo '<h2>'.$arr_msg_cli[0].'</h2>';
						echo '<p>'.$arr_msg_cli[1].'</p>';
						echo getFieldLoginAccountandGetInstanceToEnrollWith($_GET['instanceID'], $_GET['courseType']);
						echo '</div>';
						echo '<div id="account-section-x2" style="">';
						echo '<h2>'.$arr_msg_cli[2].'</h2>';
						echo '<p>'.$arr_msg_cli[3].'</p>';
						//}		
						echo getFieldAccountCondition();
						echo '</div>';
					}
				}
				
				echo "</div>";
			}else{
				echo '<br>Sorry, The course vacancy is now not available! Please Try Again Later...</br>';
			}

		}

		// Forgot password
		if($_GET['srmsform_type'] == 'forgotpassword'){
			$form_ret .= "<div id='forgotpassword-section' class='course-form-wrap' >";
			$form_ret .= "<h2>Forgot Password</h2>";	
			$form_ret .= getFieldLostPasswordForm();	
			if($_GET['axcelerate'] == 'forgotpassword'){
				$form_ret .= '<a href="'.trim(strtok(str_replace( '%7E', '~', $_SERVER['REQUEST_URI']), '?')).'?srmsform_type=selectedCourse&instanceID='.$_GET['instanceID'].'&courseType='.$_GET['courseType'].'">Back</a>';
			}	
			$form_ret .= "</div>";
		}
		

		// Field registration
		if($_GET['srmsform_type'] == 'regesterNewContactAndEnroll'){
			clearstatcache();
			$instancedis = getCourseInstanceDetail(filterCleanInput($_GET['instanceID']), filterCleanInput($_GET['courseType']));
			if($instancedis['PARTICIPANTVACANCY'] > 0){
				$form_ret .= form_registration("?srmsform_type=payment&instanceID=".$_GET['instanceID']."&courseType=".$_GET['courseType']);
			}else{
				$form_ret .= '<br>Sorry, The course vacancy is now not available!.<br>';
			}
		}




		return $form_ret;
	}

	add_shortcode( 'SRMS_form', 'SRMS_form_func' );

	add_shortcode( 'SRMS_form_login', 'loginForm_srms' );
	function loginForm_srms(){

		if (!empty($_POST)) {
		    // do stuff
		    header("Location: $_SERVER[PHP_SELF]");
		}
		$redirect_page = get_option('redirect_page');

		$logout_redirect_page = get_option('logout_redirect_page');

		$link_in_username = get_option('link_in_username');

		

		if($redirect_page){

			$redirect =  get_permalink($redirect_page);

		}
		

		if($logout_redirect_page){

			$logout_redirect_page = get_permalink($logout_redirect_page);

		} 

		$form_ret = '<div class="axl-login">';

		if(is_user_logged_in()){

			//$disable_create_wp_user = get_option('axl_auto_wp_ucreate');

			//if(!$disable_create_wp_user){
			$current_user = wp_get_current_user();
			

			if($link_in_username){

				$link_with_username = '<a href="'.get_permalink($link_in_username).'">'.$current_user->display_name.'</a>';

			} else {

				$link_with_username = $current_user->display_name;

			}



				$form_ret .= "<div class='axl-login-widget avatar'>".get_avatar( $current_user->ID, 60 )."</div>";
				$form_ret .= "<div class='axl-login-widget displayname'>".$link_with_username."</div>";				
				if(get_user_meta( $current_user->ID, 'contact-type', true ) != 'JSA'){
					$form_ret .= "<div class='axl-login-widget profile'><a href='".get_page_link(get_option('axcelerate-link-update-user'))."'>Edit My Details</a></div>";
					if(get_option('axcelerate-link-url-opt') != 'true'){
						$form_ret .= "<div class='axl-login-widget linkurl'><a href='".get_option('axcelerate-link-url')."'>Elearning Portal</a></div>";
					}
				}else{
					$form_ret .= "<div class='axl-login-widget profile'><a href='".get_page_link(get_option('axcelerate-link-add-user'))."'>Enrol Client</a></div>";
				}
				$form_ret .= "<div class='axl-login-widget logout'><a href='".wp_logout_url( $logout_redirect_page )."' title='Logout'>Logout</a></div>";
				

				
				
			//}

		} else {

			


				$res_val = "";
				if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) {
				    $res_val = '<i class="wp_login_error" style="color: red;font-size: 80%;">The password you entered is incorrect, Please try again.</i>';
				} else if( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) {
				    $res_val = '<i class="wp_login_error" style="color: red;font-size: 80%;">Please enter both username and password.</i>';
				}
				
				$args = array(
				        'echo'           => false,
				        'redirect' => ( $redirect ? $redirect : $_SERVER['HTTP_HOST']),
				        'form_id'        => 'loginform',
				        'label_username' => __( 'Username' ),
				        'label_password' => __( 'Password' ),
				        'label_remember' => __( 'Remember Me' ),
				        'label_log_in'   => __( 'Log In' ),
				        'id_username'    => 'user_login',
				        'id_password'    => 'user_pass',
				        'id_remember'    => 'rememberme',
				        'id_submit'      => 'wp-submit',
				        'remember'       => true,
				        'value_username' => '',
				        'value_remember' => false
				);
				$form_ret .= $res_val;
				$form_ret .= wp_login_form( $args );

				//$form_ret .= '<form name="loginform" id="loginform" action="'.home_url().'/wp-login.php" method="post">';
			
				//$form_ret .= '	<p class="login-username">';
				//$form_ret .= '		<label for="user_login">Username</label>';
				//$form_ret .= '		<input name="log" id="user_login" class="input" value="" size="20" type="text">';
				//$form_ret .= '	</p>';
				//$form_ret .= '	<p class="login-password">';
				//$form_ret .= '		<label for="user_pass">Password</label>';
				//$form_ret .= '		<input name="pwd" id="user_pass" class="input" value="" size="20" type="password">';
				//$form_ret .= '	</p>';
					
				//$form_ret .= '	<p class="login-remember"><label><input name="rememberme" id="rememberme" value="forever" type="checkbox"> Remember Me</label></p>';
				
				//$form_ret .= '	<p class="login-submit">';
				//$form_ret .= '		<input name="wp-submit" id="wp-submit" class="button-primary" value="Log In" type="submit">';
				//$form_ret .= '		<input name="redirect_to" value="'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'" type="hidden">';
				//$form_ret .= '	</p>';
					
				//$form_ret .= '</form>';
		}
		$form_ret .= "</div>";
		return $form_ret;

	}

	function SRMS_form_update_func( ) {
		include('axcelerate_link_array_list.php');
		include('axcelerate-link-srms-form-fields.php');
		include_once 'axcelerate-link-dbdata.php';

		$Tab_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab_tile();
		$Tab2_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab2_Sub_tile();
		$Tab3_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab3_Sub_tile();
		$set_buttons = get_option('axceleratelink_srms_buttons');
		$set_options = get_WordPress_Axcelerate_Link_SRMS_Optiont_Settings();

		$this_msg = '';
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			// enroll a registered WP and contact
			if($_POST['srmsform_type'] == 'contactUpdate'){
				$this_msg = post_update_contact(filterCleanInput($_POST['contactID']));
			}
		}

		
		$form_ret = "<div class='srms-form-wrap'>";
		$form_ret .= getCustomCSSField();
		if(is_user_logged_in()){
			$user_ID = get_current_user_id();
			$contactID = get_user_meta( $user_ID, 'contactID', true );
			
			if(!$contactID){
				$data = wp_get_current_user();
				$contactID = checkConctactExistViaEmail($data->user_email);
			}
			if($this_msg != 'success'){
				$contact = getContactInformation($contactID);
				$upmsg = get_option('axceleratelink_srms_opt_upmsg');
				$form_ret .= "<form id='srmsform' action='".str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])."' method='post' enctype='multipart/form-data'>";	
				$form_ret .= "<div class='srms-form' id='registration-section' style='display: block;'>";
				$form_ret .= "<div class='form-nav-menu'><ul>";
				$form_ret .= "<li id='nav-menu-personal-details'><a class='headmenulink' href='#personal-details'><span class='headmenu active' id='head1'>".($Tab_Title[0] ? $Tab_Title[0] : '')."</span></a></li>";
				if(!isTabDisabled('tab2')){
					$form_ret .= "<li id='nav-menu-contact-details'><a class='headmenulink' href='#contact-details'><span class='headmenu' id='head2'>".($Tab_Title[1] ? $Tab_Title[1] : '')."</span></a></li>";
				}
				if(!isTabDisabled('tab3')){
					$form_ret .= "<li id='nav-menu-address-details'><a class='headmenulink' href='#address-details'><span class='headmenu' id='head3'>".($Tab_Title[2] ? $Tab_Title[2] : '')."</span></a></li>";
				}
				if(!isTabDisabled('tab4')){
					$form_ret .= "<li id='nav-menu-demographics'><a class='headmenulink' href='#demographics'><span class='headmenu' id='head4'>".($Tab_Title[3] ? $Tab_Title[3] : '')."</span></a></li>";
				}
				if(!isTabDisabled('tab5')){
					$form_ret .= "<li id='nav-menu-employment-and-education'><a class='headmenulink' href='#employment-and-education'><span class='headmenu' id='head5'>".($Tab_Title[4] ? $Tab_Title[4] : '')."</span></a></li>";
				}
				
				$form_ret .= "<li id='nav-menu-confirmations'><a class='headmenulink' href='#confirmations'><span class='headmenu' id='head7'>".($Tab_Title[5] ? $Tab_Title[5] : '')."</span></a></li>";
				$form_ret .= "</ul></div>";					
				$form_ret .= '<input type="hidden" name="srmsform_type" id="srmsform_type" value="contactUpdate">';
				$form_ret .= '<input type="hidden" name="contactID" id="contactID" value="'.$contactID.'">';
				$form_ret .= '<input type="hidden" name="ajax_url" id="ajax_url" value="'.admin_url('admin-ajax.php').'">';
				//Personal Details
				$form_ret .= "<div id='personal-details' class='form-wrapper' style='display: block;'>";
				$form_ret .= "<h2><strong>".($Tab_Title[0] ? $Tab_Title[0] : '')."</strong></h2>";
				$form_ret .= getFieldTitle($contact['TITLE']);
				$form_ret .= getFieldGivenName($contact['GIVENNAME']);
				$form_ret .= getFieldMiddleName($contact['MIDDLENAME']);
				$form_ret .= getFieldSurame($contact['SURNAME']);
				$form_ret .= getFieldEmailAddress($contact['EMAILADDRESS']);
				$form_ret .= getFieldDOB($contact['DOB']);
				$form_ret .= getFieldGender($contact['SEX']);

				$form_ret .= "</br></br><input type='submit' value='".$set_buttons[6]."' id='registration_submit' data-value='".$set_options[0]."'></br></br></br>";
				$form_ret .= getFirstNavLink();
				$form_ret .= "</div>";

				// Contact Details
				if(!isTabDisabled('tab2')){
					$form_ret .= "<div id='contact-details' class='form-wrapper' style='display: none;'>";
					$form_ret .= "<h2><strong>".($Tab_Title[1] ? $Tab_Title[1] : '')."</strong></h2>";
					$form_ret .= "<h3>".($Tab2_Sub_Title[0] ? $Tab2_Sub_Title[0] : "")."</h3>";
					$form_ret .= getFieldWorkPhoneNumber($contact['WORKPHONE']);
					$form_ret .= getFieldMobileNumber($contact['MOBILEPHONE']);
					$form_ret .= getFieldHomePhoneNumber($contact['PHONE']);
					$form_ret .= "<br><h3>".($Tab2_Sub_Title[1] ? $Tab2_Sub_Title[1] : "")."</h3>";
					$form_ret .= getFieldContactName($contact['EMERGENCYCONTACT']);
					$form_ret .= getFieldContactRelationship($contact['EMERGENCYCONTACTRELATION']);
					$form_ret .= getFieldContactPhoneNumber($contact['EMERGENCYCONTACTPHONE']);

					$form_ret .= "</br></br><input type='submit' value='".$set_buttons[6]."' id='registration_submit' data-value='".$set_options[0]."'></br></br></br>";
					$form_ret .= getThisNavLink('tab2');
					$form_ret .= "</div>";
				}
				
				// Address Details
				if(!isTabDisabled('tab3')){
					$form_ret .= "<div id='address-details' class='form-wrapper' style='display: none;'>";
					$form_ret .= "<h2><strong>".($Tab_Title[2] ? $Tab_Title[2] : '')."</strong></h2>";
					$form_ret .= "<div id='postal-address' class='address-wrap' style=''>";
					

					$form_ret .= "<h3>".($Tab3_Sub_Title[1] ? $Tab3_Sub_Title[1] : "")."</h3>";
					if($upmsg){
						$form_ret .= '<br>'.$upmsg.'<br>';
					}
					$form_ret .= getFieldStreetAddressBuildingName($contact['SBUILDINGNAME']);
					$form_ret .= getFieldStreetAddressUnitNumber($contact['SUNITNO']);
					$form_ret .= getFieldStreetAddressStreet($contact['SSTREETNO'], $contact['SSTREETNAME']);
					//$form_ret .= getFieldStreetAddressPOBox($contact['SPOBOX']);
					$form_ret .= getFieldStreetAddressCity($contact['SCITY']);
					$form_ret .= getFieldStreetAddressState($contact['SSTATE']);
					$form_ret .= getFieldStreetAddressPostCode($contact['SPOSTCODE']);
					$form_ret .= getFieldStreetAddressCountry($contact['SCOUNTRY']);
					$form_ret .= "</div>";
					$form_ret .= "<div id='street-address' class='address-wrap' style=''>";
					
					$form_ret .= "<br><h3>".($Tab3_Sub_Title[0] ? $Tab3_Sub_Title[0] : "")."</h3>";
					$form_ret .= getFieldPortalAddressCheckboxLink();
					$form_ret .= getFieldPortalAddressBuildingName($contact['BUILDINGNAME']);
					$form_ret .= getFieldPortalAddressUnitNumber($contact['UNITNO']);
					$form_ret .= getFieldPortalAddressStreet($contact['STREETNO'], $contact['STREETNAME']);
					$form_ret .= getFieldPortalAddressPOBox($contact['POBOX']);
					$form_ret .= getFieldPortalAddressCity($contact['CITY']);
					$form_ret .= getFieldPortalAddressState($contact['STATE']);
					$form_ret .= getFieldPortalAddressPostCode($contact['POSTCODE']);
					$form_ret .= getFieldPortalAddressCountry($contact['COUNTRY']);
					$form_ret .= "</div>";

					$form_ret .= "</br></br><input type='submit' value='".$set_buttons[6]."' id='registration_submit' data-value='".$set_options[0]."'></br></br></br>";
					$form_ret .= getThisNavLink('tab3');
					$form_ret .= "</div>";
				}

				// Demographics
				if(!isTabDisabled('tab4')){
					$form_ret .= "<div id='demographics' class='form-wrapper' style='display: none;'>";
					$form_ret .= "<h2><strong>".($Tab_Title[3] ? $Tab_Title[3] : '')."</strong></h2>";				
					$form_ret .= getFieldDriverLicence();
					$form_ret .= getFieldDriverLicence2();
					$form_ret .= getFieldMedicLicence();
					$form_ret .= getFieldCountryOfBirth($contact['COUNTRYOFBIRTHID']);
					$form_ret .= getFieldCityOfBirth($contact['CITYOFBIRTH']);
					$form_ret .= getFieldCountryOfCitizenship($contact['COUNTRYOFCITIZENID']);
					$form_ret .= getFieldAustCitizenshipStatus($contact['CITIZENSTATUSID']);
					$form_ret .= getFieldAboriginalIslander($contact['INDIGENOUSSTATUSID']);
					$form_ret .= getFieldMainLanguageID($contact['MAINLANGUAGEID']);
					$form_ret .= getFieldEnglishProficiencyID($contact['ENGLISHPROFICIENCYID']);
					$form_ret .= getFieldEnglishAssistanceFlag($contact['ENGLISHASSISTANCEFLAG']);
					$form_ret .= getFieldDisabilities($contact['DISABILITYFLAG'], $contact['DISABILITYTYPEIDS']);

					$form_ret .= "</br></br><input type='submit' value='".$set_buttons[6]."' id='registration_submit' data-value='".$set_options[0]."'></br></br></br>";
					$form_ret .= getThisNavLink('tab4');
					$form_ret .= "</div>";
				}

				//Employment and Education
				if(!isTabDisabled('tab5')){
					$form_ret .= "<div id='employment-and-education' class='form-wrapper' style='display: none;'>";
					$form_ret .= "<h2><strong>".($Tab_Title[4] ? $Tab_Title[4] : '')."</strong></h2>";
					$form_ret .= getFieldEmploymentStatus($contact['LABOURFORCEID']);
					$form_ret .= getFieldOccupationIdentifier($contact['ANZSCOCODE']);
					$form_ret .= getFieldIndustryofEmployment($contact['ANZSICCODE']);
					$form_ret .= getFieldLearnerUniqueIdentifier($contact['LUI']);
					$form_ret .= getFieldUniqueStudentIdentifier($contact['USI']);
					$form_ret .= getFieldAttendingOtherSchool($contact['ATSCHOOLFLAG'], $contact['ATSCHOOLNAME']);
					$form_ret .= getFieldHighestCompletedLevel($contact['HIGHESTSCHOOLLEVELID']);
					$form_ret .= getFieldSchoolYearCompleted($contact['HIGHESTSCHOOLLEVELYEAR']);
					$form_ret .= getFieldPriorEducation($contact['PRIOREDUCATIONSTATUS'], $contact['PRIOREDUCATIONIDS']);

					$form_ret .= "</br></br><input type='submit' value='".$set_buttons[6]."' id='registration_submit' data-value='".$set_options[0]."'></br></br></br>";
					$form_ret .= getThisNavLink('tab5');
					$form_ret .= "</div>";
				}

				//Confirmations
				$form_ret .= "<div id='confirmations' class='form-wrapper' style='display: none;'>";
				$form_ret .= "<h2><strong>".($Tab_Title[5] ? $Tab_Title[5] : '')."</strong></h2>";			
				$form_ret .= getConfirmationAllFieldsDisplay('update', $courselist_off);
				$form_ret .= "<a href='#employment-and-education' class='back_linkmenu'>PREV</a>";
				$form_ret .= "</br><input type='submit' value='".$set_buttons[6]."' id='registration_submit' data-value='".$set_options[0]."'>";

				$form_ret .= "</div>";
				$form_ret .= "</div>";

				$form_ret .= '</div></form>';
			}
		}
		$form_ret .= "</div>";
		return $form_ret;
	}

	add_shortcode( 'SRMS_Update_form', 'SRMS_form_update_func' );

	function SRMS_Test_func(){
		include_once 'axcelerate-link-dbdata.php';
		//$val = getTemplate('2355925', '215944', 'w');
		//var_dump($val);
		//echo '<br><hr><br>';
		//var_dump(displayInvoiceDetail('202064'));
		//var_dump(getInvoiceTemplate('2403423', '220670', 'w', '208683'));
		$email_invoice = get_option('axcelerate_srms_mailinvoice');

		$invoice_message = getInvoiceTemplate('2403423', '220670', 'w', '208683');
		//echo $invoice_message;
		$invoice_message = "<h1>Hello World</h1>";
		$subject = $email_invoice[3];
		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";					
		$header .= "From: ".$email_invoice[2].' <'.$email_invoice[1].'>'."\r\n";
		//$header .= "MIME-Version: 1.0\r\n";
		//$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail('samuelgadrinab@gmail.com',$subject,$invoice_message,$header);		

	}

	add_shortcode( 'SRMS_Test', 'SRMS_Test_func' );

	function createPDFReport(){
		/*
		require_once('pdf/tcpdf_include.php');
		global $wpdb;

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


		$pdf->setFooterData(array(0,64,0), array(0,64,128));

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		// Set some content to print
		$html = '<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>';
		$html .= '<i>This is the first example of TCPDF library.</i>';
		$html .= '<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>';
		$html .= '<p>Please check the source code documentation and other examples for further information.</p>';
		$html .= '<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>';
		

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');

		//============================================================+
		// END OF FILE
		//============================================================+
		*/

	}
	add_shortcode( 'SRMS_PDF_contact_data', 'createPDFReport' );


	// JSA/DES


        /*	
        ?>


		<!--<div><p><strong><?php //_e($ok); ?></strong></p></div>

        <?php

    }

	

function add_newsletter_signup() {



	include_once 'axcelerate-link-dbdata.php';

	$settings = get_WordPress_Axcelerate_Course_Page_Settings();



	?>

	<form name="axceleratelink_newsletter_signup_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

	<input type="hidden" name="axceleratelink_signup_hidden" value="Y">

		<?php

		echo '<center>';

		echo '<input type="text" name="name" size="15" placeholder="'.$settings[5].'"> ';

		echo '<input type="text" name="emailaddress" size="15" placeholder="'.$settings[6].'"> ';

		echo '<input type="submit" name="Submit" value="'.$settings[7].'" />';

		echo '</center>';

		?>

	</form>

			

	<?php

	

	$demolp_output = $response;

	//send back text to calling function

	return ($demolp_output);

}

*/

?>
