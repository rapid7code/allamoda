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
      <h2 class="heading--1">NEW COLLECTION</h2>
      <ul class="grid listing">
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a>
          <div class="home__product-info">
            <h3 class="home__product-info__name">Product name </h3>
          </div>
        </li>
      </ul>
    </section>
    <section class="home-section">
      <h3 class="heading--1">SUMMER 2016 LOOKBOOK</h3>
      <div data-module="homeSlider" class="home__carousel">
        <div class="home__carousel__items grid">
          <div class="home__carousel__item grid__3">
            <div class="image"> <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
          </div>
          <div class="home__carousel__item grid__3">
            <div class="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
          </div>
          <div class="home__carousel__item grid__6">
            <div class="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-landscape.jpg"></div>
          </div>
          <div class="home__carousel__item grid__3">
            <div class="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
          </div>
          <div class="home__carousel__item grid__3">
            <div class="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
          </div>
          <div class="home__carousel__item grid__6">
            <div class="image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-landscape.jpg"></div>
          </div>
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
