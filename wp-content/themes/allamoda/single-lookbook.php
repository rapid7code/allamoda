<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Allamoda
 * @since Allamoda 1.0
 */
$args = array(
  'posts_per_page'   => -1,
  'order'            => 'DESC',
  'post_type'        => 'lookbook',
  'post_status'      => 'publish',
  'suppress_filters' => true
);

$posts_array  = get_posts( $args );
$data = $posts_array[0];

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
        <?php while ( have_posts() ) : the_post(); ?>
        <h2 class="heading--1"><?php the_title(); ?></h2>
        <div class="grid">
            <?php
            $image_data = array();
            $image_list = get_field('image_list', get_the_ID());
            $count=1;
            foreach($image_list as $key=>$img): if($count%3==0){$class="grid__6";}else{$class="grid__3";}
            ?>
            <div class="<?php echo $class; ?>"><img src="<?php echo esc_url($img['sizes']['medium_large']); ?>"></div>
            <?php $count++; endforeach; ?>
        </div>
        <?php endwhile; wp_reset_query(); ?>
      </section>
    </div>
  </main>

<?php get_footer(); ?>