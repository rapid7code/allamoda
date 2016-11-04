<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage allamoda
 * @since Allamoda 1.0
 */

require get_template_directory() . '/inc/contact.php';
$res = submitContact();
get_header(); ?>

<main class="content contact">
  <div class="content__wrapper text">
    <h2 class="heading--1"><?php _e( 'CONTACT', 'allamoda' ) ?></h2>
    <div class="grid">
      <div class="grid__4">
        <?php while ( have_posts() ) : the_post(); the_content(); endwhile; wp_reset_query();?>
      </div>
      <div class="grid__6">
        <form name="form-contact" class="contact__form" method="post">
          <div class="contact__form__cell">
            <label for="name"><?php _e( 'Your Name', 'allamoda' ); ?></label>
            <input type="text" name="fullname" id="fullname" value="<?php echo ($res['error_code'] == 1) ? $_POST['fullname'] : ''; ?>">
          </div>
          <div class="contact__form__cell">
            <label for="email"><?php _e( 'Your Email', 'allamoda' ); ?></label>
            <input type="text" name="email" id="email" value="<?php echo ($res['error_code'] == 1 ) ? $_POST['email'] : ''; ?>">
          </div>
          <div class="contact__form__cell">
            <label for="message"><?php _e( 'Your Message', 'allamoda' ); ?></label>
            <textarea name="message" id="message"><?php echo ($res['error_code'] == 1 ) ? $_POST['message'] : ''; ?></textarea>
          </div>
          <p><?php echo $res['msg']; ?></p>
          <button type="submit"><?php _e( 'Submit', 'allamoda' ); ?></button>
        </form>
      </div>
      <div class="grid__6">
        <p>General enquiries: <a href="javascript:void(0)">allamoda.vn@gmail.com</a></p>
        <p><a href="javascript:void(0)">facebook</a> | <a href="javascript:void(0)">instagram</a></p>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
