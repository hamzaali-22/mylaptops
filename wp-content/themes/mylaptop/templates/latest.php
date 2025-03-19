<div class="widget">
    <div class="widget-title">
        <h4>Latest Laptops</h4>
        <hr>
    </div>
    <!-- end widget-title -->

    <div class="reviewlist review-posts row m30">
        <?php 
            $args = [
                'numberposts' => 6,
                'post_status' => 'publish'
            ];
            $recent_posts = wp_get_recent_posts( $args );

            foreach ($recent_posts as $recent_post) : 
                $post_id = $recent_post['ID']; // Post ID get karna zaroori hai
        ?>
        <div class="post-review col-md-4 col-sm-12">
            <div class="post-media entry">
                <a href="<?php echo get_permalink($post_id); ?>" title="">
                    <?php 
                        if ( has_post_thumbnail($post_id) ) : 
                            echo get_the_post_thumbnail( $post_id, 'feature_img', ['class' => 'img-responsive'] );
                        else:
                    ?>
                        <h3>No image found!</h3>
                    <?php endif; ?>
                    <div class="magnifier"></div>
                </a>
            </div>
            <!-- end media -->
            <div class="post-title">
                <h3><a href="<?php echo get_permalink($post_id); ?>"><?php echo esc_html($recent_post['post_title']); ?></a></h3>
            </div>
            <!-- end post-title -->
        </div>
        <?php endforeach; wp_reset_postdata(); ?> 
    </div>
</div>
<!-- end widget -->
