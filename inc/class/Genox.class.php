<?php

class Genox
{
    public function __construct()
    {
        add_action('after_setup_theme', array(&$this, 'theme_setup') );
        add_action('wp_enqueue_scripts', array(&$this, 'genox_scripts_function') );
        add_action('wp_enqueue_scripts', array(&$this, 'genox_styles_function') );
        add_action('add_meta_boxes', array( &$this, 'featured_meta') );
        add_action('save_post', array( &$this, 'featured_meta_save' ) );

        add_filter( 'woocommerce_product_tabs', array( &$this, 'woo_remove_product_tabs'), 98 );
    }

    public function genox_scripts_function() {
        if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js", false, null);
        }
        
        wp_enqueue_script('jquery');
        wp_enqueue_script( 'jquery' );
        // wp_enqueue_script( 'jqueryui' );
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
        wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js');
      
    }

    public function genox_styles_function() {

        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style( 'global', get_template_directory_uri() . '/css/global.css');
      
    }

    public function theme_setup() {
 
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );
     
        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support( 'automatic-feed-links' );

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
     
        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support( 'post-thumbnails' );
        // add_theme_support( 'featured-image', array(
        //     'height'      => 250,
        //     'width'       => 200,
        //     'flex-height' => false,
        //     'flex-width'  => true,
        //     'header-text' => array( 'site-title', 'site-description' ),
        // ) );
        add_image_size( 'featured-image', 200, 250, array( 'left', 'top' ) );
     
        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'genoxio' ),
            'secondary' => __('Secondary Menu', 'genoxio' )
        ) );
     
        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
        
        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
        );
        
        /* Register the 'primary' sidebar. */
        register_sidebar(
            array(
                'id'            => 'primary',
                'name'          => __( 'Primary Sidebar', 'genoxio' ),
                'description'   => __( 'A short description of the sidebar.', 'genoxio' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        /* Repeat register_sidebar() code for additional sidebars. */
    }

    public function featured_meta() {
        add_meta_box( 'featured_meta', __( 'Featured Posts', 'genoxio' ), array( &$this, 'featured_meta_callback'), 'post' );
    }
    public function featured_meta_callback( $post ) {
        $featured = get_post_meta( $post->ID );
        ?>
     
        <p>
        <div class="row-content">
            <label for="featured-meta-checkbox">
                <input type="checkbox" name="featured-meta-checkbox" id="featured-meta-checkbox" value="yes" <?php if ( isset ( $featured['featured-meta-checkbox'] ) ) checked( $featured['featured-meta-checkbox'][0], 'yes' ); ?> />
                <?php _e( 'Featured this post', 'genoxio' )?>
            </label>
            
        </div>
    </p>
     
        <?php
    }

    public function featured_meta_save( $post_id ) {
 
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'featured-nonce' ] ) && wp_verify_nonce( $_POST[ 'featured-nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
     
        // Exits script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }
     
        // Checks for input and saves
        if( isset( $_POST[ 'featured-meta-checkbox' ] ) ) {
            update_post_meta( $post_id, 'featured-meta-checkbox', 'yes' );
        } else {
            update_post_meta( $post_id, 'featured-meta-checkbox', '' );
        }
     
    }

    public function woo_remove_product_tabs( $tabs ) {

        // unset( $tabs['description'] );      	// Remove the description tab
        unset( $tabs['reviews'] ); 			// Remove the reviews tab
        unset( $tabs['additional_information'] );  	// Remove the additional information tab
    
        return $tabs;
    }
      
    
}