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
<html >
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
  <nav class="header__nav"><a id="logo" href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.svg" alt="Alla Moda"></a><a href="javascript:void(0)" class="toggle-icon"><span></span></a></nav>
</header>

<?php
$menu_name = 'primary';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>

<nav class="offscreen">
  <ul class="offscreen__menu">
    <?php
    $count = 0;
    $submenu = false;

    foreach( $menuitems as $item ):
    $title = $item->title;
//    $link = str_replace( "/category/", "/", $item->url );
    $link = $item->url;
    $id = $item->ID;

    // item does not have a parent so menu_item_parent equals 0 (false)
    if ( !$item->menu_item_parent ):

    // save this id for later comparison with sub-menu items
    $parent_id = $item->ID;
    ?>
    <li>
      <a href="<?php echo $link; ?>" class="title">
        <?php echo $title; ?>
      </a>
      <?php endif; ?>
      <?php if ( $parent_id == $item->menu_item_parent ): ?>
      <?php if ( !$submenu ): $submenu = true; ?>
        <ul class="offscreen__menu__menu">
          <?php endif; ?>
          <li>
            <a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a>
          </li>
          <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
        </ul>
        <?php $submenu = false; endif; ?>
      <?php endif; ?>
      <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
      </li>
      <?php $submenu = false; endif; ?>
      <?php $count++; endforeach; ?>

<!--    <li><a href="javascript:void(0);">Vietnamese</a></li>-->
    <li class="offscreen__menu__social">
      <ul>
        <li> <a target="_blank" href="https://www.facebook.com/byAllaModa"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon-fb.png"></a></li>
        <li> <a target="_blank" href="https://www.instagram.com/byallamoda"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon-instagram.png"></a></li>
      </ul>
    </li>
  </ul>
</nav>

<div class="wrapper">

