<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php wp_head(); ?>

<style>
    .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    @media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
    }
</style>

</head>
<body <?php body_class(); ?>>

<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <span class="text-muted" href="#"><?php echo date("d M, Y");?></span>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="<?php echo site_url('/');?>">
        <?php echo get_option('blogname')?>
        </a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        
        <!-- <a class="btn btn-sm btn-outline-danger" href="#">Sign up</a> -->
      </div>
    </div>
  </header>
  <nav class="navbar navbar-expand-md navbar-light " role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <?php
      wp_nav_menu( array(
        'theme_location'    => 'primary',
        'depth'             => 3,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'nav navbar-nav d-flex justify-content-between',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
      ) );
      ?>
    </div>
  </nav>
  

  </div>
  <?php
if( is_home() || is_front_page()) {

  ?>
<div class="container">
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>

  <div class="row mb-2">
    <?php
    $args = array(
        'posts_per_page' => 2,
        'meta_key' => 'featured-meta-checkbox',
        'meta_value' => 'yes'
    );
    $featured = new WP_Query($args);
    // print_r($featured);
    if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); 
    if(!is_sticky(esc_html( get_the_ID() ))) {
    ?>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-danger"><?php esc_html( the_category(', ') ); ?></strong>
          <h3 class="mb-0"><a href="<?php esc_url( the_permalink() ); ?>"> <?php the_title(); ?></a></h3>
          <div class="mb-1 text-muted"><?php echo esc_html( get_the_date('F j') ); ?></div>
          <p class="card-text mb-auto"></p>
          <a href="<?php esc_url( the_permalink() ); ?>" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail('featured-image', array('class' => 'img-fluid', 'title' => '', 'style'=>'width: 200px; height: 250px')); ?></a>
        </div>
      </div>
    </div>
    <?php
    }
    endwhile; else:
    endif;
    ?>
    
    
  </div>
</div>
<?php
}
?>
  <main role="main" class="container">
    <div class="row">