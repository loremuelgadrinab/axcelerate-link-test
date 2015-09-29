<?php
	include_once 'axcelerate-link-dbdata.php';

	function setToolTipNotification($toolkit){
		$color = get_option('axcelerate-link-tooltip');
		$data = get_option('axcelerate_'.$toolkit.'_tk');
		$tooltip = "";
		if($data[0] == 'true'){
			$tooltip = "&nbsp;<i class='fa fa-question-circle tooltip' title='".$data[1]."' style='color:#".$color.";'></i>";
		}
		return $tooltip;
	}

	// Hidden Course Fields
	function getFieldHiddenValues(){
		$form_ret = '';
		$form_ret .= '<input type="hidden" name="srmsform_hidden" value="Y">';
		$form_ret .= '<input type="hidden" name="srmsform_hidden_type" id="srmsform_hidden_type" value="">';
		$form_ret .= '<input type="hidden" name="srmsform_type" id="srmsform_type" value="registrationAndEnrrollment">';
		$form_ret .= '<input type="hidden" name="instanceID" value="'.$_GET['instanceID'].'">';
		$form_ret .= '<input type="hidden" name="courseType" value="'.$_GET['courseType'].'">';
		$form_ret .= '<input type="hidden" name="this_post_id" value="'.get_the_ID().'">';
		$form_ret .= '<input type="hidden" name="latitude" id="latitude" value="">';
		$form_ret .= '<input type="hidden" name="longitude" id="longitude" value="">';
		return $form_ret;
	}

	// Personal Details Fields
	function getFieldUsername(){
		// get the Field Username
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_username');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_username');
		$message = get_option('axceleratelink_set_username_msg');		
		$tooltip = setToolTipNotification('username');		
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle."<span class='red'>*</span>".$tooltip."</label><br><input type='text' name='newusername' value='' class='' id='username' data-value='".($message ? $message : '')."'></br><div id='username_err_con'></div>";		
			$form_ret .= "<div class='username-massage'></div>";
		}
		return $form_ret;
	}

	function getFieldPassword(){
		// get the Field Password
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_password');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_password');
		$tooltip = setToolTipNotification('password');		
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle."<span class='red'>*</span>".$tooltip."</label><br><input type='password' name='newpassword' value='' class='' id='password'></br><div id='password_err_con'></div>";		
		}
		return $form_ret;
	}

	function getFieldTitle($value = null){
		// get the Field Title
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_title');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_title');
		$tooltip = setToolTipNotification('title');		
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('title') === 'title' ? '<span class="red">*</span>' : '').$tooltip."</label></br><select name='title' id='title'><option value='Mr' ".($value == 'Mr'? 'selected': '').">Mr</option><option value='Ms' ".($value == 'Ms'? 'selected': '').">Ms</option><option value='Mrs' ".($value == 'Mrs'? 'selected': '').">Mrs</option><option value='Others' ".($value == 'Others'? 'selected': '').">Others</option></select></br>";
		}
		return $form_ret;
	}

	function getFieldGivenName($value = null){
		// get the Field Given Name
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_givenName');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_givenName');
		$tooltip = setToolTipNotification('givenname');		
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle."<span class='red'>*</span>".$tooltip."</label></br><input type='text' name='givenName' value='".$value."' class='' id='givenName'></br><div id='givenName_err_con'></div>";		
		}
		return $form_ret;
	}

	function getFieldMiddleName($value = null){
		// get the Field Middle Name
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_middleName');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_middleName');
		$tooltip = setToolTipNotification('middlename');
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('middle_name') === 'middle_name' ? '<span class="red">*</span>' : '').$tooltip."</label></br><input type='text' name='middleName' value='".$value."' id='middleName' class='srms-field ".(get_axl_req_fields('middle_name') === 'middle_name' ? 'input-text-required' : '')."'></br>";		
		}
		return $form_ret;
	}

	function getFieldSurame($value = null){
		// get the Field Surmame
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_surname');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_surname');
		$tooltip = setToolTipNotification('surname');
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle."<span class='red'>*</span>".$tooltip."</label><br><input type='text' name='surname' value='".$value."' class='' id='surname'></br><div id='surname_err_con'></div>";	
		}
		return $form_ret;
	}

	function getFieldEmailAddress($value = null){
		// get the Field Email Address
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_emailAddress');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_emailAddress');
		$message = get_option('axceleratelink_set_emailadd_msg');
		$tooltip = setToolTipNotification('email');
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle."<span class='red'>*</span>".$tooltip."</label><br><input type='text' name='emailAddress' value='".$value."' class='' id='email' data-value='".($message ? $message : '')."'></br><div id='email_err_con'></div><div id='email_label'></div>";		
			$form_ret .= "<div class='email-massage'></div>";
		}
		return $form_ret;
	}

	function getFieldDOB($val = null){
		// get the Field Date of Birth
		include('axcelerate_link_array_list.php');
		$val_ar = explode("-", $val);
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_dob');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_dob');
		$tooltip = setToolTipNotification('dob');
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('dob') === 'dob' ? '<span class="red">*</span>' : '').$tooltip." </label><br>";					
			$form_ret .= "<select id='day' style='width:30%;'><option value=''> -- Day --</option>";
			foreach ($days as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val_ar[2] == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select>&nbsp;&nbsp;";
			$form_ret .= "<select id='month' style='width:30%;'><option value=''> -- Month -- </option>";
			foreach ($months as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val_ar[1] == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select>&nbsp;&nbsp;";
			$form_ret .= "<select id='year' style='width:30%;'><option value=''> -- Year -- </option>";
			foreach ($years as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val_ar[0] == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br>";
			$form_ret .= "<input type='hidden' name='dob' id='dob' value='".$val."' class='srms-field ".(get_axl_req_fields('dob') === 'dob' ? 'input-text-required' : '')."' data-value='".$val."'>";
		}
		return $form_ret;
	}

	function getFieldGender(){
		// get the Field Email Address
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_sex');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_sex');
		$tooltip = setToolTipNotification("gender");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('gender') === 'gender' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input class='gender' type='radio' name='sex' value='M' data-value='Male' checked>&nbsp;&nbsp;Male</br><input class='gender' type='radio' name='sex' data-value='Female' value='F'>&nbsp;&nbsp;Female<br>";
		}
		return $form_ret;
	}

	// --------------------------------------------------------
	// Contact Details
	function getFieldWorkPhoneNumber($val = null){
		// get the Field Work Phone Number
		include('axcelerate_link_array_list.php');
		if($val){
			$val_ar = explode(")", $val);
			$phone_code = $val_ar[0].')';
			$phone_vals = $val_ar[1];
		}else{
			$phone_code = '';
			$phone_vals = '';
		}
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_workphone');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_workphone');
		$tooltip = setToolTipNotification("workphone");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('workphone') === '<span class="red">workphone</span>' ? '*' : '').$tooltip."</label></br><input type='hidden' id='workphone' name='workphone' value='".$val."' class='srms-field ".(get_axl_req_fields('workphone') === 'workphone' ? 'input-text-required' : '')."'>";
			$form_ret .= "<select id='workphone_code' style='width:28%;'><option value=''> --- </option>";
			foreach ($area_code as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($phone_code == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select><input type='text' id='workphone_input' value='".$phone_vals."' class='' style='width:70%;'></br>";
		}
		return $form_ret;
	}

	function getFieldMobileNumber($value = null){
		// get the Field Mobile Phone NUmber
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_mobilephone');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_mobilephone');
		$tooltip = setToolTipNotification("mobphone");
		if($value){
			$val_ar = explode(")", $value);
			$var_ar = $val_ar[1];
		}else{
			$var_ar = "";
		}
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('mobilephone') === 'mobilephone' ? '<span class="red">*</span>' : '').$tooltip."</label></br><input type='hidden' name='mobilephone' id='mobilephone' value='".$value."' class='srms-field ".(get_axl_req_fields('mobilephone') === 'mobilephone' ? 'input-text-required' : '')."'>";
			$form_ret .= "<select id='mobilephone_code' style='width:28%;'><option value='(61)'> (61) </option>";
			$form_ret .= "</select><input type='text' id='mobilephone_input' value='".$var_ar."' class='' style='width:70%;'></br>";
		}
		return $form_ret;
	}

	function getFieldHomePhoneNumber($val = null){
		// get the Field Home Phone Number
		include('axcelerate_link_array_list.php');
		if($val){
			$val_ar = explode(")", $val);
			$phone_code = $val_ar[0].')';
			$phone_val = $val_ar[1];
		}else{
			$phone_code = "";
			$phone_val = "";	
		}
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_phone');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_phone');
		$tooltip = setToolTipNotification("homephone");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('phone') === 'phone' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='hidden' name='phone' value='".$val."' id='homephone' class='srms-field ".(get_axl_req_fields('phone') === 'phone' ? 'input-text-required' : '')."'>";
			$form_ret .= "<select id='homephone_code' style='width:28%;'><option value=''> --- </option>";
			foreach ($area_code as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($phone_code == $key? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select><input type='text' id='homephone_input' value='".$phone_val."' class='' style='width:70%;'></br>";
		}
		return $form_ret;
	}

	function getFieldContactName($value = null){
		// get the Field Contact Name
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_EmergencyContact');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_EmergencyContact');
		$tooltip = setToolTipNotification("contact");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('emcontact') === 'emcontact' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='EmergencyContact' id='EmergencyContact' value='".$value."' class='srms-field ".(get_axl_req_fields('emcontact') === 'emcontact' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldContactRelationship($value = null){
		// get the Field Contact Relationship
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_EmergencyContactRelation');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_EmergencyContactRelation');
		$tooltip = setToolTipNotification("relation");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('emcontactrel') === 'emcontactrel' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='EmergencyContactRelation' id='EmergencyContactRelation' value='".$value."' class='srms-field ".(get_axl_req_fields('emcontactrel') === 'emcontactrel' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldContactPhoneNumber($value = null){
		// get the Field Contact Phone Number
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_EmergencyContactPhone');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_EmergencyContactPhone');
		$tooltip = setToolTipNotification("contactphone");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('emcontactnum') === 'emcontactnum' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='EmergencyContactPhone' id='EmergencyContactPhone' value='".$value."' class='srms-field ".(get_axl_req_fields('emcontactnum') === 'emcontactnum' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	// --------------------------------------------------------
	// Address Details
	function getFieldPortalAddressBuildingName($value = null){
		// get the Field Portal Address Building Name
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_buildingName');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_buildingName');
		$tooltip = setToolTipNotification("buildingName");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('bname') === 'bname' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='buildingName' value='".$value."' id='buildingName' class='srms-field ".(get_axl_req_fields('bname') === 'bname' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldPortalAddressUnitNumber($value = null){
		// get the Field Portal Address Unit Number
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_unitNo');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_unitNo');
		$tooltip = setToolTipNotification("unitNo");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('unitno') === 'unitno' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='unitNo' value='".$value."' id='unitNo' class='srms-field ".(get_axl_req_fields('unitno') === 'unitno' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldPortalAddressStreet($value1 = null, $value2 = null){
		// get the Field Portal Address Street Number and Name
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_street');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_street');
		$tooltip = setToolTipNotification("street");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('street') === 'street' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='streetNo' value='".$value1."' id='streetNo' size='4' style='width:28%;'>";
			$form_ret .= "<input type='text' name='streetName' value='".$value2."' id='streetName' size='12' class='srms-field ".(get_axl_req_fields('street') === 'street' ? 'input-text-required' : '')."' style='width:70%;'></br>";
		}
		return $form_ret;
	}

	function getFieldPortalAddressPOBox($value = null){
		// get the Field Portal Address PO Box
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_POBox');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_POBox');
		$tooltip = setToolTipNotification("POBox");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('pobox') === 'pobox' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='POBox' value='".$value."' id='POBox' class='srms-field ".(get_axl_req_fields('pobox') === 'pobox' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldPortalAddressCity($value = null){
		// get the Field Portal Address City/ Suburb
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_city');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_city');
		$tooltip = setToolTipNotification("city");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('city') === 'city' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='city' value='".$value."' id='city' class='srms-field ".(get_axl_req_fields('city') === 'city' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}
		
	function getFieldPortalAddressState($val = null){
		// get the Field Portal Address State
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_state');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_state');
		$tooltip = setToolTipNotification("state");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('state') === 'state' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='state' id='sel_state1' class='srms-field ".(get_axl_req_fields('state') === 'state' ? 'input-select-required' : '')."'><option value=''>-- Select -- </option>";
			foreach ($states as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $value ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldPortalAddressPostCode($value = null){
		// get the Field Portal Address Post Code
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_postcode');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_postcode');
		$tooltip = setToolTipNotification("postcode");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('postcode') === 'postcode' ? '<span class="red">*</span>' : '').$tooltip."</label><input type='text' name='postcode' value='".$value."' id='postcode' class='srms-field ".(get_axl_req_fields('postcode') === 'postcode' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldPortalAddressCountry($val = null){
		// get the Field Portal Address Country
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_country');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_country');
		$tooltip = setToolTipNotification("country");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('country') === 'country' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='country' id='country' class='srms-field ".(get_axl_req_fields('country') === 'country' ? 'input-select-required' : '')."'><option value=''>-- Select Country --</option>";
			foreach ($sacc_countries as $key  => $value) {
				if(isCountryDisabled($key, 'Address')){
					$form_ret .= "<option value='".$value."' ".($val == $value ? 'selected' : '').">".$value."</option>";
				}
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}
	
	function getFieldPortalAddressCheckboxLink(){
		// get the Field Portal Address checkbox that Auto Fill the Street Address
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_checkboxSamePostal');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_checkboxSamePostal');
		$tooltip = setToolTipNotification("checkboxSamePostal");
		if ($dataField == 'true'){
			$form_ret .= '</br><input id="postal-link" value="" type="checkbox" > '.$dataTitle.$tooltip.'</br>';	
		}
		return $form_ret;
	}
		

	function getFieldStreetAddressBuildingName($value = null){
		// get the Field Street Address Building Name
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_sbuildingName');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_sbuildingName');
		$tooltip = setToolTipNotification("sbuildingName");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('sbname') === 'sbname' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='sbuildingName' id='sbuildingName' value='".$value."' class='srms-field ".(get_axl_req_fields('sbname') === 'sbname' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldStreetAddressUnitNumber($value = null){
		// get the Field Street Address Unit Number
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_sunitNo');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_sunitNo');
		$tooltip = setToolTipNotification("sunitNo");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('sunitno') === 'sunitno' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='sunitNo' id='sunitNo' value='".$value."' class='srms-field ".(get_axl_req_fields('sunitno') === 'sunitno' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldStreetAddressStreet($value1 = null, $value2 = null){
		// get the Field Street Address Street Number and Name
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_sstreet');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_sstreet');
		$tooltip = setToolTipNotification("sstreet");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('sstreet') === 'sstreet' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='sstreetNo' id='sstreetNo' value='".$value1."' size='4' style='width:28%;'>";
			$form_ret .= "<input type='text' name='sstreetName' id='sstreetName' value='".$value2."' size='12' class='srms-field ".(get_axl_req_fields('sstreet') === 'sstreet' ? 'input-text-required' : '')."' style='width:70%;'></br>";
		}
		return $form_ret;
	}

	function getFieldStreetAddressPOBox($value = null){
		// get the Field Street Address PO Box
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_sPOBox');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_sPOBox');
		$tooltip = setToolTipNotification("sPOBox");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('spobox') === 'spobox' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='sPOBox' id='sPOBox' value='".$value."' class='srms-field ".(get_axl_req_fields('spobox') === 'spobox' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldStreetAddressCity($value = null){
		// get the Field Street Address City/ Suburb
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_scity');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_scity');
		$tooltip = setToolTipNotification("scity");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('scity') === 'scity' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='scity' id='scity' value='".$value."' class='srms-field ".(get_axl_req_fields('scity') === 'scity' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}
		
	function getFieldStreetAddressState($val = null){
		// get the Field Street Address State
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_sstate');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_sstate');
		$tooltip = setToolTipNotification("sstate");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('sstate') === 'sstate' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='sstate' id='sel_state2' class='srms-field ".(get_axl_req_fields('sstate') === 'sstate' ? 'input-select-required' : '')."'><option value=''>-- Select -- </option>";
			foreach ($states as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $value ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldStreetAddressPostCode($value = null){
		// get the Field Street Address Post Code
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_spostcode');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_spostcode');
		$tooltip = setToolTipNotification("spostcode");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('spostcode') === 'spostcode' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='spostcode' id='spostcode' value='".$value."' class='srms-field ".(get_axl_req_fields('spostcode') === 'spostcode' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldStreetAddressCountry($val = null){
		// get the Field Street Address Country
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_scountry');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_scountry');
		$tooltip = setToolTipNotification("scountry");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('scountry') === 'scountry' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='scountry' id='scountry' class='srms-field ".(get_axl_req_fields('scountry') === 'scountry' ? 'input-text-required' : '')."'><option value=''>-- Select Country --</option>";
			foreach ($sacc_countries as $key  => $value) {
				if(isCountryDisabled($key, 'Address')){
					$form_ret .= "<option value='".$value."' ".($val == $value ? 'selected' : '').">".$value."</option>";
				}
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldSAddressLine1($value = null){
		
	}

	// --------------------------------------------------------
	// Demographics Details		
	function getFieldCountryOfBirth($val = null){
		// get the Field Country of Birth
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_CountryofBirthID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_CountryofBirthID');
		$tooltip = setToolTipNotification("CountryofBirthID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('birth_country') === 'birth_country' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='CountryofBirthID' id='CountryofBirthID' class='srms-field ".(get_axl_req_fields('birth_country') === 'birth_country' ? 'input-select-required' : '')."'><option value=''>-- Select Country --</option>";
			foreach ($sacc_countries as $key  => $value) {
				if(isCountryDisabled($key, 'Demographics')){
					$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
				}
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldCityOfBirth($value = null){
		// get the Field City of Birth
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_CityofBirth');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_CityofBirth');
		$tooltip = setToolTipNotification("CityofBirth");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('birth_city') === 'birth_city' ? '<span class="red">*</span>' : '').$tooltip."</label><br><input type='text' name='CityofBirth' id='CityofBirth' value='".$value."' class='srms-field ".(get_axl_req_fields('birth_city') === 'birth_city' ? 'input-text-required' : '')."'></br>";
		}
		return $form_ret;
	}

	function getFieldCountryOfCitizenship($val = null){
		// get the Field Country of Citizenship
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_CountryofCitizenID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_CountryofCitizenID');
		$tooltip = setToolTipNotification("CountryofCitizenID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('cit_country') === 'cit_country' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='CountryofCitizenID' id='CountryofCitizenID' class='srms-field ".(get_axl_req_fields('cit_country') === 'cit_country' ? 'input-select-required' : '')."'><option value=''>-- Select Country --</option>";
			foreach ($sacc_countries as $key  => $value) {
				if(isCountryDisabled($key, 'Demographics')){
					$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
				}
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldAustCitizenshipStatus($val = null){
		// get the Field Aust. Citizenship Status
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_CitizenStatusID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_CitizenStatusID');
		$tooltip = setToolTipNotification("CitizenStatusID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('aus_cit_status') === 'aus_cit_status' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='CitizenStatusID' id='CitizenStatusID' class='srms-field ".(get_axl_req_fields('aus_cit_status') === 'aus_cit_status' ? 'input-select-required' : '')."'><option value=''> -- Select your current Status -- </option>";
			foreach ($aus_status as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}
	
	function getFieldAboriginalIslander($value = null){
		// get the Field Aboriginal or Torres Strait Islander Origin
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_IndigenousStatusID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_IndigenousStatusID');
		$tooltip = setToolTipNotification("IndigenousStatusID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('ind_status') === 'ind_status' ? '<span class="red">*</span>' : '').$tooltip."</label><br>";
			$form_ret .= '<input name="IndigenousStatusID" class="IndigenousStatusID" id="indigenousStatus1" value="4" '.($value == '4' || $value == null ? 'checked' : '').' type="radio" data-value="No" checked> No</br>';
			$form_ret .= '<input name="IndigenousStatusID" class="IndigenousStatusID" id="indigenousStatus2" value="1" '.($value == '1' ? 'checked' : '').' type="radio" data-value="Aboriginal"> Aboriginal</br>';
			$form_ret .= '<input name="IndigenousStatusID" class="IndigenousStatusID" id="indigenousStatus3" value="2" '.($value == '2' ? 'checked' : '').' type="radio" data-value="Torres Strait Islander"> Torres Strait Islander</br>';
			$form_ret .= '<input name="IndigenousStatusID" class="IndigenousStatusID" id="indigenousStatus4" value="3" '.($value == '3' ? 'checked' : '').' type="radio" data-value="Aboriginal AND Torres Strait Islander"> Aboriginal AND Torres Strait Islander</br>';
		
		}
		return $form_ret;
	}

	function getFieldDisabilities($val = null, $var_arr = null){
		// get the Field Aust. Citizenship Status
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_DisabilityFlag');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_DisabilityFlag');
		$tooltip = setToolTipNotification("DisabilityFlag");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('disabilities') === 'disabilities' ? '<span class="red">*</span>' : '').$tooltip."</label></br>";
			$form_ret .= '<input name="DisabilityFlag" id="DisabilityStatusYes" tabindex="60" value="1" type="radio" '.($val ? 'checked' : '').'><label for="DisabilityStatusYes">&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$form_ret .= '<input name="DisabilityFlag" id="DisabilityStatusNo" class="DisabilityFlagnull" tabindex="61" value="0" type="radio" '.(!$val ? 'checked' : '').'><label for="DisabilityStatusNo">&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
			$form_ret .= '<input name="DisabilityFlag" id="DisabilityStatusUnknown" class="DisabilityFlagnull" tabindex="62" value="" type="radio" ><label for="DisabilityStatusUnknown">&nbsp;Not Specified</label>';
			$form_ret .= '<div id="DisabilityTypeList" style="display:'.($val ? 'block' : 'none').'"><table cellpadding="7">';
			$form_ret .= '<tbody><tr>';
			$form_ret .= '<td style="vertical-align: top;">';
			$discnt = 0;
			foreach ($disability_type as $key  => $value) {
				$discnt++;
				$dis_check = '';
				if($var_arr){
					foreach ($var_arr as $key_arr) {
						if($key == $key_arr){
							$dis_check = 'checked';
						}
					}
				}
				$form_ret .= '<div><input class="DisabilityTypeIDs" name="DisabilityTypeIDs[]" id="disabbletype'.$discnt.'" value="'.$key.'" type="checkbox" data-value="'.$value.'" '.$dis_check.'>&nbsp;&nbsp;<label for="disabbletype'.$discnt.'">'.$value.'</label></div>';
			}
			$form_ret .= '</td>';
			$form_ret .= '</tr>';
			$form_ret .= '</tbody></table></div><br>';
		}
		return $form_ret;
	}

	function getFieldMainLanguageID($val = null){
		// get the Field Language Identifier
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_MainLanguageID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_MainLanguageID');
		$tooltip = setToolTipNotification("MainLanguageID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('mlanguage') === 'mlanguage' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='MainLanguageID' id='MainLanguageID' class='srms-field ".(get_axl_req_fields('mlanguage') === 'mlanguage' ? 'input-select-required' : '')."'><option value=''> -- Select Language -- </option>";
			asort($sacc_languages);
			foreach ($sacc_languages as $key  => $value) {
				if(isLanguageDisabled($key)){
					$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
				}
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldEnglishProficiencyID($val = null){
		// get the Field Proficiency in Spoken English
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_EnglishProficiencyID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_EnglishProficiencyID');
		$tooltip = setToolTipNotification("EnglishProficiencyID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('english_status') === 'english_status' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='EnglishProficiencyID' id='EnglishProficiencyID' class='srms-field ".(get_axl_req_fields('english_status') === 'english_status' ? 'input-select-required' : '')."'><option value=''> -- Select -- </option>";
			foreach ($ProficiencyID as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldEnglishAssistanceFlag($value = null){
		// get the Field English Assistance
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_EnglishAssistanceFlag');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_EnglishAssistanceFlag');
		$tooltip = setToolTipNotification("EnglishAssistanceFlag");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('eng_assist') === 'eng_assist' ? '<span class="red">*</span>' : '').$tooltip."</label></br>";
			$form_ret .= '<input class="EnglishAssistanceFlag" name="EnglishAssistanceFlag" id="EnglishAssistanceFlagT" tabindex="55" '.($value? 'checked' : '').' value="1" type="radio" data-value="Yes"><label for="EnglishAssistanceFlagT">&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$form_ret .= '<input class="EnglishAssistanceFlag" name="EnglishAssistanceFlag" id="EnglishAssistanceFlagF" tabindex="56" '.(!$value? 'checked' : '').' value="0" type="radio" data-value="No" checked><label for="EnglishAssistanceFlagF">&nbsp;No</label></br>';
		}
		return $form_ret;
	}

	function getFieldDriverLicence(){
		$set_upmsg = get_option('axceleratelink_srms_upmsg'); 
		// get the Field Driver Uploads
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_driverlicence');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_driverlicence');
		$tooltip = setToolTipNotification("driverlicence");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('driver') === 'driver' ? '<span class="red">*</span>' : '').$tooltip."</label></br>";
			//$form_ret .= '<div id="fileDriverLiscence_con"></div><br>';
			$form_ret .= '<input name="fileDriverLiscence" id="fileDriverLiscence" type="file" multiple="false" data-value="" class="srms-field '.(get_axl_req_fields('driver') === 'driver' ? 'input-file-required' : '').'">';
			$form_ret .= '<br><i>'.$set_upmsg[0].'</i>';
			$form_ret .= wp_nonce_field( 'fileDriverLiscence', 'fileDriverLiscence_upload_nonce' );
			$form_ret .= '<br>';
		}
		return $form_ret;
	}

	function getFieldDriverLicence2(){
		// get the Field Driver Uploads
		$set_upmsg = get_option('axceleratelink_srms_upmsg'); 
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_driverlicence2');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_driverlicence2');
		$tooltip = setToolTipNotification("driverlicence2");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('driver2') === 'driver2' ? '<span class="red">*</span>' : '').$tooltip."</label></br>";
			//$form_ret .= '<div id="fileDriverLiscence_con"></div><br>';
			$form_ret .= '<input name="fileDriverLiscence2" id="fileDriverLiscence2" type="file" multiple="false" data-value="" class="srms-field '.(get_axl_req_fields('driver2') === 'driver2' ? 'input-file-required' : '').'">';
			$form_ret .= '<br><i>'.$set_upmsg[1].'</i>';
			$form_ret .= wp_nonce_field( 'fileDriverLiscence2', 'fileDriverLiscence2_upload_nonce' );
			$form_ret .= '<br>';
		}
		return $form_ret;
	}


	function getFieldMedicLicence(){
		// get the Field Med Uploads
		$set_upmsg = get_option('axceleratelink_srms_upmsg'); 
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_medicarelicence');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_medicarelicence');
		$tooltip = setToolTipNotification("medicarelicence");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('medical') === 'medical' ? '<span class="red">*</span>' : '').$tooltip."</label></br>";
			//$form_ret .= '<div id="fileMedicLiscence_con"></div><br>';
			$form_ret .= '<input name="fileMedicLiscence" id="fileMedicLiscence" type="file" multiple="false" data-value="" class="srms-field '.(get_axl_req_fields('medical') === 'medical' ? 'input-file-required' : '').'">';
			$form_ret .= '<br><i>'.$set_upmsg[2].'</i>';
			$form_ret .= wp_nonce_field( 'fileMedicLiscence', 'fileMedicLiscence_upload_nonce' );
			$form_ret .= '<br>';
		}
		return $form_ret;
	}

	function getFieldPaymentOption(){
	$set_upmsg = get_option('axceleratelink_srms_upmsg'); 
	$form_ret = '';
	$data = get_option('axceleratelink_srms_opt_payment');
	$tooltip = setToolTipNotification("referralform");
	if ($data[0] == 'true'){
		$form_ret .= "</br><label>".$data[1].(get_axl_req_fields('referral') === 'referral' ? '<span class="red">*</span>' : '').$tooltip."</label><br>";
		$form_ret .= '<input name="referralform" id="referralform" type="file" multiple="false" data-value="" class="srms-field '.(get_axl_req_fields('referral') === 'referral' ? 'input-file-required' : '').'">';
		$form_ret .= '<br><i>'.$set_upmsg[3].'</i>';
		$form_ret .= wp_nonce_field( 'referralform', 'referralform_upload_nonce' );
		$form_ret .= "</br>";
	}
	return $form_ret;
	}
		
	// --------------------------------------------------------
	// Employment and Education Details
	function getFieldEmploymentStatus($val = null){
		// get the Field Employment Status
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_LabourForceID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_LabourForceID');
		$tooltip = setToolTipNotification("LabourForceID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('labour') === 'labour' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='LabourForceID' id='LabourForceID' class='srms-field ".(get_axl_req_fields('labour') === 'labour' ? 'input-select-required' : '')."'><option value=''> -- Select your current Status -- </option>";
			foreach ($employment_status as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldOccupationIdentifier($val = null){
		// get the Field Occupation Identifier
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_ANZSCOCode');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_ANZSCOCode');
		$tooltip = setToolTipNotification("ANZSCOCode");
		if ($dataField == 'true'){
			$form_ret .= "<div id='ANZSCOCodecon'></br><label>".$dataTitle.(get_axl_req_fields('occupation') === 'occupation' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='ANZSCOCode' id='ANZSCOCode' class='srms-field ".(get_axl_req_fields('occupation') === 'occupation' ? 'input-select-required' : '')."'><option value='' > -- Select an Option -- </option>";
			foreach ($ANZSCOCode_lists as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br></div>";
		}
		return $form_ret;
	}

	function getFieldIndustryofEmployment($val = null){
		// get the Field Industry of Employment
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_ANZSICCode');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_ANZSICCode');
		$tooltip = setToolTipNotification("ANZSICCode");
		if ($dataField == 'true'){
			$form_ret .= "<div id='ANZSICCodecon'></br><label>".$dataTitle.(get_axl_req_fields('employment') === 'employment' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='ANZSICCode' id='ANZSICCode' class='srms-field ".(get_axl_req_fields('employment') === 'employment' ? 'input-select-required' : '')."'><option value='' > -- Select an Option -- </option>";
			foreach ($employerANZSIC_lists as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br></div>";
		}
		return $form_ret;
	}
		
	function getFieldLearnerUniqueIdentifier($value = null){
		// get the Field Learner Unique Identifier
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_LUI');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_LUI');
		$tooltip = setToolTipNotification("LUI");
		if ($dataField == 'true'){
			$form_ret .= "<div id='lui_con' style='display:none;'></br><label>".$dataTitle.$tooltip."</label><br><input type='text' id='LUI' name='LUI' value='".$value."' class='' maxlength='10' minlength='10'></br><div id='LUI_err_con'></div></div>";
		}
		return $form_ret;
	}

	function getFieldUniqueStudentIdentifier($value = null){
		// get the Field Unique Student Identifier
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_USI');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_USI');
		$tooltip = setToolTipNotification("USI");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('usi') === 'usi' ? '<span class="red">*</span>' : '').$tooltip."</label><br>";
			$form_ret .= "<input type='radio' name='usiOpt' value='haveUSI' id='haveUSI' class='usiRadion hideUSItextDisp' checked>I have a USI</br>";
			$form_ret .= "<div id='usidisp'><input type='text' placeholder='Please Enter Your USI here.' id='USI' name='USI' value='".$value."' class='srms-field ".(get_axl_req_fields('usi') === 'usi' ? 'input-text-required' : '')."' maxlength='10' minlength='10'><div id='USI_err_con'></div></br></div>";
			$form_ret .= "<input type='radio' name='usiOpt' value='createUSI' id='createUSI' class='usiRadion hideUSIfield'>Create a USI for me</br>";
			$form_ret .= "<input type='radio' name='usiOpt' value='linkUSI' id='linkUSI' class='usiRadion hideUSItextDisp'>Ill create a USI</br>";			
			$form_ret .= "<input type='hidden' name='createUSIfield' value='' id='createUSIfield'><p id='USItextDisp' style='display: none;'>Trainee gives permission to create USI on their behalf</p>";
			
		}
		return $form_ret;
	}

		
	function getFieldAttendingOtherSchool($value1 = null, $value2 = null){
		// get the Field Attending Other School/s
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_AtSchoolFlag');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_AtSchoolFlag');
		$tooltip = setToolTipNotification("AtSchoolFlag");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('other_school') === 'other_school' ? '<span class="red">*</span>' : '').$tooltip."</label></br>";
			$form_ret .= '<input name="AtSchoolFlag" id="SchoolStatus1" tabindex="55" value="1" type="radio" '.($value1 == true ? 'checked' : '').'><label for="SchoolStatus1">&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$form_ret .= '<input name="AtSchoolFlag" id="SchoolStatus0" tabindex="56" value="0" type="radio" '.($value1 == false ? 'checked' : '').'><label for="SchoolStatus0" checked>&nbsp;No</label></br>';
			$form_ret .= "<div id='schoolname' style='display:".($value1 == true ? 'block' : 'none').";'><label>School Name".(get_axl_req_fields('other_school') === 'other_school' ? '<span class="red">*</span>' : '')."</br></label><input type='text' name='AtSchoolName' value='".$value2."' id='AtSchoolName'></br></div>";
		}
		return $form_ret;
	}

	function getFieldHighestCompletedLevel($val = null){
		// get the Field Highest COMPLETED school level
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_HighestSchoolLevelID');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_HighestSchoolLevelID');
		$tooltip = setToolTipNotification("HighestSchoolLevelID");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('school_level') === 'school_level' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='HighestSchoolLevelID' id='HighestSchoolLevelID' class='srms-field ".(get_axl_req_fields('school_level') === 'school_level' ? 'input-select-required' : '')."'><option value=''> -- Select level of Education -- </option>";
			foreach ($HighestSchoolLevel_lists as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br>";
		}
		return $form_ret;
	}

	function getFieldSchoolYearCompleted($val = null){
		// get the Field Year Completed
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_HighestSchoolLevelYear');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_HighestSchoolLevelYear');
		$tooltip = setToolTipNotification("HighestSchoolLevelYear");
		if ($dataField == 'true'){
			$form_ret .= "<div id='HighestSchoolLevelYearcon'></br><label>".$dataTitle.(get_axl_req_fields('year_completed') === 'year_completed' ? '<span class="red">*</span>' : '').$tooltip."</label><br><select name='HighestSchoolLevelYear' id='HighestSchoolLevelYear' class='srms-field ".(get_axl_req_fields('year_completed') === 'year_completed' ? 'input-select-required' : '')."'><option value=''> -- Select year -- </option>";
			foreach ($years as $key  => $value) {
				$form_ret .= "<option value='".$key."' ".($val == $key ? 'selected' : '').">".$value."</option>";
			}
			$form_ret .= "</select></br></div>";
		}
		return $form_ret;
	}

	function getFieldPriorEducation($val_stat = null, $value_array = null){
		// get the Field Prior Education
		include('axcelerate_link_array_list.php');
		$form_ret = '';
		$dataField = get_option('axceleratelink_srms_opt_PriorEducationStatus');
		$dataTitle = get_option('axceleratelink_srms_opt_tit_PriorEducationStatus');
		$tooltip = setToolTipNotification("PriorEducationStatus");
		if ($dataField == 'true'){
			$form_ret .= "</br><label>".$dataTitle.(get_axl_req_fields('prior_ed') === 'prior_ed' ? '<span class="red">*</span>' : '').$tooltip."</label></br>";
			$form_ret .= '<input name="PriorEducationStatus" id="priorEducationRadio1" '.($value_array ? 'checked' : '').' value="Y" type="radio"><label for="priorEducationRadio1">&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$form_ret .= '<input name="PriorEducationStatus" id="priorEducationRadio0" '.(!$value_array ? 'checked' : '').' class="priorEducationnull" value="N" type="radio"><label for="priorEducationRadio0">&nbsp;No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$form_ret .= '<input name="PriorEducationStatus" id="priorEducationRadio@" class="priorEducationnull" value="" type="radio"><label for="priorEducationRadio@">&nbsp;Not Specified</label></br>';
			$form_ret .= "<div id='PriorEducation' style='display:".($value_array ? 'block' : 'none').";'>";
			$form_ret .= '<table id="priorEducationTable" style="margin-top: 1em; display: table;">';
			$form_ret .= '<thead><tr><th>Title'.(get_axl_req_fields('prior_ed') === 'prior_ed' ? '<span class="red">*</span>' : '').'</th><th>Recognition ID'.(get_axl_req_fields('prior_ed') === 'prior_ed' ? '<span class="red">*</span>' : '').'</th></tr></thead>';
			$prioredcount = 0;
			foreach ($priorEducationTitle as $key  => $value) {
				$priodEdID = '';
				$priorRecog = '';
				if($value_array){
					foreach ($value_array as $key_l) {
						$k_val = $key_l[0].$key_l[1].$key_l[2];
						if($k_val == $key){
							$priodEdID = $key;
							if($key_l[3]){
								$priorRecog = $key_l[3];
							}
						}
						
					}
				}
				$prioredcount++;
				$form_ret .= '<tbody><tr><td>';
				$form_ret .= '<label><input name="priorEducationCheck[]" data-variable="'.$key.'" value="'.$key.$priorRecog.'" '.($priodEdID == $key ? 'checked' : '').' type="checkbox" id="prioredcheck'.$prioredcount.'" class="priorEducationCheck" data-value="'.$value.'">&nbsp;&nbsp;'.$value.'</label>';
				$form_ret .= '</td><td>';
				$form_ret .= '<select class="priorEducationRecog" id="prioredselect'.$prioredcount.'">';
				$form_ret .= '<option class="noData" value=""> -- Not specified -- </option>';
				foreach ($priorEducationRecog_list as $key1  => $value1) {
					$form_ret .= '<option value="'.$key1.'" '.($priorRecog == $key1 ? 'selected' : '').'>'.$value1.'</option>';
				}
				$form_ret .= '</select>';
				$form_ret .= '</td></tr>';
				$form_ret .= '</tbody>';
				$form_ret .= '<script>';
				$form_ret .= 'jQuery(document).ready(function(){';
					$form_ret .= 'var prioredcheckval'.$prioredcount.' = jQuery( "#prioredcheck'.$prioredcount.'" ).attr("data-variable");';
					$form_ret .= 'jQuery( "#prioredselect'.$prioredcount.'" ).on("change", function() {';
	        			$form_ret .= 'jQuery( "#prioredcheck'.$prioredcount.'" ).val(prioredcheckval'.$prioredcount.' + jQuery(this).val());';
					$form_ret .= '});';
				$form_ret .= '});';
				$form_ret .= '</script>';
			}
			$form_ret .= '<input type="hidden" id="prioredcount" value="'.$prioredcount.'">';
			$form_ret .= '</table>';
			$form_ret .= "</div>";
		}
		return $form_ret;
	}

	function getFieldPayerSelect(){
		$form_ret = '';
		$form_ret .= "</br><label>Who is Paying</br></label><input class='payment_who' type='radio' name='payment_who' value='jsa-payment' data-value='' id='jsa-payment'>&nbsp;&nbsp;JSA Paying</br>";
		$form_ret .= "<input class='payment_who' type='radio' name='payment_who' data-value='' value='client-payment' id='client-payment'>&nbsp;&nbsp;Client Paying<br><br><br>";
		return $form_ret;
	}

	function getFieldPayment($contact_type){
		$arr_payment_opt = get_option('axceleratelink_srms_opt_tit_payment');
		$form_ret = '';	
		$tooltip = setToolTipNotification("paymenttitle");	
		$form_ret .= "<label>".$arr_payment_opt[0]."<span id='payment-fat'>&nbsp;&nbsp;<i class='fa fa-credit-card'></i></span>".$tooltip."</label></br>";
		$form_ret .= "<select id='payment_type' name='payment_type' required><option value=''> -- Select Payment -- </option>";
		$form_ret .= "<option value='Credit Card'>Credit Card</option>";
		$form_ret .= "<option value='Direct Deposit'>Direct Deposit</option>";
		if($contact_type == 'JSA'){
			$form_ret .= "<option value='Via Invoice'>Via Invoice</option>";
		}
		$form_ret .= "</select>";
		$form_ret .= "<div id='credit_card_pay' class='payment_option' style='display:none;'>";
		$form_ret .= '<br>'.str_replace('\"', '', $arr_payment_opt[6]).'<br>';
		//$form_ret .= '<img src="'.plugins_url().'/axcelerate-link/img/cci.png" style="width:300px; margin: 20px;">';
		$tooltipa = setToolTipNotification("cardname");	
		$form_ret .= '</br><label>'.$arr_payment_opt[1].$tooltipa.'</label><br><input type="text" name="payment_name_on_card" class="payment-field" autocomplete="off" ></br>';
		$tooltipb = setToolTipNotification("cardnumber");	
		$form_ret .= '</br><label>'.$arr_payment_opt[2].$tooltipb.'</label><br><input type="text" name="payment_card_number" class="payment-field" autocomplete="off" ></br>';
		$tooltipc = setToolTipNotification("cardccv");	
		$form_ret .= '</br><label>'.$arr_payment_opt[3].$tooltipc.'</label><br><input type="text" name="payment_ccv_number" class="payment-field" autocomplete="off" ></br>';
		$tooltipd = setToolTipNotification("cardexpmonth");	
		$form_ret .= '</br><label>'.$arr_payment_opt[4].$tooltipd.'</label><br><select name="payment_expiry_month" class="payment-field" ><option value=""> Select Month </option>';
		for ($x = 0; $x <= 11; $x++) {
			$c = $x + 1;
			$c = strval($c);
			if(strlen($c) == 1){
				$c = '0'.$c;
			}
		   $form_ret .= '<option value="'.$c.'">'.$c.'</option>';
		}
		$form_ret .= '</select></br>';
		$tooltipe = setToolTipNotification("cardexpyear");
		$form_ret .= '</br><label>'.$arr_payment_opt[5].$tooltipe.'</label><br><select name="payment_expiry_year" autocomplete="off" class="payment-field" ><option value=""> Select Year </option>>';
		$cy = intval(date("Y"));
		for ($x = 0; $x <= 10; $x++) {
			$c1 = $cy + $x;
			$cm = $c1 - 2000;
		   $form_ret .= '<option value="'.$cm.'">'.$c1.'</option>';
		}
		
		$form_ret .= '</select></br>';
		$form_ret .= '<br>'.str_replace('\"', '', $arr_payment_opt[7]).'<br>';
		$form_ret .= "</div>";
		$form_ret .= "<div id='direct_deposit_pay' class='payment_option' style='display:none;'>";
		$form_ret .= "</div>";

		return $form_ret;
	}

	function getFieldTableDisplayCourseInstanceDetail($instanceID, $type){
		$instance = getCourseInstanceDetail($instanceID, $type);
		$form_ret = '';
		$form_ret .= "<h3>Course Details</h3>";
		$form_ret .= '<table>';
		$form_ret .= "<tr><td><b>Course Name</b></td><td id=''>".$instance['NAME']."</td></tr>";	
		$form_ret .= "<tr><td><b>Location</b></td><td id=''>".$instance['LOCATION']."</td></tr>";	
		$form_ret .= "<tr><td><b>Start Date</b></td><td id=''>".date("d-m-Y", strtotime($instance['STARTDATE']))."</td></tr>";	
		$form_ret .= "<tr><td><b>Finish Date</b></td><td id=''>".date("d-m-Y", strtotime($instance['FINISHDATE']))."</td></tr>";
		$form_ret .= "<tr><td><b>Availability</b></td><td id=''>".$instance['PARTICIPANTVACANCY']."</td></tr>";			
		$form_ret .= "<tr><td><b>Payment Amount</b></td><td id=''>$".number_format($instance['COST'], 2, '.', ',')."</td></tr>";	
		$form_ret .= '</table>';
		$form_ret .= '<input type="hidden" name="payment_amount" value="'.str_replace(" ", "",money_format('%(#5.2n',$instance['COST'])).'">';
		return $form_ret;
	}
	
		
	// --------------------------------------------------------
	// Confirmation (Display All Fields)
	function getConfirmationAllFieldsDisplay($logged_contacttype = null, $courselist_off = null){
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
		$Tab2_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab2_Sub_tile();
		$Tab3_Sub_Title = get_WordPress_Axcelerate_Link_SRMS_Form_Tab3_Sub_tile();
		$Demographics_Data2 = get_option('axceleratelink_srms_opt_payment');
		
		$form_ret = '';

		// Course Details
		if($logged_contacttype != 'update' ){
			if($courselist_off != 'true'){
				//echo 'sdfsdf';
				$form_ret .= getFieldTableDisplayCourseInstanceDetail($_GET['instanceID'], $_GET['courseType']);
			}
		}
		//$form_ret .= getFieldPayment($logged_contacttype);

		$form_ret .= "<h3>".($Tab_Title[0] ? $Tab_Title[0] : '')."</h3>";
		$form_ret .= "<table>";
		if($Personal_Data_Opt[0] == 'true'){		
			$form_ret .= "<tr><td><b>".$Personal_Data_Tit[0]."</b></td><td id='dis_title'></td></tr>";
		}
		if($Personal_Data_Opt[1] == 'true'){
			$form_ret .= "<tr><td><b>".$Personal_Data_Tit[1]."</b></td><td id='dis_gname'></td></tr>";
		}
		if($Personal_Data_Opt[2] == 'true'){
			$form_ret .= "<tr><td><b>".$Personal_Data_Tit[2]."</b></td><td id='dis_mname'></td></tr>";
		}
		if($Personal_Data_Opt[3] == 'true'){
			$form_ret .= "<tr><td><b>".$Personal_Data_Tit[3]."</td></b><td id='dis_sname'></td></tr>";
		}
		if($Personal_Data_Opt[4] == 'true'){
			$form_ret .= "<tr><td><b>".$Personal_Data_Tit[4]."</b></td><td id='dis_email'></td></tr>";
		}
		if($Personal_Data_Opt[5] == 'true'){
			$form_ret .= "<tr><td><b>".$Personal_Data_Tit[5]."</b></td><td id='dis_dob'></td></tr>";
		}
		if($Personal_Data_Opt[6] == 'true'){
			$form_ret .= "<tr><td><b>".$Personal_Data_Tit[6]."</b></td><td id='dis_gender'></td></tr>";
		}
		$form_ret .= "</table>";

		if(!isTabDisabled('tab2')){
			$form_ret .= "<h3>".($Tab_Title[1] ? $Tab_Title[1] : '')."</h3>";			
			$form_ret .= "<table>";
			$form_ret .= "<tr><td colspan='2' class='td-center'><b>".($Tab2_Sub_Title[0] ? $Tab2_Sub_Title[0] : "")."</b></td></tr>";
			if($Contact_Data_Opt[0] == 'true'){
				$form_ret .= "<tr><td><b>".$Contact_Data_Tit[0]."</b></td><td id='dis_workphone'></td></tr>";
			}
			if($Contact_Data_Opt[1] == 'true'){
				$form_ret .= "<tr><td><b>".$Contact_Data_Tit[1]."</b></td><td id='dis_mobilephone'></td></tr>";
			}
			if($Contact_Data_Opt[2] == 'true'){
				$form_ret .= "<tr><td><b>".$Contact_Data_Tit[2]."</b></td><td id='dis_homephone'></td></tr>";
			}
			$form_ret .= "<tr><td colspan='2' class='td-center'><b>".($Tab2_Sub_Title[1] ? $Tab2_Sub_Title[1] : "")."</b></td></tr>";
			if($Contact_Data_Opt[3] == 'true'){
				$form_ret .= "<tr><td><b>".$Contact_Data_Tit[3]."</b></td><td id='dis_EmergencyContact'></td></tr>";
			}
			if($Contact_Data_Opt[4] == 'true'){
				$form_ret .= "<tr><td><b>".$Contact_Data_Tit[4]."</b></td><td id='dis_EmergencyContactRelation'></td></tr>";
			}
			if($Contact_Data_Opt[5] == 'true'){
				$form_ret .= "<tr><td><b>".$Contact_Data_Tit[5]."</b></td><td id='dis_EmergencyContactPhone'></td></tr>";
			}
			$form_ret .= "</table>";
		}

		if(!isTabDisabled('tab3')){
			$form_ret .= "<h3>".($Tab_Title[2] ? $Tab_Title[2] : '')."</h3>";
			$form_ret .= "<table>";
			$form_ret .= "<tr><td colspan='2' class='td-center'><b>".($Tab3_Sub_Title[0] ? $Tab3_Sub_Title[0] : "")."</b></td></tr>";
			if($Address_Data_Opt[0] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[0]."</b></td><td id='dis_buildingName'></td></tr>";
			}
			if($Address_Data_Opt[1] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[1]."</b></td><td id='dis_unitNo'></td></tr>";
			}
			if($Address_Data_Opt[2] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[2]."</b></td><td id='dis_street'></td></tr>";
			}
			if($Address_Data_Opt[3] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[3]."</b></td><td id='dis_POBox'></td></tr>";
			}
			if($Address_Data_Opt[4] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[4]."</b></td><td id='dis_city'></td></tr>";
			}
			if($Address_Data_Opt[5] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[5]."</b></td><td id='dis_sel_state1'></td></tr>";
			}
			if($Address_Data_Opt[6] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[6]."</b></td><td id='dis_postcode'></td></tr>";
			}
			if($Address_Data_Opt[7] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[7]."</b></td><td id='dis_country'></td></tr>";
			}
			$form_ret .= "<tr><td colspan='2' class='td-center'><b>".($Tab3_Sub_Title[1] ? $Tab3_Sub_Title[1] : "")."</b></td></tr>";
			// $form_ret .= "<tr><td>Line 1</td><td id='dis_saddress1'></td></tr>";
			// $form_ret .= "<tr><td>Line 2</td><td id='dis_saddress2'></td></tr>";
			if($Address_Data_Opt[9] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[9]."</b></td><td id='dis_sbuildingName'></td></tr>";
			}
			if($Address_Data_Opt[10] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[10]."</b></td><td id='dis_sunitNo'></td></tr>";
			}
			if($Address_Data_Opt[11] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[11]."</b></td><td id='dis_sstreet'></td></tr>";
			}
			//if($Address_Data_Opt[12] == 'true'){
			//	$form_ret .= "<tr><td><b>".$Address_Data_Tit[12]."</b></td><td id='dis_sPOBox'></td></tr>";
			//}
			if($Address_Data_Opt[13] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[13]."</b></td><td id='dis_scity'></td></tr>";
			}
			if($Address_Data_Opt[14] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[14]."</b></td><td id='dis_sel_state2'></td></tr>";
			}
			if($Address_Data_Opt[15] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[15]."</b></td><td id='dis_spostcode'></td></tr>";
			}
			if($Address_Data_Opt[16] == 'true'){
				$form_ret .= "<tr><td><b>".$Address_Data_Tit[16]."</b></td><td id='dis_scountry'></td></tr>";
			}
			$form_ret .= "</table>";
		}

		if(!isTabDisabled('tab4')){
			$form_ret .= "<h3>".($Tab_Title[3] ? $Tab_Title[3] : '')."</h3>";
			$form_ret .= "<table>";
			if($Demographics_Data_Opt[0] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[0]."</b></td><td id='dis_CountryofBirthID'></td></tr>";
			}
			if($Demographics_Data_Opt[1] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[1]."</b></td><td id='dis_CityofBirth'></td></tr>";
			}
			if($Demographics_Data_Opt[2] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[2]."</b></td><td id='dis_CountryofCitizenID'></td></tr>";
			}
			if($Demographics_Data_Opt[3] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[3]."</b></td><td id='dis_CitizenStatusID'></td></tr>";
			}
			if($Demographics_Data_Opt[4] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[4]."</b></td><td id='dis_IndigenousStatusID'></td></tr>";
			}
			if($Demographics_Data_Opt[6] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[6]."</b></td><td id='dis_MainLanguageID'></td></tr>";
			}
			if($Demographics_Data_Opt[7] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[7]."</b></td><td id='dis_EnglishProficiencyID'></td></tr>";
			}
			if($Demographics_Data_Opt[8] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[8]."</b></td><td id='dis_EnglishAssistanceFlag'></td></tr>";
			}
			if($Demographics_Data_Opt[5] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[5]."</b></td><td id='dis_DisabilityTypeIDs'></td></tr>";
			}
			if($Demographics_Data_Opt[9] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[9]."</b></td><td id='dis_updriver'></td></tr>";
			}
			if($Demographics_Data_Opt[11] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[11]."</b></td><td id='dis_updriver2'></td></tr>";
			}
			if($Demographics_Data_Opt[10] == 'true'){
				$form_ret .= "<tr><td><b>".$Demographics_Data_Tit[10]."</b></td><td id='dis_upmedic'></td></tr>";
			}
			if($logged_contacttype == 'JSA' && $Demographics_Data2[0]){
				$form_ret .= "<tr><td><b>".$Demographics_Data2[1]."</b></td><td id='dis_uprefferal'></td></tr>";
			}
			$form_ret .= "</table>";
		}

		if(!isTabDisabled('tab5')){
			$form_ret .= "<h3>".($Tab_Title[4] ? $Tab_Title[4] : '')."</h3>";
			$form_ret .= "<table>";
			if($EmploymentEducation_Data_Opt[0] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[0]."</b></td><td id='dis_LabourForceID'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[1] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[1]."</b></td><td id='dis_ANZSCOCode'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[2] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[2]."</b></td><td id='dis_ANZSICCode'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[3] == 'true'){
				$form_ret .= "<tr id='dis_LUIcon'><td><b>".$EmploymentEducation_Data_Tit[3]."</b></td><td id='dis_LUI'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[4] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[4]."</b></td><td id='dis_USI'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[5] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[5]."</b></td><td id='dis_AtSchoolName'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[6] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[6]."</b></td><td id='dis_HighestSchoolLevelID'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[7] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[7]."</b></td><td id='dis_HighestSchoolLevelYear'></td></tr>";
			}
			if($EmploymentEducation_Data_Opt[8] == 'true'){
				$form_ret .= "<tr><td><b>".$EmploymentEducation_Data_Tit[8]."</b></td><td id='dis_priorEducationCheck'></td></tr>";
			}
			$form_ret .= "</table>";
		}
		return $form_ret;
	}	
		
	// Next Prev Buttons
	function getFirstNavLink(){
		$form_ret_val = "<a href='".trim(strtok(str_replace( '%7E', '~', $_SERVER['REQUEST_URI']), '?'))."' onlick=''class='prime_linkmenu'>PREV</a>";
		$form_ret = "<a href='#contact-details' class='linkmenu'>NEXT</a>";
		if(isTabDisabled('tab2') === 'true'){
			$form_ret = "<a href='#address-details' class='linkmenu'>NEXT</a>";
		}
		if(isTabDisabled('tab2') === 'true' && isTabDisabled('tab3') === 'true'){
			$form_ret = "<a href='#demographics' class='linkmenu'>NEXT</a>";
		}
		if(isTabDisabled('tab2') === 'true' && isTabDisabled('tab4') === 'true'){
			$form_ret = "<a href='#employment-and-education' class='linkmenu'>NEXT</a>";
		}

		if(isTabDisabled('tab2') === 'true' && isTabDisabled('tab3') === 'true' && isTabDisabled('tab4') === 'true'){
			$form_ret = "<a href='#employment-and-education' class='linkmenu'>NEXT</a>";
		}
		if(isTabDisabled('tab2') === 'true' && isTabDisabled('tab3') === 'true' && isTabDisabled('tab4') === 'true' && isTabDisabled('tab5') === 'true'){
			$form_ret = "<a href='#confirmations' class='linkmenu'>NEXT</a>";
		}
		$form_ret_val .= $form_ret;
		return $form_ret_val;
	}

	function getThisNavLink($tab){
		$form_ret_val = '';
		if($tab == 'tab2'){ // contact details
			$form_ret_val .= "<a href='#personal-details' class='back_linkmenu'>PREV</a>";
			$form_ret = "<a href='#address-details' class='linkmenu'>NEXT</a>";
			if(isTabDisabled('tab3') === 'true'){
				$form_ret = "<a href='#demographics' class='linkmenu'>NEXT</a>";
			}
			if(isTabDisabled('tab3') === 'true' && isTabDisabled('tab4') === 'true'){
				$form_ret = "<a href='#employment-and-education' class='linkmenu'>NEXT</a>";
			}
			if(isTabDisabled('tab3') === 'true' && isTabDisabled('tab4') === 'true' && isTabDisabled('tab5') === 'true'){
				$form_ret = "<a href='#confirmations' class='linkmenu'>NEXT</a>";
			}
			$form_ret_val .= $form_ret;
		}
		if($tab == 'tab3'){ // address details
			$form_ret_val = "<a href='#contact-details' class='back_linkmenu'>PREV</a>";
			$form_ret = "<a href='#demographics' class='linkmenu'>NEXT</a>";
			if(isTabDisabled('tab2') === 'true'){
				$form_ret_val = "<a href='#personal-details' class='back_linkmenu'>PREV</a>";
				$form_ret = "<a href='#demographics' class='linkmenu'>NEXT</a>";
			}
			if(isTabDisabled('tab4') === 'true'){				
				$form_ret = "<a href='#employment-and-education' class='linkmenu'>NEXT</a>";
			}
			if(isTabDisabled('tab4') === 'true' && isTabDisabled('tab5') === 'true'){				
				$form_ret = "<a href='#confirmations' class='linkmenu'>NEXT</a>";
			}
			$form_ret_val .= $form_ret;
		}
		if($tab == 'tab4'){
			$form_ret_val = "</br><a href='#address-details' class='back_linkmenu'>PREV</a>";
			$form_ret = "<a href='#employment-and-education' class='linkmenu'>NEXT</a>";
			if(isTabDisabled('tab5') === 'true'){
				$form_ret = "<a href='#confirmations' class='linkmenu'>NEXT</a>";
			}
			if(isTabDisabled('tab3') === 'true'){
				$form_ret_val = "<a href='#contact-details' class='back_linkmenu'>PREV</a>";
			}
			if(isTabDisabled('tab3') === 'true' && isTabDisabled('tab2') === 'true'){
				$form_ret_val = "<a href='#personal-details' class='back_linkmenu'>PREV</a>";
			}
			$form_ret_val .= $form_ret;
		}
		if($tab == 'tab5'){
			$form_ret_val = "<a href='#demographics' class='back_linkmenu'>PREV</a>";
			$form_ret = "<a href='#confirmations' class='linkmenu'>NEXT</a>";
			if(isTabDisabled('tab4') === 'true'){				
				$form_ret_val = "<a href='#address-details' class='back_linkmenu'>PREV</a>";
			}
			if(isTabDisabled('tab3') === 'true' && isTabDisabled('tab4') === 'true'){
				$form_ret_val = "<a href='#contact-details' class='back_linkmenu'>PREV</a>";
			}
			if(isTabDisabled('tab2') === 'true'  && isTabDisabled('tab3') === 'true' && isTabDisabled('tab4') === 'true'){
				$form_ret_val = "<a href='#personal-details' class='back_linkmenu'>PREV</a>";
			}
			$form_ret_val .= $form_ret;
		}
		if($tab == 'confirm'){
			$form_ret_val = "<a href='#employment-and-education' class='back_linkmenu'>PREV</a>";
			if(isTabDisabled('tab5') === 'true'){				
				$form_ret_val = "<a href='#demographics' class='back_linkmenu'>PREV</a>";
			}
			if(isTabDisabled('tab5') === 'true' && isTabDisabled('tab4') === 'true'){				
				$form_ret_val = "<a href='#address-details' class='back_linkmenu'>PREV</a>";
			}
			if(isTabDisabled('tab5') === 'true' && isTabDisabled('tab4') === 'true'  && isTabDisabled('tab3') === 'true'){				
				$form_ret_val = "<a href='#contact-details' class='back_linkmenu'>PREV</a>";
			}
			if(isTabDisabled('tab5') === 'true' && isTabDisabled('tab4') === 'true'  && isTabDisabled('tab3') === 'true' && isTabDisabled('tab2') === 'true'){				
				$form_ret_val = "<a href='#personal-details' class='back_linkmenu'>PREV</a>";
			}
		}
		return $form_ret_val;
	}

	//$form_ret .= "<a href='#personal-details' class='back_linkmenu'>PREV</a>";
	//$form_ret .= "<a href='#address-details' class='linkmenu'>NEXT</a>";

	//Course Selection
	function cleaningString($string){
		$cor_name = str_replace(' ', '', $string);
		$cor_name = str_replace('(', '', $cor_name);
		$cor_name = str_replace(')', '', $cor_name);
		$cor_name = str_replace('"', '', $cor_name);
		$cor_name = str_replace('\'', '', $cor_name);
		$cor_name = str_replace('\\', '', $cor_name);
		$cor_name = str_replace('/', '', $cor_name);
		$cor_name = str_replace('@', '', $cor_name);
		$cor_name = str_replace('.', '', $cor_name);
		return $cor_name;
	}
	function getFieldCoursesDropdown(){
		// get the Field Cources Lists
		$set_buttons = get_option('axceleratelink_srms_buttons');
		$form_ret = ''; 
	
			
			$response_data = getAxcelerateAllCOurses();
			$val_id = '';
			$val_type = '';
			$val_name = '';
			$val_date = '';
			$t_cnt = 0;
			$check_id = '';
			$check_cnt = 0;
			$cnt = 0;

			$tab_cols_str = '';

			$disp_instructor = array();
			$disp_location = array();
			foreach ($response_data as $data_val) {	
				$val_id = $data_val['ID'];
				$val_type = $data_val['TYPE'];
				$val_name = $data_val['NAME'];

				if($val_id && $val_type && $val_name ){		
					$check_cnt = 1;									
					$data = get_course_instance_search($val_id, $val_type);	
					if($data){				
						foreach ($data as $key => $value) {			
							if($value['PARTICIPANTVACANCY'] > 0){
								$cor_name = cleaningString($value['NAME']);
								$disp_location[] = $value['LOCATION'];
								//$disp_instructor[$val_id.'-'.$val_type] = $val_name;
								$disp_instructor[$cor_name] = $value['NAME'];

								$tab_cols_str .= "<tr class='disp_row ".$cor_name." ".str_replace(' ', '', $value['LOCATION'])."'>";
								// ($value['TRAINERCONTACTID']? getTrainer($value['TRAINERCONTACTID']) : 'TBA')
								$tab_cols_str .= "<td align=\"left\">".$value['NAME']."</td><td align=\"left\">".$value['LOCATION']."</td><td align=\"center\">".date("d-m-Y", strtotime($value['STARTDATE']))."</td><td align=\"center\">".date("d-m-Y", strtotime($value['FINISHDATE']))."</td><td align=\"left\">$".number_format($value['COST'], 2, '.', ',')."</td><td align=\"center\">".$value['PARTICIPANTVACANCY']."</td>";
								$tab_cols_str .= "<form id='srmsform_course_select".$cnt."' action='".str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])."' method='get'>";
								$tab_cols_str .= "<td align=\"center\"><input type='submit' id='enrol".$cnt."' class='course-button' value='".$set_buttons[2]."'></td>";													
								$tab_cols_str .= '<input type="hidden" name="srmsform_type" value="selectedCourse">';
								$tab_cols_str .= '<input type="hidden" name="instanceID" value="'.$value['INSTANCEID'].'">';
								$tab_cols_str .= '<input type="hidden" name="vacancy" value="'.$value['PARTICIPANTVACANCY'].'">';
								$tab_cols_str .= '<input type="hidden" name="courseType" value="'.$val_type.'">';
								$tab_cols_str .= "</form>";
								$tab_cols_str .= "</tr>";

							}
						}
					}
				}
			}


			$form_ret .= "<div class='course_table_container'>";
			//$form_ret .= "<form name='' id='' action='".str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])."' method='get'>";
			//$form_ret .= "<input type='hidden' name='srmsform' value='course-search'>";
			//$form_ret .= "<input type='hidden' name='courcetype' id='courcetype' value='".$courcetype."'>";
			$form_ret .= "<select id='disp_instructor' name='activityID' style='width:49%; float:left;'><option value='' data-value=''>-- All Courses --</option>";
			$unique_arr1 = array_unique($disp_instructor);
			foreach ($unique_arr1 as $key_inid => $key_inst) {
				//$pieces = explode("-", $key_inid);
				$form_ret .= "<option data-value='' value='".$key_inid."' >".$key_inst."</option>";
			}
			$form_ret .= "</select>";
			$form_ret .= "<select id='disp_location' name='location' style='width:49%; float:right;'><option value=''>-- All Locations --</option>";
			$unique_arr2 = array_unique($disp_location);
			foreach ($unique_arr2 as $key_inst) {
				$form_ret .= "<option value='".cleaningString($key_inst)."' >".$key_inst."</option>";
			}
			$form_ret .= "</select>";
			//$form_ret .= "<input type='submit' id='search' class='course-button' value='Search' style='float: right;margin: 5px 0px;'>";
			//$form_ret .= "</form>";

		//if( $srmsform == 'course-search'){
			$form_ret .= "<table id='table_display_sort' class='table_display tablesorter' width='100%;' style='float:left;margin-top: 20px;'><thead><tr>";

			$form_ret .= "<th align=\"center\" class='disp_sort_none'>Course Name</th><th align=\"center\" class='disp_sort_none'>Location</th><th align=\"center\">Start Date</th><th>Finish Date</th><th align=\"right\" class='th-disa'>Fee</th><th align=\"center\" class='th-disa'>Availability</th><th align=\"center\" class='th-disa'></th>";

			$form_ret .= "</tr></thead><tbody>";
			if($tab_cols_str){
				$form_ret .= $tab_cols_str;
			}else{
				$form_ret .= '<tr><td colspan="6" style="text-align: center;"> No Available Data... </td></tr>';
			}


			$form_ret .= "</tbody></table>";
		//}
		$form_ret .= "</div>";

		$form_ret .= "<script>";
		$form_ret .= 'jQuery(document).ready(function(){';							
		$form_ret .= "jQuery('#table_display_sort').tablesorter({dateFormat : 'ddmmyyyy'});";
		$form_ret .= "function filter_view(el_val){";
		$form_ret .= "if(el_val == ''){";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row').show();";
		$form_ret .= "}else{";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row').hide();";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row.'+el_val).show();";
		$form_ret .= "}";
		$form_ret .= '}';
		$form_ret .= "jQuery('#disp_instructor').change(function (){";
		//$form_ret .= "alert(jQuery('#disp_instructor :selected').attr('data-value'));";
		//$form_ret .= "jQuery('#courcetype').val(jQuery('#disp_instructor :selected').attr('data-value'));";
		
		$form_ret .= "if(jQuery('#disp_location :selected').val() == '' && jQuery(this).val() == ''){";		
		$form_ret .= "filter_view(jQuery(this).val());";
		$form_ret .= '}';						
		$form_ret .= "if(jQuery('#disp_location :selected').val() != '' && jQuery(this).val() != ''){";
		//$form_ret .= "alert(jQuery('#disp_location :selected').val());";	
		$form_ret .= "jQuery('#table_display_sort tr.disp_row').hide();";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row.'+jQuery(this).val()+'.'+jQuery('#disp_location :selected').val()).show();";
		$form_ret .= '}else{';
		$form_ret .= "filter_view(jQuery(this).val());";
		$form_ret .= '}';
		$form_ret .= "if(jQuery('#disp_location :selected').val() != '' && jQuery(this).val() == ''){";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row').hide();";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row.'+jQuery('#disp_location :selected').val() ).show();";
		$form_ret .= '}';
		$form_ret .= "});";
		$form_ret .= "jQuery('#disp_location').change(function (){";		
		
		$form_ret .= "if(jQuery('#disp_instructor :selected').val() == '' && jQuery(this).val() == ''){";
		$form_ret .= "filter_view(jQuery(this).val());";
		$form_ret .= '}';
		$form_ret .= "if(jQuery('#disp_instructor :selected').val() != '' && jQuery(this).val() != ''){";
		//$form_ret .= "alert(jQuery('#disp_instructor :selected').val());";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row').hide();";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row.'+jQuery('#disp_instructor :selected').val()+'.'+jQuery(this).val()).show();";
		$form_ret .= '}else{';
		$form_ret .= "filter_view(jQuery(this).val());";
		$form_ret .= '}';
		$form_ret .= "if(jQuery('#disp_instructor :selected').val() != '' && jQuery(this).val() == ''){";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row').hide();";
		$form_ret .= "jQuery('#table_display_sort tr.disp_row.'+jQuery('#disp_instructor :selected').val() ).show();";
		$form_ret .= '}';
		
		$form_ret .= "});";
		
		$form_ret .= "});";
		$form_ret .= "</script>";

		return $form_ret;
	}

function getFieldShowThisCourse($course_id, $course_type, $course_name){
	include_once('axcelerate-link-frontend.php');
	$set_buttons = get_option('axceleratelink_srms_buttons');
	$form_ret = '';
	$cnt = 0;
	$data = get_course_instances($course_id, $course_type);	
	if($data && checkAvailableCourses($data)){
		$form_ret .= "<h2 class='course-name'>".$course_name."</h2>";
		$form_ret .= "<table id='table_display' class='table_display tablesorter' width='100%'><thead><tr>";

		$form_ret .= "<th align=\"center\" class='th-disa'>Instructor/th><th align=\"center\">Location</th><th align=\"center\">Start Date</th><th>Finish Date</th><th align=\"right\" class='th-disa'>Fee</th><th align=\"center\" class='th-disa'>Availability</th><th align=\"center\" class='th-disa'></th>";

		$form_ret .= "</tr></thead><tbody>";

		$filtered_response = array();
		foreach ($data as $key => $value) {			
			$filtered_response[$key] = $value;																	
		}
		
		foreach ($filtered_response as $key => $value) {
			if(isset($value['STARTDATE'])){	

				if(date("Y-m-d", strtotime($value['STARTDATE'])) >=  date("Y-m-d")){
					if($value['PARTICIPANTVACANCY']){
							$cnt++;
							$form_ret .= "<tr>";

							$form_ret .= "<td align=\"left\">".($value['TRAINERCONTACTID']? getTrainer($value['TRAINERCONTACTID']) : 'TBA')."</td><td align=\"left\">".$value['LOCATION']."</td><td align=\"center\">".date("d-m-Y", strtotime($value['STARTDATE']))."</td><td align=\"center\">".date("d-m-Y", strtotime($value['FINISHDATE']))."</td><td align=\"right\">".money_format('%(#5.2n',$value['COST'])."</td><td align=\"center\">".$value['PARTICIPANTVACANCY']."</td>";
							$form_ret .= "<form id='srmsform_course_select".$cnt."' action='".str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])."' method='get'>";
							$form_ret .= "<td align=\"center\"><input type='submit' id='enrol".$cnt."' class='course-button' value='Enrol'></td>";													
							$form_ret .= '<input type="hidden" name="srmsform_type" value="selectedCourse">';
							$form_ret .= '<input type="hidden" name="instanceID" value="'.$value['INSTANCEID'].'">w';
							$form_ret .= '<input type="hidden" name="vacancy" value="'.$value['PARTICIPANTVACANCY'].'">';
							$form_ret .= '<input type="hidden" name="courseType" value="'.$val_type.'">w';
							$form_ret .= "</form>";
							$form_ret .= "</tr>";	
					}
				}	
			}								
		}

		$form_ret .= "</tbody></table>";
		$form_ret .= "<script>";
		$form_ret .= 'jQuery(document).ready(function(){';
		$form_ret .= "jQuery('#table_display').tablesorter({dateFormat : 'ddmmyyyy'});";
		$form_ret .= "});";
		$form_ret .= "</script>";
		$form_ret .="<br><br><a href='javascript:history.go(-1)'><button class='mi-button' type='button'>".$set_buttons[1]."</button></a><br>";
	}else{
		// $form_ret .= "No Available Courses to enroll!";
		//show_course_details($course_id, $course_type, 'list4','no');
		echo "<h1>".$course_name."</h1>";
		//echo "<a href='javascript:history.go(-1)'><button class='mi-button' type='button'>Back</button></a><br>";
		
		echo "<br>";
		echo "<h2> Cost and Availability </h2>";
		
		show_course_instances($course_id, $course_type, 'table');
		echo "<br>Please call 1300 843 387 to arrange a date.<br><br>";
		echo "<a href='javascript:history.go(-1)'><button class='mi-button' type='button'>".$set_buttons[1]."</button></a><br>";

	}
	$form_ret .= "<script>";
	$form_ret .= 'jQuery(document).ready(function(){';
	$form_ret .= "jQuery('.entry-header').hide();";
	$form_ret .= "});";
	$form_ret .= "</script>";
	return $form_ret;
}

function getFieldLoginAccountandGetInstanceToEnrollWith($instanceID, $type){
	// get the Field Login Form
	$set_buttons = get_option('axceleratelink_srms_buttons');
	$form_ret = '';

	//$form_ret .= "<form id='srmsform_userlogin' action='".site_url( '/wp-login.php' )."' method='post'>";
	/*
	$form_ret .= "<form id='srmsform_userlogin' action='".str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])."' method='post'>";
	$form_ret .= '<input type="hidden" name="srmsform_type" value="userLogin">';																								
	$form_ret .= "<label>User Name</br></label><input type='text' name='username' value='' id='logusername'></br>";
	$form_ret .= "<br><label>Password</br></label><input type='password' name='password' value='' id='logpassword'></br>";
	$form_ret .= '<input type="hidden" name="instanceID" value="'.$instanceID.'">';
	$form_ret .= '<input type="hidden" name="courseType" value="'.$type.'">';
	$form_ret .= '<input type="hidden" value="'.str_replace( '%7E', '~', $_SERVER['REQUEST_URI']).'" name="redirect_to">';
	$form_ret .= '<input type="hidden" value="1" name="testcookie">';
	$form_ret .= "<br><input type='submit' id='srmslogin' class='course-button' value='Login'><br>";
	$form_ret .= "<a href='".trim(strtok(str_replace( '%7E', '~', $_SERVER['REQUEST_URI']), '?'))."?srmsform_type=forgotpassword&instanceID=".$instanceID."&courseType=".$type."'><i>forgot password?</i></a>";		
	$form_ret .= "</form>";
	*/
	$res_val = "";
	if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) {
	    $res_val = '<i class="wp_login_error" style="color: red;font-size: 80%;">The password you entered is incorrect, Please try again.</i>';
	} else if( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) {
	    $res_val = '<i class="wp_login_error" style="color: red;font-size: 80%;">Please enter both username and password.</i>';
	}
	$args = array(
	        'echo'           => false,
	        'redirect' => str_replace( '%7E', '~', $_SERVER['REQUEST_URI']),
	        'form_id'        => 'loginform',
	        'label_username' => __( 'Username' ),
	        'label_password' => __( 'Password' ),
	        'label_remember' => __( 'Remember Me'),
	        'label_log_in'   => __( $set_buttons[3] ),
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



	$this_link = "<a href='".trim(strtok(str_replace( '%7E', '~', $_SERVER['REQUEST_URI']), '?'))."?srmsform_type=forgotpassword&instanceID=".$instanceID."&courseType=".$type."' style='margin-left: 10px;'><b>Forgot password?</b></a>";
	$form_ret .= "<script>jQuery(document).ready(function(){";
	$form_ret .= 'jQuery("#wp-submit").after("'.$this_link.'");';		
	$form_ret .= "});</script>";
	return $form_ret;
}

function getFieldAccountCondition(){
	// form to link to create new contact and to enroll them
	$set_buttons = get_option('axceleratelink_srms_buttons');
	$form_ret = '';
	$form_ret .= "<form id='srmsform_userlogin' action='".str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])."' method='get'>";
	$form_ret .= "<input type='hidden' name='srmsform_type' id='accountCheck' value='regesterNewContactAndEnroll'>";
	$form_ret .= '<input type="hidden" name="instanceID" value="'.$_GET['instanceID'].'">';
	$form_ret .= '<input type="hidden" name="courseType" value="'.$_GET['courseType'].'">';
	$form_ret .= "<br><input type='submit' id='srmsregister' class='course-button' value='".$set_buttons[4]."'><br>";
	$form_ret .= "</form>";
	return $form_ret;
}

function getFieldLostPasswordForm(){
	$form_ret = '';
	$form_ret .= '<form name="lostpasswordform" id="lostpasswordform" action="'.wp_lostpassword_url().'" method="post">';
	$form_ret .= '<label for="user_login">Username:<br>';
	$form_ret .= '<input name="user_login" id="user_login" class="input" value="" size="" type="text"></label><br><br>';
	$form_ret .= '<label for="user_email">E-mail Address:<br>';
	$form_ret .= '<input name="user_email" id="user_email" class="input" value="" size="" type="text"></label>';
	$form_ret .= '<input type="hidden" name="" id="url_temp" value="'.str_replace( '%7E', '~', $_SERVER['REQUEST_URI']).'&axcelerate=forgotpassword">';
	$form_ret .= '<input name="redirect_to" value="&user_login=&user_email=" type="hidden" id="lostpasswordform_addon"><br><br>';
	$form_ret .= '<p class="submit">';
	$form_ret .= '<input name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Get New Password" type="submit">';
	$form_ret .= '</p>';
	$form_ret .= '</form>';
	return $form_ret;
}

function getFieldTableWPUserLoggedInInfo($logged_contacttype, $payment_off = null){
	// if a logged user
	$set_options = get_WordPress_Axcelerate_Link_SRMS_Optiont_Settings();
	$set_buttons = get_option('axceleratelink_srms_buttons');
	include('axcelerate_link_array_list.php');
	$data = wp_get_current_user();
	$form_ret = '';
	$axcelerateContactID = '';
	if($data){
		$axcelerateContactID = checkConctactExistViaEmail($data->user_email);
		$contact_data = getContactInformation($axcelerateContactID);
		// Personal Details
		$form_ret .= "<h3>Personal Details</h3>";
		$form_ret .= "<table>";
		$form_ret .= "<tr><td><b>Title</b></td><td id='dis_title'>".$contact_data['TITLE']."</td></tr>";
		$form_ret .= "<tr><td><b>Given Name</b></td><td id='dis_gname'>".$contact_data['GIVENNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Middle Name</b></td><td id='dis_mname'>".$contact_data['MIDDLENAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Surname</td></b><td id='dis_sname'>".$contact_data['SURNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Email Address</b></td><td id='dis_email'>".$contact_data['EMAILADDRESS']."</td></tr>";
		$form_ret .= "<tr><td><b>Date of Birth</b></td><td id='dis_dob'>".$contact_data['DOB']."</td></tr>";
		$form_ret .= "<tr><td><b>Gender</b></td><td id='dis_gender'>".($contact_data['SEX'] === 'F'? 'Female' : 'Male')."</td></tr>";
		$form_ret .= "</table>";

		// Contact Details
		$form_ret .= "<h3>Contact Details</h3>";			
		$form_ret .= "<table>";
		$form_ret .= "<tr><td colspan='2' class='td-center'><b>Contact Phone Numbers</b></td></tr>";
		$form_ret .= "<tr><td><b>Work Phone Number</b></td><td id='dis_workphone'>".$contact_data['WORKPHONE']."</td></tr>";
		$form_ret .= "<tr><td><b>Mobile Phone Number</b></td><td id='dis_mobilephone'>".$contact_data['MOBILEPHONE']."</td></tr>";
		$form_ret .= "<tr><td><b>Home Phone Number</b></td><td id='dis_homephone'>".$contact_data['PHONE']."</td></tr>";
		$form_ret .= "<tr><td colspan='2' class='td-center'><b>Emergency Contact</b></td></tr>";
		$form_ret .= "<tr><td><b>Contact name</b></td><td id='dis_EmergencyContact'>".$contact_data['EMERGENCYCONTACT']."</td></tr>";
		$form_ret .= "<tr><td><b>Relationship</b></td><td id='dis_EmergencyContactRelation'>".$contact_data['EMERGENCYCONTACTRELATION']."</td></tr>";
		$form_ret .= "<tr><td><b>Contact Number</b></td><td id='dis_EmergencyContactPhone'>".$contact_data['EMERGENCYCONTACTPHONE']."</td></tr>";
		$form_ret .= "</table>";

		// Address Details
		$form_ret .= "<h3>Address Details</h3>";
		$form_ret .= "<table>";
		$form_ret .= "<tr><td colspan='2' class='td-center'><b>Postal Address</b></td></tr>";
		$form_ret .= "<tr><td><b>Building Name</b></td><td id='dis_buildingName'>".$contact_data['BUILDINGNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Unit Number</b></td><td id='dis_unitNo'>".$contact_data['UNITNO']."</td></tr>";
		$form_ret .= "<tr><td><b>Street Number/Name </b></td><td id='dis_street'>".$contact_data['STREETNO'].'/'.$contact_data['STREETNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>PO Box </b></td><td id='dis_POBox'>".$contact_data['POBOX']."</td></tr>";
		$form_ret .= "<tr><td><b>City/ Suburb </b></td><td id='dis_city'>".$contact_data['CITY']."</td></tr>";
		$form_ret .= "<tr><td><b>State</b></td><td id='dis_sel_state1'>".$contact_data['STATE']."</td></tr>";
		$form_ret .= "<tr><td><b>Post Code</b></td><td id='dis_postcode'>".$contact_data['POSTCODE']."</td></tr>";
		$form_ret .= "<tr><td><b>Country</b></td><td id='dis_country'>".$contact_data['COUNTRY']."</td></tr>";
		$form_ret .= "<tr><td colspan='2' class='td-center'><b>Street Address</b></td></tr>";
		$form_ret .= "<tr><td><b>Building Name</b></td><td id='dis_sbuildingName'>".$contact_data['SBUILDINGNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Unit Number</b></td><td id='dis_sunitNo'>".$contact_data['SUNITNO']."</td></tr>";
		$form_ret .= "<tr><td><b>Street Number/Name </b></td><td id='dis_sstreet'>".$contact_data['SSTREETNO'].'/'.$contact_data['SSTREETNAME']."</td></tr>";
		//$form_ret .= "<tr><td><b>PO Box </b></td><td id='dis_sPOBox'>".$contact_data['SPOBOX']."</td></tr>";
		$form_ret .= "<tr><td><b>City/ Suburb </b></td><td id='dis_scity'>".$contact_data['SCITY']."</td></tr>";
		$form_ret .= "<tr><td><b>State</b></td><td id='dis_sel_state2'>".$contact_data['SSTATE']."</td></tr>";
		$form_ret .= "<tr><td><b>Post Code</b></td><td id='dis_spostcode'>".$contact_data['SPOSTCODE']."</td></tr>";
		$form_ret .= "<tr><td><b>Country</b></td><td id='dis_scountry'>".$contact_data['SCOUNTRY']."</td></tr>";
		$form_ret .= "</table>";

		// Demographic Details
		$form_ret .= "<h3>Demographic Details</h3>";
		$form_ret .= "<table>";
		$form_ret .= "<tr><td><b>Country of Birth</b></td><td id='dis_CountryofBirthID'>".$contact_data['COUNTRYOFBIRTHNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>City of Birth</b></td><td id='dis_CityofBirth'>".$contact_data['CITYOFBIRTH']."</td></tr>";
		$form_ret .= "<tr><td><b>Country of Citizenship.</b></td><td id='dis_CountryofCitizenID'>".$contact_data['COUNTRYOFCITIZENNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Aust. Citizenship Status</b></td><td id='dis_CitizenStatusID'>".$contact_data['CITIZENSTATUSNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Aboriginal or Torres Strait Islander Origin</b></td><td id='dis_IndigenousStatusID'>".$contact_data['INDIGENOUSSTATUSNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Language Identifier</b></td><td id='dis_MainLanguageID'>".$contact_data['MAINLANGUAGENAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Proficiency in Spoken English</b></td><td id='dis_EnglishProficiencyID'>";
		foreach ($ProficiencyID as $key => $value) {
			if($contact_data['ENGLISHPROFICIENCYID'] == $key){
				$form_ret .= $value;
			}
		}
		$form_ret .="</td></tr>";
		$form_ret .= "<tr><td><b>English Assistance</b></td><td id='dis_EnglishAssistanceFlag'>".($contact_data['ENGLISHASSISTANCEFLAG']? 'Yes' : 'No')."</td></tr>";
		$form_ret .= "<tr><td><b>Disabilities</b></td><td id='dis_DisabilityTypeIDs'>";
		foreach ($contact_data['DISABILITYTYPENAMES'] as $key ) {
			$form_ret .= $key.", ";
		}
		$form_ret .="</td></tr>";
		$form_ret .= "</table>";

		// Employment and Education
		$form_ret .= "<h3>Employment and Education</h3>";
		$form_ret .= "<table>";
		$form_ret .= "<tr><td><b>Employment Status</b></td><td id='dis_LabourForceID'>".$contact_data['LABOURFORCENAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Occupation Identifier</b></td><td id='dis_ANZSCOCode'>".$contact_data['ANZSCOCODE']."</td></tr>";
		$form_ret .= "<tr><td><b>Industry of Employment</b></td><td id='dis_ANZSICCode'>".$contact_data['ANZSICCODE']."</td></tr>";
		$form_ret .= "<tr><td><b>Learner Unique Identifier</b></td><td id='dis_LUI'>".$contact_data['LUI']."</td></tr>";
		$form_ret .= "<tr><td><b>Unique Student Identifier</b></td><td id='dis_USI'>".$contact_data['USI']."</td></tr>";
		$form_ret .= "<tr><td><b>Attending Other School/s</b></td><td id='dis_AtSchoolName'>".$contact_data['ATSCHOOLNAME']."</td></tr>";
		$form_ret .= "<tr><td><b>Highest COMPLETED school level</b></td><td id='dis_HighestSchoolLevelID'>";
		foreach ($HighestSchoolLevel_lists as $key => $value) {
			if($contact_data['HIGHESTSCHOOLLEVELID'] == $key){
				$form_ret .= $value;
			}
		}
		$form_ret .= "</td></tr>";
		$form_ret .= "<tr><td><b>Year Completed</b></td><td id='dis_HighestSchoolLevelYear'>".$contact_data['HIGHESTSCHOOLLEVELYEAR']."</td></tr>";
		$form_ret .= "<tr><td><b>Prior Education</b></td><td id='dis_priorEducationCheck'>";
		foreach ($contact_data['PRIOREDUCATIONNAMES'] as $key ) {
			$form_ret .= $key.", ";
		}
		$form_ret .="</td></tr>";
		$form_ret .= "</table>";

		// form for enroll..
		if($axcelerateContactID){
			$instance = getCourseInstanceDetail($_GET['instanceID'], $_GET['courseType']);
			$form_ret .= "<form id='srmsform_enrolContact' action='".str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])."' method='post'>";
			$form_ret .= "<input type='hidden' name='srmsform_type' id='accountCheck' value='enrollContact'>";
			$form_ret .= '<input type="hidden" name="instanceID" value="'.$_GET['instanceID'].'">';
			$form_ret .= '<input type="hidden" name="courseType" value="'.$_GET['courseType'].'">';
			$form_ret .= '<input type="hidden" name="contactID" value="'.$axcelerateContactID.'">';
			$form_ret .= '<input type="hidden" name="ajax_url" id="ajax_url" value="'.admin_url('admin-ajax.php').'">';
			$form_ret .= '<input type="hidden" name="payment_amount" value="'.str_replace(" ", "",money_format('%(#5.2n',$instance['COST'])).'">';
			if($logged_contacttype == 'JSA'){
				$form_ret .= getFieldPayerSelect();
			}
			// $form_ret .= getFieldTableDisplayCourseInstanceDetail($_GET['instanceID'], $_GET['courseType']);
			if($payment_off != 'true'){
				$form_ret .= getFieldPayment($logged_contacttype);
			}
			$form_ret .= "<br><br>";
			$form_ret .= getCaptchaField();
			$form_ret .= "<br><input type='submit' id='enrolnow' class='course-button' value='".$set_buttons[2]."' data-value='".$set_options[0]."'><br>";
			$form_ret .= "</form>";

		}
	}	

	return $form_ret;
}

function getCustomCSSField(){
	$CustomCSS_Colors = get_WordPress_Axcelerate_Link_SRMS_CustomCSS_Colors();
	$CustomCSS_Fonts = get_WordPress_Axcelerate_Link_SRMS_CustomCSS_Fonts();
	$form_ret = '<style>';
	$form_ret .= '#registration-section {color: #'.$CustomCSS_Colors[0].'; font-size: '.$CustomCSS_Fonts[0].'px;}';
	$form_ret .= '#registration-section .form-nav-menu ul li a {color: #'.$CustomCSS_Colors[1].'; font-size: '.$CustomCSS_Fonts[1].'px;}';
	$form_ret .= '#registration-section h2 {color: #'.$CustomCSS_Colors[2].'; font-size: '.$CustomCSS_Fonts[2].'px;}';
	$form_ret .= '#registration-section h3 {color: #'.$CustomCSS_Colors[3].'; font-size: '.$CustomCSS_Fonts[3].'px;}';
	$form_ret .= '#registration-section label {color: #'.$CustomCSS_Colors[4].'; font-size: '.$CustomCSS_Fonts[4].'px;}';
	$form_ret .= '#registration-section a.prime_linkmenu, #registration-section a.linkmenu, #registration-section a.back_linkmenu {color: #'.$CustomCSS_Colors[5].'; font-size: '.$CustomCSS_Fonts[5].'px; background: #'.$CustomCSS_Colors[6].';}';
	$form_ret .= '#registration-section a.prime_linkmenu:hover, #registration-section a.linkmenu:hover, #registration-section a.back_linkmenu:hover {background: #'.$CustomCSS_Colors[19].';}';
	$form_ret .= '#course-section {color: #'.$CustomCSS_Colors[7].'; font-size: '.$CustomCSS_Fonts[6].'px;}';
	$form_ret .= '#course-section h2 {color: #'.$CustomCSS_Colors[8].'; font-size: '.$CustomCSS_Fonts[7].'px;}';
	$form_ret .= '#course-section h4 a {color: #'.$CustomCSS_Colors[9].'; font-size: '.$CustomCSS_Fonts[8].'px; text-decoration: none;}';
	$form_ret .= '#course-section table tr th {color: #'.$CustomCSS_Colors[10].'; font-size: '.$CustomCSS_Fonts[9].'px;}';
	$form_ret .= '#course-section table tr td {color: #'.$CustomCSS_Colors[11].'; font-size: '.$CustomCSS_Fonts[10].'px;}';
	$form_ret .= '#course-section table tr td input[type="submit"], #account-section input[type="submit"], #registration-section input[type="submit"]{color: #'.$CustomCSS_Colors[12].'; font-size: '.$CustomCSS_Fonts[11].'px; background-color: #'.$CustomCSS_Colors[13].';}';
	$form_ret .= '#course-section table tr td input[type="submit"]:hover, #account-section input[type="submit"]:hover, #registration-section input[type="submit"]:hover {color: #'.$CustomCSS_Colors[14].'; background-color: #'.$CustomCSS_Colors[15].';}';
	$form_ret .= '#account-section {color: #'.$CustomCSS_Colors[18].'; font-size: '.$CustomCSS_Fonts[14].'px;}';
	$form_ret .= '#account-section h2 {color: #'.$CustomCSS_Colors[16].'; font-size: '.$CustomCSS_Fonts[12].'px;}';
	$form_ret .= '#account-section h3 {color: #'.$CustomCSS_Colors[17].'; font-size: '.$CustomCSS_Fonts[13].'px;}';
	$form_ret .= '</style>';
	return $form_ret;
}

function getCaptchaField(){

	//include('captcha/simple-php-captcha.php');
	//$_SESSION['captcha'] = simple_php_captcha();
	$captcha_value = getRandomCharacter();

	$form_ret = '';
	$form_ret .= "<label>Please Enter the Code.</label></br>";
	$form_ret .= '<img id="captcha-img" src="'.plugins_url( "captcha/captcha.php?captcha_code=".$captcha_value, __FILE__ ).'" alt="" style="margin-bottom: 5px; float: left;"> &nbsp;<span id="captcha-refresh" style="cursor: pointer; margin-left: 10px; float: left;"><i class="fa fa-refresh"></i></span>'; // $_SESSION['captcha']['image_src']
	// $form_ret .= '<div id="captcha-canvas" style="display:none;"><canvas width="161" height="75"></canvas></div>';
	$form_ret .= "</br><input type='text' name='captcha' id='captcha' value='' class='not-empty' required></br><div id='captcha_err_con'></div>";
	$form_ret .= "<input type='hidden' id='thisval' value='".$captcha_value."' data-value='".plugins_url( "captcha/captcha.php?captcha_code=", __FILE__ )."'>"; // $_SESSION['captcha']['code']
	return $form_ret;
}

function getTermsCondField(){
	$form_ret = '';
		$data = get_option('axl_srms_opt_terms');
		$form_ret .= "</br><label><b>".$data[0]."</b></br></label><div id='cterms_msg' style='width: 100%; height: 150px; overflow-y: scroll;'>".$data[1]."</div><br><input type='checkbox' name='cterms' value='' class='' id='cterms' required> &nbsp;&nbsp; ".$data[2]."</br></br></br>";		
		return $form_ret;
}

function setContactHTMLtoPDFdisplay($contactID, $someUploadedFile = null){
	//ini_set('memory_limit', '-1');
	require_once 'axcelerate-link-functions.php';
	include('axcelerate_link_array_list.php');

	$contact_data = getContactInformation($contactID);
	/*
	$filecontentval2 = get_option('axceleratelink_formfile_tmplt');
	if($filecontentval2[0] == 'true'){
		$doc = new Docx_reader();
		$doc->setFile($filecontentval2[1]);
		$form_ret = $doc->to_html();
	*/
	//}else{
		$form_ret = get_option('axceleratelink_formfile_content');
	//}
	$blogtime = current_time( 'mysql' ); 
	list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );
	$ddate = $today_year.'-'.$today_month.'-'.$today_day.' :'.$hour.':'.$minute.':'.$second;
	
	$con_gender = ($contact_data['SEX'] === 'F'? 'Female' : 'Male');
	$ProficiencyIDval = '';
	foreach ($ProficiencyID as $key => $value) {
		if($contact_data['ENGLISHPROFICIENCYID'] == $key){
			$ProficiencyIDval .= $value;
		}
	}
	$engvalasst = ($contact_data['ENGLISHASSISTANCEFLAG']? 'Yes' : 'No');
	$disabilityval = '';
	foreach ($contact_data['DISABILITYTYPENAMES'] as $key ) {
		$disabilityval .= $key.", ";
	}
	$HighestSchoolLevel_listsval = '';
	foreach ($HighestSchoolLevel_lists as $key => $value) {
		if($contact_data['HIGHESTSCHOOLLEVELID'] == $key){
			$HighestSchoolLevel_listsval .= $value;
		}
	}
	$priored = '';
	foreach ($contact_data['PRIOREDUCATIONNAMES'] as $key ) {
		$priored .= $key.", ";
	}
	$ANZSCOCode_listsval = "";
	foreach ($ANZSCOCode_lists as $key  => $value) {
		if($contact_data['ANZSCOCODE'] == $key){
			$ANZSCOCode_listsval = $value;
		}
	}
	$employerANZSIC_listsval = "";
	foreach ($employerANZSIC_lists as $key  => $value) {
		if($contact_data['ANZSICCODE'] == $key){
			$employerANZSIC_listsval = $value;
		}
	}

	$fileDriverLiscence = '';
	$fileDriverLiscence2 = '';
	$fileMedicLiscence = '';

	foreach ($someUploadedFile as $key => $value) {
		if($key == 'fileDriverLiscence'){
			$fileDriverLiscence = '<img src="https://www.googledrive.com/host/'.$value.'" >';
		}
		if($key == 'fileDriverLiscence2'){
			$fileDriverLiscence2 = '<img src="https://www.googledrive.com/host/'.$value.'" >';
		}
		if($key == 'fileMedicLiscence'){
			$fileMedicLiscence = '<img src="https://www.googledrive.com/host/'.$value.'" >';
		}
		# code...
	}

	$array_value = array(
			'\"',
			'[[CON_TITLE]]', 
			'[[CON_GIVENNAME]]',
			'[[CON_MIDDLENAME]]',
			'[[CON_SURNAME]]',
			'[[CON_EMAILADDRESS]]',
			'[[CON_DOB]]',
			'[[CON_SEX]]',
			'[[CON_WORKPHONE]]',
			'[[CON_MOBILEPHONE]]',
			'[[CON_PHONE]]',
			'[[CON_EMERGENCYCONTACT]]',
			'[[CON_EMERGENCYCONTACTRELATION]]',
			'[[CON_EMERGENCYCONTACTPHONE]]',
			'[[CON_BUILDINGNAME]]',
			'[[CON_UNITNO]]',
			'[[CON_STREET]]',
			'[[CON_POBOX]]',
			'[[CON_CITY]]',
			'[[CON_STATE]]',
			'[[CON_POSTCODE]]',
			'[[CON_COUNTRY]]',
			'[[CON_SBUILDINGNAME]]',
			'[[CON_SUNITNO]]',
			'[[CON_SSTREET]]',
			'[[CON_SCITY]]',
			'[[CON_SSTATE]]',
			'[[CON_SPOSTCODE]]',
			'[[CON_SCOUNTRY]]',
			'[[CON_COUNTRYOFBIRTHNAME]]',
			'[[CON_CITYOFBIRTH]]',
			'[[CON_COUNTRYOFCITIZENNAME]]',
			'[[CON_CITIZENSTATUSNAME]]',
			'[[CON_INDIGENOUSSTATUSNAME]]',
			'[[CON_MAINLANGUAGENAME]]',
			'[[CON_ENGLISHPROFICIENCYID]]',
			'[[CON_ENGLISHASSISTANCEFLAG]]',
			'[[CON_DISABILITYTYPENAMES]]',
			'[[CON_LABOURFORCENAME]]',
			'[[CON_ANZSCOCODE]]',
			'[[CON_ANZSICCODE]]',
			'[[CON_LUI]]',
			'[[CON_USI]]',
			'[[CON_ATSCHOOLNAME]]',
			'[[CON_HIGHESTSCHOOLLEVELID]]',
			'[[CON_HIGHESTSCHOOLLEVELYEAR]]',
			'[[CON_PRIOREDUCATIONNAMES]]',
			'[[DATE_CREATED]]',
			'[[CON_DRIVERLICENCE]]',
			'[[CON_DRIVERLICENCE2]]',
			'[[CON_MEDICALCERT]]',
		);
	$array_replace = array(
			'',
			$contact_data['TITLE'], 
			$contact_data['GIVENNAME'],
			$contact_data['MIDDLENAME'],
			$contact_data['SURNAME'],
			$contact_data['EMAILADDRESS'],
			$contact_data['DOB'],
			$con_gender,
			$contact_data['WORKPHONE'],
			$contact_data['MOBILEPHONE'],
			$contact_data['PHONE'],
			$contact_data['EMERGENCYCONTACT'],
			$contact_data['EMERGENCYCONTACTRELATION'],
			$contact_data['EMERGENCYCONTACTPHONE'],
			$contact_data['BUILDINGNAME'],
			$contact_data['UNITNO'],
			$contact_data['STREETNO'].'/'.$contact_data['STREETNAME'],
			$contact_data['POBOX'],
			$contact_data['CITY'],
			$contact_data['STATE'],
			$contact_data['POSTCODE'],
			$contact_data['COUNTRY'],
			$contact_data['SBUILDINGNAME'],
			$contact_data['SUNITNO'],
			$contact_data['SSTREETNO'].'/'.$contact_data['SSTREETNAME'],
			$contact_data['SCITY'],
			$contact_data['SSTATE'],
			$contact_data['SPOSTCODE'],
			$contact_data['SCOUNTRY'],
			$contact_data['COUNTRYOFBIRTHNAME'],
			$contact_data['CITYOFBIRTH'],
			$contact_data['COUNTRYOFCITIZENNAME'],
			$contact_data['CITIZENSTATUSNAME'],
			$contact_data['INDIGENOUSSTATUSNAME'],
			$contact_data['MAINLANGUAGENAME'],
			$ProficiencyIDval,
			$engvalasst,
			$disabilityval,
			$contact_data['LABOURFORCENAME'],
			$ANZSCOCode_listsval,
			$employerANZSIC_listsval,
			$contact_data['LUI'],
			$contact_data['USI'],
			$contact_data['ATSCHOOLNAME'],
			$HighestSchoolLevel_listsval,
			$contact_data['HIGHESTSCHOOLLEVELYEAR'],
			$priored,
			$ddate,
			$fileDriverLiscence,
			$fileDriverLiscence2,
			$fileMedicLiscence,
		);

	$form_ret = str_replace($array_value, $array_replace, $form_ret);


	return $form_ret;
}
			

?>