<?php

namespace Tenacity\Titles;

function title() {
  if(is_home()) {
    if(get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'tenacity_interiors');
    }
  } elseif (is_archive()) {
    return get_the_archive_title();
  } elseif (is_search()) {
    return sprintf(__('Search Results for: %s', 'tenacity_interiors'), get_search_query());
  } elseif (is_404()) { 
    return __('Not Found', 'tenacity_interiors');
  } else {
    return get_the_title();
  }
}