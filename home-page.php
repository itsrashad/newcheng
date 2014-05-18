<?php
/**
 * Template Name: Home Page
 */
get_header();
?>
<section class="sixteen columns content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
</section>
<?php get_footer(); ?>

