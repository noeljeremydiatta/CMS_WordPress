<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Pin Charity
 */
get_header(); ?>
<div class="container">	
	<div id="skipper">
    <div class="page_content">
        <section class="site-main" id="sitemain">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e('404 Not Found', 'pin-charity'); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p class="text-404"><?php
esc_html_e('Looks like you have taken a wrong turn.....Dont worry... it happens to the best of us.', 'pin-charity'); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .page-content -->
        </section>
     <?php get_sidebar(); ?>      
    <div class="clear"></div>
    </div>
    </div>
</div>
<?php get_footer(); ?>