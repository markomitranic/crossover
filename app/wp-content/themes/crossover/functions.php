<?php

    add_action( 'wp_enqueue_scripts', 'custom_styles' );
    add_action( 'wp_enqueue_scripts', 'custom_scripts' );
    if (!is_admin()) {
        add_action('wp_enqueue_scripts', 'deregisterJQuery');
    }
    function custom_styles() {
        wp_register_style( 'core-css', get_template_directory_uri() . '/css/style.css' );
        wp_enqueue_style( 'core-css' );
    }
    function custom_scripts() {
        wp_register_script( 'compiled-scripts', get_template_directory_uri() . '/scripts/scripts.min.js', '',1.0, true );
        wp_enqueue_script( 'compiled-scripts' );
    }
    function deregisterJQuery() {
        wp_deregister_script('jquery');
    }

    /**
     * Register navigation menus
     */
    add_action( 'init', 'register_my_menus' );
    function register_my_menus() {
        register_nav_menus( array(
            'main-menu' => 'Main Menu',
            'copyright-menu' => 'Copyright Menu',
            'contact-header-menu' => 'Contact Header Menu',
        ) );
    }

    /**
     * $name, $min-width, $min-height, $crop
     **/
    add_image_size( 'hero', 1920, 1920, false );

    /**
     *  Set up ACF Theme Options page.
     **/
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'  =>  'Template Options',
            'menu_title'  =>  'Template Options',
            'menu_slug'   =>  'template-options',
            'capability'  =>  'edit_posts',
            'parent_slug' =>  'themes.php',
            'position'    =>  false,
            'icon_url'    =>  false
        ));
    }
    add_action('acf/init', 'my_acf_init');
    function my_acf_init() {
        acf_update_setting('google_api_key', 'xxxxxxxxxxxxxxxx');
    }

    /**
     * We all need a debug method. The second parameter is optional
     * and decides if php is set to die after printing the var.
     */
    function dd($input, $die = false) {
        echo '<pre>';
        if (is_bool($input)) {
            var_dump($input);
        } else {
            print_r($input);
        }
        echo '</pre>';
        if ($die) {
            die();
        }
    }


    /**
     * Need to use permanent redirection? Easy peasy.
     */
    function Redirect($url, $permanent = 302) {
        header('Location: ' . $url, true, $permanent);
        exit();
    }

    /**
     * A propper way to implement WP Titles.
     */
    add_filter('wp_title', 'format_page_title');
    function format_page_title($title) {
        $output = $title;
        $output .= ($title == '') ? '' : ' ~ ';
        $output .= get_bloginfo('description');
        return $output;
    }

    /**
     * Disable galleries support
     */
    add_action( 'admin_head_media_upload_gallery_form', 'mfields_remove_gallery_setting_div' );
    if( !function_exists( 'mfields_remove_gallery_setting_div' ) ) {
        function mfields_remove_gallery_setting_div() {
            print '
                <style type="text/css">
             #gallery-settings *{
                   display:none;
               }
            </style>';
        }
    }

    /**
     * WP_Fill website advises us to disable <p> tags on images.
     */
     add_filter('the_content', 'filter_ptags_on_images');
    function filter_ptags_on_images($content){
        return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');

    /**
     * Create an excerpt for provided text
     * @param $text
     * @param int $length
     * @return bool|string
     */
    function excerpt($text, $length = 256) {
        $text = wp_strip_all_tags($text);
        $text = trim(preg_replace('/\s+/', ' ', $text)); // Remove new lines
        $text = substr($text, 0, $length);
        return $text;
    }
