			<!-- footer -->
			<footer id="contact-info" class="footer" role="contentinfo">
					<!-- logo -->
					<div class="footer-top">
						<div class="wrapper">
							<div class="logo">
								<a href="<?php echo esc_url( home_url()); ?>">
									<?php bloginfo('title'); ?>
								</a>
							</div>
							<!-- /logo -->
							<!-- Site description -->
							<div class="site-description">
								<p><?php bloginfo('description'); ?></p>
							</div>

							<!-- Social menu -->
							<?php if ( has_nav_menu( 'social-menu' ) ) { ?>
								<nav class="nav social-nav" role="navigation">
									<?php wp_nav_menu( array('theme_location' => 'social-menu' ));  ?>
								</nav>
							<?php }?>
						</div>
					</div>

					<div class="footer-bottom">
						<div class="wrapper">
							<!-- copyright -->
							<p class="copyright">
							<?php 
								$copy_text = get_theme_mod( 'copyright_text' );
								$arr = array('a' => array(
											'href' => array(),
											'title' => array())
										);
								?>
								<?php echo( wp_kses( $copy_text, $arr ) ) ?>
							</p>
							<!-- /copyright -->

							<!-- Legal menu -->
							<?php if ( has_nav_menu( 'legal-menu' ) ) { ?>
								<nav class="nav" role="navigation">
									<?php wp_nav_menu( array('theme_location' => 'legal-menu' ));  ?>
								</nav>
							<?php }?>
							</div>
					</div>

					<a class="to-top-btn" href="#top">[<?php esc_html_e( 'Back to top', 'eva-blog' ); ?>]</a>
			</footer>
			<!-- /footer -->
		<?php wp_footer(); ?>
	</body>
</html>
