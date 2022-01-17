<section class="paper">
    <div class="inner">
        <div class="row middle-xs">
<?php
    $args = array(
        'post_type' => 'testimonials',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
        'category_name' => 'interior-designer'
      );

    $slider = new WP_Query( $args );
?>

            <?php if($slider->have_posts()) : ?>
            <div class="col-xs-12 col-md-8 col-bottom">
                <div class="box">
                    <h2>What Interior Designers Say...</h2>
                    <div class="slick-slider">
                    <?php while($slider->have_posts()) : $slider->the_post(); ?>
                        <figure class="testimonial">
                            <blockquote><?php the_content(); ?></blockquote>
                            <footer>
                                <cite>- <strong><?= carbon_get_the_post_meta('name'); ?></strong>, <em><?= carbon_get_the_post_meta('location'); ?></em></cite>
                            </footer>
                        </figure>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

<?php
    $args = array(
        'numberposts' => '1',
        'pagename' => 'interior-designers-architects'
    );

    $link_page = new WP_Query( $args );

    add_filter('the_excerpt', function( $excerpt ) {
        $post = get_post();
        $excerpt = substr($excerpt, 0, 140);
        $excerpt .= '...<a href="' . get_permalink($post->ID) . '">Read More</a>'; 
        return $excerpt;
    }, 21);
?>
            <aside class="col-xs-12 col-md-4">
                <div class="box box-it alt">
                <?php if($link_page->have_posts()) : ?>
                <?php while($link_page->have_posts()) : $link_page->the_post(); ?>
                    <h2><?= the_title() ?></h2>
                    <p><?= the_excerpt() ?></p>
                <?php endwhile; endif; ?>
                <?php wp_reset_postdata(); ?>
                </div>
            </aside>
        </div>
    </div>
</section>