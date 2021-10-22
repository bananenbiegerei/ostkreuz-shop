</main><!-- .site-content -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php get_template_part('template-parts/partials/scroll-top'); ?>
	<div class="grid-container">
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
			<div class="cell auto">
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
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
