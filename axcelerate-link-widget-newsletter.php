<?php

	//Include the php file that stores the function required for this script.
	include_once('axcelerate-link-frontend.php');
 
	if($_POST['axceleratelink_signup_hidden'] == 'Y') {
        //Extract data from form and call function to update the data to the database.
		$settings[0] = $_POST['name'];
		$settings[1] = $_POST['emailaddress'];
		
		$response = call_newsletter_signup($settings[0], $settings[1]);
		
        ?>
			<!--<div><p><strong><?php //_e($ok); ?></strong></p></div>
        <?php
    }
	
	//Code to create the widget
	class axcelerate_newsletter_signup_widget extends WP_Widget {

		public function __construct()
		{
			parent::__construct( 'axcelerate_newsletter_signup_widget_id', __( 'Axcelerate Newsletter Signup' ), array( 'description' => __( 'Sets up a newsletter signup process to the Axcelerate newsletter mail group') ) );
		}
	 
		public function widget( $args, $instance )
		{
			echo $args[ 'before_widget' ];
			display_widget($instance);
			echo $args[ 'after_widget' ];
		}
	 
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			$instance[ 'widgettitle' ] = strip_tags( $new_instance[ 'widgettitle' ] );
			$instance[ 'teasertext' ] = strip_tags( $new_instance[ 'teasertext' ] );
			//$instance[ 'givenname' ] = strip_tags( $new_instance[ 'givenname' ] );
			//$instance[ 'lastname' ] = strip_tags( $new_instance[ 'lastname' ] );
			//$instance[ 'emailaddress' ] = strip_tags( $new_instance[ 'emailaddress' ] );
			//$instance[ 'buttontext' ] = strip_tags( $new_instance[ 'buttontext' ] );
			return $instance;
		}
	 
		public function form( $instance )
		{
			$widgettitle = '';
			$teasertext = '';
			//$givenname = '';
			//$lastname = '';
			//$emailaddress = '';
			if( isset( $instance[ 'widgettitle' ] ) ) {
				$widgettitle = $instance[ 'widgettitle' ];
			}
			if( isset( $instance[ 'teasertext' ] ) ) {
				$teasertext = $instance[ 'teasertext' ];
			}
			//if( isset( $instance[ 'givenname' ] ) ) {
			//	$givenname = $instance[ 'givenname' ];
			//}
			//if( isset( $instance[ 'lastname' ] ) ) {
			//	$lastname = $instance[ 'lastname' ];
			//}
			//if( isset( $instance[ 'emailaddress' ] ) ) {
			//	$emailaddress = $instance[ 'emailaddress' ];
			//}
			//if( isset( $instance[ 'buttontext' ] ) ) {
			//	$buttontext = $instance[ 'buttontext' ];
			//}
			echo '';
			echo '<label for="'. $this->get_field_id( 'widgettitle' ) .'">'.__( 'Widget Title?' ).'</label>';
			echo '<input class="widefat" id="'. $this->get_field_id( 'widgettitle' ) .'" type="text" name="'. $this->get_field_name( 'widgettitle' ) .'" value="'. esc_attr($widgettitle) .'" />';
			echo '<label for="'. $this->get_field_id( 'teasertext' ) .'">'.__( 'What is the teaser text?' ).'</label>';
			echo '<input class="widefat" id="'. $this->get_field_id( 'teasertext' ) .'" type="text" name="'. $this->get_field_name( 'teasertext' ) .'" value="'. esc_textarea($teasertext) .'" />';
			//echo '<label for="'. $this->get_field_id( 'givenname' ) .'">'.__( 'Given Name field label?' ).'</label>';
			//echo '<input class="widefat" id="'. $this->get_field_id( 'givenname' ) .'" type="text" name="'. $this->get_field_name( 'givenname' ) .'" value="'. esc_attr($givenname) .'" />';
			//echo '<label for="'. $this->get_field_id( 'lastname' ) .'">'.__( 'Last Name field label?' ).'</label>';
			//echo '<input class="widefat" id="'. $this->get_field_id( 'lastname' ) .'" type="text" name="'. $this->get_field_name( 'lastname' ) .'" value="'. esc_attr($lastname) .'" />';
			//echo '<label for="'. $this->get_field_id( 'emailaddress' ) .'">'.__( 'Email address field label?' ).'</label>';
			//echo '<input class="widefat" id="'. $this->get_field_id( 'emailaddress' ) .'" type="text" name="'. $this->get_field_name( 'emailaddress' ) .'" value="'. esc_attr($emailaddress) .'" />';
			//echo '<label for="'. $this->get_field_id( 'buttontext' ) .'">'.__( 'Submit button label?' ).'</label>';
			//echo '<input class="widefat" id="'. $this->get_field_id( 'buttontext' ) .'" type="text" name="'. $this->get_field_name( 'buttontext' ) .'" value="'. esc_attr($buttontext) .'" />';
			echo '';
		}
	}		
		
		function display_widget($instance) {
			echo '<h2><u>'.$instance[ 'widgettitle' ].'</u></h2>';
			if( !empty( $instance[ 'teasertext' ] ) ) {
				echo '<i>'.$instance[ 'teasertext' ].'</i><br><br>';
			}
			include_once 'axcelerate-link-dbdata.php';
			$settings = get_WordPress_Axcelerate_Course_Page_Settings();

			?>
			<form name="axceleratelink_newsletter_signup_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="axceleratelink_signup_hidden" value="Y">
					<?php echo '<b>'.$settings[5].'</b>'; ?><br><input type="text" name="name" size="20"> <br>
					<?php echo '<b>'.$settings[6].'</b>'; ?><br><input type="text" name="emailaddress"size="30"> <br>
   
				<p class="submit">
				<center><input type="submit" name="Submit" value="<?php _e($settings[7], 'axceleratelink_signup' ) ?>" /></center>
				</p>
			</form>
			
			<?php
			
			return(0);
		}

?>