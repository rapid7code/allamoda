<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); ?>


<main class="content services">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="hero hero--about">
    <?php

    $img = $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );

    if( !empty($img) ){
      $image_url = $img[0];
    } else {
      $image_url = esc_url( get_template_directory_uri() ) . '/images/working-table.jpg';
    }
    ?>
    <img src="<?php echo $image_url; ?>" class="content__wrapper hero__image"></div>
  <div class="content__wrapper text">
    <section>
      <div class="grid">
        <div class="grid__4">
          <?php the_content(); ?>
        </div>
      </div>
    </section>
  </div>
  <?php endwhile; wp_reset_query(); ?>
</main>

<?php get_footer(); ?>
