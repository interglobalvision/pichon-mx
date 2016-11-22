<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section id="posts">

<?php
if( have_posts() ) {
  $i = 1;
  while( have_posts() ) {
    the_post();
    $meta = get_post_meta($post->ID);

    $href = '';
    if (!empty($meta['_igv_link'][0])) {
      $href = $meta['_igv_link'][0];
    } else if (!empty($meta['_igv_file'][0])) {
      $href = $meta['_igv_file'][0];
    }
?>
    <div class="border-bottom">
      <div class="container">
    <?php
    if ( ! empty( $href ) ) {
      echo '<a href="' . $href . '" target="_blank">';
    }
    ?>
          <article <?php post_class('grid-row'); ?> id="post-<?php the_ID(); ?>">
            <?php
              if ($i % 2 === 0) {
                echo '<div class="grid-item item-s-1"></div>';
              }
            ?>
            <div class="grid-item item-s-8 border-left">
              <h2 class="padding-small"><?php the_title(); ?></h2>
              <?php
                if (!empty($meta['_igv_link'][0])) {
                  echo '<div class="padding-small"><a href="' . $meta['_igv_link'][0] . '" target="_blank"><span class="genericon genericon-external"></span></a></div>';
                }
              ?>
            </div>
            <div class="grid-item item-s-14 border-left border-right">
              <div class="padding-small font-pull-quote">
                <?php echo '&#8220;' . $post->post_content . '&#8221;'; ?>
              </div>
            </div>
          </article>
    <?php
    if ( ! empty( $href ) ) {
      echo '</a>';
    }
    ?>
      </div>
    </div>

<?php
  $i++;
  }
} else {
?>
    <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

  <!-- end posts -->
  </section>

  <?php get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>
