<?php

function theme_enqueue_styles_and_scripts()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_style('global', get_template_directory_uri() . '/assets/css/global.css');
    wp_enqueue_style('buttons', get_template_directory_uri() . '/assets/css/buttons.css');
    wp_enqueue_style('navbar', get_template_directory_uri() . '/assets/css/navbar.css');
    wp_enqueue_style('jumbotronSection', get_template_directory_uri() . '/assets/css/jumbotron.css');
    wp_enqueue_style('postsSection', get_template_directory_uri() . '/assets/css/posts.css');
    wp_enqueue_style('aboutSection', get_template_directory_uri() . '/assets/css/about.css');
    wp_enqueue_style('rulesSection', get_template_directory_uri() . '/assets/css/rules.css');
    wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css');


    wp_enqueue_script('jquery');
    wp_enqueue_script('navbar', get_template_directory_uri() . '/assets/js/navbar.js', array('jquery'), null, true);
    wp_enqueue_script('closePage', get_template_directory_uri() . '/assets/js/closePage.js', array('jquery'), null, true);
    wp_enqueue_script('category', get_template_directory_uri() . '/assets/js/category.js', array('jquery'), null, true);

    wp_localize_script('category', 'ajax_data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts');
