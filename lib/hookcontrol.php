<?php

namespace Tenacity\Hookcontrol;

use function Tenacity\Extras\pagination as paginate;

class Hooks {
  public static function init() {
    add_action('wp', function() {
        
      if (is_page_template('templates/template-services.php')) {
        add_action('before_main_content', function() {
          get_template_part('templates/partials/section-hero');
        },10);

        add_action('before_main_content', function() {
          get_template_part('templates/partials/section-start');
        }, 30 );

        add_action('after_main_content', function() {
          get_template_part('templates/partials/section-end');
        }, 10 );

        add_action('get_footer', function() {
          get_template_part('templates/partials/service-footer');
        }, 10);
      }

      elseif (is_page_template('templates/template-contact.php')) {
        add_action('before_main_content', function() {
          get_template_part('templates/partials/section-start');
        }, 10 );

        add_action('before_main_content', function() {
          get_template_part('templates/page', 'header');
        }, 20);

        add_action('after_main_content', function() {
          get_template_part('templates/partials/section-end');
        }, 10 );

        add_action('get_footer', function() {
          get_template_part('templates/partials/contact-detail');
        }, 10);

        add_action('get_footer', function() {
          get_template_part('templates/partials/service-footer');
        }, 20);
      }

      elseif(is_front_page()) {
        add_action('before_main_content', function() {
          get_template_part('templates/partials/front-page-video');
        },10);

        add_action('before_main_content', function() {
          get_template_part('templates/partials/front-page-customers');
        }, 20);

        add_action('before_main_content', function() {
          get_template_part('templates/partials/front-page-content-start');
        }, 30 );

        add_action('after_main_content', function() {
          get_template_part('templates/partials/front-page-content-end');
        }, 10 );

        add_action('after_main_content', function() {
          get_template_part('templates/partials/front-page-service-pages');
        }, 20);

        add_action('after_main_content', function() {
          get_template_part('templates/partials/front-page-designers');
        }, 30);

      }

      elseif(is_page()) {
        add_action('before_main_content', function() {
          get_template_part('templates/partials/section-start');
        }, 10 );

        add_action('before_main_content', function() {
          get_template_part('templates/page', 'header');
        }, 20);

        add_action('after_main_content', function() {
          get_template_part('templates/partials/section-end');
        }, 10 );

        add_action('get_footer', function() {
          get_template_part('templates/partials/service-footer');
        }, 10);
      }

      if(is_home() || is_archive() || is_search()) {
        self::archive_hooks();
      }

      if( is_single() && ( 'post' == get_post_type() )) {
				self::single_post_hooks();
      }

    });
  }

  public static function archive_hooks() {

    add_filter('page-header', function($content) {
      return '<div class="container-fluid">' . $content . '</div>';
    });

    add_action('before_main', function() {
      get_template_part('templates/partials/home-main', 'start');
    }, 10 );

    add_action('before_main', function() {
      get_template_part('templates/page', 'header');
    }, 5);

    add_action('after_main', function() {
      get_template_part('templates/partials/home-main', 'end');
    }, 10 );

    add_action('before_sidebar', function() {
      get_template_part('templates/partials/home-sidebar', 'start');
    }, 10);

    add_action('after_sidebar', function() {
      get_template_part('templates/partials/home-sidebar', 'end');
    }, 10);

    add_action('before_main_content', function() {
      echo '<section class="spotlights">';
    }, 30);

    add_action('after_main_content', function() {
      echo '</section>';
    }, 10);

    add_action('after_main_content', function() {
      paginate();
    }, 15);
  }

  public static function single_post_hooks() {
    if(has_post_thumbnail()) {
      add_action('before_main_content', function() {
        get_template_part('templates/partials/section-hero', 'single');
      },10);

      add_action('before_main_content', function() {
        echo '<div class="paper"><div class="inner">';
      }, 20);

      add_action('after_main_content', function() {
        echo '</div></div>';
      },10);
    } else {
      add_action('before_main_content', function() {
        get_template_part('templates/partials/section-start');
      }, 10 );

      add_action('before_main_content', function() {
        get_template_part('templates/single', 'header');
      }, 20);

      add_action('after_main_content', function() {
        get_template_part('templates/partials/section-end');
      }, 10 );
    }

    add_action('get_footer', function() {
      get_template_part('templates/partials/service-footer');
    }, 10);
  }
}

Hooks::init();