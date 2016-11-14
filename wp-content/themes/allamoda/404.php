<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); ?>

<main class="content">
  <div class="home content__wrapper">
    <section class="home-section">
        <h2 class="heading--1"><?php _e( 'Oops! That page can&rsquo;t be found.', 'allamoda' ); ?></h2>
        <div class="grid">
          <p><a href="<?php echo home_url('/'); ?>"><?php echo _e('< Back To Home', 'allamoda'); ?></a></p>
				</div><!-- .page-content -->
    </section><!-- .error-404 -->
  </div><!-- .content-area -->
</main><!-- .site-main -->

<?php get_footer(); ?>
