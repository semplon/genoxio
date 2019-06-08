<div <?php post_class('blog-post'); ?> id="post-<?php the_ID(); ?>" >

    <?php the_title( '<h2 class="blog-post-title">', '</h2>' ); ?>
    
    <p class="blog-post-meta"><?php the_time('F j, Y'); ?> by <a href="#"><?php esc_html( the_author() ); ?></a>  in <?php the_category(', '); ?></p>
    <?php 
    $post_format = get_post_format($post->ID);

    if(has_post_thumbnail() && $post_format == 'images') {
        esc_html( the_attachment_link( $post->ID , true) );
    }
    
    the_content();
    ?>
    <?php if(has_post_thumbnail()) { ?>
    <a href="<?php esc_url( the_permalink($post->post_parent) ); ?>" class="btn btn-outline-primary">Back to <?php echo esc_html( get_the_title($post->post_parent) ); ?></a>
    <?php } ?>

</div>