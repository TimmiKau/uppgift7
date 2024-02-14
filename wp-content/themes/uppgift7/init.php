<?php


//This get settings page 
require_once("settings.php");
require_once("templates/shortcodes.php");

//The folders init will open. 
function baseTheme_enqueue()
{
    $theme_directory = get_template_directory_uri();
    wp_enqueue_style("myStyle", $theme_directory . "/style.css");
    wp_enqueue_script("app", $theme_directory . "/app.js");
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), null);

    $data = array();
    $data["color"] = "blue";
    $data["text"] = "app.js loaded!";
    $data["myOption"] = get_option("myOption");
    $data["testFromDB"] = get_option("admin_email");
    wp_localize_script("app", "myVariables", $data);
}


add_action('wp_enqueue_scripts', 'baseTheme_enqueue');


// Function to initialize theme settings, including menu registration
function baseTheme_init()
{
    // Define an associative array with menu location key-value pairs
    $menu = array(
        'huvudmeny' => 'Huvudmeny', // 'huvudmeny' is the location, 'Huvudmeny' is the display name
        'footer_information' => 'footer_information',
        'footer_Contacts' => 'footer_Contacts',
        'Footer_Social_Media' => 'Footer_Social_Media'
    );

    // Register the defined menu locations
    register_nav_menus($menu);
}

// Hook the baseTheme_init function to the 'after_setup_theme' action
add_action('after_setup_theme', 'baseTheme_init');