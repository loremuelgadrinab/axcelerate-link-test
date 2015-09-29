<?php
	$js_color_script = plugins_url(); 
	$js_color_script =$js_color_script.'/axcelerate-link/js/js-color/jscolor.js';
	$display = 'block';
?>
<script type="text/javascript" src="<?php echo $js_color_script; ?>"></script>

<?php

	//Include the php file that stores the function required for this script.

	include_once('axcelerate-link-dbdata.php');
	include('axcelerate_link_array_list.php');


    if($_POST['axceleratelink_hidden'] == 'registration-settings') {

    	update_WordPress_Axcelerate_Link_SRMS_Form_Settings();
    	$display = 'none';
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function(){
			var hash = window.location.hash;
			jQuery( ".admin-main-menu-link" ).removeClass('active');
			jQuery('.srms-admin-main-tab').hide();

			jQuery('a[href="#admin-registration-section"]').addClass('active');
			jQuery('#admin-registration-section').show();
			if(hash){
				jQuery( ".admin-menu-link" ).removeClass('active');
				jQuery('a[href="' + hash + '"]').addClass('active');
				jQuery('.srms-admin-tab').hide();
				jQuery(hash).show();
			
			}
		});
        </script>

			<div class="updated"><p><strong><?php _e('Registration Settings saved.' ); ?></strong></p></div>

        <?php

    } 

    if($_POST['axceleratelink_hidden'] == 'regty-settings') {


    	update_WordPress_Axcelerate_Link_SRMS_regty_Settings();
    	$display = 'none';
        ?>
         <script type="text/javascript">
        jQuery(document).ready(function(){
			jQuery( ".admin-main-menu-link" ).removeClass('active');
			jQuery('.srms-admin-main-tab').hide();

			jQuery('a[href="#admin-regty-section"]').addClass('active');
			jQuery('#admin-regty-section').show();
		});
        </script>

			<div class="updated"><p><strong><?php _e('Thankyou Section saved.' ); ?></strong></p></div>

        <?php

    } 
    if($_POST['axceleratelink_hidden'] == 'email-settings'){

		update_WordPress_Axcelerate_Link_SRMS_Email_Settings();
		$display = 'none';
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function(){
        	var hash = window.location.hash;
			jQuery( ".admin-main-menu-link" ).removeClass('active');
			jQuery('.srms-admin-main-tab').hide();

			jQuery('a[href="#admin-email-section"]').addClass('active');
			jQuery('#admin-email-section').show();
			if(hash){
				jQuery( ".admin-mail-menu-link" ).removeClass('active');
				jQuery('a[href="' + hash + '"]').addClass('active');
				jQuery('.srms-admin-mail-tab').hide();
				jQuery(hash).show();
			
			}
		});
        </script>

			<div class="updated"><p><strong><?php _e('Email Settings saved.' ); ?></strong></p></div>

        <?php
       }
     if($_POST['axceleratelink_hidden'] == 'custom-css-settings'){

		update_WordPress_Axcelerate_Link_SRMS_Custom_CSS_Settings();
		$display = 'none';
        ?>
		<script type="text/javascript">
        jQuery(document).ready(function(){
			jQuery( ".admin-main-menu-link" ).removeClass('active');
			jQuery('.srms-admin-main-tab').hide();

			jQuery('a[href="#admin-css-section"]').addClass('active');
			jQuery('#admin-css-section').show();
		});
        </script>
			<div class="updated"><p><strong><?php _e('Custom CSS Settings saved.' ); ?></strong></p></div>

        <?php
       }

       if($_POST['axceleratelink_hidden'] == 'course-settings'){
       		update_WordPress_Axcelerate_Link_SRMS_Course_Settings();
       		$display = 'block';
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function(){
			jQuery( ".admin-main-menu-link" ).removeClass('active');
			jQuery('.srms-admin-main-tab').hide();

			jQuery('a[href="#admin-course-section"]').addClass('active');
			jQuery('#admin-course-section').show();
		});
        </script>

			<div class="updated"><p><strong><?php _e('Course Section Settings saved.' ); ?></strong></p></div>

        <?php
       }

	   	if($_POST['axceleratelink_hidden'] == 'account-settings'){
			update_WordPress_Axcelerate_Link_SRMS_Account_Settings();
			$display = 'none';
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function(){
			jQuery( ".admin-main-menu-link" ).removeClass('active');
			jQuery('.srms-admin-main-tab').hide();

			jQuery('a[href="#admin-account-confirm-section"]').addClass('active');
			jQuery('#admin-account-confirm-section').show();
		});
        </script>

			<div class="updated"><p><strong><?php _e('Account Section Settings saved.' ); ?></strong></p></div>

        <?php
	   	}

	   	if($_POST['axceleratelink_hidden'] == 'option-settings'){
	   		/*
   			$upload_dir_tmplt = "";
			if(!empty($_FILES["fileToUploadTmplate"]["name"])){
				$upload_dir_tmplt = wp_upload_dir(); 
				$target_dir = $upload_dir_tmplt['basedir']."/axl-srms-goolgle/";
				if (!file_exists($target_dir)) {
					mkdir($target_dir, 0777);
				}
				$target_path = $target_dir . basename( $_FILES['fileToUploadTmplate']['name']); 

				if(move_uploaded_file($_FILES['fileToUploadTmplate']['tmp_name'], $target_path)) {
				   //$upload_dir_tmplt = $upload_dir_tmplt['baseurl']."/axl-srms-goolgle/".str_replace(' ', '%20', basename( $_FILES['fileToUploadTmplate']['name']));
					$upload_dir_tmplt = $upload_dir_tmplt['basedir']."/axl-srms-goolgle/".str_replace(' ', '%20', basename( $_FILES['fileToUploadTmplate']['name']));
				} else{
				   $upload_dir_tmplt = "";
				   echo "Please create a directory in your 'wp-content/uploads/' folder named 'axl-srms-goolgle'";

				}
			}

			update_option('axceleratelink_formfile_tmplt', array( $_POST['axcelerate-tmplate-status'], $upload_dir_tmplt));
			*/

	   		$button_array = array( 
				$_POST['axl_setting_en_button'], 
				$_POST['axl_setting_bk_button'], 
				$_POST['axl_setting_en_button1'],
				$_POST['axl_setting_bk_button2'],
				$_POST['axl_setting_bk_button3'],
				$_POST['axl_setting_bk_button4'],
				$_POST['axl_setting_bk_button5'],
				$_POST['axl_setting_bk_button6'],
			);

			update_option('axceleratelink_srms_buttons', $button_array);

			$up_msg = array(
				$_POST['axl_setting_en_upmsg1'],
				$_POST['axl_setting_bk_upmsg2'],
				$_POST['axl_setting_bk_upmsg3'],
				$_POST['axl_setting_bk_upmsg4'],
			);

			update_option('axceleratelink_srms_upmsg', $up_msg);
			update_WordPress_Axcelerate_Link_SRMS_Optiont_Settings();
			update_option('axceleratelink_formfile_content', $_POST['al_srms_fileform_content']);
			$display = 'none';


        ?>
        <script type="text/javascript">
        jQuery(document).ready(function(){
			jQuery( ".admin-main-menu-link" ).removeClass('active');
			jQuery('.srms-admin-main-tab').hide();

			jQuery('a[href="#admin-setting-section"]').addClass('active');
			jQuery('#admin-setting-section').show();
		});
        </script>

			<div class="updated"><p><strong><?php _e('Option Settings saved.' ); ?></strong></p></div>

        <?php
	   	}

	   	
	   	//var_dump($_POST);
    $Personal_Data_Opt = get_WordPress_Axcelerate_Link_SRMS_Form_Personal_Data_Opt();
	$Personal_Data_Tit = get_WordPress_Axcelerate_Link_SRMS_Form_Personal_Data_Tit();
	$Contact_Data_Opt = get_WordPress_Axcelerate_Link_SRMS_Form_Contact_Data_Opt();
	$Contact_Data_Tit = get_WordPress_Axcelerate_Link_SRMS_Form_Contact_Data_Tit();
	$Address_Data_Opt = get_WordPress_Axcelerate_Link_SRMS_Form_Address_Data_Opt();
	$Address_Data_Tit = get_WordPress_Axcelerate_Link_SRMS_Form_Address_Data_Tit();
	$Demographics_Data_Opt = get_WordPress_Axcelerate_Link_SRMS_Form_Demographics_Data_Opt();
	$Demographics_Data_Tit = get_WordPress_Axcelerate_Link_SRMS_Form_Demographics_Data_Tit();
	$EmploymentEducation_Data_Opt = get_WordPress_Axcelerate_Link_SRMS_Form_EmploymentEducation_Data_Opt();
	$EmploymentEducation_Data_Tit = get_WordPress_Axcelerate_Link_SRMS_Form_EmploymentEducation_Data_Tit();
	$Tab_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab_tile();
	$Section_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Section_tile();
	$Section_Desc = get_WordPress_Axcelerate_Link_SRMS_Form_Section_desc();
	$Tab2_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab2_Sub_tile();
	$Tab3_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab3_Sub_tile();
	$Dis_Country = get_WordPress_Axcelerate_Link_SRMS_Country_Dis_List();
	$Dis_Dem_Country = get_WordPress_Axcelerate_Link_SRMS_Country_Dis_Dem_List();
	$Dis_Language = get_WordPress_Axcelerate_Link_SRMS_Language_Dis_List();
	$Cred_Opt = get_WordPress_Axcelerate_Link_SRMS_Form_UserCred_Data_Opt();
	$Cred_Tit = get_WordPress_Axcelerate_Link_SRMS_Form_UserCred_Data_Tit();
	$Mail_info = get_WordPress_Axcelerate_Link_SRMS_Form_Mail_Info();
	$CustomCSS_Colors = get_WordPress_Axcelerate_Link_SRMS_CustomCSS_Colors();
	$CustomCSS_Fonts = get_WordPress_Axcelerate_Link_SRMS_CustomCSS_Fonts();
	$courseTypeSelected = get_WordPress_Axcelerate_SRMS_CourseTypeSelected();
	$regty_content = get_WordPress_Axcelerate_SRMS_regty_Settings();
	$set_options = get_WordPress_Axcelerate_Link_SRMS_Optiont_Settings();
	$set_buttons = get_option('axceleratelink_srms_buttons');
	$set_upmsg = get_option('axceleratelink_srms_upmsg'); 
	$Demographics_Data2 = get_option('axceleratelink_srms_opt_payment');
	$dataTerms = get_option('axl_srms_opt_terms');
	$arr_payment_opt = get_option('axceleratelink_srms_opt_tit_payment');
	$arr_msg_cli = get_option('axceleratelink_srms_client_msg');
	$tk_username = get_option('axcelerate_username_tk');
	$courselist_off = get_option('axcelerate-courselist-off');
	$payment_off = get_option('axcelerate-payment-off');
	$email_invoice = get_option('axcelerate_srms_mailinvoice');

?>



<div class="wrap">

    <?php    echo "<h2>" . __( 'Axcelerate Link SRMS Form Setup Options', 'axceleratelink_trdom' ) . "</h2>"; ?>

    <?php    echo "<h4>" . __( 'Use [SRMS_form] shortcode in a page to display the form. ', 'axceleratelink_trdom' ) . "</h4>"; ?>

    

    <div class='axceleratelink_srms_nav_main_menu'>
    	<ul>
    		<li id="main-menu-course-sec"><a href="#admin-course-section" class='admin-main-menu-link <?php echo ($display=="block"? "active": "") ?>' >Course List Section</a></li>
			<li id="main-menu-account-sec"><a href="#admin-account-confirm-section" class='admin-main-menu-link' >Account Confirmation Section</a></li>
			<li id="main-menu-reg-sec"><a href="#admin-registration-section" class='admin-main-menu-link' >Registration Section</a></li>
			<li id="main-menu-css-sec"><a href="#admin-css-section" class='admin-main-menu-link' >Custom CSS</a></li>
			<li id="main-menu-email-sec"><a href="#admin-email-section" class='admin-main-menu-link' >Email Format</a></li>
			<li id="main-menu-regty-sec"><a href="#admin-regty-section" class='admin-main-menu-link' >Thankyou Section</a></li>
			<li id="main-menu-setting-sec"><a href="#admin-setting-section" class='admin-main-menu-link' >Settings</a></li>
    	</ul>
    </div>	

		<div id='admin-course-section' class='srms-admin-main-tab' style='display:<?php echo $display; ?>;'>
			<h2>Course List Section</h2>
			<form name="axceleratelink_srms_form_setup_form_course_setting" id='axceleratelink_srms_form_setup_form_course_setting' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      

        	<input type="hidden" name="axceleratelink_hidden" value="course-settings">
			<br><hr>
			<div class="input">
			Title Name : <input type='text' id='al_srms_section1_title' name='al_srms_section1_title' value='<?php echo ($Section_Title[0] ? $Section_Title[0] : "Course Section"); ?>'>
		    <span class="tooltip">A title displayed on the course section.</span>
			</div>
		    </br><br>
		    <div class="input">
		    Section Descriptiom/Note:</br>
		    <span class="tooltip">A message/description to display in the course section. Used html tags for the proper formatting.</span>
			</div>
		   <?php/* <textarea name='al_srms_section1_desc' rows="6" cols="80"><?php echo ($Section_Desc[0] ? $Section_Desc[0] : ' '); ?></textarea>*/?>
		     <?php
				$settings = array( 'textarea_name' => 'al_srms_section1_desc', 'media_buttons' => false, 'wpautop' => false );

				wp_editor( ($Section_Desc[0] ? $Section_Desc[0] : ''), 'mycustomeditor_1desc', $settings );

				// echo $Mail_info[5];
		    ?>
		    <br><hr>
		    <div class="input">
		    Course Type to Display:
		    <select name='al_srms_course_type_select'>
		    	<option value="all" <?php echo (!$courseTypeSelected || $courseTypeSelected == 'all' ? 'selected' : ''); ?>>All types</option>
		    	<option value="w" <?php echo ($courseTypeSelected == 'w' ? 'selected' : ''); ?>>Workshop</option> 
				<option value="p" <?php echo ($courseTypeSelected == 'p' ? 'selected' : ''); ?>>Accredited Program</option> 
				<option value="el" <?php echo ($courseTypeSelected == 'el' ? 'selected' : ''); ?>>E-Learning</option>
		    </select>
		    <span class="tooltip">Select a course type to display available courses in the course section.</span>
			</div>

			<br><hr>
		    <div class="input">
		    Turn Off Course List:
		    <input name='axcelerate-courselist-off' id='axcelerate-courselist-off' type='checkbox' value='true' <?php echo ($courselist_off == 'true' ? 'checked' : ''); ?>>
		    <span class="tooltip">Turning Off Course List will allow Users to Registers only into the system.</span>
			</div>

		    <p class="submit" style="">

	        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

			</p>
			</form>

		</div>

		<div id="admin-setting-section" class='srms-admin-main-tab' style='display:none;'>
			<h2>Settings</h2>
			<form name="axceleratelink_srms_form_setup_form_setting" id='axceleratelink_srms_form_setup_form_setting' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
      		<input type="hidden" name="axceleratelink_hidden" value="option-settings">

      		<table>
      			<tr>
      				<td>Loading Message</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_loading_msg" value="<?php echo ($set_options[0] ? $set_options[0] : 'This may take a moment, do not refresh...' )?>" size='60'>
      					<span class="tooltip">Display message when submission of form.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Username Error Message</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_username_msg" value="<?php echo ($set_options[1] ? $set_options[1] : 'Username is not Available!' )?>" size='60'>
      					<span class="tooltip">username field error message.</span>
						</div>
      				</td>
      				
      			</tr>
      			<tr>
      				<td>Emailaddress Error Message</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_emailadd_msg" value="<?php echo ($set_options[2] ? $set_options[2] : 'Email Address is not Available!' )?>" size='60'>
      					<span class="tooltip">password field error message.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				
				<td>Disable Automatic Creates WP User</td>

				 <td>
				 	<div class="input">
				 	<input name='axcelerate-link-u-create' id='axcelerate-link-u-create' type='checkbox' value='true' <?php echo ($set_options[3] ? 'checked' : ''); ?>>
				 	<span class="tooltip">check to disable creating wp user or website user.</span>
						</div>
				 </td>
				 </tr>
      			<tr>
				<td>Disable Geographic Note</td>

				 <td>
				 	<div class="input">
				 	<input name='axcelerate-link-geographic' id='axcelerate-link-geographic' type='checkbox' value='true' <?php echo ($set_options[4] ? 'checked' : ''); ?>>
				 	<span class="tooltip">check to disable geographic notes.</span>
						</div>
				 </td>

			  </tr>
			  <td>Tooltip icon color</td>

				 <td>
				 	<div class="input">
				 	
				 	<input type="text" name="axcelerate-link-tooltip" id="axcelerate-link-tooltip" class="color" value="<?php echo ($set_options[5] ? $set_options[5] : '000589') ?>">
				 	<span class="tooltip">Select color for the tooltip icon.</span>
						</div>
				 </td>

			  </tr>
      		</table>
      		<hr><br>
      		<h2>Show Courses Button Values</h2>
      		<table>
      			<tr>
      				<td>Enrol Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_en_button" value="<?php echo ($set_buttons[0] ? $set_buttons[0] : 'Enrol Now' )?>" size='60'>
      					<span class="tooltip">Display text on enrol button in Show Courses page</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Enrol Back Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_bk_button" value="<?php echo ($set_buttons[1] ? $set_buttons[1] : 'Back' )?>" size='60'>
      					<span class="tooltip">Display text on Back button in Show Courses page</span>
						</div>
      				</td>
      			</tr>
      		</table>
      		<hr><br>
      		<h2>Form Buttons</h2>
      		<table>
      			<tr>
      				<td>Courses Select Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_en_button1" value="<?php echo ($set_buttons[2] ? $set_buttons[2] : 'Enrol' )?>" size='60'>
      					<span class="tooltip">Display text on enrol button in the Course lists.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Account Section Login Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_bk_button2" value="<?php echo ($set_buttons[3] ? $set_buttons[3] : 'Log In' )?>" size='60'>
      					<span class="tooltip">Display text on login button in the account section.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Account Section Create Client Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_bk_button3" value="<?php echo ($set_buttons[4] ? $set_buttons[4] : 'Create An Account' )?>" size='60'>
      					<span class="tooltip">Display text on new-account button in the account section.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Register Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_bk_button4" value="<?php echo ($set_buttons[5] ? $set_buttons[5] : 'Register' )?>" size='60'>
      					<span class="tooltip">Display text on register in the form submission.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Update Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_bk_button5" value="<?php echo ($set_buttons[6] ? $set_buttons[6] : 'Update' )?>" size='60'>
      					<span class="tooltip">Display text on update button in the form submission.</span>
						</div>      				
					</td>
      			</tr>
      			<tr>
      				<td>Payment Button</td>
      				<td>
      					<div class="input">
      					<input type="text" name="axl_setting_bk_button6" value="<?php echo ($set_buttons[7] ? $set_buttons[7] : 'Pay Now' )?>" size='60'>
      					<span class="tooltip">Display text on payment button in the form submission.</span>
						</div>  
      				</td>
      			</tr>
      		</table>
      		<hr><br>
      		<h2>Attachment Note</h2>
      		<table>
      			<tr>
      				<td>Drivers licence upload</td>
      				<td>
      					<div class="input">
      						<input type="text" name="axl_setting_en_upmsg1" value="<?php echo ($set_upmsg[0] ? $set_upmsg[0] : 'Please use files below 500kb.' )?>" size='80'>
      					<span class="tooltip">Display text below on Drivers licence upload.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Drivers licence back upload</td>
      				<td>
      					<div class="input">
      						<input type="text" name="axl_setting_bk_upmsg2" value="<?php echo ($set_upmsg[1] ? $set_upmsg[1] : 'Please use files below 500kb.' )?>" size='80'>
      						<span class="tooltip">Display text below on Drivers licence back upload.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Medicare licence upload</td>
      				<td>
      					<div class="input">
      						<input type="text" name="axl_setting_bk_upmsg3" value="<?php echo ($set_upmsg[2] ? $set_upmsg[2] : 'Please use files below 500kb.' )?>" size='80'>
      						<span class="tooltip">Display text below on Medicare licence upload.</span>
						</div>
      				</td>
      			</tr>
      			<tr>
      				<td>Referral Form</td>
      				<td>
      					<div class="input">
      						<input type="text" name="axl_setting_bk_upmsg4" value="<?php echo ($set_upmsg[3] ? $set_upmsg[3] : 'Please use files below 500kb.' )?>" size='80'>
      						<span class="tooltip">Display text below on Referral Form upload.</span>
						</div>
      				</td>
      			</tr>
      		</table>
      		<hr><br>
      		<h2>Axcelerate Contact File Record Form</h2>

   
			<?php
				$settings = array( 'textarea_name' => 'al_srms_fileform_content', 'media_buttons' => true, 'wpautop' => false );
				$filecontentval = get_option('axceleratelink_formfile_content');
				$html_value = "<h3>Personal Information</h3>
							<table>
							<tbody>
							<tr>
							<td>Title:</td>
							<td>[[CON_TITLE]]</td>
							</tr>
							<tr>
							<td>Given Name:</td>
							<td>[[CON_GIVENNAME]]</td>
							</tr>
							<tr>
							<td>Middle Name:</td>
							<td>[[CON_MIDDLENAME]]</td>
							</tr>
							<tr>
							<td>Surname:</td>
							<td>[[CON_SURNAME]]</td>
							</tr>
							<tr>
							<td>Email Address:</td>
							<td>[[CON_EMAILADDRESS]]</td>
							</tr>
							<tr>
							<td>Date of Birth:</td>
							<td>[[CON_DOB]]</td>
							</tr>
							<tr>
							<td>Gender:</td>
							<td>[[CON_SEX]]</td>
							</tr>
							</tbody>
							</table>
							<h3>Contact Information</h3>
							<table>
							<tbody>
							<tr>
							<td>Work Phone Number:</td>
							<td>[[CON_WORKPHONE]]</td>
							</tr>
							<tr>
							<td>Mobile Phone Number:</td>
							<td>[[CON_MOBILEPHONE]]</td>
							</tr>
							<tr>
							<td>Home Phone Number:</td>
							<td>[[CON_PHONE]]</td>
							</tr>
							<tr>
							<td>Emergency Contact Person:</td>
							<td>[[CON_EMERGENCYCONTACT]]</td>
							</tr>
							<tr>
							<td>Emergency Contact Relationship:</td>
							<td>[[CON_EMERGENCYCONTACTRELATION]]</td>
							</tr>
							<tr>
							<td>Emergency Contact Phone Number:</td>
							<td>[[CON_EMERGENCYCONTACTPHONE]]</td>
							</tr>
							</tbody>
							</table>
							<h3>Residential Address Information</h3>
							<table>
							<tbody>
							<tr>
							<td>Building Name:</td>
							<td>[[CON_SBUILDINGNAME]]</td>
							</tr>
							<tr>
							<td>Unit Number:</td>
							<td>[[CON_SUNITNO]]</td>
							</tr>
							<tr>
							<td>Street Number/Name:</td>
							<td>[[CON_SSTREET]]</td>
							</tr>
							<tr>
							<td>City:</td>
							<td>[[CON_SCITY]]</td>
							</tr>
							<tr>
							<td>State:</td>
							<td>[[CON_SSTATE]]</td>
							</tr>
							<tr>
							<td>Postal Code:</td>
							<td>[[CON_SPOSTCODE]]</td>
							</tr>
							<tr>
							<td>Country:</td>
							<td>[[CON_SCOUNTRY]]</td>
							</tr>
							</tbody>
							</table>
							<h3>Postal Address Information</h3>
							<table>
							<tbody>
							<tr>
							<td>Building Name:</td>
							<td>[[CON_BUILDINGNAME]]</td>
							</tr>
							<tr>
							<td>Unit Number:</td>
							<td>[[CON_UNITNO]]</td>
							</tr>
							<tr>
							<td>Street Number/Name:</td>
							<td>[[CON_STREET]]</td>
							</tr>
							<tr>
							<td>PO Box:</td>
							<td>[[CON_POBOX]]</td>
							</tr>
							<tr>
							<td>City:</td>
							<td>[[CON_CITY]]</td>
							</tr>
							<tr>
							<td>State:</td>
							<td>[[CON_STATE]]</td>
							</tr>
							<tr>
							<td>Postal Code:</td>
							<td>[[CON_POSTCODE]]</td>
							</tr>
							<tr>
							<td>Country:</td>
							<td>[[CON_COUNTRY]]</td>
							</tr>
							</tbody>
							</table>
							<h3>Demographics Information</h3>
							<table>
							<tbody>
							<tr>
							<td>Country of Birth:</td>
							<td>[[CON_COUNTRYOFBIRTHNAME]]</td>
							</tr>
							<tr>
							<td>City of Birth:</td>
							<td>[[CON_CITYOFBIRTH]]</td>
							</tr>
							<tr>
							<td>Country of Citizenship.:</td>
							<td>[[CON_COUNTRYOFCITIZENNAME]]</td>
							</tr>
							<tr>
							<td>Aust. Citizenship Status:</td>
							<td>[[CON_CITIZENSTATUSNAME]]</td>
							</tr>
							<tr>
							<td>Aboriginal or Torres Strait Islander Origin:</td>
							<td>[[CON_INDIGENOUSSTATUSNAME]]</td>
							</tr>
							<tr>
							<td>Language Identifier:</td>
							<td>[[CON_MAINLANGUAGENAME]]</td>
							</tr>
							<tr>
							<td>Proficiency in Spoken English:</td>
							<td>[[CON_ENGLISHPROFICIENCYID]]</td>
							</tr>
							<tr>
							<td>English Assistance:</td>
							<td>[[CON_ENGLISHASSISTANCEFLAG]]</td>
							</tr>
							<tr>
							<td>Disabilities:</td>
							<td>[[CON_DISABILITYTYPENAMES]]</td>
							</tr>
							</tbody>
							</table>
							<h3>Employment and Education</h3>
							<table>
							<tbody>
							<tr>
							<td>Employment Status:</td>
							<td>[[CON_LABOURFORCENAME]]</td>
							</tr>
							<tr>
							<td>Occupation Identifier:</td>
							<td>[[CON_ANZSCOCODE]]</td>
							</tr>
							<tr>
							<td>Industry of Employment:</td>
							<td>[[CON_ANZSICCODE]]</td>
							</tr>
							<tr>
							<td>Learner Unique Identifier:</td>
							<td>[[CON_LUI]]</td>
							</tr>
							<tr>
							<td>Unique Student Identifier:</td>
							<td>[[CON_USI]]</td>
							</tr>
							<tr>
							<td>Attending Other School/s:</td>
							<td>[[CON_ATSCHOOLNAME]]</td>
							</tr>
							<tr>
							<td>Highest Completed school level:</td>
							<td>[[CON_HIGHESTSCHOOLLEVELID]]</td>
							</tr>
							<tr>
							<td>Year Completed:</td>
							<td>[[CON_HIGHESTSCHOOLLEVELYEAR]]</td>
							</tr>
							<tr>
							<td>Prior Education:</td>
							<td>[[CON_PRIOREDUCATIONNAMES]]</td>
							</tr>
							</tbody>
							</table>
							<p>Drivers Licence:<br />[[CON_DRIVERLICENCE]]</p>
							<p>Drivers Licence 2:<br />[[CON_DRIVERLICENCE2]]</p>
							<p>Medicare Card:<br />[[CON_MEDICALCERT]]</p>
							<p>Date Created:[[DATE_CREATED]]</p>";
				wp_editor( ($filecontentval ? str_replace('\"', '',$filecontentval) : $html_value), 'mycustomeditor0pdf', $settings );

				// echo $Mail_info[5];
		    ?>



      					<h4>Message Content Shortcode</h4>
							<table>
								<tr>
									<td>
										<table>
											<tr><td colspan="2"><b>Personal Information</b></td></tr>						
											<tr><td>Title: </td><td>[[CON_TITLE]]</td></tr>
											<tr><td>Given Name: </td><td>[[CON_GIVENNAME]]</td></tr>
											<tr><td>Middle Name: </td><td>[[CON_MIDDLENAME]]</td></tr>
											<tr><td>Surname: </td><td>[[CON_SURNAME]]</td></tr>
											<tr><td>Email Address: </td><td>[[CON_EMAILADDRESS]]</td></tr>
											<tr><td>Date of Birth: </td><td>[[CON_DOB]]</td></tr>
											<tr><td>Gender: </td><td>[[CON_SEX]]</td></tr>
										</table>
									</td>
									<td>
										<table>
											<tr><td colspan="2"><b>Contact Information</b></td></tr>	
											<tr><td>Work Phone Number: </td><td>[[CON_WORKPHONE]]</td></tr>
											<tr><td>Mobile Phone Number: </td><td>[[CON_MOBILEPHONE]]</td></tr>
											<tr><td>Home Phone Number: </td><td>[[CON_PHONE]]</td></tr>
											<tr><td>Emergency Contact Person: </td><td>[[CON_EMERGENCYCONTACT]]</td></tr>
											<tr><td>Emergency Contact Relationship: </td><td>[[CON_EMERGENCYCONTACTRELATION]]</td></tr>
											<tr><td>Emergency Contact Phone Number: </td><td>[[CON_EMERGENCYCONTACTPHONE]]</td></tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table>
											<tr><td colspan="2"><b>Residential Adress Information</b></td></tr>
											<tr><td>Building Name: </td><td>[[CON_SBUILDINGNAME]]</td></tr>
											<tr><td>Unit Number: </td><td>[[CON_SUNITNO]]</td></tr>
											<tr><td>Street Number/Name: </td><td>[[CON_SSTREET]]</td></tr>
											<tr><td>City: </td><td>[[CON_SCITY]]</td></tr>
											<tr><td>State: </td><td>[[CON_SSTATE]]</td></tr>
											<tr><td>Postal Code: </td><td>[[CON_SPOSTCODE]]</td></tr>
											<tr><td>Country: </td><td>[[CON_SCOUNTRY]]</td></tr>
										</table>
									</td>
									<td>
										<table>
											<tr><td colspan="2"><b>Postal Adress Information</b></td></tr>
											<tr><td>Building Name: </td><td>[[CON_BUILDINGNAME]]</td></tr>
											<tr><td>Unit Number: </td><td>[[CON_UNITNO]]</td></tr>
											<tr><td>Street Number/Name: </td><td>[[CON_STREET]]</td></tr>
											<tr><td>PO Box: </td><td>[[CON_POBOX]]</td></tr>
											<tr><td>City: </td><td>[[CON_CITY]]</td></tr>
											<tr><td>State: </td><td>[[CON_STATE]]</td></tr>
											<tr><td>Postal Code: </td><td>[[CON_POSTCODE]]</td></tr>
											<tr><td>Country: </td><td>[[CON_COUNTRY]]</td></tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table>
											<tr><td colspan="2"><b>Demographics Information</b></td></tr>
											<tr><td>Country of Birth:</td><td>[[CON_COUNTRYOFBIRTHNAME]]</td></tr>
											<tr><td>City of Birth: </td><td>[[CON_CITYOFBIRTH]]</td></tr>
											<tr><td>Country of Citizenship.: </td><td>[[CON_COUNTRYOFCITIZENNAME]]</td></tr>
											<tr><td>Aust. Citizenship Status:</td><td>[[CON_CITIZENSTATUSNAME]]</td></tr>
											<tr><td>Aboriginal or Torres Strait Islander Origin: </td><td>[[CON_INDIGENOUSSTATUSNAME]]</td></tr>
											<tr><td>Language Identifier: </td><td>[[CON_MAINLANGUAGENAME]]</td></tr>
											<tr><td>Proficiency in Spoken English: </td><td>[[CON_ENGLISHPROFICIENCYID]]</td></tr>
											<tr><td>English Assistance: </td><td>[[CON_ENGLISHASSISTANCEFLAG]]</td></tr>
											<tr><td>Disabilities: </td><td>[[CON_DISABILITYTYPENAMES]]</td></tr>
											<tr><td>Drivers Liscence: </td><td>[[CON_DRIVERLICENCE]]</td></tr>
											<tr><td>Drivers Liscence 2: </td><td>[[CON_DRIVERLICENCE2]]</td></tr>
											<tr><td>Medicare Card: </td><td>[[CON_MEDICALCERT]]</td></tr>
										</table>
									</td>
									<td>
										<table>
										<tr><td colspan="2"><b>Employment and Education</b></td></tr>
										<tr><td>Employment Status: </td><td>[[CON_LABOURFORCENAME]]</td></tr>
										<tr><td>Occupation Identifier: </td><td>[[CON_ANZSCOCODE]]</td></tr>
										<tr><td>Industry of Employment: </td><td>[[CON_ANZSICCODE]]</td></tr>
										<tr><td>Learner Unique Identifier: </td><td>[[CON_LUI]]</td></tr>
										<tr><td>Unique Student Identifier: </td><td>[[CON_USI]]</td></tr>
										<tr><td>Attending Other School/s: </td><td>[[CON_ATSCHOOLNAME]]</td></tr>
										<tr><td>Highest Completed school level: </td><td>[[CON_HIGHESTSCHOOLLEVELID]]</td></tr>
										<tr><td>Year Completed: </td><td>[[CON_HIGHESTSCHOOLLEVELYEAR]]</td></tr>
										<tr><td>Prior Education: </td><td>[[CON_PRIOREDUCATIONNAMES]]</td></tr>
										</table>
									</td>
								</tr>
							</table>
							<br>
							<table>
							<tr><td colspan="2"><b>Other Value</b></td></tr>
							<tr><td>Date Created: </td><td>[[DATE_CREATED]]</td></tr>
							</table>

						<br>
						<?php /* 
						<?php $filecontentval2 = get_option('axceleratelink_formfile_tmplt'); ?>
						<input name='axcelerate-tmplate-status' id='axcelerate-tmplate-status' type='checkbox' value='true' <?php echo ($filecontentval2[0] == 'true' ? 'checked' : ''); ?>> Allow File Templating</br>
						<p>Template File Url Path <?php echo ($filecontentval2[1] ? '<i>'.$filecontentval2[1].'</i>' : ''); ?><br>	
							<input type='hidden' name='al_srms_file_pathurl' id='al_srms_file_pathurl' value="<?php echo ($filecontentval2[1] ? $filecontentval2[1] : ''); ?>" style="width: 800px;">		
						</p>
						<input type="file" name="fileToUploadTmplate" id="fileToUploadTmplate">
						*/ ?>


      		<p class="submit" style="">

	        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

			</p>
			</form>
		</div>

		<div id="admin-regty-section" class='srms-admin-main-tab' style='display:none;'>
			
			<form name="axceleratelink_srms_form_setup_form_tyreg" id='axceleratelink_srms_form_setup_form_tyreg' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      		
      		<input type="hidden" name="axceleratelink_hidden" value="regty-settings">
      		<h2>Registration Thankyou Section</h2>
			Message Content : <br>
			<?php
				$settings = array( 'textarea_name' => 'al_srms_tyreg_content', 'media_buttons' => false, 'wpautop' => false );

				wp_editor( ($regty_content[0] ? $regty_content[0] : 'Thank you for your Registration, Please Check your Email.'), 'mycustomeditor0', $settings );

				// echo $Mail_info[5];
		    ?>

		    <br><hr>
		    <h2>Enrollment Thankyou Section</h2>
			Message Content : <br>
			<?php
				$settings = array( 'textarea_name' => 'al_srms_tyreg_content2', 'media_buttons' => false, 'wpautop' => false  );

				wp_editor( ($regty_content[1] ? $regty_content[1] : 'Thank you for your Enrolment, Please Check your Email.'), 'mycustomeditor0a1', $settings );

				// echo $Mail_info[5];
		    ?>

		    <br><hr>
		    <h2>Payment Thankyou Section</h2>
			Message Content : <br>
			<?php
				$settings = array( 'textarea_name' => 'al_srms_tyreg_content3', 'media_buttons' => false, 'wpautop' => false  );

				wp_editor( ($regty_content[2] ? $regty_content[2] : 'Thank you. The payment has been received successfully.'), 'mycustomeditor0a2', $settings );

				// echo $Mail_info[5];
		    ?>

      		<p class="submit" style="">

	        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

			</p>
			</form>
		</div>

		<div id='admin-account-confirm-section' class='srms-admin-main-tab' style='display:none;'>
			<h2>Account Confirmation Section</h2>
			<form name="axceleratelink_srms_form_setup_form_account_setting" id='axceleratelink_srms_form_setup_form_account_setting' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      

        	<input type="hidden" name="axceleratelink_hidden" value="account-settings">

			<br><hr>
			<div class="input">
			Title Name : <input type='text' id='al_srms_section2_title' name='al_srms_section2_title' value='<?php echo ($Section_Title[1] ? $Section_Title[1] : "Account Section"); ?>'>
		    <span class="tooltip">A title displayed on Account Section.</span>
			</div>
		    </br><br>
		    <div class="input">
		    Section Descriptiom/Note:</br>
		    <span class="tooltip">A 1st message to display in the account section. Used html tags for the proper formatting.</span>
			</div>
		   <?php /* <textarea name='al_srms_section2_desc' rows="6" cols="80"><?php echo ($Section_Desc[1] ? $Section_Desc[1] : ' '); ?></textarea>*/?>
		    <?php
				$settings = array( 'textarea_name' => 'al_srms_section2_desc', 'media_buttons' => false, 'wpautop' => false  );

				wp_editor( ($Section_Desc[1] ? $Section_Desc[1] : ''), 'mycustomeditor_2desc', $settings );

				// echo $Mail_info[5];
		    ?>
		    </br><br>
		    <div class="input">
		    Account Descriptiom/Note:</br>
		     <span class="tooltip">A 2nd message to display in the account section. Used html tags for the proper formatting.</span>
			</div>
		    <?php /*<textarea name='al_srms_section3_desc' rows="6" cols="80"><?php echo ($Section_Desc[2] ? $Section_Desc[2] : 'Existing users, Please Login to enrol.<br> If you are registering for the first time, Please click Register below.'); ?></textarea> */ ?>
			 <?php
				$settings = array( 'textarea_name' => 'al_srms_section3_desc', 'media_buttons' => false, 'wpautop' => false );

				wp_editor( ($Section_Desc[2] ? $Section_Desc[2] : 'Existing users, Please Login to enrol.<br> If you are registering for the first time, Please click Register below.'), 'mycustomeditor_3desc', $settings );

				// echo $Mail_info[5];
		    ?>


			<br><br><hr>
			<div class="input">
			Title Name : <input type='text' id='al_srms_client_msg0' name='al_srms_client_msg0' value='<?php echo ($arr_msg_cli[0] ? $arr_msg_cli[0] : "Existing Client"); ?>'>
		    <span class="tooltip">A title displayed in the login form</span>
			</div>
		    </br><br>
		    <div class="input">
		    Section Descriptiom/Note:</br>
		    <span class="tooltip">A message to display in the login form. Used html tags for the proper formatting.</span>
			</div>
		    <?php /*<textarea name='al_srms_client_msg1' rows="6" cols="80"><?php echo ($arr_msg_cli[1] ? $arr_msg_cli[1] : 'If you have existing login with us, you can use it here. No need to create new account.'); ?></textarea> */ ?>
		    
		     <?php
				$settings = array( 'textarea_name' => 'al_srms_client_msg1', 'media_buttons' => false, 'wpautop' => false );

				wp_editor( ($arr_msg_cli[1] ? $arr_msg_cli[1] : 'If you have existing login with us, you can use it here. No need to create new account.'), 'mycustomeditor_cmsg1', $settings );

				// echo $Mail_info[5];
		    ?>
		    </br><br>
		    <div class="input">
		    Title Name : <input type='text' id='al_srms_client_msg2' name='al_srms_client_msg2' value='<?php echo ($arr_msg_cli[2] ? $arr_msg_cli[2] : "New Client"); ?>'>
		     <span class="tooltip">A title displayed in the link for creating a new account</span>
			</div>
		    </br><br>
		    <div class="input">
		    Section Descriptiom/Note:</br>
		    <span class="tooltip">A message to display in the link for creating a new account. Used html tags for the proper formatting.</span>
			</div>
		    <?php /*<textarea name='al_srms_client_msg3' rows="6" cols="80"><?php echo ($arr_msg_cli[3] ? $arr_msg_cli[3] : 'First Time with us? Please Create an Account to proceed.'); ?></textarea>*/ ?>
		    <?php
				$settings = array( 'textarea_name' => 'al_srms_client_msg3', 'media_buttons' => false, 'wpautop' => false );

				wp_editor( ($arr_msg_cli[3] ? $arr_msg_cli[3] : 'First Time with us? Please Create an Account to proceed.'), 'mycustomeditor_cmsg3', $settings );

				// echo $Mail_info[5];
		    ?>


		    </br><br>


			<p class="submit" style="">

	        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

			</p>
			</form>

		</div>

		<div id='admin-css-section' class='srms-admin-main-tab' style='display:none;'>
			<form name="axceleratelink_srms_form_setup_form_customcss_setting" id='axceleratelink_srms_form_setup_form_customcss_setting' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      

        	<input type="hidden" name="axceleratelink_hidden" value="custom-css-settings">
			
			<h2>Custom CSS</h2>
			<br><button type="button" id='set_css_default' style="">Set to Default</button> 
			<br><hr>
			<table>
				<tr><td colspan='3' class='td-center'><b>Course Section</b></td></tr>
				<tr>
					<td>Texts Color : </td><td><input name="al_css_course_texts_color" id='al_css_course_texts_color' class="color" value="<?php echo ($CustomCSS_Colors[7]? $CustomCSS_Colors[7] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Texts Font : </td><td><input type="number" name="al_css_course_text_font" id='al_css_course_text_font' class="" value="<?php echo ($CustomCSS_Fonts[6] ? $CustomCSS_Fonts[6] : '16') ?>"></td>
				</tr>
				<tr>
					<td>Title Texts Color : </td><td><input name="al_css_course_title_color" id='al_css_course_title_color' class="color" value="<?php echo ($CustomCSS_Colors[8]? $CustomCSS_Colors[8] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Title Texts Font : </td><td><input type="number" name="al_css_course_title_font" id='al_css_course_title_font' class="" value="<?php echo ($CustomCSS_Fonts[7] ? $CustomCSS_Fonts[7] : '24') ?>"></td>
				</tr>
				<tr>
					<td>Course List Color : </td><td><input name="al_css_course_list_color" id='al_css_course_list_color' class="color" value="<?php echo ($CustomCSS_Colors[9]? $CustomCSS_Colors[9] : '24890D' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Course List Font : </td><td><input type="number" name="al_css_course_list_font" id='al_css_course_list_font' class="" value="<?php echo ($CustomCSS_Fonts[8] ? $CustomCSS_Fonts[8] : '24') ?>"></td>
				</tr>
				<tr>
					<td>Course Table Header Color : </td><td><input name="al_css_course_thead_color" id='al_css_course_thead_color' class="color" value="<?php echo ($CustomCSS_Colors[10]? $CustomCSS_Colors[10] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Course Table Header Font : </td><td><input type="number" name="al_css_course_thead_font" id='al_css_course_thead_font' class="" value="<?php echo ($CustomCSS_Fonts[9] ? $CustomCSS_Fonts[9] : '14') ?>"></td>
				</tr>
				<tr>
					<td>Course Table Text Color : </td><td><input name="al_css_course_ttext_color" id='al_css_course_ttext_color' class="color" value="<?php echo ($CustomCSS_Colors[11]? $CustomCSS_Colors[11] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Course Table Text Font : </td><td><input type="number" name="al_css_course_ttext_font" id='al_css_course_ttext_font' class="" value="<?php echo ($CustomCSS_Fonts[10] ? $CustomCSS_Fonts[10] : '12') ?>"></td>
				</tr>

				<tr><td colspan='3' class='td-center'></td></tr>
				<tr><td colspan='3' class='td-center'><b>Account Confirm Section</b></td></tr>
				<tr>
					<td>Title Color : </td><td><input name="al_css_ac_title_color" id="al_css_ac_title_color" class="color" value="<?php echo ($CustomCSS_Colors[16]? $CustomCSS_Colors[16] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Title Font : </td><td><input type="number" name="al_css_ac_title_font" id="al_css_ac_title_font" class="" value="<?php echo ($CustomCSS_Fonts[12] ? $CustomCSS_Fonts[12] : '24') ?>"></td>
				</tr>
				<tr>
					<td>Sub Title Color : </td><td><input name="al_css_ac_sub_title_color" id="al_css_ac_sub_title_color" class="color" value="<?php echo ($CustomCSS_Colors[17]? $CustomCSS_Colors[17] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Sub Title Font : </td><td><input type="number" name="al_css_ac_sub_title_font" id="al_css_ac_sub_title_font" class="" value="<?php echo ($CustomCSS_Fonts[13] ? $CustomCSS_Fonts[13] : '22') ?>"></td>
				</tr>
				<tr>
					<td>Texts Color : </td><td><input name="al_css_ac_texts_color" id="al_css_ac_texts_color" class="color" value="<?php echo ($CustomCSS_Colors[18]? $CustomCSS_Colors[18] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Texts Font : </td><td><input type="number" name="al_css_ac_text_font" id="al_css_ac_text_font" class="" value="<?php echo ($CustomCSS_Fonts[14] ? $CustomCSS_Fonts[14] : '16') ?>"></td>
				</tr>
				<tr><td colspan='3' class='td-center'></td></tr>
				<tr><td colspan='3' class='td-center'><b>Registration Section</b></td></tr>
				<tr>
					<td>Field Texts Color : </td><td><input name="al_css_form_texts_color" id="al_css_form_texts_color" class="color" value="<?php echo ($CustomCSS_Colors[0]? $CustomCSS_Colors[0] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Field Label Font : </td><td><input type="number" name="al_css_form_labels_font" id="al_css_form_labels_font" class="" value="<?php echo ($CustomCSS_Fonts[0] ? $CustomCSS_Fonts[0] : '16') ?>"></td>
				</tr>
				<tr>
					<td>Tab Navigation Text Color : </td><td><input name="al_css_form_tab_navigation_color" id="al_css_form_tab_navigation_color" class="color" value="<?php echo ($CustomCSS_Colors[1]? $CustomCSS_Colors[1] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Tab Navigation Text Font : </td><td><input type="number" name="al_css_form_tab_navigation_font" id="al_css_form_tab_navigation_font" class="" value="<?php echo ($CustomCSS_Fonts[1] ? $CustomCSS_Fonts[1] : '16') ?>"></td>
				</tr>
				<tr>
					<td>Tab Title Color : </td><td><input name="al_css_form_tab_title_color" id="al_css_form_tab_title_color" class="color" value="<?php echo ($CustomCSS_Colors[2]? $CustomCSS_Colors[2] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Tab Title Font : </td><td><input type="number" name="al_css_form_tab_title_font" id="al_css_form_tab_title_font" class="" value="<?php echo ($CustomCSS_Fonts[2] ? $CustomCSS_Fonts[2] : '24') ?>"></td>
				</tr>
				<tr>
					<td>Tab Sub Title Color : </td><td><input name="al_css_form_tab_sub_title_color" id="al_css_form_tab_sub_title_color" class="color" value="<?php echo ($CustomCSS_Colors[3]? $CustomCSS_Colors[3] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Tab Sub Title Font : </td><td><input type="number" name="al_css_form_tab_sub_title_font" id="al_css_form_tab_sub_title_font" class="" value="<?php echo ($CustomCSS_Fonts[3] ? $CustomCSS_Fonts[3] : '22') ?>"></td>
				</tr>
				<tr>
					<td>Field Label Color : </td><td><input name="al_css_form_labels_color" id="al_css_form_labels_color" class="color" value="<?php echo ($CustomCSS_Colors[4]? $CustomCSS_Colors[4] : '000000' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Field Label Font : </td><td><input type="number" name="al_css_form_labels_font" id="al_css_form_labels_font" class="" value="<?php echo ($CustomCSS_Fonts[4] ? $CustomCSS_Fonts[4] : '16') ?>"></td>
				</tr>
				<tr>
					<td>Next/Prev Navigation Texts Color : </td><td><input name="al_css_form_nextprev_text_color" id="al_css_form_nextprev_text_color" class="color" value="<?php echo ($CustomCSS_Colors[5]? $CustomCSS_Colors[5] : 'ffffff' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Next/Prev Navigation Texts Font : </td><td><input type="number" name="al_css_form_nextprev_text_font" id="al_css_form_nextprev_text_font" class="" value="<?php echo ($CustomCSS_Fonts[5] ? $CustomCSS_Fonts[5] : '16') ?>"></td>
				</tr>
				<tr>
					<td>Next/Prev Navigation Background Color : </td><td><input name="al_css_form_nextprev_background_color" id="al_css_form_nextprev_background_color" class="color" value="<?php echo ($CustomCSS_Colors[6]? $CustomCSS_Colors[6] : '000000' ) ?>"></td>
				</tr>
				<tr>
					<td>Next/Prev Navigation Hover Color : </td><td><input name="al_css_form_nextprev_hover_color" id="al_css_form_nextprev_hover_color" class="color" value="<?php echo ($CustomCSS_Colors[19]? $CustomCSS_Colors[19] : '000000' ) ?>"></td>
				</tr>

				<tr><td colspan='3' class='td-center'></td></tr>
				<tr><td colspan='2' class='td-center'><b>Submit Buttons</b></td></tr>
				<tr>
					<td>Button Text Color : </td><td><input name="al_css_course_enrolbuttontxt_color" id="al_css_course_enrolbuttontxt_color" class="color" value="<?php echo ($CustomCSS_Colors[12]? $CustomCSS_Colors[12] : 'ffffff' ) ?>"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Button Text Font : </td><td><input type="number" name="al_css_course_enrolbuttontxt_font" id="al_css_course_enrolbuttontxt_font" class="" value="<?php echo ($CustomCSS_Fonts[11] ? $CustomCSS_Fonts[11] : '12') ?>"></td>
				</tr>
				<tr>
					<td>Button Background Color : </td><td><input name="al_css_course_enrolbuttontxt_background_color" id="al_css_course_enrolbuttontxt_background_color" class="color" value="<?php echo ($CustomCSS_Colors[13]? $CustomCSS_Colors[13] : '000000' ) ?>"></td>
				</tr>
				<tr>
					<td>Button Text Color in Hover : </td><td><input name="al_css_course_enrolbuttontxt_hover_color" id="al_css_course_enrolbuttontxt_hover_color" class="color" value="<?php echo ($CustomCSS_Fonts[14] ? $CustomCSS_Fonts[14] : 'ffffff') ?>"></td>
				</tr>
				
				<tr>
					<td>Button Background Color in Hover : </td><td><input type="text" name="al_css_course_enrolbuttonback_hover_color" id="al_css_course_enrolbuttonback_hover_color" class="color" value="<?php echo ($CustomCSS_Colors[15] ? $CustomCSS_Colors[15] : '000000') ?>"></td>
				</tr>
			</table>
			<p class="submit" style="">

	        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

			</p>
		</form>

		</div>


		<div id='admin-email-section' class='srms-admin-main-tab' style='display:none; min-height: 540px;'>
		<form name="axceleratelink_srms_form_setup_form_mail_setting" id='axceleratelink_srms_form_setup_form_mail_setting' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
      

        <input type="hidden" name="axceleratelink_hidden" value="email-settings">
			<h2>Email Format Section</h2>
			<br><hr>
			<div class='axceleratelink_srms_nav_mail_menu'>
		    	<ul>
		    		<li><a href="#mail-registration-enroll-tab" class='admin-mail-menu-link active'>Registration</a></li>
					<li><a href="#mail-enroll-tab" class='admin-mail-menu-link'>User Enrolment</a></li>
					<li><a href="#mail-directdep-tab" class='admin-mail-menu-link'>Direct Deposit</a></li>
					<!-- <li><a href="#mail-invoice-tab" class='admin-mail-menu-link'>Invoice</a></li> -->
		    	</ul>
		    </div>
		    <div id='mail-registration-enroll-tab' class='srms-admin-mail-tab' style='display:block;'> 
				<h3>Registration Email Information</h3>
				<p><i>For new registered and enroled contact.</i></p>
				<div style="float:;">
					<div class="input">
					<input class='checkbox_mail_dis' type='checkbox' id='' name='al_srms_opt_dis_mail1' value='true' <?php echo (isTabDisabled('mail1') === 'true' ? 'checked' : ''); ?>> Disable this Email? <br>
		        	<span class="tooltip">check to disable Registration Email.</span>
					</div>
		        	<br>
		    	</div>
				<table>
					<tr><td style="width: 70%;">
					<div class="input">
					Sender Email : <br><input type='text' id='al_srms_mailsent_sender' name='al_srms_mailsent_sender' value='<?php echo ($Mail_info[0] ? $Mail_info[0] : get_option('admin_email')); ?>'>
				    <span class="tooltip">The email address of the sender.</span>
					</div>
				    </br><br>
				    <div class="input">
				    Email Display Name: <br><input type='text' id='al_srms_mail_sendername' name='al_srms_mail_sendername' value='<?php echo ($Mail_info[6] ? $Mail_info[6] : 'Webmaster TIDE Training'); ?>'>
				   <span class="tooltip">The display name in the sent email.</span>
					</div>
				   </br><br>
				   <div class="input">
				    Subject Title : <br><input type='text' id='al_srms_mailsent_subject' name='al_srms_mailsent_subject' value='<?php echo ($Mail_info[1] ? $Mail_info[1] : 'Thank you for the Registration!'); ?>'>
				    <span class="tooltip">The title displayed in the email message.</span>
					</div>
				    </br><br>
				    Message Content :</br>
				    <!-- <textarea name='al_srms_mailsent_content' rows="6" cols="80"><?php echo ($Mail_info[2] ? $Mail_info[2] : 'Hello'); ?></textarea> -->
				    <?php
						$settings = array( 'textarea_name' => 'al_srms_mailsent_content', 'media_buttons' => false, 'wpautop' => false );

						wp_editor( ($Mail_info[2] ? $Mail_info[2] : 'Hello'), 'mycustomeditor', $settings );

						// echo $Mail_info[5];
				    ?>

				    <br><hr><br>
				    <div class="input">
				    <input class='' type='checkbox' id='' name='al_srms_opt_dis_mailelo1' value='true' <?php echo ($Mail_info[8] ? 'checked' : ''); ?>> Enable Email Message for Non ELearning? <br>
				    <span class="tooltip">check to enable Email Message for Non ELearning.</span>
					</div>
				    Message Content :</br>
				    <?php
						$settings = array( 'textarea_name' => 'al_srms_mailsent_contenteloa1', 'media_buttons' => false, 'wpautop' => false );

						wp_editor( ($Mail_info[9] ? $Mail_info[9] : 'Hello'), 'mycustomeditorelo1', $settings );
				    ?>
		        	
				</td><td>
					<h4>Message Content Shortcode</h4>
					<table>						
						<tr><td>Line Break</td><td>[[/n]]</td></tr>
						<tr><td>First Name</td><td>[[first_name]]</td></tr>
						<tr><td>Last Name</td><td>[[last_name]]</td></tr>
						<tr><td>Middle Name</td><td>[[middle_name]]</td></tr>
						<tr><td>User Name</td><td>[[username]]</td></tr>
						<tr><td>Password</td><td>[[password]]</td></tr>
						<tr><td>Email</td><td>[[email]]</td></tr>
						<tr><td>Course Name</td><td>[[course_name]]</td></tr>
						<tr><td>Course Location</td><td>[[course_location]]</td></tr>
						<tr><td>Course Start Date</td><td>[[course_startdate]]</td></tr>
						<tr><td>Course Finish Date</td><td>[[course_finishdate]]</td></tr>
						<tr><td>Course Cost</td><td>[[course_cost]]</td></tr>
						<tr><td>Axcelerate Link Portal</td><td>[[axcelerate_portal_link]]</td></tr>						
					</table>
				</td>
			</tr></table>
			</div>
			<div id='mail-enroll-tab' class='srms-admin-mail-tab' style='display:none;'> 
				<h3>Credit Card Enrolment Email Information</h3>
				<p><i>For registered contact to enrol a course.</i></p>
				<div style="float:;">
					<div class="input">
					<input class='checkbox_mail_dis' type='checkbox' id='' name='al_srms_opt_dis_mail2' value='true' <?php echo (isTabDisabled('mail2') === 'true' ? 'checked' : ''); ?>> Disable this Email? <br>
		        	<span class="tooltip">check to disable Enrolment Email.</span>
					</div>
		        	<br>
		    	</div>
				<table>
					<tr><td style="width: 70%;">
					<div class="input">
					Sender Email : <br><input type='text' id='al_srms_mailsent_sender2' name='al_srms_mailsent_sender2' value='<?php echo ($Mail_info[3] ? $Mail_info[3] : get_option('admin_email')); ?>'>
				    <span class="tooltip">The email address of the sender.</span>
				    </div>
				    </br><br>
				    <div class="input">
				    Email Display Name: <br><input type='text' id='al_srms_mail_sendername2' name='al_srms_mail_sendername2' value='<?php echo ($Mail_info[7] ? $Mail_info[7] : 'Webmaster TIDE Training'); ?>'>
				    <span class="tooltip">The display name in the sent email.</span>
					</div>
				    </br><br>
				    <div class="input">
				    Subject Title : <br><input type='text' id='al_srms_mailsent_subject2' name='al_srms_mailsent_subject2' value='<?php echo ($Mail_info[4] ? $Mail_info[4] : 'Thank you for the Enrolment!'); ?>'>
				    <span class="tooltip">The title displayed in the email message.</span>
					</div>
				    </br><br>
				    Message Content :</br>
				    <?php
						$settings = array( 'textarea_name' => 'al_srms_mailsent_content2', 'media_buttons' => false, 'wpautop' => false );

						wp_editor( ($Mail_info[5] ? $Mail_info[5] : 'Hello'), 'mycustomeditor2', $settings );

						// echo $Mail_info[5];
				    ?>

				    <br><hr><br>
				    <div class="input">
				    <input class='' type='checkbox' id='' name='al_srms_opt_dis_mailelo2' value='true' <?php echo ($Mail_info[10] ? 'checked' : ''); ?>> Enable Email Message for Non ELearning? <br>
				    <span class="tooltip">check to enable Email Message for Non ELearning.</span>
					</div>
				    Message Content :</br>
				    <?php
						$settings = array( 'textarea_name' => 'al_srms_mailsent_contenteloa2', 'media_buttons' => false, 'wpautop' => false );

						wp_editor( ($Mail_info[11] ? $Mail_info[11] : 'Hello'), 'mycustomeditorelo2', $settings );
				    ?>
				</td><td>
					<h4>Message Content Shortcode</h4>
					<table>
						<tr><td>Line Break</td><td>[[/n]]</td></tr>
						<tr><td>First Name</td><td>[[first_name]]</td></tr>
						<tr><td>Last Name</td><td>[[last_name]]</td></tr>
						<tr><td>Middle Name</td><td>[[middle_name]]</td></tr>
						<tr><td>Email</td><td>[[email]]</td></tr>
						<tr><td>Course Name</td><td>[[course_name]]</td></tr>
						<tr><td>Course Location</td><td>[[course_location]]</td></tr>
						<tr><td>Course Start Date</td><td>[[course_startdate]]</td></tr>
						<tr><td>Course Finish Date</td><td>[[course_finishdate]]</td></tr>
						<tr><td>Course Cost</td><td>[[course_cost]]</td></tr>
						<tr><td>Axcelerate Link Portal</td><td>[[axcelerate_portal_link]]</td></tr>
					</table>
				</td>
			</tr></table>
		</div>
		<div id='mail-directdep-tab' class='srms-admin-mail-tab' style='display:none;'> 
				<h3>Direct Deposit Enrolment Email Information</h3>
				<p><i>For registered contact to enrol a course.</i></p>
				<div style="float:;">
					<div class="input">
					<input class='checkbox_mail_dis' type='checkbox' id='' name='al_srms_opt_dis_mail3' value='true' <?php echo (isTabDisabled('mail3') === 'true' ? 'checked' : ''); ?>> Disable this Email? <br>
		        	<span class="tooltip">check to disable Direct Deposit Email.</span>
					</div>
		        	<br>
		    	</div>
				<table>
					<tr><td style="width: 70%;">
					<div class="input">
					Sender Email : <br><input type='text' id='al_srms_mailsent_sender3' name='al_srms_mailsent_sender3' value='<?php echo ($Mail_info[12] ? $Mail_info[12] : get_option('admin_email')); ?>'>
				    <span class="tooltip">The email address of the sender.</span>
				    </div>
				    </br><br>
				    <div class="input">
				     Email Display Name: <br><input type='text' id='al_srms_mail_sendername3' name='al_srms_mail_sendername3' value='<?php echo ($Mail_info[13] ? $Mail_info[13] : 'Webmaster TIDE Training'); ?>'>
				    <span class="tooltip">The display name in the sent email.</span>
					</div>
				    </br><br>
				    <div class="input">
				    Subject Title : <br><input type='text' id='al_srms_mailsent_subject3' name='al_srms_mailsent_subject3' value='<?php echo ($Mail_info[14] ? $Mail_info[14] : 'Thank you for the Enrolment!'); ?>'>
				    <span class="tooltip">The title displayed in the email message.</span>
					</div>
				    </br><br>
				    Message Content :</br>
				    <?php
						$settings = array( 'textarea_name' => 'al_srms_mailsent_content3', 'media_buttons' => false, 'wpautop' => false );

						wp_editor( ($Mail_info[15] ? $Mail_info[15] : 'Hello'), 'mycustomeditor3', $settings );

						// echo $Mail_info[5];
				    ?>				    
				</td><td>
					<h4>Message Content Shortcode</h4>
					<table>
						<tr><td>Line Break</td><td>[[/n]]</td></tr>
						<tr><td>First Name</td><td>[[first_name]]</td></tr>
						<tr><td>Last Name</td><td>[[last_name]]</td></tr>
						<tr><td>Middle Name</td><td>[[middle_name]]</td></tr>
						<tr><td>Email</td><td>[[email]]</td></tr>
						<tr><td>Course Name</td><td>[[course_name]]</td></tr>
						<tr><td>Course Location</td><td>[[course_location]]</td></tr>
						<tr><td>Course Start Date</td><td>[[course_startdate]]</td></tr>
						<tr><td>Course Finish Date</td><td>[[course_finishdate]]</td></tr>
						<tr><td>Course Cost</td><td>[[course_cost]]</td></tr>
						<tr><td>Axcelerate Link Portal</td><td>[[axcelerate_portal_link]]</td></tr>
					</table>
				</td>
			</tr></table>
		</div>
		<div id="mail-invoice-tab" class='srms-admin-mail-tab' style='display:none;'>
			<h3>Invoice Email Information</h3>
			<div style="float:;">
				<div class="input">
				<input class='checkbox_mail_dis' type='checkbox' id='' name='al_srms_mailinvoice_opt' value='true' <?php echo ($email_invoice[0] === 'true' ? 'checked' : ''); ?>> Disable this Email? <br>
	        	<span class="tooltip">check to disable Invoice Email.</span>
				</div>
	        	<br>
		    </div>

			<br><br>
			<div class="input">
			Sender Email : <br><input type='text' id='al_srms_mailinvoice_sender' name='al_srms_mailinvoice_sender' value='<?php echo ($email_invoice[1] ? $email_invoice[1]: get_option('admin_email')); ?>'>
		    <span class="tooltip">The email address of the sender.</span>
		    </div>
		    </br><br>
		    <div class="input">
		     Email Display Name: <br><input type='text' id='al_srms_mailinvoice_sendername' name='al_srms_mailinvoice_sendername' value='<?php echo ($email_invoice[2] ? $email_invoice[2] : 'Webmaster TIDE Training'); ?>'>
		    <span class="tooltip">The display name in the sent email.</span>
			</div>
		    </br><br>
		    <div class="input">
		    Subject Title : <br><input type='text' id='al_srms_mailinvoice_subject' name='al_srms_mailinvoice_subject' value='<?php echo ($email_invoice[3] ? $email_invoice[3] : 'Invoice of Enrolment'); ?>'>
		    <span class="tooltip">The title displayed in the email message.</span>
			</div>
			</br><br>
		    <div class="input">
		    Plan ID : <br><input type='text' id='al_srms_mailinvoice_planid' name='al_srms_mailinvoice_planid' value='<?php echo ($email_invoice[4] ? $email_invoice[4] : ''); ?>'>
		    <span class="tooltip">The plan ID of the template from axcelerate system.</span>
			</div>

				
		</div>


			<p class="submit" style="margin-top:;">
				<br><br>
	        	<input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

			</p>
		</form>
		</div>
		<div id='admin-registration-section' class='srms-admin-main-tab' style='display:none;'>

			<h2>Registration Section</h2>
			<button type="button" id='set_default' style="">Set to Default</button> 
			<div class='axceleratelink_srms_nav_menu'>
		    	<ul>
		    		<li id="reg-menu-Personal"><a href="#tab1" class='admin-menu-link active'>Personal</a></li>
					<li id="reg-menu-Contact"><a href="#tab2" class='admin-menu-link'>Contact</a></li>
					<li id="reg-menu-Address"><a href="#tab3" class='admin-menu-link'>Address</a></li>
					<li id="reg-menu-Demographics"><a href="#tab4" class='admin-menu-link'>Demographics</a></li>
					<li id="reg-menu-Employment"><a href="#tab5" class='admin-menu-link'>Employment/Education</a></li>
					<li id="reg-menu-Confirmation"><a href="#tab6" class='admin-menu-link'>Confirmation</a></li>
					<li id="reg-menu-Payment"><a href="#tab10" class='admin-menu-link'>Payment</a></li>
					<li id="reg-menu-CountryAdd"><a href="#tab7" class='admin-menu-link'>Country Address</a></li>
					<li id="reg-menu-CountryDem"><a href="#tab8" class='admin-menu-link'>Country Demographics</a></li>
					<li id="reg-menu-Languages"><a href="#tab9" class='admin-menu-link'>Languages List</a></li>
		    	</ul>
		    </div>	
	  
		<form name="axceleratelink_srms_form_setup_form" id='axceleratelink_srms_form_setup_form' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
	      

	        <input type="hidden" name="axceleratelink_hidden" value="registration-settings">

	        <div id='tab1' class='srms-admin-tab' style='display: block'>

				<h2>Tab 1</h2>
				<div class="input">
				Title Name : <input type='text' id='al_srms_tab1_title' name='al_srms_tab1_title' value='<?php echo ($Tab_Title[0] ? $Tab_Title[0] : "Personal Details"); ?>'>
				<span class="tooltip">A title displayed in the personal detail tab</span>
				</div>
		        <br><hr>
		        <table>
		        	<tr>
		        		<th>Field Name</th>
		        		<th>Enabled</th>
		        		<th>Displayed Field Title</th>
		        		<th>Mandatory Option</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
		        	</tr>
		        	<tr>
		        		<td>UserName</td>
		        		<td>
		        			<input class='checkbox_setopt' type='checkbox' name='al_srms_opt_username' value='true' <?php echo ($Cred_Opt[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_opt_tit_username' name='al_srms_opt_tit_username' value='<?php echo ($Cred_Tit[0] ? $Cred_Tit[0] : "Username"); ?>'></td>
		        		<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='username' disabled checked> Required</td>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_username_tk' value='true' <?php echo ($tk_username[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_username_tkmsg' name='al_srms_username_tkmsg' value='<?php echo ($tk_username[1] ? $tk_username[1] : "Please input username. a minimum of 5 characters"); ?>'></td>
		        	</tr>
		        	<tr>
		        		<td>Password</td>
		        		<td><input class='checkbox_setopt' type='checkbox' id='al_srms_opt_password' name='al_srms_opt_password' value='true' <?php echo ($Cred_Opt[1] === 'true' ? 'checked' : ''); ?>></td>
		        		<td><input type='text' id='al_srms_opt_tit_password' name='al_srms_opt_tit_password' value='<?php echo ($Cred_Tit[1] ? $Cred_Tit[1] : "Password"); ?>'></td>
		        		<td>&nbsp;&nbsp;<input class='checkbox_setreqa' type='checkbox' name='al_srms_field_req[]' value='password' disabled checked> Required</td>
		        		<?php $tk_password = get_option('axcelerate_password_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_password_tk' value='true' <?php echo ($tk_password[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_password_tkmsg' name='al_srms_password_tkmsg' value='<?php echo ($tk_password[1] ? $tk_password[1] : "Please input password. a minimum of 5 characters"); ?>'></td>
		        	
		        	</tr>
		        	<tr>
		        		<td>Title</td>
		        		<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_title' value='true' <?php echo ($Personal_Data_Opt[0] === 'true' ? 'checked' : ''); ?>></td>
		        		<td><input type='text' id='al_srms_opt_tit_title' name='al_srms_opt_tit_title' value='<?php echo ($Personal_Data_Tit[0] ? $Personal_Data_Tit[0] : "Title"); ?>'></td>
		        		<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='title' <?php echo (get_axl_req_fields('title') === 'title' ? 'checked' : ''); ?>> Required</td>
		        		<?php $tk_title = get_option('axcelerate_title_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_title_tk' value='true' <?php echo ($tk_title[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_title_tkmsg' name='al_srms_title_tkmsg' value='<?php echo ($tk_title[1] ? $tk_title[1] : "Please select title"); ?>'></td>		        	

		        	</tr>
					<tr>
						<td>Given Name</td>
						<td><input type="hidden" name="al_srms_opt_givenName" value='true'>
							<input disabled class='checkbox_setopt' type='checkbox' name='al_srms_opt_givenNameDisabled' value='true' <?php echo ($Personal_Data_Opt[1] === 'true' ? 'checked' : 'checked'); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_givenName' name='al_srms_opt_tit_givenName' value='<?php echo ($Personal_Data_Tit[1] ? $Personal_Data_Tit[1] : "Given Name"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreqa' type='checkbox' name='al_srms_field_req[]' value='given_name' disabled checked> Required</td>
						<?php $tk_givenname = get_option('axcelerate_givenname_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_givenname_tk' value='true' <?php echo ($tk_givenname[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_givenname_tkmsg' name='al_srms_givenname_tkmsg' value='<?php echo ($tk_givenname[1] ? $tk_givenname[1] : "Please intput given name"); ?>'></td>
					</tr>
					<tr>
						<td>Middle Name</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_middleName' value='true' <?php echo ($Personal_Data_Opt[2] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_middleName' name='al_srms_opt_tit_middleName' value='<?php echo ($Personal_Data_Tit[2] ? $Personal_Data_Tit[2] : "Middle Name"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='middle_name' <?php echo (get_axl_req_fields('middle_name') === 'middle_name' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_middlename = get_option('axcelerate_middlename_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_middlename_tk' value='true' <?php echo ($tk_middlename[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_middlename_tkmsg' name='al_srms_middlename_tkmsg' value='<?php echo ($tk_middlename[1] ? $tk_middlename[1] : "Please intput middle name"); ?>'></td>
					
					</tr>
					<tr>
						<td><input type="hidden" name="al_srms_opt_surname" value='true'>
							Surname</td>
						<td><input disabled class='checkbox_setopt' type='checkbox' name='al_srms_opt_surnameDisabled' value='true' <?php echo ($Personal_Data_Opt[3] === 'true' ? 'checked' : 'checked'); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_surname' name='al_srms_opt_tit_surname' value='<?php echo ($Personal_Data_Tit[3] ? $Personal_Data_Tit[3] : "Surname"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreqa' type='checkbox' name='al_srms_field_req[]' value='surname' disabled checked> Required</td>
						<?php $tk_surname = get_option('axcelerate_surname_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_surname_tk' value='true' <?php echo ($tk_surname[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_surname_tkmsg' name='al_srms_surname_tkmsg' value='<?php echo ($tk_surname[1] ? $tk_surname[1] : "Please intput surname"); ?>'></td>

					</tr>
					<tr>
						<td>Email Address</td>
						<td><input type="hidden" name="al_srms_opt_emailAddress" value='true'>
							<input disabled class='checkbox_setopt' type='checkbox' name='al_srms_opt_emailAddressDisabled' value='true' <?php echo ($Personal_Data_Opt[4] === 'true' ? 'checked' : 'checked'); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_emailAddress' name='al_srms_opt_tit_emailAddress' value='<?php echo ($Personal_Data_Tit[4] ? $Personal_Data_Tit[4] : "Email Address"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreqa' type='checkbox' name='al_srms_field_req[]' value='email' disabled checked> Required</td>
						<?php $tk_email = get_option('axcelerate_email_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_email_tk' value='true' <?php echo ($tk_email[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_email_tkmsg' name='al_srms_email_tkmsg' value='<?php echo ($tk_email[1] ? $tk_email[1] : "Please intput email address"); ?>'></td>

					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_dob' value='true' <?php echo ($Personal_Data_Opt[5] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_dob' name='al_srms_opt_tit_dob' value='<?php echo ($Personal_Data_Tit[5] ? $Personal_Data_Tit[5] : "Date of Birth"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='dob' <?php echo (get_axl_req_fields('dob') === 'dob' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_dob = get_option('axcelerate_dob_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_dob_tk' value='true' <?php echo ($tk_dob[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_dob_tkmsg' name='al_srms_dob_tkmsg' value='<?php echo ($tk_dob[1] ? $tk_dob[1] : "Please Select Date of Birth by day, month and year"); ?>'></td>

					</tr>
					<tr>
						<td>Gender</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_sex' value='true' <?php echo ($Personal_Data_Opt[6] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_sex' name='al_srms_opt_tit_sex' value='<?php echo ($Personal_Data_Tit[6] ? $Personal_Data_Tit[6] : "Gender"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='gender'  <?php echo (get_axl_req_fields('gender') === 'gender' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_gender = get_option('axcelerate_gender_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_gender_tk' value='true' <?php echo ($tk_gender[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_gender_tkmsg' name='al_srms_gender_tkmsg' value='<?php echo ($tk_gender[1] ? $tk_gender[1] : "Please Select gender"); ?>'></td>

					</tr>
		        </table>

		    </div>
		    <div id='tab2' class='srms-admin-tab' >
				

		        <h2>Tab 2</h2>
		        <div class="input">
				Title Name : <input type='text' id='al_srms_tab2_title' name='al_srms_tab2_title' value='<?php echo ($Tab_Title[1] ? $Tab_Title[1] : "Contact Details"); ?>'>
				<span class="tooltip">A title displayed in the contact detail tab</span>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div style="float:;">
					<br>
					<div class="input">
					<input class='checkbox_tab_dis' type='checkbox' id='' name='al_srms_opt_dis_tab2' value='true' <?php echo (isTabDisabled('tab2') === 'true' ? 'checked' : ''); ?>> Disable this Tab? <br>
		        	<span class="tooltip">check to disable the contact tab.</span>
					</div>
		        </div>
				<br><hr>
				
				<div style=''>
				<b>Tab 2 SubTitle 1 : </b> 
    			<div class="input">
    			<input type='text' id='al_srms_tab2_sub_title1' name='al_srms_tab2_sub_title1' value='<?php echo ($Tab2_Sub_Title[0] ? $Tab2_Sub_Title[0] : "Contact Phone Numbers"); ?>'>
    			<span class="tooltip">A sub title displayed in the contact phone number detail.</span>
				</div>
				<br>		
				<table >
					<tr>
		        		<th>Field Name</th>
		        		<th>Enabled</th>
		        		<th>Displayed Field Title</th>
		        		<th>Mandatory Option</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
		        	</tr>
		        	<tr>
		        		<td colspan='4' style='text-align:center;'> 
		        		</td>
		        	</tr>
					<tr>
						<td>Work Phone Number</td>
						<td><input class='checkbox_setopt' type='checkbox' id='' name='al_srms_opt_workphone' value='true' <?php echo ($Contact_Data_Opt[0] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_workphone' name='al_srms_opt_tit_workphone' value='<?php echo ($Contact_Data_Tit[0] ? $Contact_Data_Tit[0] : "Work Phone Number"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='workphone' <?php echo (get_axl_req_fields('workphone') === 'workphone' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_workphone = get_option('axcelerate_workphone_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_workphone_tk' value='true' <?php echo ($tk_workphone[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_workphone_tkmsg' name='al_srms_workphone_tkmsg' value='<?php echo ($tk_workphone[1] ? $tk_workphone[1] : "Please intput work phone number"); ?>'></td>


					</tr>
					<tr>
						<td>Mobile Phone Number</td>
						<td><input class='checkbox_setopt' type='checkbox' id='' name='al_srms_opt_mobilephone' value='true' <?php echo ($Contact_Data_Opt[1] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_mobilephone' name='al_srms_opt_tit_mobilephone' value='<?php echo ($Contact_Data_Tit[1] ? $Contact_Data_Tit[1] : "Mobile Phone Number"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='mobilephone' <?php echo (get_axl_req_fields('mobilephone') === 'mobilephone' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_mobphone = get_option('axcelerate_mobphone_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_mobphone_tk' value='true' <?php echo ($tk_mobphone[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_mobphone_tkmsg' name='al_srms_mobphone_tkmsg' value='<?php echo ($tk_mobphone[1] ? $tk_mobphone[1] : "Please intput mobile phone number"); ?>'></td>

					</tr>
					<tr>
						<td>Home Phone Number</td>
						<td><input class='checkbox_setopt' type='checkbox' id='' name='al_srms_opt_phone' value='true' <?php echo ($Contact_Data_Opt[2] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_phone' name='al_srms_opt_tit_phone' value='<?php echo ($Contact_Data_Tit[2] ? $Contact_Data_Tit[2] : "Home Phone Number"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='phone' <?php echo (get_axl_req_fields('phone') === 'phone' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_homephone = get_option('axcelerate_homephone_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_homephone_tk' value='true' <?php echo ($tk_homephone[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_homephone_tkmsg' name='al_srms_homephone_tkmsg' value='<?php echo ($tk_homephone[1] ? $tk_homephone[1] : "Please intput personal phone number"); ?>'></td>

					</tr>
				</table>
			</div>
			<br>
			<hr>
			<br>
			<div style=''>
				<b>Tab 2 SubTitle 2 : </b> 
				<div class="input">
				<input type='text' id='al_srms_tab2_sub_title2' name='al_srms_tab2_sub_title2' value='<?php echo ($Tab2_Sub_Title[1] ? $Tab2_Sub_Title[1] : "Emergency Contact"); ?>'>
				<span class="tooltip">A sub title displayed in the emergency contact detail.</span>
				</div>
				<br>
				<table>
					<tr>
		        		<th>Field Name</th>
		        		<th>Enabled</th>
		        		<th>Displayed Field Title</th>
		        		<th>Mandatory Option</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
		        	</tr>
					
					<tr>
						<td>Contact name</td>
						<td><input class='checkbox_setopt' type='checkbox' id='' name='al_srms_opt_EmergencyContact' value='true' <?php echo ($Contact_Data_Opt[3] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_EmergencyContact' name='al_srms_opt_tit_EmergencyContact' value='<?php echo ($Contact_Data_Tit[3] ? $Contact_Data_Tit[3] : "Contact name"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='emcontact' <?php echo (get_axl_req_fields('emcontact') === 'emcontact' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_contact = get_option('axcelerate_contact_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_contact_tk' value='true' <?php echo ($tk_contact[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_contact_tkmsg' name='al_srms_contact_tkmsg' value='<?php echo ($tk_contact[1] ? $tk_contact[1] : "Please intput full name of the contact person"); ?>'></td>

					</tr>
					<tr>
						<td>Relationship</td>
						<td><input class='checkbox_setopt' type='checkbox' id='' name='al_srms_opt_EmergencyContactRelation' value='true' <?php echo ($Contact_Data_Opt[4] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_EmergencyContactRelation' name='al_srms_opt_tit_EmergencyContactRelation' value='<?php echo  ($Contact_Data_Tit[4] ? $Contact_Data_Tit[4] :"Relationship"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='emcontactrel' <?php echo (get_axl_req_fields('emcontactrel') === 'emcontactrel' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_relation = get_option('axcelerate_relation_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_relation_tk' value='true' <?php echo ($tk_relation[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_relation_tkmsg' name='al_srms_relation_tkmsg' value='<?php echo ($tk_relation[1] ? $tk_relation[1] : "Please intput the relation of the contact person"); ?>'></td>

					</tr>
					<tr>
						<td>Contact Number</td>
						<td><input class='checkbox_setopt' type='checkbox' id='' name='al_srms_opt_EmergencyContactPhone' value='true' <?php echo ($Contact_Data_Opt[5] === 'true' ? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_EmergencyContactPhone' name='al_srms_opt_tit_EmergencyContactPhone' value='<?php echo ($Contact_Data_Tit[5] ? $Contact_Data_Tit[5] : "Contact Number"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='emcontactnum' <?php echo (get_axl_req_fields('emcontactnum') === 'emcontactnum' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_contactphone = get_option('axcelerate_contactphone_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_contactphone_tk' value='true' <?php echo ($tk_contactphone[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_contactphone_tkmsg' name='al_srms_contactphone_tkmsg' value='<?php echo ($tk_contactphone[1] ? $tk_contactphone[1] : "Please intput the phone number of the contact person"); ?>'></td>

					</tr>
		        </table>
		    </div>
				
			</div>
		    <div id='tab3' class='srms-admin-tab' >

				<h2>Tab 3</h2>
				<div class="input">
				Title Name : <input type='text' id='al_srms_tab3_title' name='al_srms_tab3_title' value='<?php echo ($Tab_Title[2] ? $Tab_Title[2] : "Address Details"); ?>'>
				<span class="tooltip">A title displayed in the address detail tab</span>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div style="float:;">
					<br>
					<div class="input">
					<input class='checkbox_tab_dis' type='checkbox' id='' name='al_srms_opt_dis_tab3' value='true' <?php echo (isTabDisabled('tab3') === 'true' ? 'checked' : ''); ?>> Disable this Tab? <br>
		        	<span class="tooltip">check to disable the address tab.</span>
					</div>
		        </div>

				<br><hr>
				<div class="input">
				<b>Tab 3 SubTitle 1 : </b> <input type='text' id='al_srms_tab3_sub_title1' name='al_srms_tab3_sub_title1' value='<?php echo ($Tab3_Sub_Title[0] ? $Tab3_Sub_Title[0] : "Postal Address"); ?>'>
				<span class="tooltip">A sub title displayed in the postal address detail.</span>
					</div><br>
				<table style=''>
		        	<tr>
		        		<th>Field Name</th>
		        		<th>Enabled</th>
		        		<th>Displayed Field Title</th>
		        		<th>Mandatory Option</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
		        	</tr>
					<tr>
						<td>Building Name</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_buildingName' value='true' <?php echo ($Address_Data_Opt[0] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_buildingName' name='al_srms_opt_tit_buildingName' value='<?php echo ($Address_Data_Tit[0] ? $Address_Data_Tit[0] : "Building Name"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='bname' <?php echo (get_axl_req_fields('bname') === 'bname' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_buildingName = get_option('axcelerate_buildingName_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_buildingName_tk' value='true' <?php echo ($tk_buildingName[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_buildingName_tkmsg' name='al_srms_buildingName_tkmsg' value='<?php echo ($tk_buildingName[1] ? $tk_buildingName[1] : "Please intput building name"); ?>'></td>

					</tr>
					<tr>
						<td>Unit Number</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_unitNo' value='true' <?php echo ($Address_Data_Opt[1] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_unitNo' name='al_srms_opt_tit_unitNo' value='<?php echo ($Address_Data_Tit[1] ? $Address_Data_Tit[1] : "Unit Number"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='unitno' <?php echo (get_axl_req_fields('unitno') === 'unitno' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_unitNo = get_option('axcelerate_unitNo_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_unitNo_tk' value='true' <?php echo ($tk_unitNo[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_unitNo_tkmsg' name='al_srms_unitNo_tkmsg' value='<?php echo ($tk_unitNo[1] ? $tk_unitNo[1] : "Please intput Unit number"); ?>'></td>

					</tr>
					<tr>
						<td>Street Number/Name</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_street' value='true' <?php echo ($Address_Data_Opt[2] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_street' name='al_srms_opt_tit_street' value='<?php echo ($Address_Data_Tit[2] ? $Address_Data_Tit[2] : "Street Number/Name"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='street' <?php echo (get_axl_req_fields('street') === 'street' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_street = get_option('axcelerate_street_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_street_tk' value='true' <?php echo ($tk_street[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_street_tkmsg' name='al_srms_street_tkmsg' value='<?php echo ($tk_street[1] ? $tk_street[1] : "Please intput street number and name"); ?>'></td>

					</tr>
					
					<tr>
						<td>PO Box</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_POBox' value='true' <?php echo ($Address_Data_Opt[3] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_POBox' name='al_srms_opt_tit_POBox' value='<?php echo ($Address_Data_Tit[3] ? $Address_Data_Tit[3] : "PO Box"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='pobox' <?php echo (get_axl_req_fields('pobox') === 'pobox' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_POBox = get_option('axcelerate_POBox_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_POBox_tk' value='true' <?php echo ($tk_POBox[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_POBox_tkmsg' name='al_srms_POBox_tkmsg' value='<?php echo ($tk_POBox[1] ? $tk_POBox[1] : "Please intput PO Box"); ?>'></td>

					</tr>

					<tr>
						<td>City/ Suburb</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_city' value='true' <?php echo ($Address_Data_Opt[4] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_city' name='al_srms_opt_tit_city' value='<?php echo ($Address_Data_Tit[4] ? $Address_Data_Tit[4] : "City/ Suburb"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='city' <?php echo (get_axl_req_fields('city') === 'city' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_city = get_option('axcelerate_city_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_city_tk' value='true' <?php echo ($tk_city[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_city_tkmsg' name='al_srms_city_tkmsg' value='<?php echo ($tk_city[1] ? $tk_city[1] : "Please intput City"); ?>'></td>

					</tr>
					<tr>
						<td>State</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_state' value='true' <?php echo ($Address_Data_Opt[5] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_state' name='al_srms_opt_tit_state' value='<?php echo ($Address_Data_Tit[5] ? $Address_Data_Tit[5] : "State"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='state' <?php echo (get_axl_req_fields('state') === 'state' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_state = get_option('axcelerate_state_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_state_tk' value='true' <?php echo ($tk_state[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_state_tkmsg' name='al_srms_state_tkmsg' value='<?php echo ($tk_state[1] ? $tk_state[1] : "Please intput State"); ?>'></td>
					</tr>
					<tr>
						<td>Post Code</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_postcode' value='true' <?php echo ($Address_Data_Opt[6] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_postcode' name='al_srms_opt_tit_postcode' value='<?php echo ($Address_Data_Tit[6] ? $Address_Data_Tit[6] : "Post Code"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='postcode' <?php echo (get_axl_req_fields('postcode') === 'postcode' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_postcode = get_option('axcelerate_postcode_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_postcode_tk' value='true' <?php echo ($tk_postcode[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_postcode_tkmsg' name='al_srms_postcode_tkmsg' value='<?php echo ($tk_postcode[1] ? $tk_postcode[1] : "Please intput Postal Code"); ?>'></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_country' value='true' <?php echo ($Address_Data_Opt[7] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_country' name='al_srms_opt_tit_country' value='<?php echo ($Address_Data_Tit[7] ? $Address_Data_Tit[7] : "Country"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='country' <?php echo (get_axl_req_fields('country') === 'country' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_country = get_option('axcelerate_country_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_country_tk' value='true' <?php echo ($tk_country[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_country_tkmsg' name='al_srms_country_tkmsg' value='<?php echo ($tk_country[1] ? $tk_country[1] : "Please select country"); ?>'></td>
					
					</tr>
					<tr>
						<td>Same as Postal Address</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_checkboxSamePostal' value='true' <?php echo ($Address_Data_Opt[8] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_checkboxSamePostal' name='al_srms_opt_tit_checkboxSamePostal' value='<?php echo ($Address_Data_Tit[8] ? $Address_Data_Tit[8] : "Same as Postal Address"); ?>'></td>
						<td></td>
						<?php $tk_checkboxSamePostal = get_option('axcelerate_checkboxSamePostal_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_checkboxSamePostal_tk' value='true' <?php echo ($tk_checkboxSamePostal[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_checkboxSamePostal_tkmsg' name='al_srms_checkboxSamePostal_tkmsg' value='<?php echo ($tk_checkboxSamePostal[1] ? $tk_checkboxSamePostal[1] : "Check to set Postal address value same with Residental address"); ?>'></td>
					
					</tr>
				</table>
				<br><hr><br>
				<div class="input">
				<b>Tab 3 SubTitle 1 : </b> <input type='text' id='al_srms_tab3_sub_title2' name='al_srms_tab3_sub_title2' value='<?php echo ($Tab3_Sub_Title[1] ? $Tab3_Sub_Title[1] : "Street Address"); ?>'>
				<span class="tooltip">A sub title displayed in the street/Residential address detail.</span>
					</div>
				<br>
				<?php $upmsg = get_option('axceleratelink_srms_opt_upmsg'); ?>
				<div class="input">
				<b>Text Description : </b> <br>
				<textarea id='al_srms_tab3_sub_title_msg' name='al_srms_tab3_sub_title_msg' style="width:50%;"> <?php echo ($upmsg ? $upmsg : ""); ?> </textarea>
				<span class="tooltip">A Message/Note displaed on street/Residential address detail.</span>
					</div>		
				<br>
				<table style=''>
					<tr>
		        		<th>Field Name</th>
		        		<th>Enabled</th>
		        		<th>Displayed Field Title</th>
		        		<th>Mandatory Option</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
		        	</tr>
					<tr>
						<td>Building Name</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_sbuildingName' value='true' <?php echo ($Address_Data_Opt[9] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_sbuildingName' name='al_srms_opt_tit_sbuildingName' value='<?php echo ($Address_Data_Tit[9] ? $Address_Data_Tit[9] : "Building Name"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='sbname' <?php echo (get_axl_req_fields('sbname') === 'sbname' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_sbuildingName = get_option('axcelerate_sbuildingName_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_sbuildingName_tk' value='true' <?php echo ($tk_sbuildingName[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_sbuildingName_tkmsg' name='al_srms_sbuildingName_tkmsg' value='<?php echo ($tk_sbuildingName[1] ? $tk_sbuildingName[1] : "Please input Building Name"); ?>'></td>
					
					</tr>
					<tr>
						<td>Unit Number</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_sunitNo' value='true' <?php echo ($Address_Data_Opt[10] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_sunitNo' name='al_srms_opt_tit_sunitNo' value='<?php echo ($Address_Data_Tit[10] ? $Address_Data_Tit[10] : "Unit Number"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='sunitno' <?php echo (get_axl_req_fields('sunitno') === 'sunitno' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_sunitNo = get_option('axcelerate_sunitNo_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_sunitNo_tk' value='true' <?php echo ($tk_sunitNo[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_sunitNo_tkmsg' name='al_srms_sunitNo_tkmsg' value='<?php echo ($tk_sunitNo[1] ? $tk_sunitNo[1] : "Please input unit number"); ?>'></td>
					
					</tr>
					<tr>
						<td>Street Number/Name</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_sstreet' value='true' <?php echo ($Address_Data_Opt[11] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_sstreet' name='al_srms_opt_tit_sstreet' value='<?php echo ($Address_Data_Tit[11] ? $Address_Data_Tit[11] : "Street Number/Name"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='sstreet' <?php echo (get_axl_req_fields('sstreet') === 'sstreet' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_sstreet = get_option('axcelerate_sstreet_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_sstreet_tk' value='true' <?php echo ($tk_sstreet[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_sstreet_tkmsg' name='al_srms_sstreet_tkmsg' value='<?php echo ($tk_sstreet[1] ? $tk_sstreet[1] : "Please input street number and name"); ?>'></td>
					
					</tr>
					<!--
					<tr>
						<td>PO Box</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_sPOBox' value='true' <?php echo ($Address_Data_Opt[12] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_sPOBox' name='al_srms_opt_tit_sPOBox' value='<?php echo ($Address_Data_Tit[12] ? $Address_Data_Tit[12] : "PO Box"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='spobox' <?php echo (get_axl_req_fields('spobox') === 'spobox' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_sPOBox = get_option('axcelerate_sPOBox_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_sPOBox_tk' value='true' <?php echo ($tk_sPOBox[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_sPOBox_tkmsg' name='al_srms_sPOBox_tkmsg' value='<?php echo ($tk_sPOBox[1] ? $tk_sPOBox[1] : "Please input PO Box"); ?>'></td>
					
					</tr>
				-->
					<tr>
						<td>City/ Suburb</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_scity' value='true' <?php echo ($Address_Data_Opt[13] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_scity' name='al_srms_opt_tit_scity' value='<?php echo ($Address_Data_Tit[13] ? $Address_Data_Tit[13] : "City/ Suburb"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='scity' <?php echo (get_axl_req_fields('scity') === 'scity' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_scity = get_option('axcelerate_scity_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_scity_tk' value='true' <?php echo ($tk_scity[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_scity_tkmsg' name='al_srms_scity_tkmsg' value='<?php echo ($tk_scity[1] ? $tk_scity[1] : "Please input city"); ?>'></td>
					
					</tr>
					<tr>
						<td>State</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_sstate' value='true' <?php echo ($Address_Data_Opt[14] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_sstate' name='al_srms_opt_tit_sstate' value='<?php echo ($Address_Data_Tit[14] ? $Address_Data_Tit[14] : "State"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='sstate' <?php echo (get_axl_req_fields('sstate') === 'sstate' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_sstate = get_option('axcelerate_sstate_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_sstate_tk' value='true' <?php echo ($tk_sstate[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_sstate_tkmsg' name='al_srms_sstate_tkmsg' value='<?php echo ($tk_sstate[1] ? $tk_sstate[1] : "Please select state city"); ?>'></td>
					
					</tr>
					<tr>
						<td>Post Code</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_spostcode' value='true' <?php echo ($Address_Data_Opt[15] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_spostcode' name='al_srms_opt_tit_spostcode' value='<?php echo ($Address_Data_Tit[15] ? $Address_Data_Tit[15] : "Post Code"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='spostcode' <?php echo (get_axl_req_fields('spostcode') === 'spostcode' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_spostcode = get_option('axcelerate_spostcode_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_spostcode_tk' value='true' <?php echo ($tk_spostcode[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_spostcode_tkmsg' name='al_srms_spostcode_tkmsg' value='<?php echo ($tk_spostcode[1] ? $tk_spostcode[1] : "Please select state"); ?>'></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_scountry' value='true' <?php echo ($Address_Data_Opt[16] === 'true'? 'checked' : ''); ?>></td>
						<td><input type='text' id='al_srms_opt_tit_scountry' name='al_srms_opt_tit_scountry' value='<?php echo ($Address_Data_Tit[16] ? $Address_Data_Tit[16] : "Country"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='scountry' <?php echo (get_axl_req_fields('scountry') === 'scountry' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_scountry = get_option('axcelerate_scountry_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_scountry_tk' value='true' <?php echo ($tk_scountry[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_scountry_tkmsg' name='al_srms_scountry_tkmsg' value='<?php echo ($tk_scountry[1] ? $tk_scountry[1] : "Please select country"); ?>'></td>
					</tr>
		        </table>
		    </div>

		    <div id='tab4' class='srms-admin-tab' >
				<h2>Tab 4</h2>
				<div class="input">
				Title Name : <input type='text' id='al_srms_tab4_title' name='al_srms_tab4_title' value='<?php echo ($Tab_Title[3] ? $Tab_Title[3] : "Demographics"); ?>'>
				<span class="tooltip">A title displayed in the Demographics detail.</span>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div style="float:;">
					<br>
					<div class="input">
					<input class='checkbox_tab_dis' type='checkbox' id='' name='al_srms_opt_dis_tab4' value='true' <?php echo (isTabDisabled('tab4') === 'true' ? 'checked' : ''); ?>> Disable this Tab? <br>
		        	<span class="tooltip">check to disable the address tab.</span>
					</div>
		        </div>

				<br><hr>
				<table>
					<tr>
		        		<th>Field Name</th>
		        		<th>Enabled</th>
		        		<th>Displayed Field Title</th>
		        		<th>Mandatory Option</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
		        	</tr>
					<tr>
						<td>Country of Birth</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_CountryofBirthID' value='true' <?php echo ($Demographics_Data_Opt[0] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_CountryofBirthID' name='al_srms_opt_tit_CountryofBirthID' value='<?php echo ($Demographics_Data_Tit[0] ? $Demographics_Data_Tit[0] : "Country of Birth"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='birth_country' <?php echo (get_axl_req_fields('birth_country') === 'birth_country' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_CountryofBirthID = get_option('axcelerate_CountryofBirthID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_CountryofBirthID_tk' value='true' <?php echo ($tk_CountryofBirthID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_CountryofBirthID_tkmsg' name='al_srms_CountryofBirthID_tkmsg' value='<?php echo ($tk_CountryofBirthID[1] ? $tk_CountryofBirthID[1] : "Please select country of birth"); ?>'></td>
					</tr>
					<tr>
						<td>City of Birth</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_CityofBirth' value='true' <?php echo ($Demographics_Data_Opt[1] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_CityofBirth' name='al_srms_opt_tit_CityofBirth' value='<?php echo ($Demographics_Data_Tit[1] ? $Demographics_Data_Tit[1] : "City of Birth"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='birth_city' <?php echo (get_axl_req_fields('birth_city') === 'birth_city' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_CityofBirth = get_option('axcelerate_CityofBirth_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_CityofBirth_tk' value='true' <?php echo ($tk_CityofBirth[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_CityofBirth_tkmsg' name='al_srms_CityofBirth_tkmsg' value='<?php echo ($tk_CityofBirth[1] ? $tk_CityofBirth[1] : "Please select city of birth"); ?>'></td>
					
					</tr>
					<tr>
						<td>Country of Citizenship</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_CountryofCitizenID' value='true' <?php echo ($Demographics_Data_Opt[2] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_CountryofCitizenID' name='al_srms_opt_tit_CountryofCitizenID' value='<?php echo ($Demographics_Data_Tit[2] ? $Demographics_Data_Tit[2] : "Country of Citizenship"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='cit_country' <?php echo (get_axl_req_fields('cit_country') === 'cit_country' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_CountryofCitizenID = get_option('axcelerate_CountryofCitizenID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_CountryofCitizenID_tk' value='true' <?php echo ($tk_CountryofCitizenID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_CountryofCitizenID_tkmsg' name='al_srms_CountryofCitizenID_tkmsg' value='<?php echo ($tk_CountryofCitizenID[1] ? $tk_CountryofCitizenID[1] : "Please select country of citisenship"); ?>'></td>
					
					</tr>
					<tr>
						<td>Aust. Citizenship Status</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_CitizenStatusID' value='true' <?php echo ($Demographics_Data_Opt[3] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_CitizenStatusID' name='al_srms_opt_tit_CitizenStatusID' value='<?php echo ($Demographics_Data_Tit[3] ? $Demographics_Data_Tit[3] : "Aust. Citizenship Status"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='aus_cit_status' <?php echo (get_axl_req_fields('aus_cit_status') === 'aus_cit_status' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_CitizenStatusID = get_option('axcelerate_CitizenStatusID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_CitizenStatusID_tk' value='true' <?php echo ($tk_CitizenStatusID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_CitizenStatusID_tkmsg' name='al_srms_CitizenStatusID_tkmsg' value='<?php echo ($tk_CitizenStatusID[1] ? $tk_CitizenStatusID[1] : "Please select Australian citisenship status"); ?>'></td>
					
					</tr>
					<tr>
						<td>Aboriginal or Torres Strait Islander Origin</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_IndigenousStatusID' value='true' <?php echo ($Demographics_Data_Opt[4] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_IndigenousStatusID' name='al_srms_opt_tit_IndigenousStatusID' value='<?php echo ($Demographics_Data_Tit[4] ? $Demographics_Data_Tit[4] : "Aboriginal or Torres Strait Islander Origin"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='ind_status' <?php echo (get_axl_req_fields('ind_status') === 'ind_status' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_IndigenousStatusID = get_option('axcelerate_IndigenousStatusID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_IndigenousStatusID_tk' value='true' <?php echo ($tk_IndigenousStatusID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_IndigenousStatusID_tkmsg' name='al_srms_IndigenousStatusID_tkmsg' value='<?php echo ($tk_IndigenousStatusID[1] ? $tk_IndigenousStatusID[1] : "Please select Aboriginal or Torres Strait Islander Origin status"); ?>'></td>
					
					</tr>
					<tr>
						<td>Language Identifier</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_MainLanguageID' value='true' <?php echo ($Demographics_Data_Opt[6] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_MainLanguageID' name='al_srms_opt_tit_MainLanguageID' value='<?php echo ($Demographics_Data_Tit[6] ? $Demographics_Data_Tit[6] : "Language Identifier"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='mlanguage' <?php echo (get_axl_req_fields('mlanguage') === 'mlanguage' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_MainLanguageID = get_option('axcelerate_MainLanguageID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_MainLanguageID_tk' value='true' <?php echo ($tk_MainLanguageID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_MainLanguageID_tkmsg' name='al_srms_MainLanguageID_tkmsg' value='<?php echo ($tk_MainLanguageID[1] ? $tk_MainLanguageID[1] : "Please select Language Identifier"); ?>'></td>
					
					</tr>
					<tr>
						<td>Proficiency in Spoken English</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_EnglishProficiencyID' value='true' <?php echo ($Demographics_Data_Opt[7] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_EnglishProficiencyID' name='al_srms_opt_tit_EnglishProficiencyID' value='<?php echo ($Demographics_Data_Tit[7] ? $Demographics_Data_Tit[7] : "Proficiency in Spoken English"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='english_status' <?php echo (get_axl_req_fields('english_status') === 'english_status' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_EnglishProficiencyID = get_option('axcelerate_EnglishProficiencyID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_EnglishProficiencyID_tk' value='true' <?php echo ($tk_EnglishProficiencyID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_EnglishProficiencyID_tkmsg' name='al_srms_EnglishProficiencyID_tkmsg' value='<?php echo ($tk_EnglishProficiencyID[1] ? $tk_EnglishProficiencyID[1] : "Please select Proficiency in Spoken English status"); ?>'></td>
										
					</tr>
					<tr>
						<td>English Assistance</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_EnglishAssistanceFlag' value='true' <?php echo ($Demographics_Data_Opt[8] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_EnglishAssistanceFlag' name='al_srms_opt_tit_EnglishAssistanceFlag' value='<?php echo ($Demographics_Data_Tit[8] ? $Demographics_Data_Tit[8] : "English Assistance"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='eng_assist' <?php echo (get_axl_req_fields('eng_assist') === 'eng_assist' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_EnglishAssistanceFlag = get_option('axcelerate_EnglishAssistanceFlag_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_EnglishAssistanceFlag_tk' value='true' <?php echo ($tk_EnglishAssistanceFlag[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_EnglishAssistanceFlag_tkmsg' name='al_srms_EnglishAssistanceFlag_tkmsg' value='<?php echo ($tk_EnglishAssistanceFlag[1] ? $tk_EnglishAssistanceFlag[1] : "Please select english assistance status"); ?>'></td>
					
					</tr>
					<tr>
						<td>Disabilities</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_DisabilityFlag' value='true' <?php echo ($Demographics_Data_Opt[5] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_DisabilityFlag' name='al_srms_opt_tit_DisabilityFlag' value='<?php echo ($Demographics_Data_Tit[5] ? $Demographics_Data_Tit[5] : "Disabilities"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='disabilities' <?php echo (get_axl_req_fields('disabilities') === 'disabilities' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_DisabilityFlag = get_option('axcelerate_DisabilityFlag_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_DisabilityFlag_tk' value='true' <?php echo ($tk_DisabilityFlag[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_DisabilityFlag_tkmsg' name='al_srms_DisabilityFlag_tkmsg' value='<?php echo ($tk_DisabilityFlag[1] ? $tk_DisabilityFlag[1] : "Please select disability status and choose values"); ?>'></td>
					
					</tr>
					<tr>
						<td>Drivers licence Front upload</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_driverlicence' id='al_srms_opt_driverlicence' value='true' <?php echo ($Demographics_Data_Opt[9] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_driverlicence' name='al_srms_opt_tit_driverlicence' value='<?php echo ($Demographics_Data_Tit[9] ? $Demographics_Data_Tit[9] : "Drivers licence front upload"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='driver' <?php echo (get_axl_req_fields('driver') === 'driver' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_driverlicence = get_option('axcelerate_driverlicence_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_driverlicence_tk' value='true' <?php echo ($tk_driverlicence[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_driverlicence_tkmsg' name='al_srms_driverlicence_tkmsg' value='<?php echo ($tk_driverlicence[1] ? $tk_driverlicence[1] : "Choose file to upload driver licence"); ?>'></td>
					
					</tr>
					<tr>
						<td>Drivers licence Back upload</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_driverlicence2' id='al_srms_opt_driverlicence2' value='true' <?php echo ($Demographics_Data_Opt[11] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_driverlicence2' name='al_srms_opt_tit_driverlicence2' value='<?php echo ($Demographics_Data_Tit[11] ? $Demographics_Data_Tit[11] : "Drivers licence back upload"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='driver2' <?php echo (get_axl_req_fields('driver2') === 'driver2' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_driverlicence2 = get_option('axcelerate_driverlicence2_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_driverlicence2_tk' value='true' <?php echo ($tk_driverlicence2[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_driverlicence2_tkmsg' name='al_srms_driverlicence2_tkmsg' value='<?php echo ($tk_driverlicence2[1] ? $tk_driverlicence2[1] : "Choose file to upload driver licence back"); ?>'></td>
					
					</tr>
					<tr>
						<td>Medicare card upload</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_medicarelicence' id='al_srms_opt_medicarelicence' value='true' <?php echo ($Demographics_Data_Opt[10] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_medicarelicence' name='al_srms_opt_tit_medicarelicence' value='<?php echo ($Demographics_Data_Tit[10] ? $Demographics_Data_Tit[10] : "Medicare Card upload"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='medical' <?php echo (get_axl_req_fields('medical') === 'medical' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_medicarelicence = get_option('axcelerate_medicarelicence_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_medicarelicence_tk' value='true' <?php echo ($tk_medicarelicence[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_medicarelicence_tkmsg' name='al_srms_medicarelicence_tkmsg' value='<?php echo ($tk_medicarelicence[1] ? $tk_medicarelicence[1] : "Choose file to upload medical licence"); ?>'></td>
					
					</tr>
					<tr>
						<td>Referral upload</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_referralform' id='al_srms_opt_referralform' value='true' <?php echo ($Demographics_Data2[0] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_referralform' name='al_srms_opt_tit_referralform' value='<?php echo ($Demographics_Data2[1] ? $Demographics_Data2[1] : "Referral Form"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='referral' <?php echo (get_axl_req_fields('referral') === 'referral' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_referralform = get_option('axcelerate_referralform_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_referralform_tk' value='true' <?php echo ($tk_referralform[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_referralform_tkmsg' name='al_srms_referralform_tkmsg' value='<?php echo ($tk_referralform[1] ? $tk_referralform[1] : "Choose file to upload referral form"); ?>'></td>
					
					</tr>
		        </table>
		        
		    </div>

		    <div id='tab5' class='srms-admin-tab' >

				<h2>Tab 5</h2>
				<div class="input">
				Title Name : <input type='text' id='al_srms_tab5_title' name='al_srms_tab5_title' value='<?php echo ($Tab_Title[4] ? $Tab_Title[4] : "Employment and Education"); ?>'>
				<span class="tooltip">A title displayed in the Employment and Education detail.</span>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div style="float:;">
					<br>
					<div class="input">
					<input class='checkbox_tab_dis' type='checkbox' id='' name='al_srms_opt_dis_tab5' value='true' <?php echo (isTabDisabled('tab5') === 'true' ? 'checked' : ''); ?>> Disable this Tab? <br>
					<span class="tooltip">check to disable the address tab.</span>
					</div>
				</div>
				
				<br><hr>
				<table>
					<tr>
		        		<th>Field Name</th>
		        		<th>Enabled</th>
		        		<th>Displayed Field Title</th>
		        		<th>Mandatory Option</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
		        	</tr>
					<tr>
						<td>Employment Status</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_LabourForceID' value='true' <?php echo ($EmploymentEducation_Data_Opt[0] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_LabourForceID' name='al_srms_opt_tit_LabourForceID' value='<?php echo ($EmploymentEducation_Data_Tit[0] ? $EmploymentEducation_Data_Tit[0] : "Employment Status"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='labour' <?php echo (get_axl_req_fields('labour') === 'labour' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_LabourForceID = get_option('axcelerate_LabourForceID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_LabourForceID_tk' value='true' <?php echo ($tk_LabourForceID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_LabourForceID_tkmsg' name='al_srms_LabourForceID_tkmsg' value='<?php echo ($tk_LabourForceID[1] ? $tk_LabourForceID[1] : "Please select employment status"); ?>'></td>
					
					</tr>
					<tr>
						<td>Occupation Identifier</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_ANZSCOCode' value='true' <?php echo ($EmploymentEducation_Data_Opt[1] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_ANZSCOCode' name='al_srms_opt_tit_ANZSCOCode' value='<?php echo ($EmploymentEducation_Data_Tit[1] ? $EmploymentEducation_Data_Tit[1] : "Occupation Identifier"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='occupation' <?php echo (get_axl_req_fields('occupation') === 'occupation' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_ANZSCOCode = get_option('axcelerate_ANZSCOCode_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_ANZSCOCode_tk' value='true' <?php echo ($tk_ANZSCOCode[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_ANZSCOCode_tkmsg' name='al_srms_ANZSCOCode_tkmsg' value='<?php echo ($tk_ANZSCOCode[1] ? $tk_ANZSCOCode[1] : "Please select occupation identifier"); ?>'></td>
					
					</tr>
					<tr>
						<td>Industry of Employment</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_ANZSICCode' value='true' <?php echo ($EmploymentEducation_Data_Opt[2] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_ANZSICCode' name='al_srms_opt_tit_ANZSICCode' value='<?php echo ($EmploymentEducation_Data_Tit[2] ? $EmploymentEducation_Data_Tit[2] : "Industry of Employment"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='employment' <?php echo (get_axl_req_fields('employment') === 'employment' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_ANZSICCode = get_option('axcelerate_ANZSICCode_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_ANZSICCode_tk' value='true' <?php echo ($tk_ANZSICCode[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_ANZSICCode_tkmsg' name='al_srms_ANZSICCode_tkmsg' value='<?php echo ($tk_ANZSICCode[1] ? $tk_ANZSICCode[1] : "Please select occupation identifier"); ?>'></td>
					
					</tr>
					<tr>
						<td>Learner Unique Identifier</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_LUI' value='true' <?php echo ($EmploymentEducation_Data_Opt[3] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_LUI' name='al_srms_opt_tit_LUI' value='<?php echo ($EmploymentEducation_Data_Tit[3] ? $EmploymentEducation_Data_Tit[3] : "Learner Unique Identifier"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='lui' <?php echo (get_axl_req_fields('lui') === 'lui' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_LUI = get_option('axcelerate_LUI_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_LUI_tk' value='true' <?php echo ($tk_LUI[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_LUI_tkmsg' name='al_srms_LUI_tkmsg' value='<?php echo ($tk_LUI[1] ? $tk_LUI[1] : "Please input 10 numeric character code"); ?>'></td>
					
					</tr>
					<tr>
						<td>Unique Student Identifier</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_USI' value='true' <?php echo ($EmploymentEducation_Data_Opt[4] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_USI' name='al_srms_opt_tit_USI' value="<?php echo ($EmploymentEducation_Data_Tit[4] ? $EmploymentEducation_Data_Tit[4] : "Unique Student Identifier"); ?>"></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='usi' <?php echo (get_axl_req_fields('usi') === 'usi' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_USI = get_option('axcelerate_USI_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_USI_tk' value='true' <?php echo ($tk_USI[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_USI_tkmsg' name='al_srms_USI_tkmsg' value='<?php echo ($tk_USI[1] ? $tk_USI[1] : "Please input 10 chracters of aplhanumeric, the letter must in uppercase. Excluding I, O, 0 and 1"); ?>'></td>
					
					</tr>
					<tr>
						<td>Attending Other School/s</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_AtSchoolFlag' value='true' <?php echo ($EmploymentEducation_Data_Opt[5] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_AtSchoolFlag' name='al_srms_opt_tit_AtSchoolFlag' value='<?php echo ($EmploymentEducation_Data_Tit[5] ? $EmploymentEducation_Data_Tit[5] : "Attending Other School/s"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='other_school' <?php echo (get_axl_req_fields('other_school') === 'other_school' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_AtSchoolFlag = get_option('axcelerate_AtSchoolFlag_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_AtSchoolFlag_tk' value='true' <?php echo ($tk_AtSchoolFlag[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_AtSchoolFlag_tkmsg' name='al_srms_AtSchoolFlag_tkmsg' value='<?php echo ($tk_AtSchoolFlag[1] ? $tk_AtSchoolFlag[1] : "Please select attending status. If have one, please enter school name."); ?>'></td>
					
					</tr>
					<tr>
						<td>Highest COMPLETED school level</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_HighestSchoolLevelID' value='true' <?php echo ($EmploymentEducation_Data_Opt[6] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_HighestSchoolLevelID' name='al_srms_opt_tit_HighestSchoolLevelID' value='<?php echo ($EmploymentEducation_Data_Tit[6] ? $EmploymentEducation_Data_Tit[6] : "Highest COMPLETED school level"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='school_level' <?php echo (get_axl_req_fields('school_level') === 'school_level' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_HighestSchoolLevelID = get_option('axcelerate_HighestSchoolLevelID_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_HighestSchoolLevelID_tk' value='true' <?php echo ($tk_HighestSchoolLevelID[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_HighestSchoolLevelID_tkmsg' name='al_srms_HighestSchoolLevelID_tkmsg' value='<?php echo ($tk_HighestSchoolLevelID[1] ? $tk_HighestSchoolLevelID[1] : "Please select Highest school level."); ?>'></td>
					
					</tr>
					<tr>
						<td>Year Completed</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_HighestSchoolLevelYear' value='true' <?php echo ($EmploymentEducation_Data_Opt[7] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_HighestSchoolLevelYear' name='al_srms_opt_tit_HighestSchoolLevelYear' value='<?php echo ($EmploymentEducation_Data_Tit[7] ? $EmploymentEducation_Data_Tit[7] : "Year Completed"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='year_completed' <?php echo (get_axl_req_fields('year_completed') === 'year_completed' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_HighestSchoolLevelYear = get_option('axcelerate_HighestSchoolLevelYear_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_HighestSchoolLevelYear_tk' value='true' <?php echo ($tk_HighestSchoolLevelYear[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_HighestSchoolLevelYear_tkmsg' name='al_srms_HighestSchoolLevelYear_tkmsg' value='<?php echo ($tk_HighestSchoolLevelYear[1] ? $tk_HighestSchoolLevelYear[1] : "Please select school year completed."); ?>'></td>
					
					</tr>
					<tr>
						<td>Prior Education</td>
						<td><input class='checkbox_setopt' type='checkbox' name='al_srms_opt_PriorEducationStatus' value='true' <?php echo ($EmploymentEducation_Data_Opt[8] === 'true' ? 'checked' : '');?>></td>
						<td><input type='text' id='al_srms_opt_tit_PriorEducationStatus' name='al_srms_opt_tit_PriorEducationStatus' value='<?php echo ($EmploymentEducation_Data_Tit[8] ? $EmploymentEducation_Data_Tit[8] : "Prior Education"); ?>'></td>
						<td>&nbsp;&nbsp;<input class='checkbox_setreq' type='checkbox' name='al_srms_field_req[]' value='prior_ed' <?php echo (get_axl_req_fields('prior_ed') === 'prior_ed' ? 'checked' : ''); ?>> Required</td>
						<?php $tk_PriorEducationStatus = get_option('axcelerate_PriorEducationStatus_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_PriorEducationStatus_tk' value='true' <?php echo ($tk_PriorEducationStatus[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_PriorEducationStatus_tkmsg' name='al_srms_PriorEducationStatus_tkmsg' value='<?php echo ($tk_PriorEducationStatus[1] ? $tk_PriorEducationStatus[1] : "Please select prior education status and choose values."); ?>'></td>
					
					</tr>
					
		        </table>
		    </div>

		    <div id='tab6' class='srms-admin-tab' >
		       	
				<h2>Tab 6</h2>
				<div class="input">
				Title Name : <input type='text' id='al_srms_tab6_title' name='al_srms_tab6_title' value='<?php echo ($Tab_Title[5] ? $Tab_Title[5] : "Confirm Submission"); ?>'>
				<span class="tooltip">A title displayed in the Confirm Submission detail.</span>
				</div>
				<br><hr>
				<div class="input">
				Terms and Condition<br>
				<input type='text' id='al_srms_opt_tit_terms' name='axl_srms_opt_terms' value='<?php echo ($dataTerms[0] ? $dataTerms[0] : "Terms and Conditions"); ?>'><br>
				<span class="tooltip">A title displayed in the Terms and Conditions. The testarea below is for the content.</span>
				</div><br>
				<div class="input">
				Terms and Condition caption Value.<br>
				<input type='text' id='axl_srms_opt_terms_val' name='axl_srms_opt_terms_val' value='<?php echo ($dataTerms[2] ? $dataTerms[2] : "Agree"); ?>'><br>
				<span class="tooltip">A caption displayed in the text box.</span>
				</div>
				<?php /*<textarea name='axl_srms_opt_terms_msg' style='width: 100%;'><?php echo ($dataTerms[1] ? $dataTerms[1] : "Hello World!"); ?></textarea>*/ ?>
				<?php
				$settings = array( 'textarea_name' => 'axl_srms_opt_terms_msg', 'media_buttons' => false, 'wpautop' => false );

				wp_editor( ($dataTerms[1] ? $dataTerms[1] : 'First Time with us? Please Create an Account to proceed.'), 'mycustomeditor_cmsg3term', $settings );

				// echo $Mail_info[5];
		    ?>

				
		    </div>

		    <div id='tab7' class='srms-admin-tab' >
		    	
				<h2>Countries for Address</h2>
				<p>Check to enable to display the country and uncheck to disable.</p>
				<hr>
				<button type="button" id='country-check-all'>Check all</button> 
				<button type="button" id='country-uncheck-all'>Unchek all</button> <br><br>
				<div class="country-container" style='height: 300px; overflow-y: scroll;'>
					
				<?php
				$pres_country = explode(";",$Dis_Country);
				foreach ($sacc_countries as $key  => $value) {
					$country_pres = '';
					foreach ($pres_country as $country){
						if($country == $key){
							$country_pres = $key;
						}
					}
					echo "<input class='check_country' type='checkbox' name='countries[]' value='".$key."' ".($country_pres ? 'checked' : '').">".$value."</br>";
				}
				?>
				</div>
			</div>

		    <div id='tab8' class='srms-admin-tab' >
		    	<h2>Countries for Demograpics</h2>
		    	<p>Check to enable to display the country and uncheck to disable.</p>
				<hr>
				<button type="button" id='dem-country-check-all'>Check all</button> 
				<button type="button" id='dem-country-uncheck-all'>Unchek all</button> <br><br>
				<div class="country-container" style='height: 300px; overflow-y: scroll;'>
					
				<?php
				$pres_dem_country = explode(";",$Dis_Dem_Country);
				foreach ($sacc_countries as $key  => $value) {
					$dem_country_pres = '';
					foreach ($pres_dem_country as $country){
						if($country == $key){
							$dem_country_pres = $key;
						}
					}
					echo "<input class='check_dem_country' type='checkbox' name='dem_countries[]' value='".$key."' ".($dem_country_pres ? 'checked' : '').">".$value."</br>";
				}
				?>
				</div>
		    </div>

		    <div id='tab9' class='srms-admin-tab' >

				
				<h2>Languages Lists</h2>
				<p>Check to enable to display the language and uncheck to disable.</p>
				<hr>
				<button type="button" id='language-check-all'>Check all</button> 
				<button type="button" id='language-uncheck-all'>Unchek all</button> <br><br>
				<div class="language-container" style='height: 300px; overflow-y: scroll;'>
					
				<?php
				$pres_language = explode(";",$Dis_Language);
				asort($sacc_languages);
				foreach ($sacc_languages as $key  => $value) {
					$language_pres = '';
					foreach ($pres_language as $language){
						if($language == $key){
							$language_pres = $key;
						}
					}
					echo "<input class='check_languages' type='checkbox' name='languages[]' value='".$key."' ".($language_pres ? 'checked' : '').">".$value."</br>";
				}
				?>
				</div>
			</div>
			 <div id='tab10' class='srms-admin-tab' >
		       	
				<h2>Payment Tab</h2>
				
				<div class="input">
				Title Name : <input type='text' id='al_srms_tab10_title' name='al_srms_tab10_title' value='<?php echo ($Tab_Title[6] ? $Tab_Title[6] : "Payment"); ?>'>
				<span class="tooltip">A title displayed in the Payment tab section.</span>
				</div>
				<br><hr>

				<div class="input">
			    Turn Off Payment:
			    <input name='axcelerate-payment-off' id='axcelerate-payment-off' type='checkbox' value='true' <?php echo ($payment_off == 'true' ? 'checked' : ''); ?>>
			    <span class="tooltip">Disable payment and enrols users directly to the course selected.</span>
				</div>
				<br><hr>
				<table>
					<tr>
						<th>Field Name</th>
						<th>Displayed Field Title</th>
		        		<th>Toolkit Enable</th>
		        		<th>Toolkit Message</th>
					</tr>
					<tr>
						<td>Payment Title</td>
						<td>
							<div class="input">
							<input type='text' id='al_srms_opt_tit_payment0' style="width:400px;" name='al_srms_opt_tit_payment0' value='<?php echo ($arr_payment_opt[0] ? $arr_payment_opt[0] : "Payment Type"); ?>'>
							<span class="tooltip">A title displayed in the Payment Type selection.</span>
							</div>
						</td>
						<?php $tk_paymenttitle = get_option('axcelerate_paymenttitle_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_paymenttitle_tk' value='true' <?php echo ($tk_paymenttitle[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_paymenttitle_tkmsg' name='al_srms_paymenttitle_tkmsg' value='<?php echo ($tk_paymenttitle[1] ? $tk_paymenttitle[1] : "Please select payment type"); ?>'></td>
					
					</tr>
					<tr>
						<td>Name on Card</td>
						<td>
							<div class="input">
							<input type='text' id='al_srms_opt_tit_payment1' style="width:400px;" name='al_srms_opt_tit_payment1' value='<?php echo ($arr_payment_opt[1] ? $arr_payment_opt[1] : "Name on Card"); ?>'>
							<span class="tooltip">A Field title displayed for the Card Name.</span>
							</div>
						</td>
						<?php $tk_cardname = get_option('axcelerate_cardname_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_cardname_tk' value='true' <?php echo ($tk_cardname[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_cardname_tkmsg' name='al_srms_cardname_tkmsg' value='<?php echo ($tk_cardname[1] ? $tk_cardname[1] : "Please input name of the card holder"); ?>'></td>
					
					</tr>
					<tr>
						<td>Card Number</td>
						<td>
							<div class="input">
								<input type='text' id='al_srms_opt_tit_payment2' style="width:400px;" name='al_srms_opt_tit_payment2' value='<?php echo ($arr_payment_opt[2] ? $arr_payment_opt[2] : "Card Number"); ?>'>
							<span class="tooltip">A Field title displayed for the Card Number.</span>
							</div>
						</td>
						<?php $tk_cardnumber = get_option('axcelerate_cardnumber_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_cardnumber_tk' value='true' <?php echo ($tk_cardnumber[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_cardnumber_tkmsg' name='al_srms_cardnumber_tkmsg' value='<?php echo ($tk_cardnumber[1] ? $tk_cardnumber[1] : "Please input number of the card "); ?>'></td>
					
					</tr>
					<tr>
						<td>CCV Number</td>
						<td>
							<div class="input">
								<input type='text' id='al_srms_opt_tit_payment3' style="width:400px;" name='al_srms_opt_tit_payment3' value='<?php echo ($arr_payment_opt[3] ? $arr_payment_opt[3] : "CCV Number"); ?>'>
							<span class="tooltip">A Field title displayed for the Card CCV Number.</span>
							</div>
						</td>
						<?php $tk_cardccv = get_option('axcelerate_cardccv_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_cardccv_tk' value='true' <?php echo ($tk_cardccv[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_cardccv_tkmsg' name='al_srms_cardccv_tkmsg' value='<?php echo ($tk_cardccv[1] ? $tk_cardccv[1] : "Please input CCV number of the card "); ?>'></td>
					
					</tr>
					<tr>
						<td>Expiry Month</td>
						<td>
							<div class="input">
								<input type='text' id='al_srms_opt_tit_payment4' style="width:400px;" name='al_srms_opt_tit_payment4' value='<?php echo ($arr_payment_opt[4] ? $arr_payment_opt[4] : "Expiry Month"); ?>'>
							<span class="tooltip">A Field title displayed for the Card Expiry Month.</span>
							</div>
						</td>
						<?php $tk_cardexpmonth = get_option('axcelerate_cardexpmonth_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_cardexpmonth_tk' value='true' <?php echo ($tk_cardexpmonth[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_cardexpmonth_tkmsg' name='al_srms_cardexpmonth_tkmsg' value='<?php echo ($tk_cardexpmonth[1] ? $tk_cardexpmonth[1] : "Please select expiry month of the card "); ?>'></td>
					
					</tr>
					<tr>
						<td>Expiry Year</td>
						<td>
							<div class="input">
								<input type='text' id='al_srms_opt_tit_payment5' style="width:400px;" name='al_srms_opt_tit_payment5' value='<?php echo ($arr_payment_opt[5] ? $arr_payment_opt[5] : "Expiry Year"); ?>'>
							<span class="tooltip">A Field title displayed for the Card Expiry Year.</span>
							</div>
						</td>
						<?php $tk_cardexpyear = get_option('axcelerate_cardexpyear_tk'); ?>
		        		<td>
		        			<input class='checkbox_tk' type='checkbox' name='al_srms_cardexpyear_tk' value='true' <?php echo ($tk_cardexpyear[0] === 'true' ? 'checked' : ''); ?>>
		        		</td>
		        		<td><input type='text' id='al_srms_cardexpmonth_tkmsg' name='al_srms_cardexpyear_tkmsg' value='<?php echo ($tk_cardexpyear[1] ? $tk_cardexpyear[1] : "Please select expiry year of the card "); ?>'></td>
					
					</tr>
				</table>

				<br><hr>
			    Top Descriptiom/Note:</br>
			    <p><i>A text displayed on the top of the payment form</i></p>
				</br>
			   
			    <?php
						$settings = array( 'textarea_name' => 'al_srms_opt_tit_payment6', 'wpautop' => false);

						wp_editor( ($arr_payment_opt[6] ? str_replace('\"', '', $arr_payment_opt[6]) : 'Hello'), 'al_srms_opt_tit_payment6', $settings );

						// echo $Mail_info[5];
				    ?>
			    </br><br>

			    Buttom Descriptiom/Note:</br>
			     <p><i>A text displayed on the Buttom of the payment form</i></p>
			    <?php
						$settings = array( 'textarea_name' => 'al_srms_opt_tit_payment7', 'wpautop' => false);

						wp_editor( ($arr_payment_opt[7] ? str_replace('\"', '', $arr_payment_opt[7]) : 'Hello'), 'al_srms_opt_tit_payment7', $settings );

						// echo $Mail_info[5];
				    ?>
			    </br><br>
<!--
			    Payment Icon : <?php echo ($arr_payment_opt[8] ? '<i>'.$arr_payment_opt[8].'</i>' : ''); ?></br>
			    <input type="file" name="fileToUploadPayment" id="fileToUploadPayment">
-->
				
		    </div>

			<p class="submit">

	        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

			</p>
	    </form>
		</div>

		<hr>
		

</div>
<?php
	$js_func_script = plugins_url(); 
	$js_func_script =$js_func_script.'/axcelerate-link/js/admin-script.js';
?>
<script type="text/javascript" src="<?php echo $js_func_script; ?>"></script>

<script type="text/javascript">
</script>