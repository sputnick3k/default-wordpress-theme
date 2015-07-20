<?php

/**
 * @link              http://sputnickcreative.com
 * @since             1.0.0
 * @package           Contact_Address_In_Sidebar
 *
 * @wordpress-plugin
 * Plugin Name:       Contact Widget
 * Plugin URI:        http://sputnickcreative.com
 * Description:       This plugins lets you dispay your company address in the sidebar.
 * Version:           1.0.0
 * Author:            Sputnick Creative
 * Author URI:        http://sputnickcreative.com
 */

/**
 * Adds Contact widget.
 */
class Contact extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'contact', // Base ID
			__( 'SNC Contact', 'text_domain' ), // Name
			array( 'description' => __( 'Adds contact info to the sidebar.', 'text_domain' ), ) // Args
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
		} 
		
		?>
		
        <p><strong><?php echo nl2br($instance['address']); ?></strong></p>
        <?php if($instance['email']){ ?><p><strong><a href="mailto:<?php echo $instance['email']; ?>" title="eMail <?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a></strong></p><?php } ?>
		
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Contact', 'text_domain' );
		$address = ! empty( $instance['address'] ) ? $instance['address'] : __( 'Address Info', 'text_domain' );
		$email = ! empty( $instance['email'] ) ? $instance['email'] : __( '', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label> 
		<textarea rows="4" class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>"><?php echo esc_attr( $address ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
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
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

		return $instance;
	}

} // class Contact

// register Contact widget
function register_contact() {
    register_widget( 'Contact' );
}
add_action( 'widgets_init', 'register_contact' );

?>