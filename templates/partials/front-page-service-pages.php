<?php

$args = array(
  'posts_per_page' => '4',
  'post_type' => 'page',
  'orderby' => 'date',
  'order' => 'ASC',
  'post_status' => 'publish',
  'meta_query' => array(
    array(
      'key' => '_wp_page_template',
      'value' => 'templates/template-services.php',
    )
  )
);

$service_pages = new WP_Query($args);

?>

<?php if($service_pages->have_posts()) : ?>
<div class="tiles">
<?php while($service_pages->have_posts()) : $service_pages->the_post(); ?>
  <article>
    <?php the_post_thumbnail('medium', array('style' => 'position: absolute; left: 0; top: 0; width: 100%; height: 100%')) ?>
    <header class="major">
      <h3><?= carbon_get_the_post_meta('short-title') ?></h3>
      <p><?= carbon_get_the_post_meta('short-desc') ?></p>
    </header>
    <a href="<?= the_permalink() ?>" aria-label="Title" class="link primary"></a>
  </article>
<?php endwhile; ?>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>