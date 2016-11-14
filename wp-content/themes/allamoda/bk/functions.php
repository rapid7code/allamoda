<?php
/**
 * Allmoda functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage allamoda
 * @since Allamoda 1.0
 */

/**
 * Allamoda only works in WordPress 4.1 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {
  require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('allamoda_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   * @since Allamoda 1.0
   */
  function allamoda_setup()
  {

    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
     * If you're building a theme based on twentyfifteen, use a find and replace
     * to change 'twentyfifteen' to the name of your theme in all the template files
     */
    load_theme_textdomain('allamoda');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(940, 627, true);


    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(array(
      'primary' => __('Primary Menu', 'allamoda'),
      'social' => __('Social Links Menu', 'allamoda'),
    ));

  }
endif; // allamoda_setup
add_action('after_setup_theme', 'allamoda_setup');

/**
 * Register widget area.
 *
 * @since Allamoda 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function allamoda_widgets_init()
{
  register_sidebar(array(
    'name' => __('Widget Area', 'allamoda'),
    'id' => 'sidebar-1',
    'description' => __('Add widgets here to appear in your sidebar.', 'allamoda'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
}

add_action('widgets_init', 'allamoda_widgets_init');


/**
 * Enqueue scripts and styles.
 *
 * @since Allamoda 1.0
 */
function allamoda_scripts()
{
  // Add vendor, used in the main stylesheet.
  wp_enqueue_style('vendor', get_template_directory_uri() . '/css/vendor.css', array(), '1.0');
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0');

  // wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '1.0', true );
  wp_enqueue_script('vendor', get_template_directory_uri() . '/js/vendor.js', array(), '1.0', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
  //wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
}

add_action('wp_enqueue_scripts', 'allamoda_scripts');


/**
 * Var dump content
 *
 * @since Allamoda 1.0
 */
function _dump($result = '', $e = 0)
{
  echo '<pre>';
  print_r($result);
  echo '</pre>';
  if ($e) {
    exit;
  }
}


require get_template_directory() . '/inc/class.sendemail.php';


function home_page_menu_args($args)
{
  $args['show_home'] = true;
  return $args;
}

add_filter('wp_page_menu_args', 'home_page_menu_args');