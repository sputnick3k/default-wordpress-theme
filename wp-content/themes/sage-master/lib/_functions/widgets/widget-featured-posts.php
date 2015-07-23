<?php

/**
 * @link              http://sputnickcreative.com
 * @since             1.0.0
 * @package           Featured_Posts
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Featured Posts
 * Plugin URI:        http://sputnickcreative.com
 * Description:       This plugins lets you dispay posts set to the category "Featured" in a widget on your sidebar.
 * Version:           1.0.0
 * Author:            Sputnick Creative
 * Author URI:        http://sputnickcreative.com
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// WIDGETS
/*
		FEATURED POSTS
*/
class Featured_Article_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'featured_articles_widget', // Base ID
			__( 'SNC Featured Articles', 'text_domain' ), // Name
			array( 'description' => __( 'This widget displays all articles in the "Featured Article" category.', 'text_domain' ), ) // Args
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
		

        <ul>        
        <?php
		$arr = array(1, 2, 3, 4, 5);
		foreach ($arr as &$value) { ?>
        	<li>
            	<img class="img-responsive featured-img" src="http://placehold.it/300x300">
                <span class="hdr"><a href="" title="">Category</a></span>
                <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Title of article goes here lorem ipsum dolor amet.</a></h4>
            	<div class="clearfix"></div>
            </li>
        <?php } ?>
        </ul>
		
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Featured Articles', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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

		return $instance;
	}

} // class Featured_Article_Widget

// register Featured_Article_Widget widget
function register_featured_articles_widget() {
    register_widget( 'Featured_Article_Widget' );
}
add_action( 'widgets_init', 'register_featured_articles_widget' );

?>