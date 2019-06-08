<aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="widget-title font-italic">About</h4>
        <p class="mb-0"><?=get_option('blogdescription');?></p>
      </div>
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'primary' ) ) : ?>
        <div class="p-4" id="search" class="widget widget_search">
           <?php get_search_form(); ?>
        </div>
        <div class="p-4" id="archives" class"widget">
            <h4 class="widget-title font-italic"><?php _e( 'Archives', 'shape' ); ?></h3>
            <ul class="list-unstyled mb-0">
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </div>
        <div class="p-4" id="meta" class="widget">
            <h4 class="widget-title font-italic"><?php _e( 'Meta', 'shape' ); ?></h3>
            <ul class="list-unstyled mb-0">
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </div>
    <?php else: //dynamic_sidebar( 'primary' ); ?>
    <?php endif; ?>
      
    </aside><!-- /.blog-sidebar -->