<?php
require_once("vite.php");

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

add_filter('woocommerce_default_address_fields', 'move_city_down');

function move_city_down($address_fields)
{
    $address_fields['postcode']['priority'] = 30;
    $address_fields['city']['priority'] = 50;
    return $address_fields;
}
add_filter('woocommerce_checkout_fields', 'move_additional_info_under_email', 90);

function move_additional_info_under_email($fields)
{
    $fields['order']['order_comments']['priority'] = 35;

    return $fields;
}


add_filter('woocommerce_checkout_fields', 'move_order_notes_field', 20);
function move_order_notes_field($fields)
{
    unset($fields['order']['order_comments']['label']);
    $fields['order']['order_comments']['placeholder'] = 'Additional information';
    $fields['order']['order_comments']['priority'] = 20; 
    return $fields;
}
add_filter('woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_on_cart');
add_filter('woocommerce_cart_needs_shipping', 'disable_shipping_on_cart');
function disable_shipping_on_cart($enabled)
{
    return is_checkout() ? true : false;
}


