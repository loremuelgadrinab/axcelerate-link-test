<?php

	//Include the php file that stores the function required for this script.

	include_once('axcelerate-link-dbdata.php');



    if($_POST['axceleratelink_hidden'] == 'Y') {

        //Extract data from form and call function to update the data to the database.

		$settings[0] = $_POST['axceleratelink_host'];

        $settings[1] = $_POST['axceleratelink_wstoken_key'];

        $settings[2] = $_POST['axceleratelink_apitoken_key'];

		//$settings[3] = $_POST['axceleratelink_user'];

 		//$settings[4] = $_POST['axceleratelink_website_ip'];

		

		$ok = update_WordPress_Axcelerate_Link_Settings($settings[0], $settings[1], $settings[2]); //, $settings[3], $settings[4]);



        ?>

			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>

        <?php

    } else {

        //Call function retrieve the data from the database to populate the form.

		$settings = get_WordPress_Axcelerate_Link_Settings();



    }

?>



<div class="wrap">

    <?php    echo "<h2>" . __( 'Axcelerate Link Setup Options', 'axceleratelink_trdom' ) . "</h2>"; ?>



    <?php    echo "<h4>" . __( 'Web Services Settings', 'axceleratelink_trdom' ) . "</h4>"; ?>	

    

	<form name="axceleratelink_settings_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

        <input type="hidden" name="axceleratelink_hidden" value="Y">

        <table class="form-table">

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php _e("Host Address:" ); ?>

				</td>

				<td>
					<div class="input">
						<input type="text" name="axceleratelink_host" value="<?php echo $settings[0]; ?>" size="80">
						<span class="tooltip">Axcelerate Host Address URL.</span>
					</div>
				</td>

				<td><?php _e("eg: https://stg.axcelerate.com.au"); ?>

				</td>

			</tr>

			<tr>

				<td width=5%>

				</td>

		        <td width=20%>

					<?php _e("WSToken Key:" ); ?>

				</td>

				<td>
					<div class="input">
						<input type="text" name="axceleratelink_wstoken_key" value="<?php echo $settings[1]; ?>" size="40">

						<span class="tooltip">Axcelerate WSToken Key</span>
					</div>
					
				</td>

				<td>

					<?php _e(""); ?>

				</td>

			</tr>

			<tr>

				<td width=5%>

				</td>

		        <td width=20%>

					<?php _e("APIToken Key:" ); ?>

				</td>

				<td>
					<div class="input">
						<input type="text" name="axceleratelink_apitoken_key" value="<?php echo $settings[2]; ?>" size="40">

						<span class="tooltip">Axcelerate APIToken Key</span>
					</div>
					
				</td>

				<td>

					<?php _e(""); ?>

				</td>

			</tr>

			

			<!-- Code currently not required for solution

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php //_e("User Account:" ); ?>

				</td>

				<td>

					<input type="text" name="axceleratelink_user" value="<?php //echo $settings[3] ?>" size="20">

				</td>

				<td>

					<?php //_e("eg: WebUser User"); ?>

				</td>

			</tr>

			<tr>

				<td width=5%>

				</td>

				<td width=20%>

					<?php //_e("Website IP Address:" ); ?>

				</td>

				<td>

					<input type="text" name="axceleratelink_website_ip" value="<?php //echo $settings[4] ?>" size="20">

				</td>

				<td>

					<?php //_e("eg: 121.150.244.207" ); ?>

				</td>

			</tr>

			-->

		</table>

        <hr />   

     

        <p class="submit">

        <input type="submit" name="Submit" value="<?php _e('Update Options', 'axceleratelink_trdom' ) ?>" />

		</p>

    </form>

</div>