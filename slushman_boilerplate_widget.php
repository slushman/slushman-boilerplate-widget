<?php 

/*
Plugin Name: Slushman Boilerplate Widget
Plugin URI: http://slushman.com/plugins/slushman-boilerplate-widget
Description: Boilerplate code to start building your widget.
Version: 0.1
Author: Slushman
Author URI: http://www.slushman.com
License: GPLv2

**************************************************************************

  Copyright (C) 2013 Slushman

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General License for more details.templates/classic.php

  You should have received a copy of the GNU General License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************

*/

class boilerplate_widget extends WP_Widget {
 
/**
 * Create the widget.
 *
 * @uses	parent::__construct
 */	 
    function __construct() {
    
        $name 					= __( 'Slushman Boilerplate' );
 		$opts['description'] 	= __( 'Create your own widget using this code.', 'slushman-boilerplate-widget' );
 		$opts['classname']		= '';
 		$control				= array( 'width' => '', 'height' => '' );
 		
 		parent::__construct( false, $name, $opts, $control );
 		
    } // End of __construct function
 
/**
 * Back-end widget form.
 *
 * @see		WP_Widget::form()
 *
 * @param	array	$instance	Previously saved values from database.
 *
 * @uses	wp_parse_args
 * @uses	esc_attr
 * @uses	get_field_id
 * @uses	get_field_name
 * @uses	checked
 * @uses	selected
 */
    function form( $instance ) {
    
    	$defaults['title'] = 'Boilerplate Widget';
        $instance 			= wp_parse_args( (array) $instance, $defaults );
        
        $textfield 	= 'title'; // This is the name of the textfield
        $id 		= $this->get_field_id( $textfield );
        $name 		= $this->get_field_name( $textfield );
        $value 		= esc_attr( $instance[$textfield] );
        
        echo '<p><label for="' . $id . '">' . __( ucwords( $textfield ) ) . ': <input class="widefat" id="' . $id . '" name="' . $name . '" type="text" value="' . $value . '" /></label>';
                
/*
        // Text Field
        $textfield 	= ''; // This is the name of the textfield
        $id 		= $this->get_field_id( $textfield );
        $name 		= $this->get_field_name( $textfield );
        $value 		= esc_attr( $instance[$textfield] );
        
        echo '<p><label for="' . $id . '">' . __( ucwords( $textfield ) ) . ': <input class="widefat" id="' . $id . '" name="' . $name . '" type="text" value="' . $value . '" /></label>';
        
        
        // Textarea
        $textarea 	= ''; // This is the name of the textarea
        
		echo '<p><label for="' . $this->get_field_id( $textarea ) . '">' . __( ucwords( $textarea ) ) . '</label><textarea id="' . $this->get_field_id( $textarea ) . '" name="' . $this->get_field_name( $textarea ) . '" class="textarea" cols="50" rows="10" wrap="hard">' . esc_textarea( $value ) . '</textarea></p>';
        
        
        // Checkbox
        $checkbox 	= ''; // This is the name of the option
        $check 		= ( isset( $instance[$checkbox] ) ? (bool) $instance[$checkbox] : false );
		
		echo '<p><label for="' . $this->get_field_id( $checkbox ) . '"><input class="checkbox" id="' . $this->get_field_id( $checkbox ) . '" name="' . $this->get_field_name( $checkbox ) . '" type="checkbox"' . checked( $check, TRUE, FALSE ) . ' /> ' . __( ucwords( $checkbox ) ) . '</label></p>';
        
        
        // Select
        $select = ''; // This is the name of the option
        
        echo '<p><label for="' . $this->get_field_id( $select ) . '">' . __( ucwords( $select ) ) . ':</label>';
		echo '<select id="' . $this->get_field_id( $select ) . '" name="' . $this->get_field_name( $select ) . '" class="widefat">';
		echo '<option value="0"' . selected( 0, $instance[$select], FALSE ) . ' >0</option>';
		echo '<option value="1"' . selected( 1, $instance[$select], FALSE ) . ' >1</option>';
		echo '<option value="2"' . selected( 2, $instance[$select], FALSE ) . ' >2</option>';							
		echo '</select></p>';
*/
        
    } // End of form function
    
/**
 * Front-end display of widget.
 *
 * @see		WP_Widget::widget()
 *
 * @param	array	$args		Widget arguments.
 * @param 	array	$instance	Saved values from database.
 *
 * @uses	apply_filters
 */	 	 
   function widget( $args, $instance ) {
    
		extract( $args );
 	
	 	echo $before_widget;
	 	
	 	$title = ( !empty( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '' );
	 	
	 	echo ( !empty( $title ) ? $before_title . $title . $after_title : '' );
	 	
	 	echo '<div id="sidebar-me">';


		
		// Your widget functions go here.
		

	
		echo '</div><!-- End of #sidebar-me -->';
 	
        echo $after_widget;
        
    } // End of widget function

/**
 * Sanitize widget form values as they are saved.
 *
 * @see		WP_Widget::update()
 *
 * Enter the names of the fields in the correct field type array
 *
 * @param	array	$new_instance	Values just sent to be saved.
 * @param	array	$old_instance	Previously saved values from database.
 *
 * @uses	sanitize_text_field
 *
 * @return 	array	$instance		Updated safe values to be saved.
 */	 
    function update( $new_instance, $old_instance ) {
    
   	 	$instance = $old_instance;
   	 	
   	 	$instance['title'] = sanitize_text_field( $new_instance['title'] );
   	 	
/*
   	 	$instance[''] = sanitize_text_field( $new_instance[''] ); // For text fields
   	 	$instance[''] = sanitize_text_area( $new_instance[''] ); // For textareas
   	 	$instance[''] = ( isset( $new_instance[''] ) ? TRUE : FALSE ); // For checkboxes
   	 	$instance[''] = strip_tags( $new_instance[''] ); // For select menus - change strip_tags to intval for integer values
   	 	$instance[''] = esc_url( $new_instance[''] ); // For urls
   	 	$instance[''] = sanitize_email( $new_instance[''] ); // For emails
*/

	 	return $instance;
        
    } // End of update function
    
} // End of class boilerplate_widget

// Register the widget if its selected
add_action( 'widgets_init', 'slushman_boilerplate_widget_init' );

/**
 * Initiates widgets based on the plugin options
 *
 * Registers the widget with WordPress
 *
 * @since	0.1
 * 
 * @uses	register_widget
 */		
function slushman_boilerplate_widget_init() {

	register_widget( 'boilerplate_widget' );

} // End of slushman_boilerplate_widget_init()
    
?>