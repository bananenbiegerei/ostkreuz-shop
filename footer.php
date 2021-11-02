</main><!-- .site-content -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php get_template_part('template-parts/partials/scroll-top'); ?>
	<div class="grid-container fluid">
		<div class="grid-x grid-margin-x padding-top-medium">
			<?php if( get_field('adresse_1','option') ): ?>
			<div class="cell medium-3">
				<?php the_field('adresse_1','option'); ?>
			</div>	
			<?php endif; ?>
			<?php if( get_field('adresse_2','option') ): ?>
			<div class="cell medium-3">
				<?php the_field('adresse_2','option'); ?>
			</div>	
			<?php endif; ?>
			<div class="cell medium-auto small-12">
				<div class="revoke-cookie-consent-container">
					<?php echo do_shortcode('[cmplz-revoke-link text="Cookie Einstellungen"]'); ?>
				</div>
				<nav class="text-left">
					<?php
					wp_nav_menu(array(
						'container' => '',
						'menu' => 'footer',
						'menu_class' => 'menu vertical menu-offset-left margin-bottom-2',
						'theme_location' => 'footer',
						'walker' => new F6_Main_Menu_Walker(),
					));
					?>
				</nav>
				<?php if ( have_rows( 'social_media_links', 'option' ) ) : ?>
				<?php while ( have_rows( 'social_media_links', 'option' ) ) : the_row(); ?>
					<?php 
					$link = get_field('link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				<?php endwhile; ?>
				<?php else : ?>
				<?php // no rows found ?>
				<?php endif; ?>
			</div>
			<div class="cell medium-shrink small-12">
				<a href="<?php echo home_url(); ?>">
					<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/ostkreuz-logo.svg" alt="Logo">
				</a>
			</div>
			<div class="cell medium-12">
				<div class="revoke-cookie-consent-container margin-bottom-1">
					<?php echo do_shortcode('[cmplz-revoke-link text="Cookie Einstellungen"]'); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
