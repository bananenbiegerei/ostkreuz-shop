</main><!-- .site-content -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="grid-x grid-margin-x padding-top-medium">
		<div class="cell medium-12">
			<?php
			wp_nav_menu(array(
				'container' => '',
				'menu' => 'footer',
				'menu_class' => 'menu menu-offset-left',
				'theme_location' => 'footer',
				'walker' => new F6_Main_Menu_Walker(),
			));
			?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
