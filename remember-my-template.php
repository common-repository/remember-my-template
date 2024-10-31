<?php
/*
Plugin Name:  Remember My Template
Plugin URI:   http://www.stephenharris.info
Description:  Remembers the template that was selected when the theme was last used
Author:       Stephen Harris
Author URI:   http://www.stephenharris.info
Version:      0.1
License:      GNU GPL 3
*/

/**
 * When a page's `_wp_page_template` key is updated - duplicate this value with the key 
 * `_wp_page_template_{theme-name}`. `{theme-name}` is the theme's folder name.
 * 
 * Hooks onto `added_post_meta`
 * Hooks onto `updated_post_meta`
 * 
 * @param int $meta_id
 * @param int $post_id
 * @param string $meta_key
 * @param string $meta_value
 */
function rmt_update_post_template_meta( $meta_id, $post_id, $meta_key, $meta_value ){
	
	if( '_wp_page_template' === $meta_key ){
		
		$theme = wp_get_theme();
		$name = $theme->template;
		if( $name ){
			update_post_meta( $post_id, '_wp_page_template_' . $name, $meta_value );
		}
		
	}
	
}
add_action( "updated_post_meta", "rmt_update_post_template_meta", 10, 4 );
add_action( "added_post_meta", "rmt_update_post_template_meta", 10, 4 );

/**
 * When retrieving a page's `_wp_page_template` replace this with the value associated with
 * `_wp_page_template_{theme-name}`, if it exists. `{theme-name}` is the theme's folder name.
 * 
 * Hooks onto `get_post_metadata`
 * 
 * @param mixed $value This is `null`, unless we over-ride it with our own value. 
 * @param int $post_id
 * @param string $meta_key
 * @param bool $single
 * @return Ambigous <mixed, string, multitype:, boolean, unknown, string>
 */
function rmt_get_post_template_meta( $value, $post_id, $meta_key, $single ){
	
	if( '_wp_page_template' === $meta_key ){
		
		$theme = wp_get_theme();
		$name = $theme->template;
		
		if( $name ){
			$template = get_post_meta( $post_id, '_wp_page_template_' . $name, $single );
			if( $template  && locate_template( $template ) ){
				$value = $template;
			}
		}
	
	}
	
	return $value;
}
add_filter( 'get_post_metadata', 'rmt_get_post_template_meta', 10, 4 );
?>
