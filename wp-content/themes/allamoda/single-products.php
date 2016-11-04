<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Allamoda
 * @since Allamoda 1.0
 */
get_header(); ?>

  <main class="content">
    <div class="product-detail content__wrapper">
      <!-- BLOCK 1 -->
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $categories = get_the_category();

        $image_list = get_field('image_list');
        $width = get_post_meta( get_the_ID(), 'width' );
        $height = get_post_meta( get_the_ID(), 'height' );
        $strap_length = get_post_meta( get_the_ID(), 'strap_length' );
        ?>
      <?php endwhile; wp_reset_query(); ?>

      <div class="pdp">
        <div class="pdp__left">
          <div class="pdp__left__inner">
            <h1 class="pdp__left__name"><?php the_title(); ?></h1>
            <div class="pdp__share mobile-hidden">Share<br><a href="javascript:void(0);"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon-fb.png"></a></div>
          </div>
          <div class="pdp__images">
            <div data-module="productSlider" class="pdp__images__slider">
              <?php
              if( !empty($image_list) ){
                foreach($image_list as $value){
                  $thumbnail = $value['sizes']['thumbnail'];
                  $medium = $value['sizes']['medium'];
                  $medium_large = $value['sizes']['medium_large'];
              ?>
                  <div class="pdp__image"><img src="<?php echo esc_url( $medium_large ); ?>"></div>
              <?php
                }
              }
              ?>
            </div>
          </div>
          <div class="pdp__right">
            <div class="pdp__right__inner">
              <h3 class="heading--2"><?php _e( 'DESCRIPTION', 'allamoda' ) ?></h3>
              <?php the_content(); ?>
              <p><a href="javascript:void(0);"><?php _e( 'Leather Care', 'allamoda' ) ?></a></p>
              <h3 class="heading--2"><?php _e( 'MEASUREMENT', 'allamoda' ) ?></h3>
              <p><?php _e( 'Width', 'allamoda' ) ?>: <?php echo $width[0]; ?><br><?php _e( 'Height', 'allamoda' ) ?>: <?php echo $height[0]; ?><br><?php _e( 'Strap length', 'allamoda' ) ?>: <?php echo $strap_length[0]; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content__wrapper text">
      <section class="home-section">
        <h2 class="heading--1"><?php _e( 'NEW COLLECTION', 'allamoda' ) ?></h2>
        <ul class="grid listing">
          <?php
            //for use in the loop, list 5 post titles related to first tag on current post
            $args = array(
              'posts_per_page' => -1,
              'order' => 'DESC',
              'post_type' => 'products',
              'post_status' => 'publish',
              'post__not_in' => array(get_the_ID()),
              'suppress_filters' => true
            );
            $posts_array = get_posts($args);
            foreach ($posts_array as $key => $value) {
              $img = get_the_post_thumbnail($value->ID, 'medium');
              if (!empty($img)) {
                $image_url = $img;
              } else {
                $image_url = esc_url(get_template_directory_uri()) . '/images/product.jpg';
              }
              ?>
              <li class="grid__2"><a href="<?php echo get_permalink($value->ID); ?>"><?php echo $image_url; ?></a></li>
            <?php
            }
          ?>
        </ul>
      </section>

      <?php
      $args = array(
        'posts_per_page'   => -1,
        'order'            => 'DESC',
        'post_type'        => 'lookbook',
        'post_status'      => 'publish',
        'suppress_filters' => true
      );

      $posts_array  = get_posts( $args );
      $data = $posts_array[0];

      $image_data = array();
      $image_list = get_field('image_list', $data->ID);
      foreach($image_list as $value){
        $tmp = new stdClass();
        $tmp->medium = $value['sizes']['medium_large'];
        $tmp->medium_large = $value['sizes']['post-thumbnail'];
        $image_data[] = $tmp;
      }
      ?>
      <section class="home-section">
        <h3 class="heading--1"><?php echo $data->post_title; ?></h3>
        <div data-module="homeSlider" class="home__carousel">
          <div class="home__carousel__items grid">
            <?php $count=1; foreach($image_data as $key=>$img): if($count%3==0){$class="grid__6"; $img_src = $img->medium_large; }else{$class="grid__3";$img_src = $img->medium; }?>
              <div class="home__carousel__item <?php echo $class; ?>">
                <div class="image"> <img src="<?php echo esc_url( $img_src ); ?>"></div>
              </div>
              <?php $count++; endforeach; ?>
          </div>
          <button class="home__carousel__prev"></button>
          <button class="home__carousel__next"></button>
        </div>
        <div class="grid">
          <div class="grid__2"><a href="<?php echo get_permalink( get_page_by_path( 'lookbook' ) ); ?>" class="button">SEE LOOKBOOK</a></div>
        </div>
      </section>
    </div>
  </main>

<?php get_footer(); ?>