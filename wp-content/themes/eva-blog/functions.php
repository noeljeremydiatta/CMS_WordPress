<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/
function eva_blog_setup () {
    if (!isset($content_width))
    {
        $content_width = 900;
    }

    if (function_exists('add_theme_support'))
    {
        // Add Thumbnail Theme Support
        add_theme_support('post-thumbnails');
        add_image_size('eva_blog_large', 700, '', true);
        add_image_size('eva_blog_medium', 250, '', true); 
        add_image_size('eva_blog_small', 120, '', true);

        // Enables post and comment RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Localisation Support
        load_theme_textdomain('eva-blog', get_template_directory() . '/languages');
        
        // Enable post thumbnails for posts
        add_theme_support( 'post-thumbnails' );
        
        // Title tag manage by WordPress, not hardcoded
        add_theme_support( 'title-tag' );
    }
}
add_action( 'after_setup_theme', 'eva_blog_setup' );


/*------------------------------------*\
	Functions
\*------------------------------------*/

// Eva navigation
function eva_blog_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load Eva scripts (header.php)
function eva_blog_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        // Modernizr
        wp_register_script('eva-blog-modernizr', get_template_directory_uri() . '/lib/modernizr-custom.js', array()); 
        wp_enqueue_script('eva-blog-modernizr');
        // Custom scripts
        wp_register_script('eva-blog-scripts', get_template_directory_uri() . '/js/eva-blog-scripts.js', array('jquery'), '1.0.0');
        wp_enqueue_script('eva-blog-scripts');
    }
}

// Load Eva styles
function eva_blog_styles()
{
    // Normalize
    wp_register_style('eva-blog-normalize', get_template_directory_uri() . '/lib/normalize.css', array(), '8.0.1', 'all');
    wp_enqueue_style('eva-blog-normalize');
    // Theme styles
    wp_register_style('eva-blog-styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('eva-blog-styles');
}

// Register Eva Navigation
function eva_blog_register_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'eva-blog'), // Main Navigation
        'legal-menu' => __('Legal Menu', 'eva-blog'), // Legal Navigation for footer
        'social-menu' => __('Social Menu', 'eva-blog') // Legal Navigation for copyright bar

    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function eva_blog_my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function eva_blog_my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function eva_blog_remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function eva_blog_add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Posts Widget', 'eva-blog'),
        'description' => __('Sidebar for single post page', 'eva-blog'),
        'id' => 'widget-area-posts',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function eva_blog_my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Custom View Article link to Post
function eva_blog_blank_view_article($more)
{   
    if ( is_admin() ) return $more;
    global $post;
    return '... <a class="view-article" href="' .  esc_url(get_permalink($post->ID)) . '">' . __('View Article', 'eva-blog') . '</a>';
}

// Remove 'text/css' from our enqueued stylesheet
function eva_blog_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function eva_blog_remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Threaded Comments
function eva_blog_enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// WordPress wp_body_open backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Adds the 'Skip to content' link at the top of the page
 */
function eva_blog_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#site-content">' . esc_html( 'Skip to the content', 'eva-blog' ) . '</a>';
}
add_action( 'wp_body_open', 'eva_blog_skip_link', 5 );

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'eva_blog_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'eva_blog_enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'eva_blog_styles'); // Add Theme Stylesheet
add_action('init', 'eva_blog_register_menu'); // Add Eva Menu
add_action('widgets_init', 'eva_blog_my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()

// Add Filters
add_filter('body_class', 'eva_blog_add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'eva_blog_my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'eva_blog_remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('excerpt_more', 'eva_blog_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'eva_blog_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'eva_blog_remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'eva_blog_remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images


/*------------------------------------*\
	Theme customizer
\*------------------------------------*/
require get_parent_theme_file_path( '/inc/customizer.php' );
?>

