<?php
  function register_acf_block_types() {
    // register a testimonial block.
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
  }

  // Check if function exists and hook into setup.
  if(function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
  }