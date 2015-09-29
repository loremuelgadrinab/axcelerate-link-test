<?php



class axl_login_wid extends WP_Widget {

	

	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );

		add_action( 'wp_head', array( $this, 'custom_styles_afo' ) );

		parent::__construct(

	 		'axl_login_wid',

			'Axcelerate Login Widget ',

			array( 'description' => __( 'This is a simple login form in the widget.', 'lwa' ), )

		);

	 }



	public function widget( $args, $instance ) {

		extract( $args );

		

		$wid_title = apply_filters( 'widget_title', $instance['wid_title'] );

		

		echo $args['before_widget'];

		if ( ! empty( $wid_title ) )

			echo $args['before_title'] . $wid_title . $args['after_title'];

			$this->loginForm();

		echo $args['after_widget'];

	}



	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['wid_title'] = strip_tags( $new_instance['wid_title'] );

		return $instance;

	}





	public function form( $instance ) {

		$wid_title = '';

		$wid_title = $instance[ 'wid_title' ];

		?>

		<p><label for="<?php echo $this->get_field_id('wid_title'); ?>"><?php _e('Title:'); ?> </label>

		<input class="widefat" id="<?php echo $this->get_field_id('wid_title'); ?>" name="<?php echo $this->get_field_name('wid_title'); ?>" type="text" value="<?php echo $wid_title; ?>" />

		</p>

		<?php 

	}

	

	public function add_remember_me(){

		$login_afo_rem = get_option('login_afo_rem');

		if($login_afo_rem == 'Yes'){

			echo '<li class="remember"><input type="checkbox" name="remember" value="Yes" /> '.__('Remember Me','lwa').'</li>';

		}

	}

	

	public function add_extra_links(){

		$login_afo_forgot_pass_link = get_option('login_afo_forgot_pass_link');

		$login_afo_register_link = get_option('login_afo_register_link');

		if($login_afo_forgot_pass_link or $login_afo_register_link){

			echo '<li class="extra-links">';

		}

		if($login_afo_forgot_pass_link){

			echo '<a href="'.get_permalink($login_afo_forgot_pass_link).'">'.__('Lost Password?').'</a>';

		}

		if($login_afo_register_link){

			echo ' <a href="'.get_permalink($login_afo_register_link).'">'.__('Register').'</a>';

		}

		if($login_afo_forgot_pass_link or $login_afo_register_link){

			echo '</li>';

		}

	}

	

	public function curPageURL() {

	 $pageURL = 'http';

	 if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

	 $pageURL .= "://";

	 if (isset($_SERVER["SERVER_PORT"]) and $_SERVER["SERVER_PORT"] != "80") {

	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

	 } else {

	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

	 }

	 return $pageURL;

	}





	public function loginForm(){

		if(!session_id()){

			@session_start();

		}

		global $post;

		$redirect_page = get_option('redirect_page');

		$logout_redirect_page = get_option('logout_redirect_page');

		$link_in_username = get_option('link_in_username');

		

		if($redirect_page){

			$redirect =  get_permalink($redirect_page);

		} else {

			$redirect =  $this->curPageURL();

		}

		

		if($logout_redirect_page){

			$logout_redirect_page = get_permalink($logout_redirect_page);

		} else {

			$logout_redirect_page = $this->curPageURL();

		}

		$this->load_script();

		$this->error_message();

		if(!is_user_logged_in()){

			$disable_create_wp_user = get_option('axl_auto_wp_ucreate');

			if(!$disable_create_wp_user){
				?>

				<form name="login" id="login" method="post" action="">

				<input type="hidden" name="option" value="axl_user_login" />

				<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />

					<ul class="axl_login_wid">

					<li><?php _e('Username','lwa');?></li>

					<li><input type="text" name="user_username" required="required"/></li>

					<li><?php _e('Password','lwa');?></li>

					<li><input type="password" name="user_password" required="required"/></li>

					<?php $this->add_remember_me();?>

					<li><input name="login" type="submit" value="<?php _e('Login','lwa');?>" /></li>

					<?php $this->add_extra_links();?>

					</ul>

				</form>

				<?php 
			}

		} else {

			global $current_user;

	     	get_currentuserinfo();

			

			if($link_in_username){

				$link_with_username = '<a href="'.get_permalink($link_in_username).'">'.$current_user->display_name.'</a>';

			} else {

				$link_with_username = $current_user->display_name;

			}

			?>


				<div class='axl-login-widget avatar'><?php echo get_avatar( $current_user->ID, 60 );;?> </div>
				<div class='axl-login-widget displayname'><?php echo $link_with_username;?> </div>
				<div class='axl-login-widget linkurl'><a href="<?php echo get_option('axcelerate-link-url'); ?>">Elearning Portal</a></div>			
				<div class='axl-login-widget logout'><a href="<?php echo wp_logout_url( $logout_redirect_page ); ?>" title="<?php _e('Logout','lwa');?>"><?php _e('Logout','lwa');?></a></div>


			<?php 

		}

	}

	

	public function error_message(){

		if(isset($_SESSION['msg']) and $_SESSION['msg']){

			echo '<div class="'.$_SESSION['msg_class'].'">'.$_SESSION['msg'].$this->message_close_button().'</div>';

			unset($_SESSION['msg']);

			unset($_SESSION['msg_class']);

		}

	}

	

	public function message_close_button(){

		$cb = '<a href="javascript:void(0);" onclick="closeMessage();" class="close_button_afo">x</a>';

		return $cb;

	}

	

	public function register_plugin_styles() {

		wp_enqueue_style( 'style_axl_login_widget', plugins_url( 'login-sidebar-widget/style_axl_login_widget.css' ) );

	}

	

	public function custom_styles_afo(){

		echo '<style>';

			echo stripslashes(get_option('custom_style_afo'));

		echo '</style>';

	}

	

	public function load_script(){?>

		<script type="text/javascript">

			function closeMessage(){jQuery('.error_wid_login').hide();}

		</script>

	<?php }

	

} 



function login_validate(){

	if( isset($_POST['option']) and $_POST['option'] == "axl_user_login"){

		if(!session_id()){

			session_start();

		}

		global $post;

		if($_POST['user_username'] != "" and $_POST['user_password'] != ""){

			$creds = array();

			$creds['user_login'] = $_POST['user_username'];

			$creds['user_password'] = $_POST['user_password'];

			if($_POST['remember'] == 'Yes'){

				$remember = true;

			} else {

				$remember = false;

			}

			$creds['remember'] = $remember;

			$user = wp_signon( $creds, true );

			if($user->ID == ""){

				$_SESSION['msg_class'] = 'error_wid_login';

				$_SESSION['msg'] = __('Error in login!','lwa');

			} else{

				wp_set_auth_cookie($user->ID, $remember);

				wp_redirect( $_POST['redirect'] );

				exit;

			}

		} else {

			$_SESSION['msg_class'] = 'error_wid_login';

			$_SESSION['msg'] = __('Username or password is empty!','lwa');

		}

		

	}

}



add_action( 'widgets_init', create_function( '', 'register_widget( "axl_login_wid" );' ) );

add_action( 'init', 'login_validate' );

?>