<?php

use Tenacity\Setup;
use Tenacity\Wrapper;

$sidebar = Setup\display_sidebar();

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body id="page" <?php body_class(($sidebar) ? 'has-sidebar body' : 'body'); ?>>
    <div id="wrapper">
      <?php do_action('before_main'); ?>
        <main class="main">
          <?php
            do_action('before_header');
            get_template_part('templates/header');
            do_action('after_header');
          ?>
          <?php
            do_action('before_main_content');
            include Wrapper\template_path();
            do_action('after_main_content');
          ?>
        </main>
      <?php do_action('after_main'); ?>

      <?php if($sidebar) : ?>
        <?php do_action('before_sidebar'); ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside>
        <?php do_action('after_sidebar'); ?>
      <?php endif; ?>
      <?php
      do_action('get_footer');
      get_template_part('templates/footer');
    ?>
    </div>
    <?php if(has_nav_menu('primary_navigation')) : ?>
    <nav id="menu">
      <div class="inner">
        <?php wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'depth' => 1,
          'container' => '',
          'menu_class' => 'links'
        ]); ?>
        </div>
        <button class="close">Close</button>
    </nav>
    <?php endif; ?>
    <?php wp_footer(); ?>
  </body>
</html>