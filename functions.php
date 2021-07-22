<?php 
function Blog_Wordpress_Enqueue_Style(){
    $ver = wp_get_theme()->get('Version');
    wp_register_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.4.1', 'all');
    wp_register_style('fontawesome', get_template_directory_uri().'/assets/css/all.css', array(), '3.3.7', 'all');
    wp_register_style('custom', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
    wp_register_style('main', get_template_directory_uri() .'/assets/css/style.css', array(), $ver, 'all');

    wp_register_script('bootstrap-js', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array(), '3.3.7', true);


    wp_enqueue_style('bootstrap');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('custom');
    wp_enqueue_style('main');

    wp_enqueue_script('bootstrap-js');
}
add_action('wp_enqueue_scripts', 'Blog_Wordpress_Enqueue_Style');