<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'paged' => $paged,
    'post_status' => 'publish'
);
$the_query = new WP_Query($args);
$categories = get_categories();
?>
<section class="container__ee container__posts" id="posts">
    <h3 class="section__title">O Que Tem de Novo?</h3>
    <div class="container__category">
        <?php
        foreach ($categories as $category) {
            echo '<button type="button" data-category-id="' . $category->term_id . '"
            class="category-button focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 dark:bg-sky-600/30 dark:text-white dark:hover:bg-sky-600">
            ' . esc_html($category->name) . '
        </button>';
        }
        ?>
    </div>
    <div class="posts__cards">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <?php
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                    <a href="<?php the_permalink(); ?>" class="posts__card">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/NoImage.png" alt="Imagem Padrão" />
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
            ?>
        </div>
        <div class="posts__pagination">
            <ul class="pagination__border">
                <?php
                $big = 999999999;
                $pagination = paginate_links(array(
                    'current' => max(1, get_query_var('paged')),
                    'total' => $the_query->max_num_pages,
                    'prev_text' => '«',
                    'next_text' => '»',
                    'type' => 'array',
                ));
                if (!empty($pagination)) :
                    foreach ($pagination as $page) :
                        if (preg_match('/page\/([0-9]+)/', $page, $matches)) {
                            $page_number = $matches[1];
                            $page = str_replace('<a', '<a data-page="' . $page_number . '"', $page);
                        }
                        echo '<li>' . $page . '</li>';
                    endforeach;
                endif;
                ?>
            </ul>
        </div>
    </div>

</section>