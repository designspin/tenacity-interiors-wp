<?php

namespace Tenacity\Wrapper;

/**
 * Theme Wrapper
 *
 * Theme wrapper as used on the brilliant SAGE theme
 * @link https://roots.io/sage/docs/theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */

function template_path() {
  return FrameworkWrapping::$main_template;
}

function sidebar_path() {
  return new FrameworkWrapping('templates/sidebar.php');
}

class FrameworkWrapping {
  // Full path to main template file
  public static $main_template;

  // Basename of template file
  public $slug;

  // Array of templates
  public $templates;

  // Stores base name of template file; e.g 'page' for 'page.php'.
  public static $base;

  public function __construct($template = 'base.php') {
    $this->slug = basename($template, '.php');
    $this->templates = [$template];

    if(self::$base) {
     $str = substr($template, 0, -4);
     array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
    }
  }

  public function __toString() {
    $this->templates = apply_filters('framework/wrap_' . $this->slug, $this->templates) ?: $this->templates;
    return locate_template($this->templates) ?: $this->templates;
  }

  public static function wrap($main) {
    if (!is_string($main)) {
      return $main;
    }

    self::$main_template = $main;
    self::$base = basename(self::$main_template, '.php');

    if (self::$base === 'index') {
      self::$base = false;
    }

    return new FrameworkWrapping();
  }
}

add_filter('template_include', [__NAMESPACE__ . '\\FrameworkWrapping', 'wrap'], 109);