<?php
include_once('axcelerate-link-dbdata.php');
//require_once 'axcelerate-link-google-api.php';

if($_POST['axceleratelink_hidden'] == 'Y') {
		$var_array = array(
			$_POST['axl_sqid_payment_mc'],
			$_POST['axl_sqid_payment_key'],
			$_POST['axl_sqid_payment_pass'],
			$_POST['axl_sqid_payment_post']			
			);
		update_option('axl_sqid_payment_settings', $var_array);
        ?>
			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
       // ob_start();
    } 
    $value = get_option('axl_sqid_payment_settings');

?>
<div class="wrap">
    <?php    echo "<h2>" . __( 'Axcelerate Link Payment Settings', 'axceleratelink_trdom' ) . "</h2>"; ?>
    <?php    echo "<h4>" . __( '', 'axceleratelink_trdom' ) . "</h4>"; ?>
	<form name="axceleratelink_srms_form_setup_form" id='axceleratelink_srms_form_setup_form' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
	<input type="hidden" name="axceleratelink_hidden" value="Y">
	<h4>SQID Payment Settings</h4>
	<hr>
	<p>Merchant Code <br><input type='text' name='axl_sqid_payment_mc' id='' value="<?php echo ($value[0] ? $value[0] : 'TIDE'); ?>" style="width: 800px;"></p>
	<p>API Key<br><input type='text' name='axl_sqid_payment_key' id='' value="<?php echo ($value[1] ? $value[1] : 'ACF5CE4E9B03427D8E172ED43D43225B'); ?>" style="width: 800px;"></p>
	<p>API Passphrase<br><input type='text' name='axl_sqid_payment_pass' id='' value="<?php echo ($value[2] ? $value[2] : 'KKLQpT3Q'); ?>" style="width: 800px;"></p>
	<p>POST URL<br>
	<select style="width: 800px;" name='axl_sqid_payment_post'>
		<option value="https://api.staging.sqidpay.com/Post" <?php echo ($value[3] != "https://api.sqidpay.com/Post"? 'selected' : ''); ?>>Test</option>
		<option value="https://api.sqidpay.com/Post" <?php echo ($value[3] == "https://api.sqidpay.com/Post" ? 'selected' : ''); ?>>Live</option>
	</select>
	</br></br></br>
		<input type="submit" name="Submit" value="<?php _e('Update SQID Payment Settings', 'axceleratelink_trdom' ) ?>" />
</form>

</div>