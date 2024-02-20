<html>

<head>
    <?php wp_head() ?>
</head>

<body>
    <?php wp_body_open(); ?>

    <header class="header">
        <div class="column-50">
            <?php
            $menu = array(
                'theme_location' => 'huvudmeny',
                'menu_id' => 'primary-menu',
                'container' => 'nav',
                'container_class' => 'menu'
            );

            wp_nav_menu($menu);
            ?>
        </div>

        <div class="column-60">
            <?php
            $menu = array(
                'theme_location' => 'header-icon',
                'menu_id' => 'header-Icon',
                'container' => 'nav',
                'container_class' => 'menu'
            );

            wp_nav_menu($menu);
            ?>
        </div>
    </header>

    <div class="banner">
    <?php if ( is_shop() ) : ?>
        <h3>Shop</h3>
    <?php else : ?>
        <h3><?php echo esc_html( get_the_title() ); ?></h3>
    <?php endif; ?>
    <p>
        <a href="<?php echo esc_url( home_url() ); ?>">Home</a> &gt; <?php
        if ( is_single() ) {
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                $category_names = array();
                foreach ( $categories as $category ) {
                    $category_names[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                }
                echo implode( ' &gt; ', $category_names );
            }
        } elseif ( is_page() ) {
            global $post;
            $ancestors = get_post_ancestors( $post->ID );
            if ( ! empty( $ancestors ) ) {
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    echo '<a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a> &gt; ';
                }
            }
            echo esc_html( get_the_title() );
        } elseif ( is_category() ) {
            single_cat_title();
        } elseif ( is_tag() ) {
            single_tag_title();
        } elseif ( is_author() ) {
            echo esc_html( get_the_author() );
        } elseif ( is_search() ) {
            echo esc_html( 'Search results for "' . get_search_query() . '"' );
        } elseif ( is_404() ) {
            echo esc_html( 'Page not found' );
        }
        ?>
    </p>
</div>

</body>

</html>