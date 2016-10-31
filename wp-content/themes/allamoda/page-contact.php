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

get_header(); ?>

<main class="content contact">
  <div class="content__wrapper text">
    <h2 class="heading--1">CONTACT</h2>
    <div class="grid">
      <div class="grid__4">
        <p>Film rifle papier-mache wristwatch long-chain hydrocarbons sentient RAF vehicle physical order-flow fetishism sunglasses tank-traps receding courier. Narrative girl camera urban alcohol drone dissident cardboard gang. Assassin refrigerator boy nodal point hacker free-market spook math-car systema concrete. </p>
      </div>
      <div class="grid__6">
        <form name="form-contact" class="contact__form">
          <div class="contact__form__cell">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name">
          </div>
          <div class="contact__form__cell">
            <label for="email">Your Email</label>
            <input type="text" name="email" id="email">
          </div>
          <div class="contact__form__cell">
            <label for="message">Your Message</label>
            <textarea name="message" id="message"></textarea>
          </div>
          <button>Submit</button>
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
