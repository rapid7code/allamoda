<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Allamoda
 * @since Allamoda 1.0
 */
//Get post content
$args = array(
  'posts_per_page'   => -1,
  'order'            => 'DESC',
  'post_type'        => 'lookbook',
  'post_status'      => 'publish',
  'suppress_filters' => true
);

$posts_array  = get_posts( $args );
$data = $posts_array[0];

$image_data = array();
$image_list = get_field('image_list', $data->ID);
foreach($image_list as $value){
  $tmp = new stdClass();
  $tmp->medium_large = $value['sizes']['medium_large'];
  $image_data[] = $tmp;
}
get_header(); ?>

<main class="content lookbook">
  <nav class="page__nav content__wrapper">
    <ul class="page__nav__menu">
      <?php foreach($posts_array as $post): ?>
      <li><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title;?></a></li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <div class="content__wrapper lookbook">
    <section>
      <h2 class="heading--1"><?php echo $data->post_title; ?></h2>
      <div class="grid">
        <?php $count=1; foreach($image_data as $key=>$img): if($count%3==0){$class="grid__6";}else{$class="grid__3";}?>
        <div class="<?php echo $class; ?>"><img src="<?php echo esc_url( $img->medium_large ); ?>"></div>
        <?php $count++; endforeach; ?>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>