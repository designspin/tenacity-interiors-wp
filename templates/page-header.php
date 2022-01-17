<?php use Tenacity\Titles; ?>

<?php

function PageHeader() {
  $content = '<header class="major">';
  $content .= '<h1>' . Titles\title() . '</h1>';
  $content .= '</header>';

  return apply_filters('page-header', $content);
}

echo PageHeader();

?>