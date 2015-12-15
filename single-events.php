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
        <h4>date</h4>
      <?php
        if (!empty($meta['_igv_date'][0])) {
          echo $meta['_igv_date'][0];
        }
      ?>
      </div>

      <div>
        <h4>location</h4>
      <?php
        if (!empty($meta['_igv_location'][0])) {
          echo $meta['_igv_location'][0];
        }
      ?>
      </div>

      <div>
        <h4>location_link</h4>
      <?php
        if (!empty($meta['_igv_location_link'][0])) {
          echo $meta['_igv_location_link'][0];
        }
      ?>
      </div>

      <div>
        <h4>ticket_link</h4>
      <?php
        if (!empty($meta['_igv_ticket_link'][0])) {
          echo $meta['_igv_ticket_link'][0];
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