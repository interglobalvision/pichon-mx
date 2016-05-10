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
        <a href="<?php echo $href; ?>" target="_blank">
          <article <?php post_class('row'); ?> id="post-<?php the_ID(); ?>">
            <?php
              if ($i % 2 === 0) {
                echo '<div class="col s-col1 force-col"></div>';
              }
            ?>
            <div class="col s-col8 border-left">
              <h2 class="padding-small"><?php the_title(); ?></h2>
              <?php
                if (!empty($meta['_igv_link'][0])) {
                  echo '<div class="padding-small"><a href="' . $meta['_igv_link'][0] . '" target="_blank"><span class="genericon genericon-external"></span></a></div>';
                }
              ?>
            </div>
            <div class="col s-col14 border-left border-right">
              <div class="padding-small font-pull-quote">
                <?php echo '&#8220;' . $post->post_content . '&#8221;'; ?>
              </div>
            </div>
          </article>
        </a>
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