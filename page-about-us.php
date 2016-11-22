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
            <div class="grid-item item-s-1"></div>
            <div class="grid-item item-s-22 border-left border-right">
              <?php the_post_thumbnail('col22'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-16 border-left">
              <div class="copy">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="grid-item item-s-8 border-left padding-basic">
              <?php
                $people = get_posts('post_type=people&posts_per_page=-1');
                if ($people) {
                  foreach ($people as $post) {
                    setup_postdata($post);
              ?>
                <div class="about-person">
                  <?php the_post_thumbnail('col8'); ?>

                  <h4 class="about-person-name font-sans u-align-center"><?php the_title(); ?></h4>

                  <?php the_content(); ?>

                </div>
               <?php
                  }
                  wp_reset_postdata();
                }

              ?>
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