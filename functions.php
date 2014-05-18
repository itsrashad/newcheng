<?php
if (get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
}

add_theme_support('menus');
// Create Nav Menu
if (function_exists('register_nav_menus')) {
    register_nav_menus(array('primary' => 'Header Navigation', 'footer' => 'Footer Navigation'));
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

if (function_exists('add_image_size')) {
    add_image_size('featured', 400, 250, true);
    add_image_size('post-thumb', 450, 275, true);
    add_image_size('post-rand', 250, 150, true);
}

function create_post_type() {
    register_post_type('press-news', array('labels' =>
        array(
            'name' => __('News'),
            'singular_name' => __('News')
        ),
        'public' => true,
        'menu_position' => 5,
        'rewrite' => array('slug' => 'news'),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag')
            )
    );
}

add_action('init', 'create_post_type');

function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }
    return $count . '';
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

if (function_exists(register_sidebar)) {
    register_sidebar(array(
        'name' => 'Footer Widgets',
        'id' => 'footer-widgets',
        'description' => 'Place widgets for the footer here.',
        'before_widget' => '<div class="one-third column">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebars-widgets',
        'description' => 'Place widgets for the sidebar here.',
        'before_widget' => '<div class="one-third column">',
        'after_widget' => '</div>'
    ));
}

function custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <header class="comment-header">
                <?php echo get_avatar($comment, $size = '48', $default = 'devbd.com/wp-content/themes/devbd/images/default-avatar.png'); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
                <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', '') ?></div>
            </header>
    <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.') ?></em>
                <br>
            <?php endif; ?>

    <?php comment_text() ?>

            <div class="reply">
    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>
        <?php
    }

    function the_excerpt_length($length) {
        return 20;
    }

    add_filter('excerpt_length', 'the_excerpt_length', 999);

    function newcheng_pagination($pages = '', $range = 2) {
        $showitems = ($range * 2) + 1;
        global $paged;
        if (empty($paged))
            $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {
            echo "<div class='pagination'>";
            if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
                echo "<a href='" . get_pagenum_link(1) . "'>&laquo;</a>";
            if ($paged > 1 && $showitems < $pages)
                echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                    echo ($paged == $i) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
                }
            }

            if ($paged < $pages && $showitems < $pages)
                echo "<a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a>";
            if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
                echo "<a href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
            echo "</div>\n";
        }
    }
    ?>