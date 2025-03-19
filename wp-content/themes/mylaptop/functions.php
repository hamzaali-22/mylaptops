<?php 
/*
* 
* functions.php
*
*/

    /**** 1.0 DEFINE CONSTANT ****/
    define( 'THEMEROOT', get_stylesheet_directory_uri() );
    define( 'STYLES', THEMEROOT . '/assets/css');
    define( 'SCRIPTS', THEMEROOT . '/assets/js');
    define( 'IMAGES', THEMEROOT . '/assets/images');

    /**** 2.0 LOAD THE CUSTOM STYLESHEETS AND SCRIPTS. ****/
    if ( !function_exists( 'mylaptops_scripts' ) ) {
        function mylaptops_scripts() {
            // load the stylesheets.
            wp_enqueue_style( 'fontawesome', STYLES . '/font-awesome.min.css', false, false, false );
            wp_enqueue_style( 'bootstrap', STYLES . '/bootstrap.css', false, false, false );
            wp_enqueue_style( 'flexslider', STYLES . '/flexslider.css', false, false, false );
            wp_enqueue_style( 'main', STYLES . '/main.css', false, false, false );
            wp_enqueue_style( 'custom', STYLES . '/custom.css', false, false, false );

            // load the scripts.
            wp_enqueue_script( 'bootstrap', SCRIPTS . '/bootstrap.js', [ 'jquery' ], false, true );
            wp_enqueue_script( 'plugins', SCRIPTS . '/plugins.js"', [ 'jquery' ], false, true );
            wp_enqueue_script( 'flexslider', SCRIPTS . '/jquery.flexslider.js', [ 'jquery' ], false, true );
            
            // The Comment Reply Script.
            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
            }
        }
        add_action( 'wp_enqueue_scripts', 'mylaptops_scripts' );
    }

    /**** 3.0 SET UP THEME DEFAULT AND REGISTER VARIOUS SUPPORTED FEATURES. ****/
    if ( !function_exists( 'mylaptops_setup') ) {
        function mylaptops_setup() {
            // make the theme available for translation.
            $lang_dir = THEMEROOT . '/assets/language';
            load_theme_textdomain( 'mylaptops', $lang_dir );

            // add support for automatic feed links.
            add_theme_support( 'automatic_feed_links' );

            // add support for post thumbnails.
            add_theme_support( 'post-thumbnails' );
            add_image_size( 'feature_img', 380, 190, true );
            add_image_size( 'single_img', 925, 463, true );

            // add support for post formats.
            add_theme_support( 'post-formats', [
                'audio', 'video', 'image', 'gallery', 'quote'
            ] );

            // register navigation menu.
            register_nav_menus( [
                'top-menu' => __('Top Navigation', 'mylaptops'),
                'footer-menu' => __('Footer Navigation', 'mylaptops')
            ] );
        }
        add_action( 'after_setup_theme', 'mylaptops_setup' );
    }

    /**** 4.0 DISPLAY POST META FOR A SPCIFIC POST. ****/
    if ( !function_exists( 'mylaptops_post_meta' ) ) {
        function mylaptops_post_meta() {
            echo '<div class="large-post-meta">';
            if ( get_post_type() === 'post') {
                // is the post sticky mark it.
                if ( is_sticky()) {
                    echo '<span><i class="fa fa-sticky-note-o"></i> ' . __( 'Sticky', 'mylaptops') . '</span>';
                    echo '<small class="hidden-xs">&#124;</small>';
                }
                // get the date.
                echo '<span><i class="fa fa-clock-o"></i> ' . get_the_date() . '</span>';
                echo '<small class="hidden-xs">&#124;</small>';
                
                // get the author.
                printf(
                    '<span><i class="fa fa-user"></i> <a href="%1$s">%2$s</a></span>',
                    esc_url( get_author_posts_url( get_the_author_meta( 'ID') ) ),
                    get_the_author()
                );
                echo '<small class="hidden-xs">&#124;</small>';

                // get the tags.
                $tag_list = get_the_tag_list( '', ', ' );
                if ($tag_list) {
                    echo '<span><i class="fa fa-tags"></i> ' . $tag_list . '</span>';
                    echo '<small class="hidden-xs">&#124;</small>';
                }
                // comments link.
                if ( comments_open() ) {
                    echo '<span class="hidden-xs"><i class="fa fa-comments-o"></i> ';
                    comments_popup_link( 
                        __( 'No comment', 'mylaptops'), 
                        __( 'One comment', 'mylaptops'), 
                        __( 'View all % comment', 'mylaptops')
                    );
                    echo '</span>';
                    echo '<small class="hidden-xs">&#124;</small>';
                }
                
                // edit link.
                if ( is_user_logged_in() ) {
                    echo '<span><i class="fa fa-pencil"></i> ';
                    edit_post_link( __( 'Edit Laptop', 'mylaptops'), '<span>', '</span>' );
                    echo '</span>';
                } 
            }
            echo '</div>';
        }
    }
    /**** 5.0 Widgets Area. ****/
    if ( !function_exists( 'widgets_area' ) ) {
        function widgets_area() {
            register_sidebar([
                'id'            => 'footer-1',
                'name'          => __( 'Footer Column One', 'mylaptops' ),
                'description'   => __( 'Appears in footer area.' ),
                'before_widget' => '<ul class="check">',
                'after_widget'  => '</ul>',
                'before_title'  => '<div class="widget-title"><h4>',
                'after_title'   => '</h4><hr></div>',
            ]);
            register_sidebar([
                'id'            => 'footer-2',
                'name'          => __( 'Footer Column Two', 'mylaptops' ),
                'description'   => __( 'Appears in footer area.' ),
                'before_widget' => '<ul class="check">',
                'after_widget'  => '</ul>',
                'before_title'  => '<div class="widget-title"><h4>',
                'after_title'   => '</h4><hr></div>',
            ]);
        }
        add_action( 'widgets_init', 'widgets_area' );
    }

    /**** 6.0 Display Navigation to the NEXT/PREVIOUS set of posts. ****/
    if ( !function_exists('mylaptops_paging_nav') ) {
        function mylaptops_paging_nav() {
            echo '<ul>';
            if ( get_previous_posts_link() ) 
            {
                echo '<li>';
                    previous_posts_link( __( 'Newer Laptop &rarr;') );
                echo '</li>';
            }
            if ( get_next_posts_link() ) 
            {
                echo '<li>';
                    next_posts_link( __( '&larr; Older Laptop ') );
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    /**** 7.0 Numbered Paginations. ****/
    if ( !function_exists( 'numbered_pagination' ) ) {
        function numbered_pagination() {
            echo '<div class="pagination-wrapper">';
            $args = [
                'prev_next' => false,
                'type' => 'array'
            ];
            $paginates = paginate_links( $args );
            if ( is_array($paginates) ) {
                echo '<nav><ul class="pagination">';
                foreach ($paginates as $paginate) {
                    if ( strpos($paginate, 'current'))
                        echo '<li><a href="#">' . $paginate . '</a></li>';
                    else
                        echo '<li>' . $paginate . '</li>';
                }
                echo '</ul></nav>';
            }
            echo '</div>';
        }
    }

        /*=============================================
        = WORDPRESS ADMIN PANEL CUSTOMIZATION =
    =============================================*/
    /*----------  1.0 WORKING WITH MENUS.  ----------*/
    function edit_wp_menu()
    {
        // https://developer.wordpress.org/reference/functions/remove_menu_page/
        // remove menu
        remove_menu_page( 'edit-comments.php' );
        
        // https://developer.wordpress.org/reference/functions/add_menu_page/
        // add menu
        add_menu_page( 
            'New Comments', 
            'Laptop Comments', 
            'manage_options', 
            'edit-comments.php', 
            '', 
            '', 
            6 
        );
        
        // change the menu order
        function change_menu_order()
        {
            // https://developer.wordpress.org/reference/functions/remove_menu_page/
            return [
                'index.php',
                'themes.php',
                'edit.php',
                'edit.php?post_type=page',
                'upload.php'
            ];
        }
        add_filter( 'menu_order', 'change_menu_order' );
        add_filter( 'custom_menu_order', '__return_true' );
        
        // rename posts to laptop | your any brand name
        global $menu;
        global $submenu;
        // print_r($submenu);
        $menu[5][0] = 'Laptops';
        $submenu['edit.php'][5][0] = 'All Laptops';
        $submenu['edit.php'][10][0] = 'Add New Laptop';
        $submenu['edit.php'][15][0] = 'Brands';
        $submenu['edit.php'][16][0] = 'Keywords';
    }

    // rename posts to laptop into post section | your any brand name into post section.
    function change_post_labels()
    {
        global $wp_post_types;
        // print_r($wp_post_types);
        $labels = $wp_post_types['post']->labels;
        $labels->name = 'Laptops';
            $labels->singular_name = 'Laptop';
            $labels->add_new = 'Add New';
            $labels->add_new_item = 'Add New Laptop';
            $labels->edit_item = 'Edit Laptop';
            $labels->new_item = 'New Laptop';
            $labels->view_item = 'View Laptop';
            $labels->view_items = 'View Laptops';
            $labels->search_items = 'Search Laptops';
            $labels->not_found = 'No Laptops found.';
            $labels->not_found_in_trash = 'No Laptops found in Trash.';
            $labels->all_items = 'All Laptops';
            $labels->archives = 'Laptop Archives';
            $labels->attributes = 'Laptop Attributes';
            $labels->insert_into_item = 'Insert into Laptop';
            $labels->uploaded_to_this_item = 'Uploaded to this Laptop';
            $labels->filter_items_list = 'Filter Laptops list';
            $labels->items_list_navigation = 'Laptops list navigation';
            $labels->items_list = 'Laptops list';
            $labels->item_published = 'Laptop published.';
            $labels->item_published_privately = 'Laptop published privately.';
            $labels->item_reverted_to_draft = 'Laptop reverted to draft.';
            $labels->item_scheduled = 'Laptop scheduled.';
            $labels->item_updated = 'Laptop updated.';
            $labels->item_link = 'Laptop Link';
            $labels->item_link_description = 'A link to a Laptop.';
            $labels->menu_name = 'Laptops';
            $labels->name_admin_bar = 'Laptop';
    }

    add_action( 'admin_menu', 'edit_wp_menu' );
    add_action( 'init', 'change_post_labels' );

    /*----------  2.0 THE DASHBOARD.  ----------*/
    function customize_dashboard()
    {
        // remove meta box and welcome panel
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
        remove_action( 'welcome_panel', 'wp_welcome_panel' );

        wp_add_dashboard_widget( 
            'date_dashboard_widget', 
            'Today', 
            'date_dashboard_widget_function'
        );

        function date_dashboard_widget_function()
        {
            echo 'Hi, Today is ' . date( 'l\, F jS Y');
        }
    }
    add_action( 'wp_dashboard_setup', 'customize_dashboard' );

    /*----------  3.0 THE COLUMNS.  ----------*/
    function customize_post_listing_cols( $columns )
    {
        unset($columns['tags']);
        unset($columns['comments']);
        return $columns;
    }
    function customize_page_listing_cols( $columns )
    {
        unset($columns['tags']);
        unset($columns['comments']);
        return $columns;
    }
    add_action( 'manage_posts_columns', 'customize_post_listing_cols' );
    add_action( 'manage_pages_columns', 'customize_page_listing_cols' );

    /*----------  4.0 THE SMALLER CHANGES.  ----------*/
    function change_admin_footer()
    {
        echo 'Copyrights &copy; All rights reserved 2025 by Students of AFA';
    }
    add_action( 'admin_footer_text', 'change_admin_footer' );

    function remove_footer_version()
    {
        remove_filter( 'update_footer', 'core_update_footer' );
    }

    add_action( 'admin_menu', 'remove_footer_version' );

    /*----------  5.0 CHANGE YOUR COLOR SCHEME.  ----------*/
    function add_color_schemes()
    {
        $dir = THEMEROOT;
        wp_admin_css_color( 
            'mylaptops', 
            __( 'My Laptops'), 
            $dir . '/assets/css/colors.min.css', 
            ['#336699', '#996633', '#369369', '#963963']
        );
    }
    add_action( 'admin_init', 'add_color_schemes' );

    /*----------  6.0 CHANGE WP LOGIN LOGO.  ----------*/
    function change_login_logo() { ?>
        <!-- https://codex.wordpress.org/Customizing_the_Login_Form -->
        <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo IMAGES ?>/logo.png);
            height: 65px;
            width: 320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
    <?php }

    add_action( 'login_enqueue_scripts', 'change_login_logo' );

    function my_login_logo_url() {
        return home_url();
    }
    add_filter( 'login_headerurl', 'my_login_logo_url' );

    function my_login_stylesheet() {
        wp_enqueue_style( 'custom-login', STYLES . '/style-login.css' );
        wp_enqueue_script( 'custom-login', SCRIPTS . '/style-login.js' );
    }
    add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

    function disable_reset_password()
    {
        return false;
    }
    add_filter( 'allow_password_reset', 'disable_reset_password' );

    function remove_shake()
    {
        remove_action( 'login_head', 'wp_shake_js', 12 );
    }
    add_action( 'login_head', 'remove_shake' );

    /*----------  8.0 CUSTOMIZE YOUR ADMIN BAR.  ----------*/
    function remove_admin_bar_links()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
    }
    add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

    function add_admin_bar_links()
    {
        global $wp_admin_bar;
        $wp_admin_bar->add_menu([
            'id' => 'afa',
            'title' => 'Hamza',
            // 'href' => 'https://www.alfateemacademy.com/',
            'meta' => ['target' => '_blank']
        ]);
    }

    add_action( 'admin_bar_menu', 'add_admin_bar_links' );

    function admin_bar_css() { ?>
        <style>
            #wpadminbar { background-color: red; }
        </style>
    <?php }

    add_action( 'admin_head', 'admin_bar_css' );
?>