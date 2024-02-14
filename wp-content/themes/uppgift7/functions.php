<?php
require_once ("vite.php");

//This will require the init folder. That loads start files
require_once(get_template_directory() . "/init.php");

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');



function uppgift7_register_menus()
{
    register_nav_menus(array(
        'primary-menu' => esc_html__('Primary Menu', 'uppgift7'),
        'footer-menu'  => esc_html__('Footer Menu', 'uppgift7'),
        'header-icon'  => esc_html__('Header-Icon', 'uppgift7'),
    ));
}
add_action('init', 'uppgift7_register_menus');

