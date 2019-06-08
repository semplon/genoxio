<?php get_header(); ?>
    <div  class="col-md-8 blog-main">
         
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
 
            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );
 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                echo "<div class='comments-wrapper'>";
                comments_template();
                echo "</div>";
            endif;
            echo "<nav class=\"blog-pagination\">";
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="alignright">' . __( 'Next post:', 'genoxio' ) . ' %title</span>',
                'prev_text' => '<span class="alignleft">' . __( 'Previous post:', 'genoxio' ) . ' %title</span>',
            ) );
            echo "</nav>";
 
        // End the loop.
        endwhile;
        ?>

    </div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>