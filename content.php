<div class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

    
    <?php the_title( '<h2 class="blog-post-title">', '</h2>' ); ?>
    <?php if(function_exists('is_woocommerce') && is_woocommerce()) { ?>
        <hr />
    <?php } else {?> 
        <p class="blog-post-meta"><?php esc_html( the_time('F j, Y') ); ?> by <a href="#"><?php esc_html( the_author() ); ?></a>  in <?php the_category(', '); ?></p>    
    <?php } ?>
    
    <?php 
    if ( has_post_thumbnail() ) {
        if(function_exists('is_woocommerce') && is_product()) {
            echo "";
        } else {
            echo "<div class='post-thumbnail-class'>
            <img src='".esc_url( get_the_post_thumbnail_url() )."' class='featured-image img-fluid img-thumbnail '>
            <div class='post-thumbnail-caption'>
            ".esc_html( get_the_post_thumbnail_caption() )."
            </div></div>";
        }
        
    } 
    
    the_content();
    
    ?>
    <?php wp_link_pages(); ?> 

</div>
<div class="clearfix">
</div>