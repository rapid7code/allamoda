<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage allamoda
 * @since Allamoda 1.0
 */

get_header(); ?>
<main class="content">
  <div class="home content__wrapper">
    <section class="home-section">
      <h2 class="heading--1"><?php _e( 'NEW COLLECTION', 'allamoda' ) ?></h2>
      <ul class="grid listing">
        <?php
        //Get post content
        $args = array(
          'posts_per_page'   => -1,
          'order'            => 'DESC',
          'post_type'        => 'products',
          'post_status'      => 'publish',
          'suppress_filters' => true
        );

        $posts_array  = get_posts( $args );

        foreach($posts_array as $key => $value){
          $img = get_the_post_thumbnail( $value->ID, 'medium' );
          if( !empty($img) ){
            $image_url = $img;
          } else {
            $image_url = esc_url( get_template_directory_uri() ) . '/images/product.jpg';
          }
          ?>
          <li class="grid__2"> <a href="<?php echo get_permalink( $value->ID ); ?>"><?php echo $image_url; ?></a>
            <div class="home__product-info">
              <h3 class="home__product-info__name"><?php echo $value->post_title; ?></h3>
            </div>
          </li>
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
