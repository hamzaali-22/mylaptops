<!-- begin header here -->
<?php get_header(); ?>
<!-- end header here -->
<?php if ( have_posts() ) : the_post() ?>
<div class="container sitecontainer single-wrapper bgw">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12 m22 single-post">                                
            <div class="widget">
                <div class="large-widget m30">
                    <div class="post clearfix">
                        <div class="title-area">
                            <?php $category_list = get_the_category_list( ' | ' ); ?>
                            <?php if ($category_list) : ?>
                                <div class="colorfulcats">
                                    <span class="label label-info"><?php echo $category_list; ?></span>
                                </div>
                            <?php endif?>  

                            <h3><?php the_title(); ?></h3>

                            <?php mylaptops_post_meta(); ?>

                        </div><!-- /.pull-right -->

                        <div class="post-media">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'single_img', ['class' => 'img-responsive'] ); ?>
                            <?php else :?>
                                <h3>No image found!</h3>
                            <?php endif ?>
                        </div>
                    </div><!-- end post -->

                    <div class="post-desc">
                        <p><?php the_content(); ?></p>

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink()?>" target="_blank" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="hidden-xs">Share on Facebook</span></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink()?>" target="_blank" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="hidden-xs">Tweet on Twitter</span></a></li>
                                <li><a href="https://plus.google.com/share?url=<?php echo get_the_permalink()?>" target="_blank" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end post-desc -->
                    <?php $tags = get_the_tags(); ?>
                    <?php if($tags) : ?>            
                    <div class="post-bottom">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="tags">
                                    <h4>Tags</h4>
                                    <?php foreach($tags as $tag) : ?>
                                        <?php $term_link = get_term_link( $tag );?>
                                        <a href="<?= esc_url( $term_link )?>"><?= $tag->name ?></a>
                                    <?php endforeach; ?>

                                </div><!-- end tags -->
                            </div><!-- end col -->

                            <!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end bottom -->
                    <?php endif;?>

                    <div class="post-bottom">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="tags">
                                    <h4>Product Specifications</h4>
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Processor</th>
                                            <td><?php the_field('processor'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Installed Ram</th>
                                            <td><?php the_field('installed_ram'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Screen Size</th>
                                            <td><?php the_field('screen_size'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Storage Capacity</th>
                                            <td><?php the_field('storage_capacity'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Storage Capacity</th>
                                            <td><?php the_field('type'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Processor Speed</th>
                                            <td><?php the_field('processor_speed'); ?></td>
                                        </tr>
                                    </table>
                                </div><!-- end tags -->
                            </div><!-- end col -->

                            <!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end bottom -->


                    
                    <div class="authorbox">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="post clearfix">
                                    <div class="avatar-author">
                                        <a href="author.html">
                                            <img alt="" src="upload/avatar_02.png" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="author-title desc">
                                        <a href="single.html"><?php echo get_the_author();?></a>
                                        <a class="authorlink" href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_the_author_meta('user_url'); ?></a>
                                        <p><?php echo get_the_author_meta('description'); ?></p>
                                        <ul class="list-inline authorsocial">
                                            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><i class="fa fa-github"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div> <!-- end authorbox -->

                    <div class="row m22 related-posts">
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4>You May Also Like <span><a href="#">View all</a></span></h4>
                                    <hr>
                                </div><!-- end widget-title -->

                                <div class="review-posts row m30">
                                    <?php 
                                        $post_id = get_the_ID();
                                        $cat_ids = [];
                                        $categories = get_the_category( $post_id );

                                        if (!empty($categories) && !is_wp_error($categories)) {
                                            foreach ($categories as $category) {
                                                array_push($cat_ids, $category->term_id);
                                            }
                                        }

                                        $current_post_type = get_post_type($post_id);
                                        $args = [
                                            'category__in'   => $cat_ids,
                                            'post_type'      => $current_post_type,
                                            'post__not_in'    => array($post_id),
                                            'posts_per_page'  => '6',
                                        ];
                                        $related_laptops = new WP_Query( $args );                                    
                                    ?>

                                     <?php  if ( $related_laptops->have_posts() ) : while($related_laptops->have_posts() ) : $related_laptops->the_post() ?>   
                                    <div class="post-review col-md-4 col-sm-12 col-xs-12">
                                        <div class="post-media entry">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'feature_img', ['class' => 'img-responsive'] ); ?>
                                            <?php else :?>
                                                <h3>No image found!</h3>
                                            <?php endif ?>
                                            <div class="magnifier">
                                            </div><!-- end magnifier -->
                                        </div><!-- end media -->
                                        <div class="post-title">
                                            <h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        </div><!-- end post-title -->
                                    </div><!-- end post-review -->
                                    <?php endwhile ?>
                                    <?php wp_reset_postdata(); ?>
                                    <?php endif  ?>

                                    
                                </div><!-- end review-post -->
                            </div><!-- end widget -->   
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <?php comments_template(); ?>

                </div><!-- end large-widget -->
            </div><!-- end widget -->
        </div><!-- end col -->

        <?php get_sidebar(); ?>
    </div><!-- end row -->
</div>
<?php endif; ?>
 <!-- begin footer here -->
 <?php get_footer(); ?>
<!-- end footer here -->