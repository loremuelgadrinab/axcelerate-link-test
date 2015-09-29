<?php
include_once('axcelerate-link-dbdata.php');
//require_once 'axcelerate-link-google-api.php';

if($_POST['axceleratelink_hidden'] == 'Y') {
    	update_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API_settings();
        ?>
			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
       // ob_start();
    } 
    $googleDrive = get_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API();

?>
<div class="wrap">
    <?php    echo "<h2>" . __( 'Axcelerate Link Google Drive Sync Handler', 'axceleratelink_trdom' ) . "</h2>"; ?>
    <?php    echo "<h4>" . __( '', 'axceleratelink_trdom' ) . "</h4>"; ?>
	<form name="axceleratelink_srms_form_setup_form" id='axceleratelink_srms_form_setup_form' method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
	<input type="hidden" name="axceleratelink_hidden" value="Y">
	<h4>Google Drive API Settings</h4>
	<p>Google Email <br>
		<div class="input">
		<input type='text' name='al_srms_gdrive_email' id='al_srms_gdrive_email' value="<?php echo ($googleDrive[0] ? $googleDrive[0] : ''); ?>" style="width: 800px;">
		<span class="tooltip">Google Email address used in google web development</span>
		</div>
	</p>
	<p>Client ID<br>
		<div class="input">
		<input type='text' name='al_srms_gdrive_clientid' id='al_srms_gdrive_clientid' value="<?php echo ($googleDrive[1] ? $googleDrive[1] : ''); ?>" style="width: 800px;">
		<span class="tooltip">Client ID provided by google web development</span>
		</div>
	</p>
	<p>Service Account Name / Email address<br>
		<div class="input">
		<input type='text' name='al_srms_gdrive_accname' id='al_srms_gdrive_accname' value="<?php echo ($googleDrive[2] ? $googleDrive[2] : ''); ?>" style="width: 800px;">
		<span class="tooltip">Service Account Name provided by google web development</span>
		</div>
	</p>
	
	<p>Private Key Url Path <?php echo ($googleDrive[3] ? '<i>'.$googleDrive[3].'</i>' : ''); ?><br>	
		<input type='hidden' name='al_srms_gdrive_pathurl' id='al_srms_gdrive_pathurl' value="<?php echo ($googleDrive[3] ? $googleDrive[3] : ''); ?>" style="width: 800px;">		
	</p>
	<div class="input">
	<input type="file" name="fileToUpload" id="fileToUpload">
	<span class="tooltip">Private Key file provided by google web development</span>
	</div>

	<p>Folder Name <br>
		<div class="input">
			<input type='text' name='al_srms_gdrive_folder' id='al_srms_gdrive_folder' value="<?php echo ($googleDrive[4] ? $googleDrive[4] : ''); ?>" style="width: 800px;">
		<span class="tooltip">Folder Name that will be created in google drive</span>
		</div>
	</p>
	<input type="submit" name="Submit" value="<?php _e('Update Google Settings', 'axceleratelink_trdom' ) ?>" />
</form>

<h3>How to generate your Google Drive API Key.</h3>

<p>1. Go to https://code.google.com/apis/console/, sign in with your google account. Click Create Project. </p>
<img src="<?php echo plugins_url() ?>/axcelerate-link/img/docu-1.jpg">

<p>2. Now click Drive API button to enabling Drive API Services. </p>
<img src="<?php echo plugins_url() ?>/axcelerate-link/img/docu-2.jpg">

<p>3. On the left pane of your screen click 'Credentials', click 'CREATE NEW CLIENT ID'. On the popup, pick <b>Service Account</b>, cick 'Create Client ID'. </p>
<img src="<?php echo plugins_url() ?>/axcelerate-link/img/docu-3.jpg">

<p>4. Your *.-privatekey.p12 file will automaticaly downloaded, save it.</p>

<p>5. Now you have a Client ID, Email address (Service Account Name), and *.-privatekey.p12 file that recently downloaded.</p>

<p>6. Upload your *.-privatekey.p12 file into your web host and remember its Url path.</p>

<p>** You can upload the *.p12 file to the Google Drive itself (goto https://drive.google.com/ and just drag &amp; drop your *.p12 file there), and then change the permission of uploaded *.p12 file set to public(select the file, click "More" button to show the dropdown menu, then click "Share", click "Advanced", click "Change", click "On - Public on the web", click "Save" button). Copy and save the file id.<br>Your Private Key Url Path will be like this: <code>https://docs.google.com/uc?id=<b>XXXXXX</b>&amp;export=download</code> <br>
or you can use: <code>https://www.googledrive.com/host/<b>XXXXXX</b></code><br>
Where <b>XXXXXX</b> is your *.p12 Google Drive file ID (not the *.p12 filename), just replace <b>XXXXXX</b> with your Google Drive file ID.
</p>

<p>File Permission uploded by this plugin automatically set to public, which anyone can view or download your files.</p>

<p>For more info, please visit https://developers.google.com/drive/web/</p>
</div>