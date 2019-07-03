<?php
  function register_acf_block_types() {
    // Cards
    acf_register_block_type(
      array(
        'name'              => 'card',
        'title'             => __('Card'),
        'description'       => __('A custom card block.'),
        'render_template'   => 'template-parts/blocks/card/card.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'card' ),
      )
    );

    // Slideshow
    acf_register_block_type(
      array(
        'name'              => 'slideshow',
        'title'             => __('Slideshow'),
        'description'       => __('A custom slideshow block.'),
        'render_template'   => 'template-parts/blocks/slideshow/slideshow.php',
        'category'          => 'formatting',
        'icon'              => 'slides',
        'keywords'          => array( 'slideshow', 'gallery' ),
      )
    );
  }

  // Check if function exists and hook into setup.
  if(function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
  }