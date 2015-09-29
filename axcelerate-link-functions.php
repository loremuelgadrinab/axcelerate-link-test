<?php
//ini_set('max_execution_time','10000' ); 
include_once 'axcelerate-link-dbdata.php';

//get_option('axcelerate-link-add-user');
//add_action('muplugins_loaded', 'checkIfClientRegisterPage');
function checkIfClientRegisterPage(){
	//$postid = get_the_ID();
	//echo get_current_screen();
	//echo '-'.get_option('axcelerate-link-add-user');
	if(is_page(get_option('axcelerate-link-add-user'))){
	//	echo "Loadning...";
	}
}
// ajax callbacks
add_action('wp_ajax_checkUserEmailExistentVal', 'checkUserEmailExistentVal');
add_action('wp_ajax_nopriv_checkUserEmailExistentVal', 'checkUserEmailExistentVal');
function checkUserEmailExistentVal() {
	$email = $_POST['email']; // get email val
	$contactID = $_POST['contactID'];
	$val = checkConctactExistViaEmail($email);
	$wp_users = get_users();
	$cmail = '';
	if ($val){
		if($contactID == $val){
			$email_val = 'true';
		}else{
			$email_val= 'false';
		}
        
    }else{
    	foreach ($wp_users as $wp_user) {
			//echo $wp_user->user_login.'<br>';
			if($wp_user->user_email == $email){
				$cmail = 'true';
			}
		}
		if($cmail == 'true'){
			$email_val= 'false';
		}else{
			$email_val = 'true';
		}
       
    }
    echo json_encode(array("validation" => $email_val));
    wp_die();
	
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='checkUserEmailExistentVal'){
        do_action( 'wp_ajax_' . $_REQUEST['action'] );
        do_action( 'wp_ajax_nopriv_' . $_REQUEST['action'] );
}

add_action('wp_ajax_checkUsernameExistentVal', 'checkUsernameExistentVal');
add_action('wp_ajax_nopriv_checkUsernameExistentVal', 'checkUsernameExistentVal');
function checkUsernameExistentVal(){
	$username = $_POST['username']; //
	//$username = 'lgadrinab'; //
	//axcelerate users
	$val = checkCOntactUsernameExist($username);
	$wp_users = get_users();
	$c_user = '';
	if ($val){
        $usernname_val= 'false';
    }else{
        foreach ($wp_users as $wp_user) {
			//echo $wp_user->user_login.'<br>';
			if($wp_user->user_login == $username){
				$c_user = 'true';
			}
		}
		if($c_user == 'true'){
			$usernname_val = 'false';
		}else{
			$usernname_val = 'true';
		}
    }

    echo json_encode(array("validation" => $usernname_val));
    wp_die();
	
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='checkUsernameExistentVal'){
        do_action( 'wp_ajax_' . $_REQUEST['action'] );
        do_action( 'wp_ajax_nopriv_' . $_REQUEST['action'] );
}

add_action('wp_ajax_captchaRefreshing', 'captchaRefreshing');
add_action('wp_ajax_nopriv_captchaRefreshing', 'captchaRefreshing');
function captchaRefreshing(){
	$captcha_value = getRandomCharacter();
	echo json_encode(array("captcha_value" => $captcha_value));
    wp_die();
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='captchaRefreshing'){
        do_action( 'wp_ajax_' . $_REQUEST['action'] );
        do_action( 'wp_ajax_nopriv_' . $_REQUEST['action'] );
}
// google api

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

/**
 * Disable admin bar on the frontend of your website
 * for subscribers.
 */
function themeblvd_disable_admin_bar() { 
	if( ! current_user_can('edit_posts') )
		add_filter('show_admin_bar', '__return_false');	
}
add_action( 'after_setup_theme', 'themeblvd_disable_admin_bar' );
 
/**
 * Redirect back to homepage and not allow access to 
 * WP admin for Subscribers.
 */
function themeblvd_redirect_admin(){
	if ( ! current_user_can( 'edit_posts' ) ){
		wp_redirect( site_url() );
		exit;		
	}
}
add_action( 'admin_init', 'themeblvd_redirect_admin' );


// ---

/**
 * Function Name: front_end_login_fail.
 * Description: This redirects the failed login to the custom login page instead of default login page with a modified url
**/


add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
		if (strpos($referrer,'?') !== false) {
		    $subs = '&login=failed';
		}else{
			$subs = '?login=failed';
		}
		wp_redirect( $referrer . $subs );  // let's append some information (login=failed) to the URL for the theme to use
		exit;
   }
}

add_action( 'authenticate', 'check_username_password', 1, 3);
function check_username_password( $login, $username, $password ) {

	// Getting URL of the login page
	$referrer = $_SERVER['HTTP_REFERER'];

	// if there's a valid referrer, and it's not the default log-in screen
	if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) { 
	    if( $username == "" || $password == "" ){
	    	if (strpos($referrer,'?') !== false) {
			    $subs = '&login=empty';
			}else{
				$subs = '?login=empty';
			}
	        wp_redirect( $referrer . $subs );
	        exit;
	    }
	}

}
// Replace my constant 'LOGIN_PAGE_ID' with your custom login page id.

//add_action('login_form','my_added_login_field');
function my_added_login_field(){
    //Output your HTML

    ?>
    <p>You can type a little note to those logging in here.</p>

    <?php

	if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) {
	   ?> <p class="wp_login_error">The password you entered is incorrect, Please try again.</p> <?php
	} else if( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) {
	   ?> <p class="wp_login_error">Please enter both username and password.</p> <?php
	}
}

function axl_gdwpm_custom_upload_filter( $file, $newfilename, $otherFile = null, $otherfilecontent = null ){

	$gdwpm_opt_akun = get_WordPress_Axcelerate_Link_SRMS_GoogleDrive_API(); // imel, client id, service akun, private key
	$other_folder = get_option('axl_jsa_gdrive_opt');

	//var_dump($gdwpm_opt_akun);

	if(!empty($gdwpm_opt_akun[1]) && !empty($gdwpm_opt_akun[2]) && !empty($gdwpm_opt_akun[3])){		

		require_once 'gdwpm-api/Google_Client.php';

		require_once 'gdwpm-api/contrib/Google_DriveService.php';



		$gdwpm_service_ride = new AXL_GDWPMBantuan( $gdwpm_opt_akun[1], $gdwpm_opt_akun[2], $gdwpm_opt_akun[3] );

		
		//var_dump($gdwpm_service_ride);
		//$filename = $file['name'];
		if($otherFile == 'pdf-file'){
			$filename = $newfilename.'.pdf';
			$mime_berkas = "html";
			$path = "";
		}else{
			$temp = explode(".",$file["name"]);
			$filename = $newfilename.'.'.end($temp);

			$path = $file['tmp_name'];

			$mime_berkas = $file['type'];
		}

		//$mime_berkas = sanitize_mime_type($mime_berkas);

		$folder_ortu = preg_replace("/[^a-zA-Z0-9]+/", " ", $gdwpm_opt_akun[4]);
		
		if($otherFile == 'ReferralForm'){
			$folder_ortu = preg_replace("/[^a-zA-Z0-9]+/", " ", $other_folder);
		}

		$folder_ortu = sanitize_text_field($folder_ortu);

		

		if($folder_ortu != ''){

			$folderId = $gdwpm_service_ride->getFolderIdByName( $folder_ortu );

		}

		

		$content = '';



		if( ! $folderId ) {

			$folderId = $gdwpm_service_ride->createFolder( $folder_ortu );

			$gdwpm_service_ride->setPermissions( $folderId, $gdwpm_opt_akun[0] );

		}



		$fileParent = new Google_ParentReference();
		//var_dump($fileParent);

		$fileParent->setId( $folderId );

		$fileId = $gdwpm_service_ride->createFileFromPath( $path, $filename, $content, $fileParent, $otherFile, $otherfilecontent);

		

		$sukinfo = '';
		// echo '<br> google file ID is  '.$fileId;
		if($fileId){
			if($otherFile == 'pdf-file'){
				return $fileId;
			}else{
				$gdwpm_service_ride->setPermissions( $fileId, 'me', 'reader', 'anyone' );

				if(!empty($mime_berkas)){

					axl_gdwpm_ijin_masuk_perpus($mime_berkas, $filename, $fileId, $content, $folder_ortu);

					$sukinfo = ' and added into your Media Library';

				}
				// modified by Loremuel

				// echo '<div class="updated"><p>Done! <strong>'.$filename.' ('.$fileId.')</strong> successfully uploaded into <strong>'.$folder_ortu.'</strong>'.$sukinfo.'.</p></div>';

				//$fileku['error'] = 'Google Drive WP Media: This error message appear because your file has been deleted before uploading to the internal uploads folder. If you want to remove this error, just navigate to Media >> Google Drive WP Media >> Options and then uncheck the "Google Drive as Default Media Upload Storage." and save it.';
				$fileku['error'] = $fileId;
				$fileku['name'] = $filename;

				if(file_exists($path)){@unlink($path);}

				return $fileId;
			}

		}else{

			echo '<div class="error"><p>Failed to upload <strong>'.$filename.'</strong> to Google Drive.</p></div>';

			return $file;

		}

	}else{

		return $file;

	}

}

function axl_gdwpm_ijin_masuk_perpus($jenis_berkas, $nama_berkas, $id_berkas, $deskrip_berkas, $jeneng_folder = 'Uncategorized', $img_sizes = '', $metainfo = ''){

	// ADD TO LIBRARY

	$gdwpm_lebar_gbr = ''; $gdwpm_tinggi_gbr = '';

	$gdwpm_fol_n_id = 'G_D_W_P_M-file_ID/' . $id_berkas;

	$gdwpm_fol_n_idth = '';

	

	if(strpos($jenis_berkas, 'image') !== false){

		if(!empty($img_sizes) || $img_sizes != ''){

			// selfWidth:xx selfHeight:xx thumbId:xxx thumbWidth:xx thumbHeight:xx

			preg_match_all('/(\w+):("[^"]+"|\S+)/', $img_sizes, $matches);

			$img_meta = array_combine($matches[1], $matches[2]);

			if(array_key_exists('thumbId', $img_meta)){

				$gdwpm_fol_n_idth = $img_meta['thumbId'];

			}

			if(array_key_exists('selfWidth', $img_meta)){

				$gdwpm_lebar_gbr = $img_meta['selfWidth'];

			}

			if(array_key_exists('selfHeight', $img_meta)){

				$gdwpm_tinggi_gbr = $img_meta['selfHeight'];

			}

		}else{

			$gdwpm_ukur_gambar = getimagesize('https://docs.google.com/uc?id=' . $id_berkas. '&export=view');

			$gdwpm_lebar_gbr = $gdwpm_ukur_gambar[0];

			$gdwpm_tinggi_gbr = $gdwpm_ukur_gambar[1];

		}

		$gdwpm_fol_n_id = 'G_D_W_P_M-ImageFile_ID/' . $id_berkas;

		

		$gdwpm_dummy_fol = get_option('gdwpm_dummy_folder');

		

		if($gdwpm_dummy_fol == 'checked'){

			$gdwpm_ekst_gbr = explode('/', $jenis_berkas);

			if($gdwpm_ekst_gbr[1] == 'png' || $gdwpm_ekst_gbr[1] == 'gif' || $gdwpm_ekst_gbr[1] == 'bmp'){

				$gdwpm_fol_n_id = 'gdwpm_images/' . $id_berkas . '.' . $gdwpm_ekst_gbr[1];

				$gdwpm_fol_n_idth .= '.' . $gdwpm_ekst_gbr[1];

			}else{

				$gdwpm_fol_n_id = 'gdwpm_images/' . $id_berkas . '.jpg';

				$gdwpm_fol_n_idth .= '.jpg';

			}

		}

		if(empty($metainfo) || $metainfo == ''){

			$meta = array('aperture' => 0, 'credit' => '', 'camera' => '', 'caption' => $nama_berkas, 'created_timestamp' => 0, 'copyright' => '',  

					'focal_length' => 0, 'iso' => 0, 'shutter_speed' => 0, 'title' => $nama_berkas); 

		}else{

			$meta = json_decode($metainfo, true);

		}

		$metadata = array("image_meta" => $meta, "width" => $gdwpm_lebar_gbr, "height" => $gdwpm_tinggi_gbr, 'file' => $gdwpm_fol_n_id, "gdwpm"=>TRUE); 

		

		if(isset($img_meta['thumbId'])){

			$metadata['sizes'] = array('thumbnail' => array('file' => $gdwpm_fol_n_idth, 'width' => $img_meta['thumbWidth'], 'height' => $img_meta['thumbHeight']));

		}

	}elseif(strpos($jenis_berkas, 'video') !== false){

		$metadata = '';

		if(!empty($metainfo) || $metainfo != ''){

			$metadata = json_decode($metainfo, true);

		}

	}elseif(strpos($jenis_berkas, 'audio') !== false){

		$metadata = '';

		if(!empty($metainfo) || $metainfo != ''){

			$metadata = json_decode($metainfo, true);

		}

	}else{

		$metadata = '';

	}

	
/*
	$attachment = array( 'post_mime_type' => $jenis_berkas, 'guid' => $gdwpm_fol_n_id,

				'post_parent' => 0,	'post_title' => $nama_berkas, 'post_content' => $deskrip_berkas);

	$attach_id = wp_insert_attachment( $attachment, $gdwpm_fol_n_id, 0 );

		

    wp_update_attachment_metadata( $attach_id,  $metadata);	

	

$gdwpm_opsi_kategori = get_option('gdwpm_opsi_kategori_dr_folder'); 

	if($attach_id != 0 && $gdwpm_opsi_kategori == 'checked')

	{//TAXONOMY GANTI MASUK LEWAT SINI AJAH, 

		wp_set_object_terms( $attach_id, $jeneng_folder, 'gdwpm_category' );

	}
*/
}

class AXL_GDWPMBantuan {

        

    protected $scope = array('https://www.googleapis.com/auth/drive');

        

    private $_service;

        

        public function __construct( $clientId, $serviceAccountName, $key ) {

				$client = new Google_Client();

				$client->setApplicationName("Google Drive WP Media");

				$client->setClientId( $clientId );

			

				$client->setAssertionCredentials( new Google_AssertionCredentials(

									$serviceAccountName,

									$this->scope,

									$this->getKonten( $key ) )

				);

            $this->_service = new Google_DriveService($client);

        }

        

        public function __get( $name ) {

                return $this->_service->$name;

        }

        

        public function getKonten( $url ) {

			if(function_exists('curl_version')){

				$data = curl_init();

				curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);

				curl_setopt($data, CURLOPT_URL, $url);

				curl_setopt($data, CURLOPT_FOLLOWLOCATION,TRUE);

				curl_setopt($data, CURLOPT_SSL_VERIFYPEER, FALSE);     

				curl_setopt($data, CURLOPT_SSL_VERIFYHOST, FALSE); 

				curl_setopt($data, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201');

				$hasil = curl_exec($data);

				curl_close($data);

				return $hasil;

			}else{

				$hasil = file_get_contents(str_replace(' ', '%20', $url));

				return $hasil;

			}

        }

        

        public function getAbout( ) {

                return $this->_service->about->get();

        }

        

        public function buangFile( $fileId ) {

                $result = $this->_service->files->delete($fileId);

				if(empty($result)){

					return true;

				}else{

					return false;

				}

        }

        

        public function getNameFromId( $fileId ) {

			$file_proper = $this->_service->files->get($fileId);

			$file_name = $file_proper->title;

			return $file_name;

        }

		

		public function insertProperty($fileId, $key, $value, $visibility = 'PUBLIC') {

			if(!empty($value) || $value != ''){		

				$newProperty = new Google_Property();

				$newProperty->setKey($key);

				$newProperty->setValue($value);

				$newProperty->setVisibility($visibility);

				return $this->_service->properties->insert($fileId, $newProperty);

			}else{

				return false;

			}

		}

		

        public function createFileFromPath( $path, $fileName, $description, Google_ParentReference $fileParent = null, $subtype = null, $subcontent = null ) {

			$mimeType = wp_check_filetype($fileName);

            $file = new Google_DriveFile();

            $file->setTitle( $fileName );

            $file->setDescription( $description );

            $file->setMimeType( $mimeType['type'] );                

            if( $fileParent ) {

                $file->setParents( array( $fileParent ) );

            }

            $gdwpm_opsi_chunk = get_option('gdwpm_opsi_chunk');

			$chunks = $gdwpm_opsi_chunk['drive']['chunk'];

			$max_retries = (int) $gdwpm_opsi_chunk['drive']['retries'];

            $chunkSize = (1024 * 1024) * (int) $chunks; // 2mb chunk

            $fileupload = new Google_MediaFileUpload($mimeType['type'], null, true, $chunkSize);

            if($path != ''){

				$fileupload->setFileSize(filesize($path));				

				$mkFile = $this->_service->files->insert($file, array('mediaUpload' => $fileupload));
				

				$status = false;

				$handle = fopen($path, "rb");

				while (!$status && !feof($handle)) {

					$max = false;

					for ($i=1; $i<=$max_retries; $i++) {

						$chunked = fread($handle, $chunkSize);

						if ($chunked) {

							$createdFile = $fileupload->nextChunk($mkFile, $chunked);

							break;

						}elseif($i == $max_retries){

							$max = true;

						}

					}

					if($max){

						if($createdFile){

							$this->_service->files->trash( $createdFile['id'] );

						}

						$createdFile = false; 

						break;

					}

				}

				fclose($handle);

			}else{
				if($subtype == 'pdf-file'){
					$filecontentval2 = get_option('axceleratelink_formfile_tmplt');
					$mkFile = $this->_service->files->insert($file, array('data' => $subcontent, 'mimeType' => 'text/html', 'convert' => true));
					//var_dump($mkFile);
						//$createdFile = $fileupload->nextChunk($mkFile, $subcontent);
						//$this->_service->files->trash( $createdFile['id'] );
					return $mkFile['alternateLink'];


				}
			}

			if($createdFile){

				return $createdFile['id'];

			}else{

				return false;

			}

        }

                

        public function createFolder( $name ) {

			$file = new Google_DriveFile();

            $file->setTitle( $name );

            $file->setMimeType( 'application/vnd.google-apps.folder' );

            $createdFolder = $this->_service->files->insert($file, array('mimeType' => 'application/vnd.google-apps.folder'));

            return $createdFolder['id'];

        }

		

        public function setPermissions( $fileId, $value, $role = 'writer', $type = 'user' ) {

            $perm = new Google_Permission();

            $perm->setValue( $value );

            $perm->setType( $type );

            $perm->setRole( $role );

                

            return $this->_service->permissions->insert($fileId, $perm);

        }

        

        public function getFolderIdByName( $name ) {

			$parameters = array('q' => "mimeType = 'application/vnd.google-apps.folder'", 'maxResults' => 50);

            $files = $this->_service->files->listFiles($parameters);

            foreach( $files['items'] as $item ) {

                if( $item['title'] == $name ) {

                    return $item['id'];

					break;

                }

            }

            return false;

        }

		

		public function getFilesInFolder($folderId, $maxResults, $pageToken = '', $in_type = 'radio') {

			if($in_type == 'radio'){

				$div_id = 'hasil';

				$id_max = 'maxres';

				$id_folid = 'folid';

				$id_tblpagi = 'paginasi';

				$div_hal = 'halaman';

				$div_pagi = 'vaginasi';

				$opsi_kecing = 'gdwpm_kecing_hal';

				$in_name = 'gdwpm_berkas_terpilih[]';

			}elseif($in_type == 'checkbox'){

				$div_id = 'hasil_del';

				$id_max = 'maxres_del';

				$id_folid = 'folid_del';

				$id_tblpagi = 'paginasi_del';

				$div_hal = 'halaman_del';

				$div_pagi = 'vaginasi_del';

				$opsi_kecing = 'gdwpm_kecing_hal_del';

				$in_name = 'gdwpm_buang_berkas_terpilih[]';

			}else{

				$in_type = 'checkbox';

				$div_id = 'hasil_gal';

				$id_max = 'maxres_gal';

				$id_folid = 'folid_gal';

				$id_tblpagi = 'paginasi_gal';

				$div_hal = 'halaman_gal';

				$div_pagi = 'vaginasi_gal';

				$opsi_kecing = 'gdwpm_kecing_hal_gal';

				$in_name = 'gdwpm_berkas_gallery[]';

			}

			//setup 1st pagetokn is always enpty n create pagintion butt

			$haldepan = 1;

			////$hal = '<input type="hidden" id="maxres" value="'.$maxResults.'" /><button id="halaman" value="">'.$haldepan.'</button>';

			$parameters = array('maxResults' => $maxResults);

			$pageTokenInput = $pageToken;

			$gdwpm_kecing_hal = get_option($opsi_kecing);

			if (empty($pageToken) || $pageToken == '') {

			// generate halaman

				//if($gdwpm_kecing_hal || !empty($gdwpm_kecing_hal)){

					//delete_option($opsi_kecing);

				//}

				$gdwpm_kecing_hal = array();

				$errormes = '';

				$halarr = array($haldepan => 'bantuanhalamansatu');

				do {

					$haldepan++;

					try {

						if($haldepan == 1){$pageToken = '';}  //halman prtama pokoke token kudu kosong

						$parameters['pageToken'] = $pageToken;

						$children = $this->_service->children->listChildren($folderId, $parameters);

						$pageToken = $children->getNextPageToken();

						if($pageToken){

							//$hal .= '&nbsp;<button id="halaman" value="'.$pageToken.'">'.$haldepan.'</button>';

							$halarr[$haldepan] = $pageToken;

							if($haldepan % 10 == 0){sleep(1);}

						//}elseif($haldepan > 1){

						//cek n buang halman trakir jika kosong

							//$parameters['pageToken'] = $halarr[$haldepan - 1];

							//$files = $this->_service->children->listChildren($folderId, $parameters);

							//$result = array();

							//if(count(array_merge($result, $files->getItems())) < 1){

								//unset($halarr[$haldepan - 1]);

							//}

						}

					} catch (Exception $e) {

						$errormes = "<kbd>An error occurred: " . $e->getMessage() . "</kbd>";

						$haldepan -= 1;

						$pageToken = $halarr[$haldepan]; //NULL;

						sleep(1);

					}

				} while ($pageToken);

				unset($parameters['pageToken']);

				$gdwpm_kecing_hal[$folderId] = $halarr;

				update_option($opsi_kecing, $gdwpm_kecing_hal);

			}else{

				$parameters['pageToken'] = $pageToken;

			}

			$daftarfile = '';

			if(count($halarr) <= 1 || $pageToken != ''){

				if($pageToken == 'bantuanhalamansatu'){

					unset($parameters['pageToken']);

				}

			$folder_proper = $this->_service->files->get($folderId);

			$folder_name = $folder_proper->title;

			$i = 0;

				$daftarfile =  '<div id="'.$div_id.'"><table id="box-table-a" summary="File Folder" class="'.$id_tblpagi.'"><thead><tr><th scope="col"><span class="ui-icon ui-icon-check"></span></th><th scope="col">File ID</th><th scope="col">Title</th><!--<th scope="col">Description</th>--><th scope="col">Size</th><th scope="col">Action</th></tr></thead>';

					$children = $this->_service->children->listChildren($folderId, $parameters);

					foreach ($children->getItems() as $child) {

						$i++; if($i == 1 && $in_type == 'radio'){$checked = 'checked';}else{$checked = '';}

						if($maxResults != $i && $maxResults > 30 && $i % 20 == 0){sleep(1);}

						$fileId = $child->getId(); 

						$file = $this->_service->files->get($fileId); //getDescription getMimeType

						$file_mime = $file->getMimeType();

						$file_title = $file->getTitle();

						$file_desc = $file->getDescription();

						$file_icon = $file->getIconLink();

						$file_md5 = $file->getMd5Checksum();

						$file_size = size_format($file->getFileSize(), 2);

						$file_thumb = $file->getThumbnailLink();	// str_replace('=s220', '=s300', $file->getThumbnailLink());		

						$view = '<a href="https://docs.google.com/uc?id='.$fileId.'&export=download" title="Open link in a new window" target="_blank" class="tabeksen">Download</a>';

						$file_pptis = '';

						if(strpos($file_mime, 'image') !== false){

							$view = '<a href="https://www.googledrive.com/host/'.$fileId.'" title="Open link in a new window" target="_blank" class="tabeksen">View</a>';

							$properties = $this->_service->properties->listProperties($fileId);

							$getfile_pptis = $properties->getItems();

							if(count($getfile_pptis) > 0){

								$file_pptis = $getfile_pptis[0]->getValue();

								// selfWidth:xx selfHeight:xx thumbId:xxx thumbWidth:xx thumbHeight:xx

								preg_match_all('/(\w+):("[^"]+"|\S+)/', $file_pptis, $matches);

								$img_meta = array_combine($matches[1], $matches[2]);

								if(array_key_exists('thumbId', $img_meta)){

									$file_thumb = 'https://www.googledrive.com/host/' . $img_meta['thumbId'];

								}

							}

						} 

						$valson = json_encode(array($file_mime, $file_title, $fileId, $file_desc, $folder_name, $file_pptis));

						$daftarfile .=  '<tbody><tr><td><input type="'.$in_type.'" name="'.$in_name.'" value="'.base64_encode($valson).'" ' . $checked . '></td><td class="kolom_file" title="' . $file_thumb . '">'.$fileId.'</td>';

						$daftarfile .=  '<td title="' . $file_desc . '"><img src="' . $file_icon . '" title="' . $file_mime . '"> ' . $file_title . '</td>';

						$daftarfile .=  '<!--<td>' . $file_desc . '</td>-->';

						$daftarfile .=  '<td title="md5Checksum : ' . $file_md5 . '">' . $file_size . '</td>';

						$daftarfile .=  '<td>' . $view . ' | <a href="https://docs.google.com/file/d/'.$fileId.'/preview?TB_iframe=true&width=600&height=550" title="'.$file_title.' ('.$fileId.')" class="thickbox tabeksen">Preview</a></td></tr>';

					}

			$daftarfile .=  '</tbody></table></div><br/>';

			

			}

			

			// merangkai paginasi soretempe

			$range = 5; 

			$showitems = ($range * 2)+1;  

			$hal_folderid = $gdwpm_kecing_hal[$folderId];

			$halterlihat = array_search($pageToken, $hal_folderid);

			if(empty($halterlihat)){$halterlihat = 1;}

			$totalhal = count($hal_folderid);

			 if(1 != $totalhal)

			 {

				 $halsiap = '<input type="hidden" id="'.$id_max.'" value="'.$maxResults.'" /><input type="hidden" id="'.$id_folid.'" value="'.$folderId.'" />';

				 if($halterlihat > 2 && $halterlihat > $range+1 && $showitems < $totalhal) $halsiap .= '<button id="'.$div_hal.'" value="'.$hal_folderid[1].'">&laquo;</button>';

				 if($halterlihat > 1 && $showitems < $totalhal) $halsiap .= '<button id="'.$div_hal.'" value="'.$hal_folderid[$halterlihat - 1].'">&lsaquo;</button>';

				 

				 for ($j=1; $j <= $totalhal; $j++)

				 {

					 if (1 != $totalhal &&( !($j >= $halterlihat+$range+1 || $j <= $halterlihat-$range-1) || $totalhal <= $showitems ))

					 {

						if($halterlihat == $j && $pageTokenInput != ''){$disable_butt = ' disabled';}else{$disable_butt = '';}

						$halsiap .= '<button id="'.$div_hal.'" value="'.$hal_folderid[$j].'"'.$disable_butt.'>'.$j.'</button>';

					 }

				 }



				 if ($halterlihat < $totalhal && $showitems < $totalhal) $halsiap .= '<button id="'.$div_hal.'" value="'.$hal_folderid[$halterlihat + 1].'">&rsaquo;</button>';

				 if ($halterlihat < $totalhal-1 &&  $halterlihat+$range-1 < $totalhal && $showitems < $totalhal) $halsiap .= '<button id="'.$div_hal.'" value="'.$hal_folderid[$totalhal].'">&raquo;</button>';

			 }

							

			$vaginasi =	'<div id="'.$div_pagi.'">'.$halsiap.'</div>';

			$daftarfile .= $vaginasi;

			if($i == 0 && $totalhal > 1 && $halterlihat == $totalhal){$daftarfile = $vaginasi;}

			return array($daftarfile, $i, $totalhal, $halterlihat);//, $halterlihat, $totalhal);//items, items onpage, currentpage, totalpage

		}

		

}

global $axl_db_version;
$axl_db_version = '1.1';

function custom_db_table() {
	global $wpdb;
	global $axl_db_version;

	$table_name = $wpdb->prefix . 'axcelerate_pdf_content';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		value longtext NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'axl_db_version', $axl_db_version );

}
register_activation_hook( __FILE__, 'custom_db_table' );

function myplugin_update_db_check() {
    global $axl_db_version;
    if ( get_site_option( 'axl_db_version' ) != $axl_db_version ) {
        custom_db_table();
    }
}
add_action( 'plugins_loaded', 'myplugin_update_db_check' );

class Docx_reader {

    private $fileData = false;
    private $errors = array();
    private $styles = array();

    public function __construct() {

    }

    private function load($file) {
        if (file_exists($file)) {
            $zip = new ZipArchive();
            if ($zip->open($file) === true) {
                //attempt to load styles:
                if (($styleIndex = $zip->locateName('word/styles.xml')) !== false) {
                    $stylesXml = $zip->getFromIndex($styleIndex);
                    $xml = simplexml_load_string($stylesXml);
                    $namespaces = $xml->getNamespaces(true);

                    $children = $xml->children($namespaces['w']);

                    foreach ($children->style as $s) {
                        $attr = $s->attributes('w', true);
                        if (isset($attr['styleId'])) {
                            $tags = array();
                            $attrs = array();
                            foreach (get_object_vars($s->rPr) as $tag => $style) {
                                $att = $style->attributes('w', true);
                                switch ($tag) {
                                    case "b":
                                        $tags[] = 'strong';
                                        break;
                                    case "i":
                                        $tags[] = 'em';
                                        break;
                                    case "color":
                                        //echo (String) $att['val'];
                                        $attrs[] = 'color:#' . $att['val'];
                                        break;
                                    case "sz":
                                        $attrs[] = 'font-size:' . $att['val'] . 'px';
                                        break;
                                }
                            }
                            $styles[(String)$attr['styleId']] = array('tags' => $tags, 'attrs' => $attrs);
                        }
                    }
                    $this->styles = $styles;
                }

                if (($index = $zip->locateName('word/document.xml')) !== false) {
                    // If found, read it to the string
                    $data = $zip->getFromIndex($index);
                    // Close archive file
                    $zip->close();
                    return $data;
                }
                $zip->close();
            } else {
                $this->errors[] = 'Could not open file.';
            }
        } else {
            $this->errors[] = 'File does not exist.';
        }
    }

    public function setFile($path) {
        $this->fileData = $this->load($path);
    }

    public function to_plain_text() {
        if ($this->fileData) {
            return strip_tags($this->fileData);
        } else {
            return false;
        }
    }

    public function to_html() {
        if ($this->fileData) {
            $xml = simplexml_load_string($this->fileData);
            $namespaces = $xml->getNamespaces(true);

            $children = $xml->children($namespaces['w']);

            $html = '<!doctype html><html><head><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /><title></title><style>span.block { display: block; }</style></head><body>';

            foreach ($children->body->p as $p) {
                $style = '';

                $startTags = array();
                $startAttrs = array();

                if($p->pPr->pStyle) {                    
                    $objectAttrs = $p->pPr->pStyle->attributes('w',true);
                    $objectStyle = (String) $objectAttrs['val'];
                    if(isset($this->styles[$objectStyle])) {
                        $startTags = $this->styles[$objectStyle]['tags'];
                        $startAttrs = $this->styles[$objectStyle]['attrs'];
                    }
                }

                if ($p->pPr->spacing) {
                    $att = $p->pPr->spacing->attributes('w', true);
                    if (isset($att['before'])) {
                        $style.='padding-top:' . ($att['before'] / 10) . 'px;';
                    }
                    if (isset($att['after'])) {
                        $style.='padding-bottom:' . ($att['after'] / 10) . 'px;';
                    }
                }

                $html.='<span class="block" style="' . $style . '">';
                $li = false;
                if ($p->pPr->numPr) {
                    $li = true;
                    $html.='<li>';
                }

                foreach ($p->r as $part) {
                    //echo $part->t;
                    $tags = $startTags;
                    $attrs = $startAttrs;                                        

                    foreach (get_object_vars($part->pPr) as $k => $v) {
                        if ($k = 'numPr') {
                            $tags[] = 'li';
                        }
                    }

                    foreach (get_object_vars($part->rPr) as $tag => $style) {
                        //print_r($style->attributes());
                        $att = $style->attributes('w', true);
                        switch ($tag) {
                            case "b":
                                $tags[] = 'strong';
                                break;
                            case "i":
                                $tags[] = 'em';
                                break;
                            case "color":
                                //echo (String) $att['val'];
                                $attrs[] = 'color:#' . $att['val'];
                                break;
                            case "sz":
                                $attrs[] = 'font-size:' . $att['val'] . 'px';
                                break;
                        }
                    }
                    $openTags = '';
                    $closeTags = '';
                    foreach ($tags as $tag) {
                        $openTags.='<' . $tag . '>';
                        $closeTags.='</' . $tag . '>';
                    }
                    $html.='<p><span style="' . implode(';', $attrs) . '">' . $openTags . $part->t . $closeTags . '</span></p>';
                }
                if ($li) {
                    $html.='</li>';
                }
                $html.="</span>";
            }

            //Trying to weed out non-utf8 stuff from the file:
            $regex = <<<'END'
/
  (
    (?: [\x00-\x7F]                 # single-byte sequences   0xxxxxxx
    |   [\xC0-\xDF][\x80-\xBF]      # double-byte sequences   110xxxxx 10xxxxxx
    |   [\xE0-\xEF][\x80-\xBF]{2}   # triple-byte sequences   1110xxxx 10xxxxxx * 2
    |   [\xF0-\xF7][\x80-\xBF]{3}   # quadruple-byte sequence 11110xxx 10xxxxxx * 3 
    ){1,100}                        # ...one or more times
  )
| .                                 # anything else
/x
END;
            preg_replace($regex, '$1', $html);

            return $html . '</body></html>';
            exit();
        }
    }

    public function get_errors() {
        return $this->errors;
    }

    private function getStyles() {

    }

}

?>