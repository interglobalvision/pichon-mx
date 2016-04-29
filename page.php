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
          <div class="row">
            <div class="col s-col2 force-col"></div>
            <div class="col s-col22 border-left border-right">
              <?php the_post_thumbnail('col22'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="row">
            <div class="col s-col16 border-left">
              <div class="copy">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="col s-col8 border-left">
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
    <article class="col s-col24 u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
  </div>
<?php
} ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>
