<?php

// WordPress checks if you are admin
if (is_admin() == false) {
    return;
}

// Adress setting
function custom_settings_page_output()
{
?>
    <div class="wrap">
        <h1>Store Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_settings_group');
            do_settings_sections('custom-settings');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

// Formuläret
function custom_address_field()
{
    $address = get_option('custom_address');
    echo '<input type="text" name="custom_address" value="' . esc_attr($address) . '" />';
}

// Registrerar
function custom_settings_init()
{
    register_setting('custom_settings_group', 'custom_address');

    add_settings_section('custom_settings_section', 'Address', 'custom_settings_section_callback', 'custom-settings');
    add_settings_field('custom_address_field', 'Enter Address', 'custom_address_field', 'custom-settings', 'custom_settings_section');

    register_setting( 'custom_settings_group', 'custom_address' );
    register_setting( 'custom_settings_group', 'custom_country_code' );

    add_settings_section( 'custom_settings_section', 'Address Settings', 'custom_settings_section_callback', 'custom-settings' );
    add_settings_field( 'custom_address_field', 'Address', 'custom_address_field', 'custom-settings', 'custom_settings_section' );
    add_settings_field( 'custom_country_code_field', 'Country Code', 'custom_country_code_field', 'custom-settings', 'custom_settings_section' );

    register_setting('custom_settings_group', 'newsletter_heading');
    register_setting('custom_settings_group', 'newsletter_form_action');
    register_setting('custom_settings_group', 'newsletter_form_method');
    register_setting('custom_settings_group', 'newsletter_email_placeholder');
    register_setting('custom_settings_group', 'newsletter_button_text');

    add_settings_section('custom_settings_section', 'Newsletter Settings', 'custom_settings_section_callback', 'custom-settings');

    add_settings_field('newsletter_heading_field', 'Newsletter Heading', 'newsletter_heading_field', 'custom-settings', 'custom_settings_section');
    add_settings_field('newsletter_email_placeholder_field', 'Email Placeholder', 'newsletter_email_placeholder_field', 'custom-settings', 'custom_settings_section');
    add_settings_field('newsletter_button_text_field', 'Button Text', 'newsletter_button_text_field', 'custom-settings', 'custom_settings_section');

    register_setting('custom_settings_group', 'links_heading');
    register_setting('custom_settings_group', 'help_heading');

    add_settings_section('custom_settings_section', 'Footer Settings', 'custom_settings_section_callback', 'custom-settings');

    add_settings_field('links_heading_field', 'Links', 'links_heading_field', 'custom-settings', 'custom_settings_section');
    add_settings_field('help_heading_field', 'Help', 'help_heading_field', 'custom-settings', 'custom_settings_section');

    register_setting('custom_settings_group', 'copyright_text');
    add_settings_field('copyright_text_field', 'Copyright Text', 'copyright_text_field', 'custom-settings', 'custom_settings_section');

    register_setting('custom_settings_group', 'footer_div_1_heading');
    register_setting('custom_settings_group', 'footer_div_1_content');
    register_setting('custom_settings_group', 'footer_div_2_heading');
    register_setting('custom_settings_group', 'footer_div_2_content');
    register_setting('custom_settings_group', 'footer_div_3_heading');
    register_setting('custom_settings_group', 'footer_div_3_content');

    add_settings_section('footer_div_section', 'Footer Div Settings', 'footer_div_section_callback', 'custom-settings');

    add_settings_field('footer_div_1_heading_field', 'Footer Div 1 Heading', 'footer_div_1_heading_field', 'custom-settings', 'footer_div_section');
    add_settings_field('footer_div_1_content_field', 'Footer Div 1 Content', 'footer_div_1_content_field', 'custom-settings', 'footer_div_section');
    add_settings_field('footer_div_2_heading_field', 'Footer Div 2 Heading', 'footer_div_2_heading_field', 'custom-settings', 'footer_div_section');
    add_settings_field('footer_div_2_content_field', 'Footer Div 2 Content', 'footer_div_2_content_field', 'custom-settings', 'footer_div_section');
    add_settings_field('footer_div_3_heading_field', 'Footer Div 3 Heading', 'footer_div_3_heading_field', 'custom-settings', 'footer_div_section');
    add_settings_field('footer_div_3_content_field', 'Footer Div 3 Content', 'footer_div_3_content_field', 'custom-settings', 'footer_div_section');
}
   


    

add_action('admin_init', 'custom_settings_init');


function custom_settings_section_callback()
{
    echo '<p>Enter your address below:</p>';
}


function custom_country_code_field()
{
    $country_code = get_option('custom_country_code');
    echo '<input type="text" name="custom_country_code" value="' . esc_attr($country_code) . '" />';
}


function newsletter_heading_field()
{
    $value = get_option('newsletter_heading');
    echo '<input type="text" name="newsletter_heading" value="' . esc_attr($value) . '" />';
}

function newsletter_form_action_field()
{
    $value = get_option('newsletter_form_action');
    echo '<input type="text" name="newsletter_form_action" value="' . esc_attr($value) . '" />';
}

function newsletter_form_method_field()
{
    $value = get_option('newsletter_form_method');
    echo '<input type="text" name="newsletter_form_method" value="' . esc_attr($value) . '" />';
}

function newsletter_email_placeholder_field()
{
    $value = get_option('newsletter_email_placeholder');
    echo '<input type="text" name="newsletter_email_placeholder" value="' . esc_attr($value) . '" />';
}

function newsletter_button_text_field()
{
    $value = get_option('newsletter_button_text');
    echo '<input type="text" name="newsletter_button_text" value="' . esc_attr($value) . '" />';
}


function links_heading_field()
{
    $value = get_option('links_heading');
    echo '<input type="text" name="links_heading" value="' . esc_attr($value) . '" />';
}

function help_heading_field()
{
    $value = get_option('help_heading');
    echo '<input type="text" name="help_heading" value="' . esc_attr($value) . '" />';
}

function copyright_text_field()
{
    $value = get_option('copyright_text');
    echo '<input type="text" name="copyright_text" value="' . esc_attr($value) . '" />';
}

function footer_div_section_callback()
{
    echo '<p>Enter details for the footer divs below:</p>';
}
function footer_div_1_heading_field()
{
    $heading = get_option('footer_div_1_heading');
    echo '<input type="text" name="footer_div_1_heading" value="' . esc_attr($heading) . '" />';
}

function footer_div_1_content_field()
{
    $content = get_option('footer_div_1_content');
    echo '<textarea name="footer_div_1_content">' . esc_textarea($content) . '</textarea>';
}

function footer_div_2_heading_field()
{
    $heading = get_option('footer_div_2_heading');
    echo '<input type="text" name="footer_div_2_heading" value="' . esc_attr($heading) . '" />';
}

function footer_div_2_content_field()
{
    $content = get_option('footer_div_2_content');
    echo '<textarea name="footer_div_2_content">' . esc_textarea($content) . '</textarea>';
}

function footer_div_3_heading_field()
{
    $heading = get_option('footer_div_3_heading');
    echo '<input type="text" name="footer_div_3_heading" value="' . esc_attr($heading) . '" />';
}

function footer_div_3_content_field()
{
    $content = get_option('footer_div_3_content');
    echo '<textarea name="footer_div_3_content">' . esc_textarea($content) . '</textarea>';
}
// Upprepa detta mönster för de andra två divarna (div 2 och div 3)...


?>