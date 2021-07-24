<?php 
function Blog_Wordpress_Menus(){
    $location = array(
        'primary' => 'Desktop Left Sidebar Menus',
        'footer'  => 'Footer Menus'
    );
    register_nav_menus($location);
}
add_action('init', 'Blog_Wordpress_Menus');

function Blog_Wordpress_Support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'Blog_Wordpress_Support');

function Blog_Wordpress_Enqueue_Style(){
    $ver = wp_get_theme()->get('Version');
    wp_register_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.4.1', 'all');
    wp_register_style('fontawesome', get_template_directory_uri().'/assets/css/all.css', array(), '3.3.7', 'all');
    wp_register_style('custom', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
    wp_register_style('main', get_template_directory_uri() .'/assets/css/style.css', array(), filemtime(get_template_directory(). '/assets/css/style.css'), 'all');

    wp_register_script('bootstrap-js', get_template_directory_uri() .'/assets/js/bootstrap-4.4.1.min.js', array(), '4.4.1', true);
    wp_register_script('jquery-js', get_template_directory_uri() .'/assets/js/jquery-3.4.1.js', array(), '3.4.1', true);
    wp_register_script('main', get_template_directory_uri() .'/assets/js/main.js', array(), '1.0', true);



    wp_enqueue_style('bootstrap');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('custom');
    wp_enqueue_style('main');

    wp_enqueue_script('jquery-js');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'Blog_Wordpress_Enqueue_Style');


function blog_wordpress_sidebar(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title'  => '',
            'before_widget'=> '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name'         => 'sidebar-area',
            'id'           => 'sidebar-widget',
            'description'  => 'sidebar-widget area'
        )
    );
    register_sidebar(
        array(
            'before_title' => '',
            'after_title'  => '',
            'before_widget'=> '',
            'after_widget' => '',
            'name'         => 'footer-area',
            'id'           => 'footer-widget',
            'description'  => 'footer-widget area'
        )
    );
}

add_action('widgets_init', 'blog_wordpress_sidebar');