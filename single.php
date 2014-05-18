<?php get_header(); ?>

<section class="sixteen columns row wrapper">
    <h1 class="entry-title"><a title="<?php printf(esc_attr__('Permalink to %s', 'compass'), the_title_attribute('echo=0')); ?>" href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_title(); ?>
        </a></h1>
    <small class="eleven columns row"><a title="Home" href="<?php echo home_url('/'); ?>">Home</a> > <?php the_category(',') ?> > <?php the_title(); ?></small>
    <div class="ten columns box-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_post_thumbnail('featured'); ?>
                <?php the_content(); ?>
                <?php echo setPostViews(get_the_ID()); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="sidebar five columns">
        <?php if (!dynamic_sidebar('sidebars-widgets')) : ?>
            <div class="dev-widget-wrapper">
                <div class="dev-widget-title">
                    <?php _e('In Archive'); ?>
                </div>
                <ul>
                    <?php wp_get_archives(array('type' => 'monthly')); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>
