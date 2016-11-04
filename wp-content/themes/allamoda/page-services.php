<?php
/**
 * Template Name: Services Page
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

<main class="content services">
  <div class="hero hero--about"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/working-table.jpg" class="content__wrapper hero__image"></div>
  <div class="content__wrapper text">
    <section>
      <div class="grid">
        <div class="grid__4">
          <?php while ( have_posts() ) : the_post(); the_content(); endwhile; wp_reset_query();?>
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>
