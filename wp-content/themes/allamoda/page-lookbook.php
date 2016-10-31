<?php
/**
 * Template Name: Look Book Page
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

<main class="content lookbook">
  <nav class="page__nav content__wrapper">
    <ul class="page__nav__menu">
      <li><a href="<?php echo get_permalink( get_page_by_path( 'lookbook' ) ); ?>">SUMMER 2016</a></li>
      <li><a href="<?php echo get_permalink( get_page_by_path( 'lookbook' ) ); ?>">AUTUMN 2016</a></li>
      <li><a href="<?php echo get_permalink( get_page_by_path( 'lookbook' ) ); ?>">SUMMER 2015</a></li>
    </ul>
  </nav>
  <div class="content__wrapper lookbook">
    <section>
      <h2 class="heading--1">SUMMER LOOKBOOK 2016</h2>
      <div class="grid">
        <div class="grid__3"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
        <div class="grid__3"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
        <div class="grid__6"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-landscape.jpg"></div>
        <div class="grid__3"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
        <div class="grid__3"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
        <div class="grid__6"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-landscape.jpg"></div>
        <div class="grid__3"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
        <div class="grid__3"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-portrait.jpg"></div>
        <div class="grid__6"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lookbook-landscape.jpg"></div>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>
