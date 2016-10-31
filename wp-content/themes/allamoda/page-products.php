<?php
/**
 * Template Name: Products Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage allamoda
 * @since Allamoda 1.0
 */

get_header(); ?>
<main class="content">
  <div class="products content__wrapper">
    <section class="home-section">
      <h2 class="heading--1">PRODUCT CATEGORY</h2>
      <ul class="grid listing">
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
        <li class="grid__2"> <a href="<?php echo get_permalink( 30 ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/product.jpg"></a></li>
      </ul>
    </section>
  </div>
</main>

<?php get_footer(); ?>
