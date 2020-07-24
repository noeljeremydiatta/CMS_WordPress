<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'lalita_background_setup' );
/**
 * Overwrite parent theme background defaults and registers support for WordPress features.
 *
 */
function lalita_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => 'ffffff',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

/**
 * Overwrite theme URL
 *
 */
function lalita_theme_uri_link() {
	return 'https://wpkoi.com/moksa-wpkoi-wordpress-theme/';
}

/**
 * Overwrite parent theme's blog header function
 *
 */
add_action( 'lalita_after_header', 'lalita_blog_header_image', 11 );
function lalita_blog_header_image() {

	if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
		$blog_header_image 			=  lalita_get_setting( 'blog_header_image' ); 
		$blog_header_title 			=  lalita_get_setting( 'blog_header_title' ); 
		$blog_header_text 			=  lalita_get_setting( 'blog_header_text' ); 
		$blog_header_button_text 	=  lalita_get_setting( 'blog_header_button_text' ); 
		$blog_header_button_url 	=  lalita_get_setting( 'blog_header_button_url' ); 
		if ( $blog_header_image != '' ) { ?>
		<div class="page-header-image grid-parent page-header-blog" style="background-image: url(<?php echo esc_url($blog_header_image); ?>);">
			<div class="page-header-blog-inner">
				<div class="page-header-blog-content-h grid-container">
					<div class="page-header-blog-content">
					<?php if ( ( $blog_header_title != '' ) || ( $blog_header_text != '' ) ) { ?>
						<div class="page-header-blog-text">
							<?php if ( $blog_header_title != '' ) { ?>
                            <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                            <div class="clearfix"></div>
                            <?php } ?>
                            <?php if ( $blog_header_title != '' ) { ?>
                            <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                            <div class="clearfix"></div>
                            <?php } ?>
                        </div>
                        <div class="page-header-blog-button">
							<?php if ( $blog_header_button_text != '' ) { ?>
                            <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                            <?php } ?>
                        </div>
					<?php } ?>
					</div>
                    <div class="page-header-blog-image">
                    	<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/cross.png" class="moksa-blog-cross" />
                    </div>
				</div>
			</div>
		</div>
		<?php
		}
	}
}

if ( ! function_exists( 'moksa_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'moksa_remove_parent_dynamic_css' );
	/**
	 * The dynamic styles of the parent theme added inline to the parent stylesheet.
	 * For the customizer functions it is better to enqueue after the child theme stylesheet.
	 */
	function moksa_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

if ( ! function_exists( 'moksa_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'moksa_enqueue_parent_dynamic_css', 50 );
	/**
	 * Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
	 *
	 */
	function moksa_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

// Extra cutomizer functions
if ( ! function_exists( 'moksa_customize_register' ) ) {
	add_action( 'customize_register', 'moksa_customize_register' );
	function moksa_customize_register( $wp_customize ) {
		
		// Add navigation extra button text
		$wp_customize->add_setting(
			'moksa_settings[nav_btn_text]',
			array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'esc_html'
			)
		);

		$wp_customize->add_control(
			'moksa_settings[nav_btn_text]',
			array(
				'type' => 'text',
				'label' => __( 'Extra button text', 'moksa' ),
				'section' => 'lalita_layout_navigation',
				'settings' => 'moksa_settings[nav_btn_text]',
				'priority' => 25
			)
		);
		
		// Add navigation extra button url
		$wp_customize->add_setting(
			'moksa_settings[nav_btn_url]',
			array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'esc_url'
			)
		);

		$wp_customize->add_control(
			'moksa_settings[nav_btn_url]',
			array(
				'type' => 'text',
				'label' => __( 'Extra button URL', 'moksa' ),
				'section' => 'lalita_layout_navigation',
				'settings' => 'moksa_settings[nav_btn_url]',
				'priority' => 25
			)
		);
		
		// Hide cross image function
		$wp_customize->add_setting(
			'moksa_settings[cross_img]',
			array(
				'default' => false,
				'type' => 'option',
				'sanitize_callback' => 'moksa_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'moksa_settings[cross_img]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Hide blog image cross', 'moksa' ),
				'section' => 'lalita_blog_section',
				'priority' => 2
			)
		);
		
		// Colorized blog image function
		$wp_customize->add_setting(
			'moksa_settings[colorized_img]',
			array(
				'default' => true,
				'type' => 'option',
				'sanitize_callback' => 'moksa_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'moksa_settings[colorized_img]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Hover effect on blog images', 'moksa' ),
				'section' => 'lalita_blog_section',
				'priority' => 30
			)
		);
		
	}
}

if ( ! function_exists( 'moksa_sanitize_checkbox' ) ) {
	/**
	 * Sanitize checkbox values.
	 *
	 */
	function moksa_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
}

if ( ! function_exists( 'moksa_navigation_button' ) ) {
	add_filter( 'wp_nav_menu_items', 'moksa_navigation_button', 11, 2 );
	/**
	 * Add the extra button to the navigation.
	 *
	 */
	function moksa_navigation_button( $nav, $args ) {
		// Get Customizer settings
		$moksa_settings = get_option( 'moksa_settings' );
		
		// If our primary menu is set, add the extra button.
		if ( ( $args->theme_location == 'primary' ) && ( $moksa_settings['nav_btn_url'] != '' ) ) {
			return $nav . '<li class="wpkoi-nav-btn-h"><a class="wpkoi-nav-btn button" href="' . esc_url( $moksa_settings['nav_btn_url'] ) . '">' . esc_html( $moksa_settings['nav_btn_text'] ) . '</a></li>';
		}
		
	    return $nav;
	}
}

if ( ! function_exists( 'moksa_body_classes' ) ) {
	add_filter( 'body_class', 'moksa_body_classes' );
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 */
	function moksa_body_classes( $classes ) {
		// Get Customizer settings
		$moksa_settings = get_option( 'moksa_settings' );
		
		// Return if cross image or colorized image function is not exist
		if ( ( ! isset( $moksa_settings['cross_img'] ) ) && ( ! isset( $moksa_settings['colorized_img'] ) ) ) {
			return $classes;
		}
		
		// Cross image function for blog header
		if ( $moksa_settings['cross_img'] == true ) {
			$classes[] = 'moksa-cross-img';
		}
		
		// Colorized blog images function
		if ( $moksa_settings['colorized_img'] == true ) {
			$classes[] = 'moksa-colorized-img';
		}
		
		return $classes;
	}
}