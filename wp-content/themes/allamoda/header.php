<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/apple-icon-180x180.png">
  <link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ); ?>/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory-->
	<?php wp_head(); ?>
</head>

<body>
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<header data-module="header">
  <nav class="header__nav"><a id="logo" href="/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.svg" alt="Alla Moda"></a><a href="javascript:void(0)" class="toggle-icon"><span></span></a></nav>
</header>

<?php

$menu_name = 'main-menu';

if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  var_dump($menu);die;

  $menu_items = wp_get_nav_menu_items($menu->term_id);

  $menu_list = '<ul id="menu-' . $menu_name . '">';

  foreach ( (array) $menu_items as $key => $menu_item ) {
    $title = $menu_item->title;
    $url = $menu_item->url;
    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
  }
  $menu_list .= '</ul>';
} else {
  $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}
echo '<pre>';
print_r($menu_list);
echo '</pre>';die;
// $menu_list now ready to output

?>

<nav class="offscreen">
  <ul class="offscreen__menu">
    <li><a href="<?php echo home_url(); ?>">Home</a></li>
    <li><a href="<?php echo get_permalink( get_page_by_path( 'lookbook' ) ); ?>">Lookbook</a></li>
    <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Woman</a>
      <ul class="offscreen__menu__menu">
        <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Bags</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Clutches</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Totes</a></li>
      </ul>
    </li>
    <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Man</a>
      <ul class="offscreen__menu__menu">
        <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Bags</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Wallets</a></li>
      </ul>
    </li>
    <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Small Leathergoods</a>
      <ul class="offscreen__menu__menu">
        <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Belt</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">Keychains</a></li>
      </ul>
    </li>
    <li><a href="<?php echo get_permalink( get_page_by_path( 'services' ) ); ?>">Bespoke Services</a></li>
    <li><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">Contact</a></li>
    <li><a href="javascript:void(0);">Vietnamese</a></li>
    <li class="offscreen__menu__social">
      <ul>
        <li> <a target="_blank" href="https://www.facebook.com/byAllaModa"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon-fb.png"></a></li>
        <li> <a target="_blank" href="https://www.instagram.com/byallamoda"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon-instagram.png"></a></li>
      </ul>
    </li>
  </ul>
</nav>
<div class="wrapper">

