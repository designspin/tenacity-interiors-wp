<?php

namespace Tenacity\Setup;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Attach custom post meta
 */

 function attach_post_meta() {

  /**
   * Theme Options
   */
  Container::Make('theme_options', __('Theme Options', 'tenacity_interiors'))
    ->set_page_file('theme-options')
    ->add_fields(array(
      Field::make('text', 'adr_1', 'Address Line 1'),
      Field::make('text', 'adr_2', 'Address Line 2'),
      Field::make('text', 'adr_3', 'Address Line 3'),
      Field::make('text', 'town', 'Town'),
      Field::make('text', 'post_code', 'Post Code'),
      Field::make('text', 'tel', 'Telephone No.'),
      Field::make('text', 'company_no', 'Company No.'),
      Field::make('text', 'vat_no', 'Vat No.'),
      Field::make('text', 'facebook_page', 'Facebook Page'),
      Field::make('text', 'youtube_page', 'Youtube Page'),
      Field::make('text', 'linkedin_page', 'Linkedin Page'),
      Field::make('image', 'default_share_image', 'Default Share Image'),
    ));

    /**
     * Front Page Meta
     */
    Container::Make('post_meta', __('Page Meta', 'tenacity_interiors'))
      ->where('post_type', '=', 'page')
      ->where('post_id', '=', get_option('page_on_front'))
      ->add_fields(array(
        Field::make('text', 'video', 'Youtube Video Code'),
        Field::make('textarea', 'video-caption', 'Video Caption')
      ));
    
    /**
     * Service Page Meta
     */
    Container::Make('post_meta', __('Page Meta', 'tenacity_interiors'))
      ->Where('post_type', '=', 'page')
      ->Where('post_template', '=', 'templates/template-services.php')
      ->add_fields(array(
        Field::make('text', 'short-title', 'Short title'),
        Field::make('text', 'short-desc', 'Short description'),
        Field::make('textarea', 'sub-heading', 'Subheading')
      ));
    
    /**
     * Testimonials post type
     */
    Container::Make('post_meta', __('Page_Meta', 'tenacity_interiors'))
      ->Where('post_type', '=', 'testimonials')
      ->add_fields(array(
        Field::make('text', 'name', 'Name'),
        Field::Make('text', 'location', 'Location')
      ));
}

 add_action('carbon_fields_register_fields', __NAMESPACE__ . '\\attach_post_meta');

/**
 * Theme Setup
 */

function setup() {
  \Carbon_Fields\Carbon_Fields::boot();

  //Make available for translation
  load_theme_textdomain('tenacity_interiors', get_template_directory() . '/lang');

  //Doc title management
  add_theme_support('title-tag');

  //Enable post thumbnails
  add_theme_support('post-thumbnails');

  add_theme_support('responsive-embeds');

  add_image_size('hero-image', 1600, 500, array('center', 'center'));
  //Register navigation menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'tenacity_interiors'),
    'footer_navigation' => __('Footer Navigation', 'tenacity_interiors'),
    'footer_navigation_two' => __('Footer Navigation Two', 'tenacity_interiors')
  ]);

  // Enable HTML5 markup support
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Remove emoji nonsense!
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
  remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  add_filter( 'emoji_svg_url', '__return_false' );

  // Remove WP generator meta
  remove_action('wp_head', 'wp_generator');
  
  // Remove random post link
  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
  add_filter( 'feed_links_show_comments_feed', '__return_false' );
}

add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Theme Assets
 */
add_action('wp_enqueue_scripts', function() {
  $manifest = json_decode(file_get_contents(__DIR__ . '/../build/assets.json', true));
  wp_enqueue_style('theme-css', get_template_directory_uri() . "/build/" . $manifest->{"main.css"},  false, null);
  wp_register_script('theme-js', get_template_directory_uri() . "/build/" . $manifest->{"main.js"}, ['jquery'], null, true);
  
  $data = array(
    'video' => carbon_get_the_post_meta('video'),
  );

  wp_localize_script('theme-js', 'siteData', $data);
  wp_enqueue_script('theme-js');
});

/**
 * Register Sidebars
 */
function widgets_init() {
  register_sidebar([
    'name' => __('Primary', 'tenacity_interiors'),
    'id' => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<div class="widget-heading"><h3>',
    'after_title' => '</h3></div>'
  ]);
}

add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should use a sidbar
 */

 function display_sidebar() {
   static $display;

   isset($display) || $display = !in_array(true, [
    is_page(),
    is_front_page(),
    is_single()
   ]);

   return apply_filters('tenacity_interiors/display_sidebar', $display);
 }