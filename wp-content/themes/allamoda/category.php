<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Allamoda
 * @since Allamoda 1.0
 */
$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;
get_header(); ?>

  <main class="content">
    <div class="products content__wrapper">
      <section class="home-section">
        <h2 class="heading--1"><?php echo $category->name; ?></h2>
        <ul class="grid listing">

        <?php
          //Get post content
          $args = array(
            'posts_per_page'   => -1,
            'category'         => $cat_id,
            'order'            => 'DESC',
            'post_type'        => 'products',
            'post_status'      => 'publish',
            'suppress_filters' => true
          );

          $posts_array  = get_posts( $args );

          foreach($posts_array as $key => $value){
            $img = $image = wp_get_attachment_image_src( get_post_thumbnail_id( $value->ID ), 'medium' );
            if( !empty($img) ){
              $image_url = $img[0];
            } else {
              $image_url = esc_url( get_template_directory_uri() ) . '/images/product.jpg';
            }
          ?>
            <li class="grid__2"> <a href="<?php echo get_permalink( $value->ID ); ?>"><img src="<?php echo $image_url; ?>"></a>
              <div class="home__product-info">
                <h3 class="home__product-info__name"><?php echo $value->post_title; ?></h3>
              </div>
            </li>
          <?php
          }
        ?>
        </ul>
      </section>
    </div>
  </main>

<?php get_footer(); ?>