<section id="banner" class="style2">
  <?php the_post_thumbnail('2048x2048', array('style' => 'position:absolute; left: 0; top: 0; width:100%; height: 100%; object-fit: cover; object-position: center center;')); ?>
  <div class="inner">
    <header class="major">
      <h1><?php the_title() ?></h1>
      <div style="font-size: 0.8em;">Posted: <?php get_template_part('templates/partials/post-date'); ?>, Category: <?php get_template_part('templates/partials/cat-link'); ?></div>
    </header>
  </div>
</section>