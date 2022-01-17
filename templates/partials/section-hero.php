<section id="banner" class="style2">
  <?php the_post_thumbnail('2048x2048', array('style' => 'position:absolute; left: 0; top: 0; width:100%; height: 100%; object-fit: cover; object-position: center center;')); ?>
  <div class="inner">
    <header class="major">
      <h1><?php the_title() ?></h1>
    </header>
    <div class="content">
      <p><?= carbon_get_the_post_meta('sub-heading') ?></p>
    </div>
  </div>
</section>