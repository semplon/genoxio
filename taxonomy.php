<?php get_header(); ?>
    <div class="col-md-8 blog-main">
    <?php the_archive_title( '<h3 class="pb-4 mb-4 font-italic border-bottom">', '</h3>' ); ?>
    <?php 
    global $more;
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div <?php post_class('blog-post'); ?>>
    <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p class="blog-post-meta"><?php the_time('F j, Y'); ?> by <a href="#"><?php the_author(); ?></a>  in <?php the_category(', '); ?></p>
    <?php 
    if ( is_sticky() ) {
        // Set (inside the loop) to display all content, including text below more.
        $more = 1;
    
        the_content();
    } else {
        $more = 0;
    
        the_content( __( 'Read the rest of this entry »', 'genoxio' ) );
    } 
    ?>
    </div>
  <?php endwhile; else: ?>
      <?php _e( 'Sorry, no pages matched your criteria.', 'genoxio' ); ?>
  <?php endif; ?>
      
    
      <nav class="blog-pagination">
        <div class="alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
      </nav>

    </div><!-- /.blog-main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>