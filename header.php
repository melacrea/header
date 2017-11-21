<?php
/*
Plugin Name: header
Plugin URI: https://www.advancedcustomfields.com/
Description: Header en react
Version: 2.0.1
Author: Melanie Lecomte
*/

add_shortcode( 'wpshout_react_header', 'wpshout_react_show_header' );
function wpshout_react_show_header() {
	return '<div id="header"></div>';
}

add_action( 'wp_enqueue_scripts', 'wpshout_react_header_enqueue_scripts' );
function wpshout_react_header_enqueue_scripts() {

	//wp_enqueue_script( 'react', plugin_dir_url( __FILE__ ) . 'react/build/react.min.js' );
	//wp_enqueue_script( 'react-dom', plugin_dir_url( __FILE__ ) . 'react/build/react-dom.min.js' );
	wp_enqueue_script( 'babel', 'https://npmcdn.com/babel-core@5.8.38/browser.min.js', '', null, false );
	wp_enqueue_script( 'wpshout-react-header', plugin_dir_url( __FILE__ ) . 'react/build/static/js/main.9d742845.js' );
	wp_enqueue_style( 'wpshout-react-header', plugin_dir_url( __FILE__ ) . 'react/build/static/css/main.279176be.css' );
}

// Add "babel" type to header script
add_filter( 'script_loader_tag', 'wpshout_react_header_add_babel_type', 10, 3 );
function wpshout_react_header_add_babel_type( $tag, $handle, $src ) {
	if ( $handle !== 'wpshout-react-header' ) {
		return $tag;
	}

	return '<script src="' . $src . '" type="text/babel"></script>' . "\n";
}
