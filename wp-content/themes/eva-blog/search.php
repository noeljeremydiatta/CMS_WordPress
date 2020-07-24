<?php get_header(); ?>

	<main role="main" id="site-content">
		<!-- section -->
		<section>
			<?php /* translators: %s: search term. */ ?>
			<h1><?php printf( esc_html_e( 'Search results for: %s', 'eva-blog' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
	</main>
</div><!-- /wrapper -->

<?php get_footer(); ?>
