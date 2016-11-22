<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
    $meta = get_post_meta($post->ID);
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-22 offset-s-2 border-left border-right">
              <?php the_post_thumbnail('col22'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-24 item-m-16 border-left">
              <div class="copy">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="grid-item item-s-24 item-m-8 border-left">
              <div class="copy">
              <?php if (!empty($meta['_igv_sidebar'])) {
                echo apply_filters('the_content', $meta['_igv_sidebar'][0]);
              }
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    </article>

<?php
  }
} else {
?>
  <div class="row">
    <article class="grid-item item-s-24 u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
  </div>
<?php
} ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>
