<?php get_header();?>
<?php echo get_bloginfo(); ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
