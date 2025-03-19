<?php 
    $args = [ 'post_type' => 'slider', 'post_per_page' => -1, 'orderby' => 'ASC', 'order' => 'id'];
    $slider = new WP_Query( $args );
?>
<?php if ( $slider->have_posts() ) : ?>
<div id="property-slider" class="clearfix">
    <div class="flexslider">
        <ul class="slides">
            <?php while ($slider->have_posts() ) : $slider->the_post();  ?>
            <li>
                <?php the_post_thumbnail( '', ['class' => 'img-responsive'] ); ?>
            </li>
            <?php endwhile ?>
        </ul>
    </div>
</div>
<?php endif ?>