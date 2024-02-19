<footer>
    <div class="footer-text">
        <div class="footer-column">
            <h3><?php echo get_option('footer_div_1_heading'); ?></h3>
            <p><?php echo get_option('footer_div_1_content'); ?></p>
        </div>
        <div class="footer-column">
            <h3><?php echo get_option('footer_div_2_heading'); ?></h3>
            <p><?php echo get_option('footer_div_2_content'); ?></p>
        </div>
        <div class="footer-column">
            <h3><?php echo get_option('footer_div_3_heading'); ?></h3>
            <p><?php echo get_option('footer_div_3_content'); ?></p>
        </div>
    </div>

    <div class="footer-content">
        <div class="footer-left">
            <p><?php echo get_option('custom_address'); ?></p>
            <p><?php echo get_option('custom_country_code'); ?></p>
        </div>
        <div class="footer-middle">
            <?php
            $links_heading = get_option('links_heading');
            $help_heading = get_option('help_heading');
            ?>

            <div class="footer-section">
                <h3><?php echo esc_html($links_heading); ?></h3>
                <nav class="footer-menu">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'huvudmeny'
                    )); ?>
                </nav>
            </div>
            <div class="footer-section">
                <h3><?php echo esc_html($help_heading); ?></h3>
                <nav class="footer-menu">
                    <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
                </nav>
            </div>
        </div>

        <div class="footer-right">
            <h3><?php echo get_option('newsletter_heading'); ?></h3>
            <form action="<?php echo esc_url(get_option('newsletter_form_action')); ?>" method="<?php echo esc_attr(get_option('newsletter_form_method')); ?>" class="newsletter-form">
                <input type="email" name="email" placeholder="<?php echo esc_attr(get_option('newsletter_email_placeholder')); ?>" required>
                <button type="submit"><?php echo esc_html(get_option('newsletter_button_text')); ?></button>
            </form>
        </div>
    </div>
    
    <div class="copyright">
        <?php echo date("Y"); ?>
        <?php echo get_option('copyright_text'); ?>
    </div>
    

</footer>