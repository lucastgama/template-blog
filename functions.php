<?php

add_theme_support('post-thumbnails');

function eterno_estagiario_menus()
{
  register_nav_menus(
    array(
      'primary' => __('Primary Menu', 'eterno-estagiario')
    )
  );
}
add_action('init', 'eterno_estagiario_menus');


function eterno_estagiario_scripts()
{
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, true);
}
add_action('wp_enqueue_scripts', 'eterno_estagiario_scripts');

function registrar_post_type_relatorio()
{
  $labels = array(
    'name' => 'Relatórios',
    'singular_name' => 'Relatório',
    'menu_name'          => 'Relatórios',
    'name_admin_bar'     => 'Relatório',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar Novo Relatório',
    'edit_item'          => 'Editar Relatório',
    'new_item'           => 'Novo Relatório',
    'view_item'          => 'Ver Relatório',
    'all_items'          => 'Todos Relatórios',
  );
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'show_in_menu'       => true,
    'supports'           => array('title', 'editor', 'custom-fields'),
    'show_in_rest'       => true,
  );
  register_post_type('relatorio', $args);
}
add_action('init', 'registrar_post_type_relatorio');
