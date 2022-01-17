<?php do_action('before_post'); ?>
<section <?php post_class('card'); ?>>
  <?php if(has_post_thumbnail()) : ?>
  <a class="image" href="<?= get_the_permalink(); ?>">
    <div style="position: relative; overflow: hidden; max-height: 450px; width: 100%; height: 100%;">
      <div style="width: 100%; padding-bottom: 67.3333%;"></div>
      <?php the_post_thumbnail('medium', array('style' => 'position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; object-fit: cover; object-position: center center;')) ?>
    </div>
  </a> 
  <?php endif; ?> 
  <div class="content">
    <div class="inner">
      <header class="major">
        <h3><?php the_title(); ?></h3>
        <div style="font-size: 0.8em;">Posted: <?php get_template_part('templates/partials/post-date'); ?>, Category: <?php get_template_part('templates/partials/cat-link'); ?></div>
      </header>
      <?php the_excerpt(); ?>
      <ul class="actions">
        <li><a href="<?= get_the_permalink() ?>" class="button">Read More</a></li>
      </ul>
  </div>
</section>
<?php do_action('after_post'); ?>