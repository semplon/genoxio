<?php get_header(); ?>
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        The News
      </h3>
    <?php 

    if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
    <div id="post-<?php the_ID(); ?>" <?php ( is_sticky($post_id) ) ? post_class('blog-post sticky'): post_class('blog-post'); ?>>
    <h2 class="blog-post-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a></h2>
    <p class="blog-post-meta"><?php the_time('F j, Y'); ?> by <a href="#"><?php esc_html( the_author() ); ?></a>  in <?php esc_html( the_category(', ') ); ?></p>
    <?php 
    the_content( __( 'Read the rest of this entry »', 'genoxio' ) );
    ?>
    </div>
  <?php endwhile; else: ?>
      <?php _e( 'Sorry, no pages matched your criteria.', 'genoxio' ); ?>
  <?php endif; ?>
      
  <div class="clearfix">
  </div>
      <nav class="blog-pagination">
        <div class="alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
      </nav>

    </div><!-- /.blog-main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>