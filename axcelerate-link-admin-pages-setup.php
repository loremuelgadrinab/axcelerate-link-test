

<?php

	//Include the php file that stores the function required for this script.

	include_once('axcelerate-link-dbdata.php');



    if($_POST['axceleratelink_hidden'] == 'Y') {

        //Extract data from form and call function to update the data to the database.

		$settings[0] = $_POST['axceleratelink_short_course_detail_page'];

		$settings[1] = $_POST['axceleratelink_qualification_course_detail_page'];

		$settings[2] = $_POST['axceleratelink_newsletter_signup_success_page'];

		$settings[3] = $_POST['axceleratelink_newsletter_signup_fail_page'];

		$settings[4] = $_POST['axceleratelink_newsletter_signup_default_source'];

		$settings[5] = $_POST['axceleratelink_newsletter_signup_title_name'];

		$settings[6] = $_POST['axceleratelink_newsletter_signup_title_emailaddress'];

		$settings[7] = $_POST['axceleratelink_newsletter_signup_button_text'];

		

		$ok = update_WordPress_Axcelerate_Course_Page_Settings($settings[0], $settings[1], $settings[2], $settings[3], $settings[4], $settings[5], $settings[6], $settings[7]);



        ?>

			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>

        <?php

    } else {

        //Call function retrieve the data from the database to populate the form.

		$settings = get_WordPress_Axcelerate_Course_Page_Settings();

		

    } 

?>



<div class="wrap">

    <?php    echo "<h2>" . __( 'Axcelerate Link Page Setup Options', 'axceleratelink_trdom' ) . "</h2>"; ?>



    <?php    echo "<h4>" . __( 'Select Pages for Course Details', 'axceleratelink_trdom' ) . "</h4>"; ?>

   

	<form name="axceleratelink_page_setup_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

        <input type="hidden" name="axceleratelink_hidden" value="Y">

		<h2>Short Course Details Page Setup</h2>

        <table class="form-table">

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Short Course Detail Page:" ); ?>

				</td>

				<td>				
					<div class="input">
					<?php 

						wp_dropdown_pages(array('name' => 'axceleratelink_short_course_detail_page','selected' => __($settings[0]),'show_option_none' => __( 'No page selected'),'option_none_value' => '0'));

					?>	

					<span class="tooltip">Select a page to display short course detail.</span>
					</div>
				</td>

			</tr>

		</table>

		<hr />

		<h2>Qualification Course Details Page Setup</h2>

        <table class="form-table">	

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Qualification Course Detail Page:" ); ?>

				</td>

				<td>				
					<div class="input">
					<?php 

						wp_dropdown_pages(array('name' => 'axceleratelink_qualification_course_detail_page','selected' => __($settings[1]),'show_option_none' => __( 'No page selected'),'option_none_value' => '0'));

					?>	
					<span class="tooltip">Select a page to display qualification course detail.</span>
					</div>

				</td>

			</tr>			

		</table>

        <hr />   
<!--
 		<h2>Newsletter Sign-up Page Setup</h2>

        <table class="form-table">	

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Sign-up Success Page:" ); ?>

				</td>

				<td>				

					<?php 

						wp_dropdown_pages(array('name' => 'axceleratelink_newsletter_signup_success_page','selected' => __($settings[2]),'show_option_none' => __( 'No page selected'),'option_none_value' => '0'));

					?>	

				</td>

			</tr>			

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Sign-up Fail Page:" ); ?>

				</td>

				<td>				

					<?php 

						wp_dropdown_pages(array('name' => 'axceleratelink_newsletter_signup_fail_page','selected' => __($settings[3]),'show_option_none' => __( 'No page selected'),'option_none_value' => '0'));

					?>	

				</td>

			</tr>

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Default Sign-up Contact Source:" ); ?>

				</td>

				<td>				

					<?php

						$response = get_contact_sources();

						

						echo '<select name=axceleratelink_newsletter_signup_default_source>';

						foreach($response as $key=>$values){

							echo '<option value='.$values['SOURCECODEID'];

							if ($values['SOURCECODEID'] == $settings[4]) {

								echo ' selected="selected"';

							}

							echo '>';

							echo $values['SOURCE'].'</option>';

						}

						echo '</select>';

					?>	

				</td>

			</tr>

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Widget and Shortcode Name Title:" ); ?>

				</td>

				<td>				

					<?php

						echo '<input type="text" name="axceleratelink_newsletter_signup_title_name" value="'.$settings[5].'">';

					?>	

				</td>

			</tr>

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Widget and Shortcode Email Address Title:" ); ?>

				</td>

				<td>				

					<?php

						echo '<input type="text" name="axceleratelink_newsletter_signup_title_emailaddress" value="'.$settings[6].'">';

					?>	

				</td>

			</tr>

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Widget and Shortcode Button Text:" ); ?>

				</td>

				<td>				

					<?php

						echo '<input type="text" name="axceleratelink_newsletter_signup_button_text" value="'.$settings[7].'">';

					?>	

				</td>

			</tr>

		</table>

        <hr />   

-->    

        <p class="submit">

        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

		</p>

    </form>

</div>