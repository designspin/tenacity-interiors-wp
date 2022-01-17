<?php

namespace Tenacity\Extras;

function pagination($pages = '', $range = 4) {  
  $showitems = ($range * 2)+1;  

  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == '')
  {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages)
      {
          $pages = 1;
      }
  }   

  if(1 != $pages)
  {
    echo '<div style="margin-top: 2em;" class="container-fluid">';
    echo '<ul class="pagination">';
    echo '<li><span class="page">Page ' . $paged . ' of ' . $pages . ': </span></li>';
    if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<li><a class="button small disabled" href="' . get_pagenum_link(1) . '">First</a></li>';
    if($paged > 1 && $showitems < $pages) echo '<li><a class="button small" href="' . get_pagenum_link($paged - 1) . '">Prev</a></li>';

    for($i = 1; $i <= $pages; $i++)
    {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
      {
          echo ($paged == $i) ? '<li><span class="page active">' . $i . '</span></li>'
                              : '<li><a class="page" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
      }
    }

    if($paged < $pages && $showitems < $pages) echo '<li><a class="button small" href="' . get_pagenum_link($paged + 1) . '">Next</a></li>';
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<li><a class="button small" href="' . get_pagenum_link($pages) . '">Last</a></li>';

    echo '</ul></div>';
  }
}

?>