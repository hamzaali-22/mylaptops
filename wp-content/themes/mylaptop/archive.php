<!-- begin header here -->
<?php get_header(); ?>
<!-- end header here -->
<?php if ( have_posts()) : the_post(); ?>
<section class="section bgg">
    <div class="container">    
        <div class="title-area">
            <?php 
                if ( is_day() ) {
                    printf( __('<h2> Daily Archive for %s</h2>', 'mylaptops'), get_the_date() );
                } elseif ( is_month()) {
                    printf( __('<h2> Monthly Archive for %s</h2>', 'mylaptops'), get_the_date( _x('F Y', 'Monthly Archive Date Format', 'mylaptops') ) );
                } elseif ( is_year() ) {
                    printf( __('<h2> Yearly Archive for %s</h2>', 'mylaptops'), get_the_date( _x('Y', 'Yearly Archive Date Format', 'mylaptops') ) );
                } else {
                    _e( '<h2>Archive</h2>', 'mylaptops', single_tag_title('', false) );
                }
            ?>
        </div><!-- /.pull-right -->
    </div><!-- end container -->
</section>
<div class="container sitecontainer bgw">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12 m22 single-post">
            <div class="widget searchwidget indexslider">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>
                    <?php get_template_part( 'templates/content', get_post_format() ); ?>
                <?php endwhile?>
                <?php else :?>
                    <?php get_template_part( 'templates/content-none' ); ?>
                <?php endif?>
            </div>
        </div><!-- end col -->

        <?php get_sidebar(); ?>
    </div><!-- end row -->
</div>
<?php endif; ?>
 <!-- begin footer here -->
 <?php get_footer(); ?>
<!-- end footer here -->