<?php

/**
 * Slideshow Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slideshow-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slideshow';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$slides = get_field('slideshow');

// $background_color = get_field('background_color')? : '#ffffff';
// $text_color = get_field('text_color')? : '#000000';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if($slides) {
    print '<div class="flexslider">';
      print '<ul class="slides">';
        foreach($slides as $s) {
          print '<li><img src="' . $s['image']['url'] . '"></li>';
        }
      print '</ul>';
    print '</div>';
  } ?>
</div>