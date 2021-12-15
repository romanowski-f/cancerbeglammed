<?php

if ( ! defined( 'CBG_VERSION' ) ) {
  define( 'CBG_VERSION', '2.0.0' );
}

function cbg_theme_setup() {
  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  // Title tag
  add_theme_support( 'title-tag' );

  // Woocommerce
  add_theme_support( 'woocommerce', array(
      'thumbnail_image_width' => 600,
      'single_image_width'    => 600,

      'product_grid'          => array(
          'default_rows'    => 3,
          'min_rows'        => 2,
          'max_rows'        => 8,
          'default_columns' => 4,
          'min_columns'     => 2,
          'max_columns'     => 5,
      ),
  ) );

  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );

  /**
   * Register Menus
   */
  register_nav_menus(
    array(
      'mainmenu'          => 'Main Menu',
      'secondary-menu'    => 'Secondary Menu',
      'recovery-boutique' => 'Recovery Boutique',
      'mobile-menu'       => 'Mobile Menu'
    )
  );
}

add_action('after_setup_theme', 'cbg_theme_setup');

add_action( 'before_woocommerce_init', function() {
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
} );


/**
 * Register Widgets
 */
require get_template_directory() . '/inc/template-widgets.php';




// CSS Hierarchy
/**
 * Add stylesheet to the page
 */
function safely_add_stylesheet() {
  // Boostrap CSS
  wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array() );

  // Bootstrap JS
  wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array() );

  // Font Awesome
  wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.12/css/all.css');

  // Main fonts
  wp_enqueue_style('cbg-fonts', 'https://use.typekit.net/jii2kmx.css');

  // Style
  wp_enqueue_style( 'main-styles', get_stylesheet_uri(), array(), CBG_VERSION );

  // Front Page
  if (is_front_page()) {
    // Slider
    wp_enqueue_style('slider-css', get_template_directory_uri() . '/assets/css/slider.css', array(), CBG_VERSION, 'all' ); 

    // Animate.css
    wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

    // Viewport-anim.css
    wp_enqueue_style('viewport-anim-css', get_template_directory_uri() . '/assets/css/viewport-anim.css', array(), CBG_VERSION, 'all' );  

    wp_register_script('viewport-anim', get_template_directory_uri() . '/assets/js/scripts.js', array(), CBG_VERSION);
    wp_enqueue_script('viewport-anim');    
  }

}
add_action( 'wp_enqueue_scripts', 'safely_add_stylesheet', 20 );

function woocommerce_template_product_description() {
   woocommerce_get_template( 'single-product/tabs/description.php' );
}

/**
* CBG For Real Stylesheet
*/
add_action( 'wp_enqueue_scripts', 'enqueue_cbg_for_real_stylesheet' );
function enqueue_cbg_for_real_stylesheet() {
  wp_register_style(
      'cbg-for-real',
      get_stylesheet_directory_uri() . '/assets/css/cbg-for-real.css',
      array( ),
      CBG_VERSION
  );

  wp_register_style(
    'cbg-for-real-fonts',
    'https://use.typekit.net/lqe8mzi.css'
  );
  
  if (is_page_template('templates/cbg-for-real.php')) {
    wp_enqueue_style('cbg-for-real-fonts');
    wp_enqueue_style('cbg-for-real');
  }
}


function get_custom_cat_template($single_template) {
     global $post;

       if ( in_category( 'cbg-news' )) {
          $single_template = dirname( __FILE__ ) . '/templates/single/cbg-news-template.php';
        }
     // } else if ( in_category( '330' ) ) {
     //      $single_template = dirname( __FILE__ ) . '/templates/single/know-and-tell-template.php';
     // }
     return $single_template;
}

//add_filter( "single_template", "get_custom_cat_template" ) ;



// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
  return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> Read More &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');





/*
 * Show a different no. of posts on the first page, and the rest
 * of the pages of 'Know & Tell (330)' category archive
 */
function itsme_category_offset( $query ) {
    $ppp = get_option( 'posts_per_page' );
    $first_page_ppp = 7;
    $paged = $query->query_vars[ 'paged' ];

    if( $query->is_category( '330' ) && $query->is_main_query() ) {
        if( !is_paged() ) {

            $query->set( 'posts_per_page', $first_page_ppp );

        } else {

            $paged_offset = $first_page_ppp + ( ($paged - 2) * $ppp );
            $query->set( 'offset', $paged_offset );
            $query->set( 'posts_per_page', 12 );

        }
    }
}
add_action( 'pre_get_posts', 'itsme_category_offset' );

function itsme_adjust_category_offset_pagination( $found_posts, $query ) {
    $ppp = get_option( 'posts_per_page' );
    $first_page_ppp = 7;

    if( $query->is_category( '330' ) && $query->is_main_query() ) {
        if( !is_paged() ) {

            return( $found_posts );

        } else {

            return( $found_posts - ($first_page_ppp - $ppp) );

        }
    }
    return $found_posts;
}
add_filter( 'found_posts', 'itsme_adjust_category_offset_pagination', 10, 2 );


/*
 * Custom Author Meta Box
 */

add_action('add_meta_boxes', 'add_cbg_author_meta');

function add_cbg_author_meta( $post ) {
  add_meta_box( 'cbg_custom_author', 'Custom Author', 'cbg_custom_author_cb', 'post', 'normal', 'high');
}

function cbg_custom_author_cb( $post ) {
  global $post;
  $custom_author = array(
    'name' => get_post_meta($post->ID, 'cbg_custom_author', true),
    'link' => get_post_meta($post->ID, 'cbg_custom_author_link', true),
  );
  wp_nonce_field( basename(__FILE__), 'cbg_nonce' );

  ?>
    <table>
      <tr>
        <td style="padding-right:50px"><label for="cbg_author"><strong>Name</strong></label></td>
        <td><input type="text" id="cbg_author" name="cbg_custom_author" style="width:200px" value="<?php if(!empty($custom_author['name'])) : echo $custom_author['name']; endif; ?>"></td>
      </tr>
      <tr>
        <td style="padding-right:50px"><label for="cbg_author_link"><strong>Link</strong></label></td>
        <td><input type="text" id="cbg_author_link" name="cbg_custom_author_link" style="width:200px" value="<?php if(!empty($custom_author['link'])) : echo $custom_author['link']; endif; ?>"></td>
      </tr>
    </table>
  <?php
}

add_action('save_post', 'save_custom_meta', 10, 2);

function save_custom_meta( $post_id ) {
    global $post;

    // Verify meta box nonce
    if ( !isset( $_POST['cbg_nonce'] ) || !wp_verify_nonce( $_POST['cbg_nonce'], basename(__FILE__) ) ) {
        return;
    }

    // Return if autosaving
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check user's permissions
    if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $data = array(
        'cbg_custom_author',
        'cbg_custom_author_link',
        );

    foreach($data as $input) {
      update_post_meta( $post->ID, $input, wp_kses_post( $_POST[$input] ) );
    }

}


function cbg_theme_addons() {
  add_theme_support( 'custom-logo' );
}

add_action('after_setup_theme', 'cbg_theme_addons');

function custom_logo_url() {
  $custom_logo_id   = get_theme_mod( 'custom_logo' );
  $custom_logo_url  = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  return $custom_logo_url[0];
}

add_action( 'wp_footer', 'cbg_popup_scripts', 500 );
/**
 *  Add custom JS script to footer to set a cookie that targets a popup by it's ID.
 *
 *  Note: Popups are assigned a unique ID of '#popmake-{integer}'.
 *  From the WP Admin, view 'Popup Maker' -> 'All Popups' -> 'CSS Classes (column)'
 *  to locate the popup ID formatted as 'popmake-{integer}'. Change the placeholder
 *  ID ( '#popmake-967' ) in this code sample with your site's unique popup ID.
 *
 *  @since 1.0.0
 *
 *  @return void
 */
function cbg_popup_scripts() { ?>
        <script type="text/javascript">
        (function ($, document, undefined) {

          jQuery(document).on('click', '.popmake-6217-set-cookie', function() {
            jQuery('#popmake-6217').trigger('pumSetCookie');
          })

        }(jQuery, document))
        </script><?php
}


add_action('woocommerce_after_single_product_summary', 'cbg_featured_products', 10, 2);
function cbg_featured_products() {
  if (class_exists('ACF')) :

    if (get_field('enabled')) :

      ?>
      <div class="row">
        <div class="col-12">
          <?php the_field('main_description'); ?>
        </div>
      </div>
      <h2 class="title-section"><span>Featured Products</span></h2>
      <div class="row">
        <?php for($i = 0; $i < 4; $i++) : ?>
        <div class="col-sm-6 col-md-3 product-block">
          <?php $featured = get_field('product_' . strval($i + 1)); ?>
          <?php $image = $featured['image']; ?>
          <?php $size = array('270', '270'); ?>
          <?php $img_src = wp_get_attachment_image_url( $image, 'medium' ); ?>
          <?php $img_srcset = wp_get_attachment_image_srcset( $image, 'medium' ); ?>
          <div class="featured-product-image">
            <div class="image" style="position: relative; padding-top: 100%">
              <a href="<?php echo $featured['link']; ?>" style="display: block; position: absolute; height: 100%; width: 100%; top: 0; left: 0" class="<?php
                if (get_field('beautycounter_links')): echo 'beautycounter-clickthrough'; endif;
              ?>">
                <img src="<?php echo esc_url( $img_src ); ?>"
                     srcset="<?php echo esc_attr( $img_srcset ); ?>"
                     sizes="(max-width: 270px) 100vw, 270px" alt=""
                     style="height: 100%; width: 100%; object-fit: cover">
              </a>
            </div>
          </div>

          <div class="product-meta">
            <div class="name" style="margin-bottom: 10px"><a href="<?php echo $featured['link']; ?>" class="<?php
                if (get_field('beautycounter_links')): echo 'beautycounter-clickthrough'; endif;
              ?>"><?php echo $featured['title']; ?></a></div>
            <div itemprop="description"><?php echo $featured['description']; ?></div>
          </div>
        </div>
        <?php endfor; ?>
      </div>

      <?php

    endif;

  endif;
}



//add_filter( 'woocommerce_product_tabs', 'cbg_remove_product_tabs', 98 );
function cbg_remove_product_tabs( $tabs ) {
    global $product;
    if( !has_term( 'cbg-store', 'product_cat', $product->id ) ) {
      unset( $tabs['description'] );             // Remove the description tab
      unset( $tabs['reviews'] );                 // Remove the reviews tab
      unset( $tabs['additional_information'] );  // Remove the additional information tab
    }
    return $tabs;
}


include(get_stylesheet_directory() . '/inc/product-variation-icons.php');
//include(get_stylesheet_directory() . '/templates/nav/walker.php');



// To change add to cart text on single product page
//add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );
// function woocommerce_custom_single_add_to_cart_text() {
//     return __( 'Add to Bag', 'woocommerce' );
// }

// To change add to cart text on product archives(Collection) page
// add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );
// function woocommerce_custom_product_add_to_cart_text() {
//     return __( 'Add to Bag', 'woocommerce' );
// }

// add_filter( 'excerpt_length', function($length) {
//     return 20;
// }, PHP_INT_MAX );

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}
 
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'  => 'Fab Finds Display Order',
    'menu_title'  => 'Fab Finds',
    'menu_slug'   => 'fab-finds-order-settings',
    'capability'  => 'activate_plugins',
    'redirect'    => false
  ));
}

// function filter_posts() {
//   $catSlug        = $_POST['category'];
//   $post_count     = 11;
//   $posts_per_item = 4;

//   $ajaxposts = new WP_Query([
//     'posts_per_page' => $post_count,
//     'category_name' => $catSlug,
//   ]);
//   $response = '';

//   if($ajaxposts->have_posts()) {
//     while($ajaxposts->have_posts()) : $ajaxposts->the_post(); 

//         $count = $ajaxposts->current_post + 1; 

//         /* Blog post */ 
//         $response .= '<div class="col-sm px-1">';

//         if (has_post_thumbnail()) : $bg = get_the_post_thumbnail_url(); 
//         else :                      $bg = get_template_directory_uri() . '/images/header/simple-logo.jpg';
//         endif;  

//         $response .= '<a href="' . get_the_permalink() . '"><div style="height:200px; background:url(' . $bg . ') center no-repeat; background-size: cover;"></div></a>';

//         $cat = get_the_category(); 
//         $category_name = $cat[0]->cat_name;
//         $category_link = get_category_link( $cat[0]->cat_ID ); 

//         $response .= '<p class="small mt-3 mb-0"><a href="' . $category_link . '">' . $category_name . '</a></p>';
//         $response .= '<h5 class="mt-1 mb-2"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
//         $response .= '<p>' . get_the_excerpt() . '</p>';

//         $response .= '</div>';

//         /* Close carousel item */ 

//         if ( ( $count ) % $posts_per_item === 0 && $count != $post_count) : 
//           $response .= '</div></div>';
//           $response .= '<div class="carousel-item"><div class="row no-gutters">';
//         endif; 
//     endwhile;

//     $response .= '<div class="col-sm-3 px-1 d-flex flex-column justify-content-center">';
//     $response .= '<a class="blog-slider-read-more mx-auto" href="' . $category_link . '"></a>';
//     $response .= '<h5 class="mt-1 mb-2 text-center"><a href="' . $category_link . '">Read More ' . $category_name . '</a></h5>';
//     $response .= '</div>';
//   } 

//   echo $response;
//   exit();
// }
// add_action('wp_ajax_filter_posts', 'filter_posts');
// add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');