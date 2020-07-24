<?php
/**
 * Eva: Customizer
**/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function eva_blog_customize_register( $wp_customize ) {


	eva_blog_register_custom_sections($wp_customize);

	// Posts sidebar
	$wp_customize->add_setting(
		'posts_sidebar', array(
			'default'   => 0,
			'sanitize_callback' => 'eva_blog_chkbox_sanitization',
		)
	);

	$wp_customize-> add_control(
		'posts_sidebar', array(
			'type'        => 'checkbox',
			'section'     => 'posts_sidebar',
			'label'       => __('Posts sidebar', 'eva-blog'),
			'description' => __('Check for enabling posts sidebar','eva-blog'),
			'priority'     => 1
		)
	);

	
	// Copyright bar text
	$wp_customize->add_setting(
		'copyright_text', array(
			'default'   => '<p>'. date_i18n('Y').' '. esc_html_e(get_bloginfo('title')).' by <a href="#" target="_blank">yourpage.com</a></p>',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize-> add_control(
		'copyright_text', array(
			'type'        => 'textarea',
			'section'     => 'copyright_bar',
			'label'       => __('Copyright bar text', 'eva-blog'),
			'description' => __('HTML is allowed.','eva-blog'),
		)
	);

}
add_action( 'customize_register', 'eva_blog_customize_register' );

function eva_blog_register_custom_sections( $wp_customize ) {

	// Posts sidebar
	$wp_customize-> add_section('posts_sidebar', array(
		'title'    => __('Posts sidebar', 'eva-blog'),
		'priority' => 150,
	));

	// Copyright bar section
	$wp_customize-> add_section('copyright_bar', array(
		'title'    => __('Copyright text', 'eva-blog'),
		'priority' => 160,
	));
}

/**
* Custom sanitization functions
*/
// Checkboxes
function eva_blog_chkbox_sanitization( $input ) {
	if ( true === $input ) {
	   return 1;
	} else {
	   return 0;
	}
 }
