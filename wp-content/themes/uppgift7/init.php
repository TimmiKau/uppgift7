<?php


//This get settings page 
require_once("settings.php");

//The folders init will open. 
function baseTheme_enqueue()
{
    $theme_directory = get_template_directory_uri();
    wp_enqueue_style("myStyle", $theme_directory . "/style.css");
    wp_enqueue_script("app", $theme_directory . "/app.js");

   
    
    wp_localize_script("app", "myVariables", "");
}


add_action('wp_enqueue_scripts', 'baseTheme_enqueue');


// Function to initialize theme settings, including menu registration
function baseTheme_init()
{
    // Define an associative array with menu location key-value pairs
    $menu = array(
        'huvudmeny' => 'Huvudmeny', // 'huvudmeny' is the location, 'Huvudmeny' is the display name
        'header_information' => 'header_information',
        'footer_information' => 'footer_information',
    );

    // Register the defined menu locations
    register_nav_menus($menu);
}

// Hook the baseTheme_init function to the 'after_setup_theme' action
add_action('after_setup_theme', 'baseTheme_init');