<?php
/*
Plugin Name: header
Plugin URI: https://www.advancedcustomfields.com/
Description: Customise WordPress with powerful, professional and intuitive fields.
Version: 1.0.2
Author: Melanie Lecomte
*/

add_shortcode( 'wpshout_react_quiz', 'wpshout_react_quiz_show_quiz' );
function wpshout_react_quiz_show_quiz() {
	return '<div id="quiz"></div>';
}

add_action( 'wp_enqueue_scripts', 'wpshout_react_quiz_enqueue_scripts' );
function wpshout_react_quiz_enqueue_scripts() {

	wp_enqueue_script( 'react', plugin_dir_url( __FILE__ ) . 'react/build/react.min.js' );
	wp_enqueue_script( 'react-dom', plugin_dir_url( __FILE__ ) . 'react/build/react-dom.min.js' );
	wp_enqueue_script( 'babel', 'https://npmcdn.com/babel-core@5.8.38/browser.min.js', '', null, false );
	wp_enqueue_script( 'wpshout-react-quiz', plugin_dir_url( __FILE__ ) . 'wpshout-react-quiz.js' );
	wp_enqueue_style( 'wpshout-react-quiz', plugin_dir_url( __FILE__ ) . 'wpshout-react-quiz.css' );
}

// Add "babel" type to quiz script
add_filter( 'script_loader_tag', 'wpshout_react_quiz_add_babel_type', 10, 3 );
function wpshout_react_quiz_add_babel_type( $tag, $handle, $src ) {
	if ( $handle !== 'wpshout-react-quiz' ) {
		return $tag;
	}

	return '<script src="' . $src . '" type="text/babel"></script>' . "\n";
}
