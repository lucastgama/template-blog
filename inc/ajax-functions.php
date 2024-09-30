<?php

function filter_posts_by_category()
{
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => $paged,
        'post_status' => 'publish',
        'cat' => $category_id,
    );

    $the_query = new WP_Query($args);
    $posts_html = '';
    $pagination_html = '';

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) : $the_query->the_post();
            $posts_html .= '<a href="' . get_permalink() . '" class="posts__card">';
            if (has_post_thumbnail()) {
                $posts_html .= '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '" />';
            } else {
                $posts_html .= '<img src="' . get_template_directory_uri() . '/assets/images/NoImage.png" alt="Imagem Padrão" />';
            }
            $posts_html .= '<div class="posts__card__tag">';
            $categories = get_the_category();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $posts_html .= '<span>' . esc_html($category->name) . '</span>';
                }
            } else {
                $posts_html .= '<span> Artigo </span>';
            }
            $posts_html .= '</div><h4>' . get_the_title() . '</h4>';
            $posts_html .= '<span class="card__date"><p>' . get_the_date('d/m/y') . '</p></span>';
            $posts_html .= '</a>';
        endwhile;
        $pagination_html = '<ul class="pagination__border">';
        $big = 999999999;
        $pagination = paginate_links(array(
            'current' => max(1, $paged),
            'total' => $the_query->max_num_pages,
            'prev_text' => '«',
            'next_text' => '»',
            'type' => 'array',
        ));

        if (!empty($pagination)) {
            foreach ($pagination as $page) {
                if (preg_match('/page\/([0-9]+)/', $page, $matches)) {
                    $page_number = $matches[1];
                    $page = str_replace('<a', '<a data-page="' . $page_number . '"', $page);
                }
                $pagination_html .= '<li>' . $page . '</li>';
            }
        }
        $pagination_html .= '</ul>';
    } else {
        $posts_html = '<p>Nenhum post encontrado.</p>';
    }
    wp_reset_postdata();
    wp_send_json_success(array(
        'posts' => $posts_html,
        'pagination' => $pagination_html,
    ));
}

add_action('wp_ajax_filter_posts_by_category', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts_by_category', 'filter_posts_by_category');

function change_post_page()
{
    $paged = isset($_POST['page_number']) ? intval($_POST['page_number']) : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => $paged,
        'post_status' => 'publish'
    );
    $the_query = new WP_Query($args);
    while ($the_query->have_posts()) : $the_query->the_post();
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

// add_action('wp_ajax_change_post_page', 'change_post_page');
// add_action('wp_ajax_nopriv_change_post_page', 'change_post_page');
