<html>

<head>
    <?php wp_head() ?>
</head>

<body>
    <?php wp_body_open(); ?>

    <header>

        <div class="column-50">
            <?php

            // Define parameters for the navigation menu
            $menu = array(
                'theme_location' => 'huvudmeny',
                'menu_id' => 'primary-menu',
                'container' => 'nav',
                'container_class' => 'menu'
            );

            // Generate and display the navigation menu
            wp_nav_menu($menu);
            ?>
        </div>

        <div class="column-60">
            <?php

            // Define parameters for the navigation menu
            $menu = array(
                'theme_location' => 'header-icon',
                'menu_id' => 'header-Icon',
                'container' => 'nav',
                'container_class' => 'menu'
            );

            // Generate and display the navigation menu
            wp_nav_menu($menu);
            ?>
        </div>

    </header>