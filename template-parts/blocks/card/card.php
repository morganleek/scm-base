<?php

/**
 * Card Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'card';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$image = get_field('image') ?: false;
$title = get_field('title') ?: '';
$content = get_field('content') ?: '';
$link = get_field('link') ?: false;

$background_color = get_field('background_color')? : '#ffffff';
$text_color = get_field('text_color')? : '#000000';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if($image) { ?>
    <div class="card-image">
      <img src="<?php print $image['url']; ?>">
    </div>
  <?php } ?>
  <div class="card-copy">
    <?php print (!empty($title)) ? '<h2>' . $title . '</h2>' : ''; ?>
    <div class="content">
      <?php print $content; ?>
    </div>
    <?php if($link) { ?>
      <?php print '<a class="button" href="' . $link['url'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>
    <?php } ?>
  </div>
  <style type="text/css">
    #<?php echo $id; ?> {
      background: <?php echo $background_color; ?>;
      color: <?php echo $text_color; ?>;
    }
  </style>
</div>