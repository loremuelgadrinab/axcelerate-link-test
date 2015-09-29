

<?php

	//Include the php file that stores the function required for this script.

	include_once('axcelerate-link-dbdata.php');



    if($_POST['axceleratelink_hidden'] == 'Y') {
    	// update / create to db
    	update_WordPress_Axcelerate_Login_Widget_Settings();

        ?>

			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>

        <?php

    } 

    //Call function retrieve the data from the database to populate the form.

	$data = get_WordPress_Axcelerate_Login_Widget_Settings();
	//var_dump($data);

	

?>




<div class="wrap">

    <?php    echo "<h2>" . __( 'Axcelerate Link Login Widget', 'axceleratelink_trdom' ) . "</h2>"; ?>

    <?php    echo "<h4>" . __( 'Use [SRMS_form_login] shortcode in a page/text-widget to display the login-form. ', 'axceleratelink_trdom' ) . "</h4>"; ?>


	<form name="axceleratelink_page_setup_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

        <input type="hidden" name="axceleratelink_hidden" value="Y">

        <table class="form-table">

	  <tr>

		<td width=20%><strong>Login Redirect Page:</strong></td>

		<td>
			<div class="input">
			<?php

				$args = array(

				'depth'            => 0,

				'selected'         => $data[0],

				'echo'             => 1,

				'show_option_none' => '-',

				'id' 			   => 'redirect_page',

				'name'             => 'redirect_page'

				);

				wp_dropdown_pages( $args ); 

			?>
			<span class="tooltip">Redirect page when user is going to login</span>
			</div>
		</td>

	  </tr>

	  

	   <tr>

		<td width=20%><strong>Logout Redirect Page:</strong></td>

		 <td>
		 	<div class="input">
		 	<?php

				$args1 = array(

				'depth'            => 0,

				'selected'         => $data[1],

				'echo'             => 1,

				'show_option_none' => '-',

				'id' 			   => 'logout_redirect_page',

				'name'             => 'logout_redirect_page'

				);

				wp_dropdown_pages( $args1 ); 

			?>
			<span class="tooltip">Redirect page when user is going to logout</span>
			</div>
		</td>

	  </tr>

	   <tr>

		<td width=20%><strong>Axcelerate Link URL:</strong></td>

		 <td>
		 	<div class="input">
		 	<input name='axcelerate-link-url' id='axcelerate-link-url' type='text' value='<?php echo $data[2]; ?>'>
		 	<span class="tooltip">The axcelerate link URL.</span>
			</div>
		 </td>

	  </tr>
	   <tr>

		<td width=20%></td>

		 <td>
		 	<div class="input">
		 	<input name='axcelerate-link-url-opt' id='axcelerate-link-url-opt' type='checkbox' value='true' <?php echo ($data[5] == 'true' ? 'checked' : '') ?>>
		 	<span class="tooltip">Check to hide the Axcelerate Link URL.</span>
			</div>
		 	Hide Axcelerate Link URL?</td>

	  </tr>

	  <tr>

		<td width=20%>User Edit detail page link where you put <strong>[SRMS_Update_form]</strong> shortcode:</td>

		<td>
			<div class="input">
			<?php
		
				$args = array(

				'depth'            => 0,

				'selected'         => $data[3],

				'echo'             => 1,

				'show_option_none' => '-',

				'id' 			   => 'user_editpage',

				'name'             => 'user_editpage'

				);

				wp_dropdown_pages( $args ); 

			?>
			<span class="tooltip">Select the page on where the [SRMS_Update_form] shortcode inputed.</span>
			</div>
		</td>

	  </tr>

	 	  <tr>

		<td width=20%><strong>Add Client Page:</strong></td>

		<td>
			<div class="input">
			<?php
		
				$args = array(

				'depth'            => 0,

				'selected'         => $data[4],

				'echo'             => 1,

				'show_option_none' => '-',

				'id' 			   => 'user_addpage',

				'name'             => 'user_addpage'

				);

				wp_dropdown_pages( $args ); 

			?>
			<span class="tooltip">Select where is the client enrol page located.</span>
			</div>
		</td>

	  </tr> 

		</table>

        <hr />   

 		<h2>Redirect Setup</h2>

        <table class="form-table">	

			<tr>



		</table>

        <hr />   

    

        <p class="submit">

        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

		</p>

    </form>

</div>