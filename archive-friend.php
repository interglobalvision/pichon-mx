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
?>
    <div class="border-bottom">
      <div class="container">
        <article <?php post_class('row'); ?> id="post-<?php the_ID(); ?>">
          <?php
            if ($i % 2 === 0) {
              echo '<div class="col s-col1 force-col"></div>';
            }
          ?>
          <div class="col s-col10 border-left">
            <h2 class="padding-small"><?php the_title(); ?></h2>

            <div class="padding-small">
              <?php the_content(); ?>
            </div>

            <nav class="padding-small">
            <?php
              if (!empty($meta['_igv_website_link'][0])) {
                echo '<a href="' . $meta['_igv_website_link'][0] . '" target="_blank"><span class="genericon genericon-external"></span></a>';
              }
              if (!empty($meta['_igv_email'][0])) {
                echo '<a href="mailto:' . $meta['_igv_email'][0] . '" target="_blank"><span class="genericon genericon-mail"></span></a>';
              }
              if (!empty($meta['_igv_phone'][0])) {
                echo '<a href="tel:' . $meta['_igv_phone'][0] . '" target="_blank"><span class="genericon genericon-phone"></span></a>';
              }
            ?>
            </nav>

          </div>
          <div class="col s-col10 border-left border-right">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('col10-5to4'); ?></a>
          </div>
        </article>
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