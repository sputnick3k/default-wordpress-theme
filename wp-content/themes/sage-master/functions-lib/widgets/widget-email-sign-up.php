<?php

/**
 * @link              http://sputnickcreative.com
 * @since             1.0.0
 * @package           Email_Sign_Up
 *
 * @wordpress-plugin
 * Plugin Name:       Basic Email Sign Up Form
 * Plugin URI:        http://sputnickcreative.com
 * Description:       This plugins lets you dispay an email sign up form in your sidebar.
 * Version:           1.0.0
 * Author:            Sputnick Creative
 * Author URI:        http://sputnickcreative.com
 */


/**
 * Adds Email_Sign_Up widget.
 */
class Email_Sign_Up extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'email-sign-up', // Base ID
			__( 'SNC Email Sign Up', 'text_domain' ), // Name
			array( 'description' => __( 'Basic Email Sign Up Form.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		} ?>
		
        <p><?php echo $instance['description']; ?></p>
        <form class="email-sign-up">
        	<input type="text" placeholder="EMAIL SIGN UP" />
            <button>CONFIRM</button>
        </form>
		
		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Join Us', 'text_domain' );
		$description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Join us to learn more about Carl’s investment philosophy and insights', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

		return $instance;
	}

} // class Email_Sign_Up

// register Email_Sign_Up widget
function register_email_sign_up() {
    register_widget( 'Email_Sign_Up' );
}
add_action( 'widgets_init', 'register_email_sign_up' );

?>