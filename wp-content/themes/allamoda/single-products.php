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
      <div class="pdp">
        <div class="pdp__left">
          <div class="pdp__left__inner">
            <h1 class="pdp__left__name">Product Name</h1>
            <div class="pdp__share mobile-hidden">Share<br><a href="javascript:void(0);"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon-fb.png"></a></div>
          </div>
          <div class="pdp__images">
            <div data-module="productSlider" class="pdp__images__slider">
              <div class="pdp__image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></div>
              <div class="pdp__image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></div>
              <div class="pdp__image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></div>
              <div class="pdp__image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></div>
            </div>
          </div>
          <div class="pdp__right">
            <div class="pdp__right__inner">
              <h3 class="heading--2">DESCRIPTION</h3>
              <p>
                Youtube sunglasses tank-traps Kowloon digital tube concrete dissident systema-ware. Youtube beef noodles office chrome alcohol car cartel disposable Kowloon human convenience store neon monofilament post-weathered assassin gang. Katana alcohol vehicle bridge uplink network numinous convenience store San Francisco rain. Sentient pistol geodesic boat industrial grade voodoo god corporation youtube woman. <a href="javascript:void(0);">Leather Care</a>
              </p>
              <h3 class="heading--2">MEASUREMENT</h3>
              <p>

                Width: 35cm<br>Height: 30cm<br>Strap length: 115cm
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content__wrapper text">
      <section class="home-section">
        <h2 class="heading--1">NEW COLLECTION</h2>
        <ul class="grid listing">
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
          <li class="grid__2"> <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
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