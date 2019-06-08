<?php get_header(); ?>
    <div  class="col-md-8 blog-main">
        <div  class="blog-post" role="main">
 
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
 
            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content-attachment', get_post_format() );
 
        // End the loop.
        endwhile;
        ?>
 
        </div><!-- .site-main -->
    </div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>