<?php

    add_action('wp_enqueue_scripts', 'childhood_styles');
    add_action('wp_enqueue_scripts', 'childhood_scripts');
    
    function childhood_styles() {
        wp_enqueue_style( 'childhood-style', get_stylesheet_uri(), [], null, all);
    }

    function childhood_scripts() {
        wp_enqueue_script( 'childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', [], null, true );

        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js');
        wp_enqueue_script( 'jquery' );
    };
    
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );


