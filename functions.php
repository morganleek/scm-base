<?php
  /**
  * Author: Morgan Leek
  * URL: morganleek.me
  */

  $SCM_VERSION = "1.0.1562156847";

  // Theme Setup
  function scm_setup() {
    add_editor_style( 'css/screen-editor.css' );
  }
  add_action('init', 'scm_setup' );

  // Enqueue Styles
  function scm_enqueue_styles() {
    global $SCM_VERSION;

    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/screen.css', array('parent-style'), $SCM_VERSION);
  }
  add_action('wp_enqueue_scripts', 'scm_enqueue_styles' );

  // Enqueue Scripts
  function scm_enqueue_scripts() {
    global $SCM_VERSION;

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_stylesheet_directory_uri() . '/bower_components/jQuery/dist/jquery.min.js', array(), '3.4.1');
    
    wp_register_script('child-scripts', get_stylesheet_directory_uri() . '/js/theme-min.js', array('jquery'), $SCM_VERSION);
    wp_enqueue_script('child-scripts');
  }
  add_action('wp_enqueue_scripts', 'scm_enqueue_scripts');

  // ACF Blocks
  require get_stylesheet_directory() . '/inc/acf-blocks.php';

