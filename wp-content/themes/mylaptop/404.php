<!-- begin header here -->
<?php get_header(); ?>
<!-- end header here -->
<section class="section bgg">
    <div class="container">
        <div class="title-area">
            <h2><?php _e( '404 Page', 'mylaptops'); ?></h2>
        </div>
    </div>
</section>

<div class="container sitecontainer bgw">
    <div class="row">
        <div class="col-md-12 m22 single-post">
            <div class="widget">
                <div class="large-widget m30">
                    <div class="post-desc">

                        <div class="page-404-content">
                            <div class="row">
                                <div class="col-sm-6 hidden-xs">
                                    <img alt="404-page" src="<?php echo IMAGES ?>/image-404.jpg">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <h2>
                                    <?php _e( '404', 'mylaptops'); ?>
                                    <span><?php _e( 'Error!', 'mylaptops'); ?></span>
                                    </h2>
                                    <p>
                                    <?php _e( 'Sorry, we cant find the page you are looking for. <br>Please go to', 'mylaptops'); ?>                                   
                                    <a href="<?php echo get_option( 'home' ); ?>">Home </a><?php _e( 'or search something from search form.', 'mylaptops'); ?>
                                        <?php get_search_form();     ?>    
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end post-desc -->
                </div>
                <!-- end large-widget -->
            </div>
            <!-- end widget -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
 <!-- begin footer here -->
 <?php get_footer(); ?>
<!-- end footer here -->