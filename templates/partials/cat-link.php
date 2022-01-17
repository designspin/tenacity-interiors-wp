<?php
  $categories = get_the_category();
  $category_link = get_category_link($categories[0]->cat_ID);
?>
<a href="<?= esc_url($category_link) ?>"><?= $categories[0]->cat_name ?></a>