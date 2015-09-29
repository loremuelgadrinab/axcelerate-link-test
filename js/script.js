

jQuery(document).ready(function(){

	var DisabilityTypeIDs = '', priorEducationCheck = '', postalClicked = true;
	var personal_tab = '', contact_tab = '', address_tab = '', demographics_tab = '', employment_tab = '', confirmations_tab = '';

	function confirmationFilledUp(){
		// personal details
		jQuery('.disp').remove();
		jQuery('#dis_title').append('<span class="disp">' + jQuery('#title :selected').text() + '</span>');
		jQuery('#dis_gname').append('<span class="disp">' + jQuery('#givenName').val() + '</span>');
		jQuery('#dis_mname').append('<span class="disp">' + jQuery('#middleName').val() + '</span>');
		jQuery('#dis_sname').append('<span class="disp">' + jQuery('#surname').val() + '</span>');
		jQuery('#dis_email').append('<span class="disp">' + jQuery('#email').val() + '</span>');
		jQuery('#dis_dob').append('<span class="disp">' + jQuery('#dob').attr('data-value') + '</span>');
		jQuery('#dis_gender').append('<span class="disp">' + jQuery('.gender:checked').attr('data-value') + '</span>');

		// contaci details
		jQuery('#dis_workphone').append('<span class="disp">' + jQuery('#workphone').val() + '</span>');
		jQuery('#dis_mobilephone').append('<span class="disp">' + jQuery('#mobilephone').val() + '</span>');
		jQuery('#dis_homephone').append('<span class="disp">' + jQuery('#homephone').val() + '</span>');
		jQuery('#dis_EmergencyContact').append('<span class="disp">' + jQuery('#EmergencyContact').val() + '</span>');
		jQuery('#dis_EmergencyContactRelation').append('<span class="disp">' + jQuery('#EmergencyContactRelation').val() + '</span>');
		jQuery('#dis_EmergencyContactPhone').append('<span class="disp">' + jQuery('#EmergencyContactPhone').val() + '</span>');

		// Address Detail
		jQuery('#dis_buildingName').append('<span class="disp">' + jQuery('#buildingName').val() + '</span>');
		jQuery('#dis_unitNo').append('<span class="disp">' + jQuery('#unitNo').val() + '</span>');
		jQuery('#dis_street').append('<span class="disp">' + jQuery('#streetNo').val() + ' ' + jQuery('#streetName').val() + '</span>');
		// jQuery('#dis_streetName').append('<span class="disp">' + Query('#streetName').val() + '</span>');
		jQuery('#dis_POBox').append('<span class="disp">' + jQuery('#POBox').val() + '</span>');
		jQuery('#dis_city').append('<span class="disp">' + jQuery('#city').val() + '</span>');
		jQuery('#dis_sel_state1').append('<span class="disp">' + jQuery('#sel_state1').val() + '</span>');
		jQuery('#dis_postcode').append('<span class="disp">' + jQuery('#postcode').val() + '</span>');
		jQuery('#dis_country').append('<span class="disp">' + jQuery('#country').val() + '</span>');
		// jQuery('#dis_saddress1').append('<span class="disp">' + jQuery('#saddress1').val() + '</span>');
		// jQuery('#dis_saddress2').append('<span class="disp">' + jQuery('#saddress2').val() + '</span>');
		jQuery('#dis_sbuildingName').append('<span class="disp">' + jQuery('#sbuildingName').val() + '</span>');
		jQuery('#dis_sunitNo').append('<span class="disp">' + jQuery('#sunitNo').val() + '</span>');
		jQuery('#dis_sstreet').append('<span class="disp">' + jQuery('#sstreetNo').val() + ' ' + jQuery('#sstreetName').val() + '</span>');
		//jQuery('#dis_sstreetName').append('<span class="disp">' +  jQuery('#sstreetName').val() + '</span>');
		jQuery('#dis_sPOBox').append('<span class="disp">' + jQuery('#sPOBox').val() + '</span>');
		jQuery('#dis_scity').append('<span class="disp">' + jQuery('#scity').val() + '</span>');
		jQuery('#dis_sel_state2').append('<span class="disp">' + jQuery('#sel_state2').val() + '</span>');
		jQuery('#dis_spostcode').append('<span class="disp">' + jQuery('#spostcode').val() + '</span>');
		jQuery('#dis_scountry').append('<span class="disp">' + jQuery('#scountry').val() + '</span>');

		// demoghrapics
		jQuery('#dis_CountryofBirthID').append('<span class="disp">' + jQuery('#CountryofBirthID :selected').text() + '</span>');
		jQuery('#dis_CityofBirth').append('<span class="disp">' + jQuery('#CityofBirth').val() + '</span>');
		jQuery('#dis_CountryofCitizenID').append('<span class="disp">' + jQuery('#CountryofCitizenID :selected').text() + '</span>');
		jQuery('#dis_CitizenStatusID').append('<span class="disp">' + jQuery('#CitizenStatusID :selected').text() + '</span>');
		jQuery('#dis_IndigenousStatusID').append('<span class="disp">' + jQuery('.IndigenousStatusID:checked').attr('data-value') + '</span>');
		jQuery('#dis_DisabilityTypeIDs').append('<span class="disp">' + DisabilityTypeIDs + '</span>');
		jQuery('#dis_MainLanguageID').append('<span class="disp">' + jQuery('#MainLanguageID :selected').text() + '</span>');
		jQuery('#dis_EnglishProficiencyID').append('<span class="disp">' + jQuery('#EnglishProficiencyID :selected').text() + '</span>');
		jQuery('#dis_EnglishAssistanceFlag').append('<span class="disp">' + jQuery('.EnglishAssistanceFlag:checked').attr('data-value') + '</span>');
		jQuery('#dis_updriver').append('<span class="disp"><a href="' + jQuery('#fileDriverLiscence').attr('data-value') + '" data-lightbox="example-set1" data-title="Driver\'s Licence">Click to Preview</a></span>');
		jQuery('#dis_updriver2').append('<span class="disp"><a href="' + jQuery('#fileDriverLiscence2').attr('data-value') + '" data-lightbox="example-set2" data-title="Driver\'s Licence">Click to Preview</a></span>');
		jQuery('#dis_upmedic').append('<span class="disp"><a href="' + jQuery('#fileMedicLiscence').attr('data-value') + '" data-lightbox="example-set3" data-title="Medical Certificate">Click to Preview</a></span>');
		jQuery('#dis_uprefferal').append('<span class="disp">Upload complete</span>');
		

		//employment and education
		jQuery('#dis_LabourForceID').append('<span class="disp">' + jQuery('#LabourForceID :selected').text() + '</span>');
		jQuery('#dis_ANZSCOCode').append('<span class="disp">' + jQuery('#ANZSCOCode :selected').text() + '</span>');
		jQuery('#dis_ANZSICCode').append('<span class="disp">' + jQuery('#ANZSICCode :selected').text() + '</span>');
		jQuery('#dis_LUI').append('<span class="disp">' + jQuery('#LUI').val() + '</span>');
		if(jQuery('#LUI').val() == ''){
			jQuery('#dis_LUIcon').remove();
		}
		jQuery('#dis_USI').append('<span class="disp">' + jQuery('#USI').val() + '</span>');
		jQuery('#dis_AtSchoolName').append('<span class="disp">' + jQuery('#AtSchoolName').val() + '</span>');
		jQuery('#dis_HighestSchoolLevelID').append('<span class="disp">' + jQuery('#HighestSchoolLevelID :selected').text() + '</span>');
		jQuery('#dis_HighestSchoolLevelYear').append('<span class="disp">' + jQuery('#HighestSchoolLevelYear :selected').text() + '</span>');
		jQuery('#dis_priorEducationCheck').append('<span class="disp">' + priorEducationCheck + '</span>');

		// captcha
		//if(jQuery('#captcha-img').is(':visible') == false){
		//	jQuery('#captcha-canvas').show();
		//	var ctx = document.querySelector('canvas').getContext('2d');
		//	ctx.strokeText(jQuery('#thisval').val(), 10, 10);
		//}

	}

	function LUIDisplay(){
		if(jQuery("#sel_state1").val() == 'QLD' || jQuery("#sel_state2").val() == 'QLD'){
    		jQuery('#lui_con').show();
    	}else{
    		jQuery('#lui_con').hide();
    	}
	}

	function verifyPersonalDetails(){

		if(jQuery('#givenName').val() == ''){
			jQuery('#givenName_err_det').remove();
			jQuery('#givenName_err_con').append('<span id="givenName_err_det"><i style="color:red">This Field is Required!</i></span>');
		}else{
			jQuery('#givenName_err_det').remove();
		}

		if(jQuery('#surname').val() == ''){
			jQuery('#surname_err_det').remove();
			jQuery('#surname_err_con').append('<span id="surname_err_det"><i style="color:red">This Field is Required!</i></span>');
		}else{
			jQuery('#surname_err_det').remove();
		}

		if(jQuery('#email').val() == ''){
			jQuery('#email_err_det').remove();
			jQuery('#email_err_con').append('<span id="email_err_det"><i style="color:red">This Field is Required!</i></span>');
		}else{
			jQuery('#email_err_det').remove();
		}

		if(jQuery('#username').val() == ''){
			jQuery('#username_err_det').remove();
			jQuery('#username_err_con').append('<span id="username_err_det"><i style="color:red">This Field is Required!</i></span>');
		}else{
			jQuery('#username_err_det').remove();
		}


		if(jQuery('#password').val() == ''){
			jQuery('#password_err_det').remove();
			jQuery('#password_err_con').append('<span id="password_err_det"><i style="color:red">This Field is Required!</i></span>');
		}else{
			jQuery('#password_err_det').remove();
		}

		//var this_filename = jQuery('#givenName').val() + jQuery('#surname').val() + '-' + jQuery('#email').val();

		// file set names
		//jQuery('#fileDriverLiscence').attr('data-value', this_filename + '-DriverLicence');
		//jQuery('#fileMedicLiscence').attr('data-value', this_filename + '-MedicLicence');
		//jQuery('.file_dis_wrap').remove();
		//jQuery('#fileDriverLiscence_con').append('<div class="file_dis_wrap">Filename must be :<br> <i>' + this_filename + '-DriverLicence</i><div id="fileDriverLiscence_con_er"></div></div>');
		//jQuery('#fileMedicLiscence_con').append('<div class="file_dis_wrap">Filename must be :<br> <i>' + this_filename + '-MedicLicence</i><div id="fileMedicLiscence_con_er"></div></div>');
		
		
	}

	function check_required_field(elementID){
		//alert(jQuery(elementID).hasClass('input-text-required') + ' - ' + elementID + ' - ' + jQuery(elementID).val());
		if(jQuery(elementID).hasClass('input-text-required')){
			if(jQuery(elementID).val() == ''){
				jQuery(elementID).next('.reg-error').remove();
				jQuery(elementID).after('<p class="reg-error" style="color:red; margin: 0px;"><i>This Field is Required!</i></p>');
				return 'true';
			}else{
				jQuery(elementID).next('.reg-error').remove();
				return 'false';
			}
		}else{
			return 'none';
		}
	}

	function check_required_field_select(elementID){
		if(jQuery(elementID).hasClass('input-select-required')){
			if(jQuery(elementID + ' :selected').val() == ''){
				jQuery(elementID).next('.reg-error').remove();
				jQuery(elementID).after('<p class="reg-error" style="color:red; margin: 0px;"><i>This Field is Required!</i></p>');
				return 'true';
			}else{
				jQuery(elementID).next('.reg-error').remove();
				return 'false';
			}
		}else{
			return 'none';
		}
	}

	function check_required_field_file(elementID){
		if(jQuery(elementID).hasClass('input-file-required')){
			if(jQuery(elementID).val() == ''){
				jQuery(elementID).next('.reg-error').remove();
				jQuery(elementID).after('<p class="reg-error" style="color:red; margin: 0px;"><i>This Field is Required!</i></p>');
				return 'true';
			}else{
				jQuery(elementID).next('.reg-error').remove();
				return 'false';
			}
		}else{
			return 'none';
		}
	}
	// s

	jQuery('.DisabilityTypeIDs').click(function() {
		if(DisabilityTypeIDs == ''){
			 DisabilityTypeIDs = DisabilityTypeIDs + jQuery(this).attr('data-value');
		}else{
			 DisabilityTypeIDs = DisabilityTypeIDs + ', ' + jQuery(this).attr('data-value');
		}	   	
	});
	jQuery(".DisabilityTypeIDs:checked").each(function(){
	    if(DisabilityTypeIDs == ''){
			 DisabilityTypeIDs = DisabilityTypeIDs + jQuery(this).attr('data-value');
		}else{
			 DisabilityTypeIDs = DisabilityTypeIDs + ', ' + jQuery(this).attr('data-value');
		}	
	});
	jQuery('.priorEducationCheck').click(function() {
		if(priorEducationCheck == ''){
			 priorEducationCheck = priorEducationCheck + jQuery(this).attr('data-value');
		}else{
			 priorEducationCheck = priorEducationCheck + ', ' + jQuery(this).attr('data-value');
		}	   	
	});
	jQuery(".priorEducationCheck:checked").each(function(){
	    if(priorEducationCheck == ''){
			 priorEducationCheck = priorEducationCheck + jQuery(this).attr('data-value');
		}else{
			 priorEducationCheck = priorEducationCheck + ', ' + jQuery(this).attr('data-value');
		}		
	});

	function show_message(){

	};

	function getLocation() {
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } 
	}

	function showPosition(position) {
	   // alert("Latitude: " + position.coords.latitude + 
	    //"<br>Longitude: " + position.coords.longitude);	
		jQuery('#latitude').val(position.coords.latitude);
		jQuery('#longitude').val(position.coords.longitude);	    
	}

	function tab_visibility(elementLink){
		// personal
		var ismiddlenamereq = check_required_field('#middleName');
		var isdobreq = check_required_field('#dob');
		// contact
		var isreq_workphone = check_required_field('#workphone');
		var isreq_mobilephone = check_required_field('#mobilephone');
		var isreq_homephone = check_required_field('#homephone');
		var isreq_EmergencyContact = check_required_field('#EmergencyContact');
		var isreq_EmergencyContactRelation = check_required_field('#EmergencyContactRelation');
		var isreq_EmergencyContactPhone = check_required_field('#EmergencyContactPhone');
		// address
		var isreq_buildingName = check_required_field('#buildingName');
		var isreq_unitNo = check_required_field('#unitNo');
		var isreq_streetName = check_required_field('#streetName');
		var isreq_POBox = check_required_field('#POBox');
		var isreq_city = check_required_field('#city');
		var isreq_sel_state1 = check_required_field_select('#sel_state1');
		var isreq_postcode = check_required_field('#postcode');
		var isreq_country = check_required_field_select('#country');
		var isreq_sbuildingName = check_required_field('#sbuildingName');
		var isreq_sunitNo = check_required_field('#sunitNo');
		var isreq_sstreetName = check_required_field('#sstreetName');
		//var isreq_sPOBox = check_required_field('#sPOBox');
		var isreq_scity = check_required_field('#scity');
		var isreq_sel_state2 = check_required_field_select('#sel_state2');
		var isreq_spostcode = check_required_field('#spostcode');
		var isreq_scountry = check_required_field_select('#scountry');
		//demographics
		var isreq_CountryofBirthID = check_required_field_select('#CountryofBirthID');
		var isreq_CityofBirth = check_required_field('#CityofBirth');
		var isreq_CountryofCitizenID = check_required_field_select('#CountryofCitizenID');
		var isreq_CitizenStatusID = check_required_field_select('#CitizenStatusID');
		var isreq_MainLanguageID = check_required_field_select('#MainLanguageID');
		var isreq_EnglishProficiencyID = check_required_field_select('#EnglishProficiencyID');
		var isreq_fileDriverLiscence = check_required_field_file('#fileDriverLiscence');
		var isreq_fileMedicLiscence = check_required_field_file('#fileMedicLiscence');
		// education employment
		var isreq_LabourForceID = check_required_field_select('#LabourForceID');
		var isreq_ANZSCOCode = check_required_field_select('#ANZSCOCode');
		var isreq_ANZSICCode = check_required_field_select('#ANZSICCode');
		var isreq_USI = check_required_field('#USI');
		var isreq_HighestSchoolLevelID = check_required_field_select('#HighestSchoolLevelID');
		var isreq_HighestSchoolLevelYear = check_required_field_select('#HighestSchoolLevelYear');

/*		personal_tab
contact_tab
address_tab
demographics_tab
employment_tab
confirmations_tab*/
		
		if(jQuery('#personal-details').is(':visible')){
			//alert('personal');
			jQuery( ".headmenu" ).removeClass('active');
			jQuery('#head1').addClass('active');
			verifyPersonalDetails();
				
			//alert(ismiddlenamereq + ' -- ' + isdobreq);
			if(jQuery('#givenName').val() != '' && jQuery('#surname').val() != '' && jQuery('#email').val() != '' && jQuery('#username').val() != '' && jQuery('#password').val() != '' 
				&& ismiddlenamereq != 'true' && isdobreq != 'true'){
				//alert('true');
				jQuery('#nav-menu-personal-details').addClass('completed-section');
				jQuery('#personal-details').hide();
				jQuery(elementLink).show();
				jQuery('.reg-error').remove();

			}else{
				//alert('false');
				jQuery('#nav-menu-personal-details').removeClass('completed-section');
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head1').addClass('active');
				jQuery('.form-wrapper').hide();
				jQuery('#personal-details').show();
				
			}
			
		}

		if(jQuery('#contact-details').is(':visible')){
			//alert('contact');
			jQuery( ".headmenu" ).removeClass('active');
			jQuery('#head2').addClass('active');
			

			if(isreq_workphone != 'true' && isreq_mobilephone != 'true' && isreq_homephone != 'true' && isreq_EmergencyContact != 'true'
				&& isreq_EmergencyContactRelation != 'true' && isreq_EmergencyContactPhone != 'true'){

				jQuery('#nav-menu-contact-details').addClass('completed-section');
				jQuery('#contact-details').hide();
				jQuery(elementLink).show();
				jQuery('.reg-error').remove();

			}else{
				jQuery('#nav-menu-contact-details').removeClass('completed-section');
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head2').addClass('active');
				jQuery('.form-wrapper').hide();
				jQuery('#contact-details').show();

			}
		}

		if(jQuery('#address-details').is(':visible')){
			//alert('address');
			jQuery( ".headmenu" ).removeClass('active');
			jQuery('#head3').addClass('active');
			

			if(	isreq_buildingName != 'true' && isreq_unitNo != 'true' && isreq_streetName != 'true' && isreq_POBox != 'true' && isreq_city != 'true' && isreq_sel_state1 != 'true'
				&& isreq_postcode != 'true' && isreq_country != 'true' && isreq_sbuildingName != 'true' && isreq_sunitNo != 'true' && isreq_sstreetName != 'true' 
				&& isreq_scity != 'true' && isreq_sel_state2 != 'true' && isreq_spostcode != 'true' && isreq_scountry != 'true'){

				jQuery('#nav-menu-address-details').addClass('completed-section');
				jQuery('#address-details').hide();
				jQuery(elementLink).show();
				jQuery('.reg-error').remove();

			}else{
				jQuery('#nav-menu-address-detail').removeClass('completed-section');
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head3').addClass('active');
				jQuery('.form-wrapper').hide();
				jQuery('#address-details').show();

			}

		}

		if(jQuery('#demographics').is(':visible')){
			jQuery( ".headmenu" ).removeClass('active');
			jQuery('#head4').addClass('active');
			

			if( isreq_CountryofBirthID != 'true' && isreq_CityofBirth != 'true' && isreq_CountryofCitizenID != 'true' && isreq_CitizenStatusID != 'true' && isreq_MainLanguageID != 'true' 
				&& isreq_EnglishProficiencyID != 'true' && isreq_fileDriverLiscence != 'true' && isreq_fileMedicLiscence != 'true'){
				jQuery('#nav-menu-demographics').addClass('completed-section');
				jQuery('#demographics').hide();
				jQuery(elementLink).show();
				jQuery('.reg-error').remove();

			}else{
				jQuery('#nav-menu-demographics').removeClass('completed-section');
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head4').addClass('active');
				jQuery('.form-wrapper').hide();
				jQuery('#demographics').show();
			}
		}

		if(jQuery('#employment-and-education').is(':visible')){
			jQuery( ".headmenu" ).removeClass('active');
			jQuery('#head5').addClass('active');
			LUIDisplay();			

			if( isreq_LabourForceID != 'true' && isreq_ANZSCOCode != 'true' && isreq_ANZSICCode != 'true' && isreq_USI != 'true' && isreq_HighestSchoolLevelID != 'true' && isreq_HighestSchoolLevelYear != 'true'){

				jQuery('#nav-menu-employment-and-education').addClass('completed-section');
				jQuery('#employment-and-education').hide();
				jQuery(elementLink).show();
				jQuery('.reg-error').remove();

			}else{
				jQuery('#nav-menu-employment-and-education').removeClass('completed-section');
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head5').addClass('active');
				jQuery('.form-wrapper').hide();
				jQuery('#employment-and-education').show();

			}
		}

		if(jQuery('#confirmations').is(':visible')){
			jQuery( ".headmenu" ).removeClass('active');
			jQuery('#head7').addClass('active');			
			confirmationFilledUp();

			if(elementLink != '#confirmations'){
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#confirmations').hide();
				jQuery(elementLink + ' .headmenu').addClass('active');
				jQuery(elementLink).show();
				jQuery('.reg-error').remove();
			}
		}

	}

	//Head Button
	jQuery( ".headmenulink" ).click(function(e) {	

	var tabbed1 = jQuery('#nav-menu-personal-details').hasClass('completed-section');
	var tabbed2 = jQuery('#nav-menu-contact-details').hasClass('completed-section');
	var tabbed3 = jQuery('#nav-menu-address-details').hasClass('completed-section');
	var tabbed4 = jQuery('#nav-menu-demographics').hasClass('completed-section');
	var tabbed5 = jQuery('#nav-menu-employment-and-education').hasClass('completed-section');

		if(jQuery(this).attr('href') == '#personal-details' && !tabbed1 || !tabbed2 || !tabbed3 || !tabbed4 ||!tabbed5){
			 e.preventDefault();
		}else if(jQuery(this).attr('href') == '#contact-details' && !tabbed1 || !tabbed2 || !tabbed3 || !tabbed4 ||!tabbed5){
			 e.preventDefault();
		}else if(jQuery(this).attr('href') == '#address-details' && !tabbed1 || !tabbed2 || !tabbed3 || !tabbed4 ||!tabbed5){
			 e.preventDefault();
		}else if(jQuery(this).attr('href') == '#demographics' && !tabbed1 || !tabbed2 || !tabbed3 || !tabbed4 ||!tabbed5){
			 e.preventDefault();
		}else if(jQuery(this).attr('href') == '#employment-and-education' && !tabbed1 || !tabbed2 || !tabbed3 || !tabbed4 ||!tabbed5){
			 e.preventDefault();
		}else if(jQuery(this).attr('href') == '#confirmations' && !tabbed1 || !tabbed2 || !tabbed3 || !tabbed4 ||!tabbed5){
			 e.preventDefault();
		}else{

			tab_visibility(jQuery(this).attr('href'));	
			//jQuery( ".headmenu" ).removeClass('active');
			if(jQuery(this).attr('href') == '#personal-details' && jQuery(jQuery(this).attr('href')).is(':visible')){
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head1').addClass('active');
			}else if(jQuery(this).attr('href') == '#contact-details' && jQuery(jQuery(this).attr('href')).is(':visible')){
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head2').addClass('active');
			}else if(jQuery(this).attr('href') == '#address-details' && jQuery(jQuery(this).attr('href')).is(':visible')){
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head3').addClass('active');
			}else if(jQuery(this).attr('href') == '#demographics' && jQuery(jQuery(this).attr('href')).is(':visible')){
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head4').addClass('active');
			}else if(jQuery(this).attr('href') == '#employment-and-education' && jQuery(jQuery(this).attr('href')).is(':visible')){
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head5').addClass('active');
			}else if(jQuery(this).attr('href') == '#confirmations' && jQuery(jQuery(this).attr('href')).is(':visible')){
				jQuery( ".headmenu" ).removeClass('active');
				jQuery('#head7').addClass('active');
			}	
		}
	});


	// Next Button
	jQuery( ".linkmenu" ).click(function() {
		tab_visibility(jQuery(this).attr('href'));
	});

	// Prev Button
	jQuery( ".back_linkmenu" ).click(function() {
		// alert(jQuery(this).attr('href'));
		jQuery( ".headmenu" ).removeClass('active');
		if(jQuery(this).attr('href') == '#personal-details'){
			jQuery('#head1').addClass('active');
		}
		if(jQuery(this).attr('href') == '#contact-details'){
			jQuery('#head2').addClass('active');
		}
		if(jQuery(this).attr('href') == '#address-details'){
			jQuery('#head3').addClass('active');
		}
		if(jQuery(this).attr('href') == '#demographics'){
			jQuery('#head4').addClass('active');
		}
		if(jQuery(this).attr('href') == '#employment-and-education'){
			jQuery('#head5').addClass('active');
		}
		if(jQuery(this).attr('href') == '#course-section'){
			jQuery('#head6').addClass('active');   	
		}
		if(jQuery(this).attr('href') == '#student-identifiers'){
			//jQuery('#head4').addClass('active');
		}
		
		jQuery('.form-wrapper').hide();
		jQuery(jQuery(this).attr('href')).show();
	});

	jQuery('#DisabilityStatusYes').click(function() {
		jQuery( "#DisabilityTypeList" ).show();
	});

	jQuery('.DisabilityFlagnull').click(function() {
		jQuery( "#DisabilityTypeList" ).hide();
	});

	jQuery('#SchoolStatus1').click(function() {
		jQuery( "#schoolname" ).show();
	});

	jQuery('#SchoolStatus0').click(function() {
		jQuery( "#schoolname" ).hide();
	});

	jQuery('#priorEducationRadio1').click(function() {
		jQuery( "#PriorEducation" ).show();
	});

	jQuery('.priorEducationnull').click(function() {
		jQuery( "#PriorEducation" ).hide();
	});

	jQuery( "#year" ).on('change', function() {        
    	jQuery( "#dob" ).val(jQuery( "#year").val() + '-' + jQuery( "#month" ).val() + '-' + jQuery( "#day" ).val());
    	jQuery( "#dob" ).attr('data-value',jQuery( "#day").val() + '-' + jQuery( "#month" ).val() + '-' + jQuery( "#year" ).val());
	});
	jQuery( "#day" ).on('change', function() {        	
    	jQuery( "#dob" ).val(jQuery( "#year").val() + '-' + jQuery( "#month" ).val() + '-' + jQuery( "#day" ).val());
    	jQuery( "#dob" ).attr('data-value',jQuery( "#day").val() + '-' + jQuery( "#month" ).val() + '-' + jQuery( "#year" ).val());
	});
	jQuery( "#month" ).on('change', function() {        	
    	jQuery( "#dob" ).val(jQuery( "#year").val() + '-' + jQuery( "#month" ).val() + '-' + jQuery( "#day" ).val());
    	jQuery( "#dob" ).attr('data-value',jQuery( "#day").val() + '-' + jQuery( "#month" ).val() + '-' + jQuery( "#year" ).val());
	});


	jQuery( "#email" ).blur(function() {
	    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	    var contactID = '';
	    if(jQuery('#contactID')){
	    	contactID = jQuery('#contactID').val();
	    }
	    if (testEmail.test(this.value)){
	    	jQuery("#email_err").remove();
	    } else{
	    	jQuery("#email_err").remove();
	    	jQuery("#email_label").append('<span id="email_err"><i style="color:red">' + this.value + ' is Invalid Email!</i></span>');
		    jQuery("#email").val('');
	    }

	    // 
	    jQuery('.email-massage').after('<div class="alert alert-danger emailcheck-w" style="color:green;">Checking...</div>');
                            	
	 	jQuery.ajax(
                    {
                        url: jQuery('#ajax_url').val(),
                        type: "POST",
                        dataType: "json",
                        data: {
                            action: 'checkUserEmailExistentVal',
                            email: jQuery(this).val(),
                            contactID: contactID,
                        },
                        async: false,
                        success: function (data)
                        {
                        	//alert(data + ' | '+ data.validation);
                        	jQuery('.emailcheck-w').remove();
                            if (data.validation != 'true'){
                                //jQuery('.email-massage').html('<div class="alert alert-success">Email Address is Available</div>');
                            //}else{
                                jQuery('.email-massage').html('<div class="alert alert-danger emailcheck-c" style="color:red;">' + jQuery('#email').attr('data-value') + '</div>');
                            	jQuery("#email").val('');
                            }else{
                            	jQuery('.emailcheck-c').remove();
                            }
                            
                        },
                       // error: function (jqXHR, textStatus, errorThrown)
                      //  {
                       //     jQuery('.email-massage').html('<div class="alert alert-danger"><strong>Oops!</strong> Something went wrong.</div>');
                      //  }
                    });
    });

	jQuery('#username').blur(function() {
		
		jQuery('.username-massage').after('<div class="alert alert-danger usercheck-w" style="color:green;">Checking....</div>');

		jQuery.ajax(
        {
            url: jQuery('#ajax_url').val(),
            type: "POST",
            dataType: "json",
            data: {
                action: 'checkUsernameExistentVal',
                username: jQuery(this).val(),
            },
            async: false,
            success: function (data)
            {
            	//alert(data + ' | '+ data.validation);
            	jQuery('.usercheck-w').remove();
                if (data.validation != 'true'){
                    //jQuery('.username-massage').html('<div class="alert alert-success">Username is Available</div>');
               // }else{
                    jQuery('.username-massage').html('<div class="alert alert-danger usercheck-c" style="color:red;">' + jQuery('#username').attr('data-value') + '</div>');
                	jQuery("#username").val('');
                }else{
                	jQuery('.usercheck-c').remove();
                }
                

            },
            //error: function (jqXHR, textStatus, errorThrown)
           // {
            //    jQuery('.username-massage').html('<div class="alert alert-danger"><strong>Oops!</strong> Something went wrong.</div>');
           // }
        });

	});

	jQuery('#captcha-refresh').click(function() {
		jQuery.ajax(
        {
            url: jQuery('#ajax_url').val(),
            type: "POST",
            dataType: "json",
            data: {
                action: 'captchaRefreshing',
            },
            async: false,
            success: function (data)
            {
            	//alert(data + data.captcha_value);
                if (data.captcha_value ){
                    jQuery('#captcha-img').attr('src', jQuery("#thisval").attr('data-value') + data.captcha_value);
                	jQuery("#thisval").val(data.captcha_value);
                }else{
                }

            },
        });
	});

    jQuery( "#emailcheck" ).blur(function() {
	    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	    if (testEmail.test(this.value)){
	    	jQuery("#emailcheck_err").remove();
	    } else{
	    	jQuery("#emailcheck_err").remove();
	    	jQuery("#emailcheck_label").append('<span id="emailcheck_err"><i style="color:red">' + this.value + ' is Invalid Email!</i></span>');
		    jQuery("#emailcheck").val('');
	    }
    });

	jQuery( "#mobilephone_input" ).blur(function() {  
		jQuery('#mobilephone').val(jQuery('#mobilephone_code').val() + jQuery('#mobilephone_input').val());
	});
	jQuery( "#mobilephone_code" ).on('change', function() {        
    	jQuery( "#mobilephone" ).val(jQuery( "#mobilephone_code").val() + jQuery( "#mobilephone_input" ).val());
	});

	jQuery( "#homephone_input" ).blur(function() {  
		jQuery('#homephone').val(jQuery('#homephone_code').val() + jQuery('#homephone_input').val());
	});
	jQuery( "#homephone_code" ).on('change', function() {        
    	jQuery( "#homephone" ).val(jQuery( "#homephone_code").val() + jQuery( "#homephone_input" ).val());
	});
	
	jQuery( "#workphone_input" ).blur(function() {  
		jQuery('#workphone').val(jQuery('#workphone_code').val() + jQuery('#workphone_input').val());
	});
	jQuery( "#workphone_code" ).on('change', function() {        
    	jQuery( "#workphone" ).val(jQuery( "#workphone_code").val() + jQuery( "#workphone_input" ).val());
	});

	jQuery( "#LUI" ).blur(function() {  
		if(!jQuery.isNumeric(jQuery(this).val()) || jQuery(this).val().length < 10){
			jQuery("#lui_err").remove();
			jQuery('#LUI_err_con').append('<span id="lui_err"><i style="color:red">The Code '+jQuery(this).val()+' is not Numeric and must be 10 characters!</i></span>');
			jQuery(this).val('');
		}else{
			jQuery("#lui_err").remove();
		}

	});

	jQuery('#captcha').blur(function() {
		if(jQuery(this).val() != jQuery('#thisval').val()){
			jQuery("#capp_err").remove();
			jQuery('#captcha_err_con').append('<span id="capp_err"><i style="color:red">The Code '+jQuery(this).val()+' is not valid!</i></span>');
			jQuery(this).val('');
		}else{
			jQuery("#capp_err").remove();
		}

	});


	jQuery('#USI').bind('keypress', function(e) {
        var k = e.which;
        var ok = k >= 65 && k <= 72 || // A-Z
            k >= 74 && k <= 78 ||
            k >= 80 && k <= 90 ||
            k >= 50 && k <= 57 || 
            k == 08 || k == 127; // 0-9
        
        if (!ok){        	
            e.preventDefault();
            jQuery("#usi_err").remove();
            jQuery('#USI_err_con').append('<span id="usi_err"><i style="color:red">The Code must be capital letters and numbers, excluding I, 1, 0 and O.</i></span>');
        }else{
        	jQuery("#usi_err").remove();			
        }
    
	}); 

	jQuery('#USI').blur(function(){
		var reg_password1 = jQuery(this).val();
		var letters = /^[A-Z]+$/;

		var result = letters.test(reg_password1);
		//if(result || jQuery.isNumeric(jQuery(this).val()) || 
		if(jQuery(this).val().length < 10){
			jQuery("#usi_err2").remove();
			jQuery(this).val('');
            jQuery('#USI_err_con').after('<span id="usi_err2"><i style="color:red">Value must be 10 characters!</i></span>');
		}else{
			jQuery("#usi_err2").remove();
		}

	});

	jQuery('#haveUSI').click(function(){	        
		jQuery('#usidisp').show();
		jQuery('#createUSIfield').val('');
		jQuery("#usi_err").remove();
		jQuery("#usi_err2").remove();
	});
	jQuery('#linkUSI').click(function(){	
		jQuery('#usidisp').show();
		jQuery('#createUSIfield').val('');
		jQuery("#usi_err").remove();
		jQuery("#usi_err2").remove();
        window.open("http://www.usi.gov.au/create-your-USI/Pages/default.aspx", '_blank');
	});
	jQuery('.hideUSIfield').click(function(){	        
		jQuery('#usidisp').hide();
		jQuery('#USI').removeClass('input-text-required');
	});
	jQuery('.hideUSItextDisp').click(function() {	        
		jQuery('#USItextDisp').hide();
	});
	jQuery('#createUSI').click(function(){	        
		jQuery('#USItextDisp').show();
		jQuery('#createUSIfield').val('Trainee gives permission to create USI on their behalf');
		jQuery("#usi_err").remove();
		jQuery("#usi_err2").remove();
	});

	// postal values to street
	jQuery('#postal-link').click(function() {
		
		if(postalClicked){
			jQuery('#buildingName').val(jQuery('#sbuildingName').val());
			jQuery('#unitNo').val(jQuery('#sunitNo').val());
			jQuery('#streetNo').val(jQuery('#sstreetNo').val());
			jQuery('#streetName').val(jQuery('#sstreetName').val());
			jQuery('#POBox').val(jQuery('#sPOBox').val() ) ;
			jQuery('#city').val(jQuery('#scity').val());
			jQuery('#sel_state1').val(jQuery('#sel_state2').val());
			jQuery('#postcode').val(jQuery('#spostcode').val());
			jQuery('#country').val(jQuery('#scountry').val());
			postalClicked = false;
		}else{
			jQuery('#buildingName').val('');
			jQuery('#unitNo').val('');
			jQuery('#streetNo').val('');
			jQuery('#streetName').val('');
			jQuery('#POBox').val('');
			jQuery('#city').val('');
			jQuery('#sel_state1').val('');
			jQuery('#postcode').val('');
			jQuery('#country').val('');
			postalClicked = true;
		}
		
		
	});

	// street values to postal
	jQuery('#street-link').click(function() {
		jQuery('#buildingName').val(jQuery('#sbuildingName').val());
		jQuery('#unitNo').val(jQuery('#sunitNo').val());
		jQuery('#streetNo').val(jQuery('#sstreetNo').val());
		jQuery('#streetName').val(jQuery('#sstreetName').val());
		jQuery('#POBox').val(jQuery('#sPOBox').val() ) ;
		jQuery('#city').val(jQuery('#scity').val());
		jQuery('#sel_state1').val(jQuery('#sel_state2').val());
		jQuery('#postcode').val(jQuery('#spostcode').val());
		jQuery('#country').val(jQuery('#scountry').val());
		
	});

	// course section
	jQuery('.prime_linkmenu').click(function(){
		//alert('df');
		// alert(jQuery(this).attr('href'));
		if(jQuery(this).attr('href') == '#course-section'){
			jQuery('#account-section').hide();
			jQuery('#registration-section').hide();
			jQuery(jQuery(this).attr('href')).show();

		}
		
	});

	jQuery('#registernow').click(function(){
		jQuery('#account-section').hide();
		jQuery('#registration-section').show();		
	});

	jQuery('#enrolnow').click(function(){
		// alert('dddd');
		if(jQuery('#emailcheck').val() == ''){
			jQuery('#srmsform_hidden_type').val('');
			alert('Email Address is required!');
		}else{
			jQuery('#srmsform_hidden_type').val('checkEmail');
			jQuery('#srmsform').submit();
		}
		
	});

	//jQuery('#registration_submit').click(function(){
		/*
			jQuery('#asrmsform_hidden_type').val('');
			var captcha = $("#captcha").val();
			
			// Validating CAPTCHA with user input text.
			var dataString = 'captcha=' + captcha;
			jQuery.ajax({
				type: "POST",
				url: "captcha/captcha-verify.php",
				data: dataString,
				success: function(html) {
				alert(html);
				}
			});
	*/
		
	//});

	// submit
	//jQuery('#registration_submit')

	// File upload check
	// fileDriverLiscence
// fileMedicLiscence
	function checkFileName(filename, file_id){
		var must_filename;

		must_filename = jQuery(file_id).attr('data-value').split('.').slice(0, 2).join('.');
		jQuery('.file_err_det').remove();
		//alert(must_filename + ' != ' + filename);
		if(must_filename != filename){			
			jQuery(file_id + '_con_er').append('<span class="file_err_det" id="' + file_id + '_err_det"><i style="color:red">Filename is not valid! Please follow the format and upload it again</i></span>');
			jQuery(file_id).val('');
		}
	}

	jQuery('#fileDriverLiscence').change(function(e) {
		//var this_filename = jQuery(this).val().split('.').slice(0, 2).join('.').split('/').pop().split('\\').pop();
		//checkFileName(this_filename, '#fileDriverLiscence');
		//alert(this_filename);
	});
	jQuery('#fileMedicLiscence').change(function(e) {
		//var this_filename = jQuery(this).val().split('.').slice(0, 2).join('.').split('/').pop().split('\\').pop();
		//checkFileName(this_filename, '#fileMedicLiscence');
	});


	jQuery('#lostpasswordform #user_login').blur(function() {
		jQuery('#lostpasswordform_addon').val( jQuery('#url_temp').val() + '&user_login=' + jQuery(this).val() + '&user_email=' + encodeURIComponent(jQuery('#lostpasswordform #user_email').val()));
	});

	jQuery('#lostpasswordform #user_email').blur(function() {
		jQuery('#lostpasswordform_addon').val( jQuery('#url_temp').val() + '&user_login=' + jQuery('#lostpasswordform #user_login').val() + '&user_email=' + encodeURIComponent(jQuery(this).val()));
	});

	

	function submit_loading_message_display(elementID){	
		jQuery('#loading-message').remove();
		if(jQuery('#captcha').val() != '' || jQuery('#cterms').val() != '' || jQuery('#payment_type').val() != ''){
			jQuery(elementID).after('<p id="loading-message" style="color: green; text-align: center;"><i>' + jQuery(elementID).attr('data-value') + '</i></p>');			
		}
	}

	jQuery('#registration_submit').click(function(){
		
			
		
	});

	jQuery('#enrolnow').click(function(){
		//submit_loading_message_display('#enrolnow');	
	});

	jQuery( "#srmsform" ).submit(function( event ) {
	  submit_loading_message_display('#registration_submit');	
	});
	jQuery( "#srmsform_enrolContact" ).submit(function( event ) {
	  submit_loading_message_display('#enrolnow');	
	});



	function readURL(input, targetelement) {

	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            jQuery(targetelement).attr('data-value', e.target.result);	           
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	jQuery("#fileDriverLiscence").change(function(){
	    readURL(this, '#fileDriverLiscence');
	});
	jQuery("#fileDriverLiscence2").change(function(){
	    readURL(this, '#fileDriverLiscence2');
	});
	jQuery("#fileMedicLiscence").change(function(){
	    readURL(this, '#fileMedicLiscence');
	});
	jQuery("#referralform").change(function(){
	    readURL(this, '#referralform');
	});

	// payment
	jQuery('#payment_type').change(function(){
		if(jQuery(this).val() == ''){		 	  		
	   		jQuery('.payment_option').hide();

		}
	   if(jQuery(this).val() == 'Credit Card'){	   		
	   		jQuery('.payment_option').hide();
	   		jQuery('#credit_card_pay').show();
	   		jQuery('.payment-field').attr('required',true);
	   }
	   if(jQuery(this).val() == 'Direct Deposit'){	   		
	   		jQuery('.payment_option').hide();
	   		jQuery('#direct_deposit_pay').show();
	   		jQuery('.payment-field').removeAttr('required');
	   }
	    if(jQuery(this).val() == 'Via Invoice'){	   		
	   		jQuery('.payment_option').hide();
	   		jQuery('.payment-field').removeAttr('required');
	   }
	});

	if(jQuery('#srmsform_type').val() == 'registrationAndEnrrollment'){
		// getLocation();
	}

	jQuery('#LabourForceID').change(function(){
		if(jQuery(this).val() == '6' || jQuery(this).val() == '7' || jQuery(this).val() == '8'){		 	  		
	   		jQuery('#ANZSCOCode').removeClass('input-select-required');
	   		jQuery('#ANZSCOCodecon').hide();
	   		jQuery('#ANZSICCode').removeClass('input-select-required');
	   		jQuery('#ANZSICCodecon').hide();
		}else{
			jQuery('#ANZSCOCode').addClass('input-select-required');
	   		jQuery('#ANZSCOCodecon').show();
	   		jQuery('#ANZSICCode').addClass('input-select-required');
	   		jQuery('#ANZSICCodecon').show();

		}
	});
	
	jQuery('#HighestSchoolLevelID').change(function(){
		if(jQuery(this).val() == '2'){		 	  		
	   		jQuery('#HighestSchoolLevelYear').removeClass('input-select-required');
	   		jQuery('#HighestSchoolLevelYearcon').hide();
		}else{
			jQuery('#HighestSchoolLevelYear').addClass('input-select-required');
	   		jQuery('#HighestSchoolLevelYearcon').show();
		}
	});

	function onReady(callback) {
	    var intervalID = window.setInterval(checkReady, 1000);

	    function checkReady() {
	        if (document.getElementsByTagName('body')[0] !== undefined) {
	            window.clearInterval(intervalID);
	            callback.call(this);
	        }
	    }
	}

	function showed(id, value) {
	    document.getElementById(id).style.display = value ? 'block' : 'none';
	}

	onReady(function () {
	    // show('page', true);
	    showed('loading', false);
	});

	jQuery('.tooltip').tooltipster();
});
