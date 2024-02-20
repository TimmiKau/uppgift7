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

//  Inställningar
function add_custom_settings_page()
{
    add_options_page('Address Settings', 'Adress', 'manage_options', 'custom-settings', 'custom_settings_page_output');
}
add_action('admin_menu', 'add_custom_settings_page');


// Checkout 

add_filter('gettext', 'change_postcode_text', 20, 3);

function change_postcode_text($translated_text, $text, $domain)
{
    if ($text === 'Postcode / ZIP') {
        $translated_text = 'ZIP code';
    }
    return $translated_text;
}

