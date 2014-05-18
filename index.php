<?php get_header(); ?>
<section class="sixteen columns row content">
    <div class="page-title">
        <h1 class="thirteen columns"><?php the_title(); ?></h1>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
<?php get_footer(); ?>
