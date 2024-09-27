<?php

function filter_posts_by_category()
{
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 12,
        'paged' => 1,
        'post_status' => 'publish',
        'cat' => $category_id
    );

    $query = new WP_Query($args);

    while ($query->have_posts()) : $query->the_post();
?>
        <a href="<?php the_permalink(); ?>" class="posts__card">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/1.jpg" alt="Imagem Padrão" />
            <?php endif; ?>
            <div class="posts__card__tag">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    foreach ($categories as $category) {
                        echo '<span>' . esc_html($category->name) . '</span>';
                    }
                } else {
                    echo '<span> Artigo </span>';
                }
                ?>
            </div>
            <h4><?php echo get_the_title(); ?></h4>
            <span class="card__date">
                <p><?php echo get_the_date('d/m/y'); ?></p>
            </span>
        </a>
<?php
    endwhile;

    wp_reset_postdata();
    die();
}

add_action('wp_ajax_filter_posts_by_category', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts_by_category', 'filter_posts_by_category');
