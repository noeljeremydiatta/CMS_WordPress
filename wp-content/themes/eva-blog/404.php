<?php get_header(); ?>

	<main role="main" id="site-content">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<h1><?php  esc_html_e( 'Page not found', 'eva-blog' ); ?></h1>
				<h2>
					<a href="<?php echo esc_url( home_url()); ?>"><?php  esc_html_e( 'Return home?', 'eva-blog' ); ?></a>
				</h2>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>
</div><!-- /wrapper -->
<?php get_footer(); ?>
