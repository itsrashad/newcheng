<?php get_header(); ?>
<div id="wrapper">
    <section class="sixteen columns row container">
        <div class="line"></div>
        <div class="page-title">
            <h2><a title="Home" href="<?php echo home_url('/'); ?>">Home</a> &rarr; <?php the_category(', ') ?></h2>
        </div>
        <div class="cat-content">
            <?php in_category($category, $_post) ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="five columns box">
                        <figure tabindex="1">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('post-thumbnail'); ?>
                                <h3 class="entry-title"><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                            </figure>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php
            wp_reset_query();
            ?>
            <div class="clear"></div>
        </div>
        <?php newcheng_pagination(); ?>
    </section>
</div>
<?php get_footer(); ?>
