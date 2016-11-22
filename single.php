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
            <div class="grid-item item-s-24 border-left">
              <h2 class="padding-basic"><?php the_title(); ?></h2>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-2"></div>
            <div class="grid-item item-s-22 border-left border-right">
              <?php the_post_thumbnail('col22'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-4"></div>
            <div class="grid-item item-s-14 border-left border-right">
              <div class="copy">
                <?php the_content(); ?>
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