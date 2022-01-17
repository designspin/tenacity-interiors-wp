<section class="paper">
    <div class="inner">
        <div class="row middle-xs">
            <div class="col-xs-12 col-md-4">
                <div class="box box-it alt">
                    <h2>Why Choose Us?</h2>
                    <ul class="alt">
                        <li><i class="fa fa-fw fa-check-square"></i>Each project is hand-crafted from the outset</li>
                        <li><i class="fa fa-fw fa-check-square"></i>The best available materials from established and exotic sources</li>
                        <li><i class="fa fa-fw fa-check-square"></i>Every detail of your project will be perfect, whatever style you choose</li>
                    </ul>
                </div>
            </div>

<?php
    $args = array(
        'posts_per_page' => '6',
        'post_type' => 'testimonials',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
        'category_name' => 'customer'
      );

    $slider = new WP_Query( $args );
?>
            <?php if($slider->have_posts()) : ?>
            <div class="col-xs-12 col-md-8 col-bottom">
                <div class="box">
                    <h2>Kind Customer Words</h2>
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
        </div>
    </div>
</section>