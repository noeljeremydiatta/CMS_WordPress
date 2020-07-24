<?php get_header(); ?>

	<main role="main" id="site-content">
		<!-- section -->
		<section>

			<h1><?php esc_html_e( 'Category: ', 'eva-blog' ); single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>
</div><!-- /wrapper -->
<?php get_footer(); ?>
