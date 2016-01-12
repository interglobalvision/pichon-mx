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

      <div class="container border-bottom">
        <div class="row">
          <div class="col s-col24 border-left">
            <h2><?php the_title(); ?></h2>
          </div>
        </div>
      </div>

      <div class="container border-bottom">
        <div class="row">
          <div class="col s-col2 force-col"></div>
          <div class="col s-col22 border-left border-right">
            <?php the_post_thumbnail(); ?>
          </div>
        </div>
      </div>

      <div class="container border-bottom">
        <div class="row">
          <div class="col s-col4 force-col"></div>
          <div class="col s-col14 border-left border-right">
            <?php the_content(); ?>
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