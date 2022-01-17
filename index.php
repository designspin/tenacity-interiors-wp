<?php if (!have_posts()) : ?>
  <div class="container-fluid">
    <p><?php _e('Sorry, no results were found.', 'tenacity_interiors'); ?></p>
  </div>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() !== 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>