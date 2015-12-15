<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section id="posts">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
    $meta = get_post_meta($post->ID);
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

      <?php the_content(); ?>

      <div>
        <h4>website_link</h4>
      <?php
        if (!empty($meta['_igv_website_link'][0])) {
          echo $meta['_igv_website_link'][0];
        }
      ?>
      </div>

      <div>
        <h4>email</h4>
      <?php
        if (!empty($meta['_igv_email'][0])) {
          echo $meta['_igv_email'][0];
        }
      ?>
      </div>

      <div>
        <h4>phone</h4>
      <?php
        if (!empty($meta['_igv_phone'][0])) {
          echo $meta['_igv_phone'][0];
        }
      ?>
      </div>

    </article>

<?php
  }
} else {
?>
    <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

  <!-- end posts -->
  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>