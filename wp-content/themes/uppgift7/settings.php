<?php

// WordPress checks if you are admin
if (is_admin() == false) {
    return;
}

// This is going to add a menu to WordPress settings
function baseTheme_add_settings()
{
    add_submenu_page(
        "options-general.php",
        "Store",
        "Store",
        "edit_pages",
        "store",
        "baseTheme_add_settings_callback"
    );
}

add_action('admin_menu', 'baseTheme_add_settings');

function baseTheme_add_settings_callback()
{
?>
    <div class="wrap">
        <h2>Store Settings</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields("store");
            do_settings_sections("store");
            submit_button();
            ?>
        </form>
    </div>
<?php
}

// This registers the settings that will be available.
function baseTheme_add_settings_init()
{
    add_settings_section(
        'store_general',
        'General',
        'baseTheme_add_settings_section_general',
        'store'
    );

    // Register store_message setting
    register_setting(
        "store",
        "store_message"
    );

    // Add settings field for store_message
    add_settings_field(
        "store_message",
        "Store Message",
        "baseTheme_section_setting",
        "store",
        "store_general",
        array(
            "option_name" => "store_message",
            "option_type" => "text"
        )
    );

    // Register store_open setting
    register_setting(
        "store",
        "store_open"
    );

    // Add settings field for store_open
    add_settings_field(
        "store_open",
        "OpenTime",
        "baseTheme_section_setting",
        "store",
        "store_general",
        array(
            "option_name" => "store_open",
            "option_type" => "time"
        )
    );

    // Register store_open setting
    register_setting(
        "store",
        "store_close"
    );

    // Add settings field for store_open
    add_settings_field(
        "store_close",
        "CloseTime",
        "baseTheme_section_setting",
        "store",
        "store_general",
        array(
            "option_name" => "store_close",
            "option_type" => "time"
        )
    );
}

add_action('admin_init', 'baseTheme_add_settings_init');

// Draw the settings on the page "store"
function baseTheme_add_settings_section_general()
{
    echo "<p> General settings </p>";
}

// Callback function for the settings field (This can be re-used)
function baseTheme_section_setting($args)
{
    $option_name = $args["option_name"];
    $option_type = $args["option_type"];
    $option_value = get_option($option_name);
    echo "<input type='$option_type' name='$option_name' value='$option_value' />";
}

?>