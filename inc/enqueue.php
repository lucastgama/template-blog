<?php

function theme_enqueue_styles_and_scripts()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('closePage', get_template_directory_uri() . '/assets/js/closePage.js', array('jquery'), null, true);
    wp_enqueue_script('category', get_template_directory_uri() . '/assets/js/category.js', array('jquery'), null, true);
    wp_enqueue_script('page', get_template_directory_uri() . '/assets/js/page.js', array('jquery'), null, true);

    wp_localize_script('category', 'ajax_data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts');
