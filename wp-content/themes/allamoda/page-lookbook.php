<?php
/**
 * Template Name: Look Book Page
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

<main class="content lookbook">
  <nav class="page__nav content__wrapper">
    <ul class="page__nav__menu">
      <?php
      $args = array(
        'type'                     => 'post',
        'child_of'                 => $category->term_id,
        'orderby'                  => 'name',
        'order'                    => 'DESC',
        'hide_empty'               => FALSE,
        'hierarchical'             => 1,
        'taxonomy'                 => 'category',
      );
      $child_categories = get_categories($args );
      foreach($child_categories as $child_cat):
        ?>
        <li><a href="<?php echo $child_cat->slug; ?>"><?php echo $child_cat->name;?></a></li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <div class="content__wrapper lookbook">
    <section>
      <h2 class="heading--1">SUMMER LOOKBOOK 2016</h2>
      <div class="grid">
        <?php
        $cat_id = $category->cat_ID;

        if($category->slug == 'lookbook'){
          //Get post content
          $args = array(
            'posts_per_page'   => -1,
            'order'            => 'DESC',
            'post_type'        => 'lookbook',
            'post_status'      => 'publish',
            'suppress_filters' => true
          );
        } else {
          //Get post content
          $args = array(
            'posts_per_page'   => -1,
            'category'         => $cat_id,
            'order'            => 'DESC',
            'post_type'        => 'lookbook',
            'post_status'      => 'publish',
            'suppress_filters' => true
          );
        }

        $posts_array  = get_posts( $args );
        $image_data = array();

        foreach($posts_array as $key => $value){
          $image_list = get_field('image_list', $value->ID);
          foreach($image_list as $value){
            $tmp = new stdClass();
            $tmp->medium_large = $value['sizes']['medium_large'];
            $image_data[] = $tmp;
          }
        }
        ?>

        <?php foreach($image_data as $key=>$img): if($key>0 && $key%2==0){$class="grid__6";}else{$class="grid__3";}?>
          <div class="<?php echo $class; ?>"><img src="<?php echo esc_url( $img->medium_large ); ?>"></div>
        <?php endforeach; ?>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>
