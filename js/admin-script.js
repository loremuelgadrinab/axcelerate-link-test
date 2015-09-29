
jQuery(document).ready(function(){
	function setCSSValueToDefault(){
		// course section
		jQuery('#al_css_course_texts_color').val('000000');
		jQuery('#al_css_course_text_font').val('16');
		jQuery('#al_css_course_title_color').val('000000');
		jQuery('#al_css_course_title_font').val('24');
		jQuery('#al_css_course_list_color').val('000000');
		jQuery('#al_css_course_list_font').val('24');
		jQuery('#al_css_course_thead_color').val('000000');
		jQuery('#al_css_course_thead_font').val('14');
		jQuery('#al_css_course_ttext_color').val('000000');
		jQuery('#al_css_course_ttext_font').val('12');
		//
		jQuery('#al_css_ac_title_color').val('000000');
		jQuery('#al_css_ac_title_font').val('24');
		jQuery('#al_css_ac_sub_title_color').val('000000');
		jQuery('#al_css_ac_sub_title_font').val('22');
		jQuery('#al_css_ac_texts_color').val('000000');
		jQuery('#al_css_ac_text_font').val('16');
		// 
		jQuery('#al_css_form_texts_color').val('000000');
		jQuery('#al_css_form_labels_font').val('16');
		jQuery('#al_css_form_tab_navigation_color').val('000000');
		jQuery('#al_css_form_tab_navigation_font').val('16');
		jQuery('#al_css_form_tab_title_color').val('000000');
		jQuery('#al_css_form_tab_title_font').val('24');
		jQuery('#al_css_form_tab_sub_title_color').val('000000');
		jQuery('#al_css_form_tab_sub_title_font').val('22');
		jQuery('#al_css_form_labels_color').val('000000');
		jQuery('#al_css_form_labels_font').val('16');
		jQuery('#al_css_form_nextprev_text_color').val('ffffff');
		jQuery('#al_css_form_nextprev_text_font').val('16');
		jQuery('#al_css_form_nextprev_background_color').val('000000');
		jQuery('#al_css_form_nextprev_hover_color').val('000000');
		//
		jQuery('#al_css_course_enrolbuttontxt_color').val('ffffff');
		jQuery('#al_css_course_enrolbuttontxt_font').val('12');
		jQuery('#al_css_course_enrolbuttontxt_background_color').val('000000');
		jQuery('#al_css_course_enrolbuttontxt_hover_color').val('ffffff');
		jQuery('#al_css_course_enrolbuttonback_hover_color').val('000000');
		
		isClicked = false;
		jQuery('#axceleratelink_srms_form_setup_form_customcss_setting').submit();
	}

	function setValueToDefault(){
			jQuery('.checkbox_setopt').attr('checked', true);			
			//Tab 1
			jQuery('#al_srms_opt_tit_username').val('Username');
			jQuery('#al_srms_opt_tit_password').val('Password');
			jQuery('#al_srms_tab1_title').val('Personal Details');
			jQuery('#al_srms_opt_tit_title').val('Title');
			jQuery('#al_srms_opt_tit_givenName').val('Given Name');
			jQuery('#al_srms_opt_tit_middleName').val('Middle Name');
			jQuery('#al_srms_opt_tit_surname').val('Surname');
			jQuery('#al_srms_opt_tit_emailAddress').val('Email Address');
			jQuery('#al_srms_opt_tit_dob').val('Date of Birth');
			jQuery('#al_srms_opt_tit_sex').val('Gender');
			// Tab 2
			jQuery('#al_srms_tab2_title').val('Contact Details');
			jQuery('#al_srms_tab2_sub_title1').val('Contact Phone Numbers');
			jQuery('#al_srms_opt_tit_workphone').val('Work Phone Number');
			jQuery('#al_srms_opt_tit_mobilephone').val('Mobile Phone Number');
			jQuery('#al_srms_opt_tit_phone').val('Home Phone Number');
			jQuery('#al_srms_tab2_sub_title2').val('Emergency Contact');
			jQuery('#al_srms_opt_tit_EmergencyContact').val('Contact name');
			jQuery('#al_srms_opt_tit_EmergencyContactRelation').val('Relationship');
			jQuery('#al_srms_opt_tit_EmergencyContactPhone').val('Contact Number');
			// tab 3
			jQuery('#al_srms_tab3_title').val('Address Details');
			jQuery('#al_srms_tab3_sub_title1').val('Postal Address');
			jQuery('#al_srms_opt_tit_buildingName').val('Building Name');
			jQuery('#al_srms_opt_tit_unitNo').val('Unit Number');
			jQuery('#al_srms_opt_tit_street').val('Street Number/Name');
			jQuery('#al_srms_opt_tit_POBox').val('PO Box');
			jQuery('#al_srms_opt_tit_city').val('City/ Suburb');
			jQuery('#al_srms_opt_tit_state').val('State');
			jQuery('#al_srms_opt_tit_postcode').val('Post Code');
			jQuery('#al_srms_opt_tit_country').val('Country');
			jQuery('#al_srms_opt_tit_checkboxSamePostal').val('Same as Postal Address');
			jQuery('#al_srms_tab3_sub_title2').val('Street Address');
			jQuery('#al_srms_opt_tit_sbuildingName').val('Building Name');
			jQuery('#al_srms_opt_tit_sunitNo').val('Unit Number');
			jQuery('#al_srms_opt_tit_sstreet').val('Street Number/Name');
			jQuery('#al_srms_opt_tit_sPOBox').val('PO Box');
			jQuery('#al_srms_opt_tit_scity').val('City/ Suburb');
			jQuery('#al_srms_opt_tit_sstate').val('State');
			jQuery('#al_srms_opt_tit_spostcode').val('Post Code');
			jQuery('#al_srms_opt_tit_scountry').val('Country');
			// tab 4
			jQuery('#al_srms_tab4_title').val('Demographics');
			jQuery('#al_srms_opt_tit_CountryofBirthID').val('Country of Birth');
			jQuery('#al_srms_opt_tit_CityofBirth').val('City of Birth');
			jQuery('#al_srms_opt_tit_CountryofCitizenID').val('Country of Citizenship');
			jQuery('#al_srms_opt_tit_CitizenStatusID').val('Aust. Citizenship Status');
			jQuery('#al_srms_opt_tit_IndigenousStatusID').val('Aboriginal or Torres Strait Islander Origin');
			jQuery("#al_srms_opt_tit_MainLanguageID").val('Language Identifier');
			jQuery("#al_srms_opt_tit_EnglishProficiencyID").val('Proficiency in Spoken English');
			jQuery("#al_srms_opt_tit_EnglishAssistanceFlag").val('English Assistance');
			jQuery('#al_srms_opt_tit_DisabilityFlag').val('Disabilities');
			jQuery('#al_srms_opt_tit_driverlicence').val('Drivers licence upload');
			jQuery('#al_srms_opt_tit_medicarelicence').val('Medicare licence upload');
			// tab 5
			jQuery('#al_srms_tab5_title').val('Employment and Education');
			jQuery('#al_srms_opt_tit_LabourForceID').val('Employment Status');
			jQuery('#al_srms_opt_tit_ANZSCOCode').val('Occupation Identifier');
			jQuery('#al_srms_opt_tit_ANZSICCode').val('Industry of Employment');
			jQuery('#al_srms_opt_tit_LUI').val('Learner Unique Identifier');
			jQuery('#al_srms_opt_tit_USI').val('Unique Student Identifier');
			jQuery('#al_srms_opt_tit_AtSchoolFlag').val('Attending Other School/s');
			jQuery('#al_srms_opt_tit_HighestSchoolLevelID').val('Highest COMPLETED school level');
			jQuery('#al_srms_opt_tit_HighestSchoolLevelYear').val('Year Completed ');
			jQuery('#al_srms_opt_tit_PriorEducationStatus').val('Prior Education ');
			jQuery('#al_srms_tab6_title').val('Confirm Submission');

			jQuery('.check_country').attr('checked', true);
			jQuery('.check_languages').attr('checked', true);
			jQuery('.check_dem_country').attr('checked', true);	
			jQuery('.checkbox_tab_dis').attr('checked', false);
			//jQuery('.checkbox_mail_dis').attr('checked', false);
			
			isClicked = false;
			jQuery('#axceleratelink_srms_form_setup_form').submit();
	}

	function confirmToSetDefaultValue(type){
		var response = confirm('Set all Value to Default?');
	     // OR var response = window.confirm('Confirm Test: Continue?');

	     if (response){
	     	alert("All Values were set to Default!");
	     	if(type == 'registration'){
	     		setValueToDefault();	
	     	}
	     	if(type == 'custom-css'){
	     		setCSSValueToDefault();
	     	}     	
	     } 
	}
	jQuery('.admin-menu-link').click(function(event){
		jQuery( ".admin-menu-link" ).removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.srms-admin-tab').hide();
		jQuery(jQuery(this).attr('href')).show();
		event.preventDefault();
    	return false;
	});
	jQuery('.admin-main-menu-link').click(function(event){
		jQuery( ".admin-main-menu-link" ).removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.srms-admin-main-tab').hide();
		jQuery(jQuery(this).attr('href')).show();
		event.preventDefault();
    	return false;
	});
	jQuery('.admin-mail-menu-link').click(function(event){
		jQuery( ".admin-mail-menu-link" ).removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.srms-admin-mail-tab').hide();
		jQuery(jQuery(this).attr('href')).show();
		event.preventDefault();
    	return false;
	});
	// Admin Set Default
	var isClicked = true;

	jQuery("#country-check-all").click(function(){
		jQuery('.check_country').attr('checked', true);
	});
	jQuery("#country-uncheck-all").click(function(){
		jQuery('.check_country').attr('checked', false);
	});
	jQuery("#dem-country-check-all").click(function(){
		jQuery('.check_dem_country').attr('checked', true);
	});
	jQuery("#dem-country-uncheck-all").click(function(){
		jQuery('.check_dem_country').attr('checked', false);
	});
	jQuery("#language-check-all").click(function(){
		jQuery('.check_languages').attr('checked', true);
	});
	jQuery("#language-uncheck-all").click(function(){
		jQuery('.check_languages').attr('checked', false);
	});
	jQuery('#set_default').click(function() {
		if(isClicked){			
			confirmToSetDefaultValue('registration');
		}else{
			isClicked = true;
		}
		
	});
	jQuery('#set_css_default').click(function() {
		if(isClicked){			
			confirmToSetDefaultValue('custom-css');
		}else{
			isClicked = true;
		}
		
	});

});