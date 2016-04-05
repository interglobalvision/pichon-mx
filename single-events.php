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
              <h2><?php the_title(); ?></h2>
              <?php the_content(); ?>
            </div>
            <div class="col s-col8 border-left border-right">

            <?php
              if (!empty($meta['_igv_date'][0])) {
            ?>
              <h4><?php echo __('[:es]Cuando:[:en]When:'); ?> <?php echo $meta['_igv_date'][0]; ?></h4>
            <?php
              }

              if (!empty($meta['_igv_location'][0])) {
            ?>
              <h4><?php echo __('[:es]Donde:[:en]Where:'); ?>:
            <?php
              if (!empty($meta['_igv_location_link'][0])) {
                echo '<a href="' . $meta['_igv_location_link'][0] . '" target="_blank">';
              }
              echo $meta['_igv_location'][0];
              if (!empty($meta['_igv_location_link'][0])) {
                echo '</a>';
              }
            ?></h4>
            <?php
              }

              if (!empty($meta['_igv_ticket_link'][0])) {
                echo '<a href="' . $meta['_igv_location_link'][0] . '" target="_blank">';
            ?>
                <button><?php echo __('[:es]Comprar boletos[:en]Book Tickets'); ?></button>
              </a>
            <?php
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
    <article class="u-alert"><?php echo __('[:es]Lo siento, no posts matched your criteria[:en]Sorry, no posts matched your criteria'); ?></article>
<?php
} ?>

  <!-- end posts -->
  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>