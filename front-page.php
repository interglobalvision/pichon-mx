<?php
get_header();

if (qtranxf_getLanguage() == 'es') {
  $locale = 'es_ES';
} else {
  $locale = 'en_US';
}

\Moment\Moment::setLocale($locale);

$date_format = 'j F Y';
?>

<!-- main content -->

<main id="main-content">

  <!-- home upcoming event section -->

  <?php
    $date = time();

    $upcoming_event = new WP_Query(array(
      'post_type' => 'events',
      'posts_per_page' => -1,
      'key'     => '_igv_date',
      'value'   => $date,
      'compare' => '>='
    ));

    if ($upcoming_event->have_posts()) {
      $upcoming_event->the_post();
      $meta = get_post_meta($post->ID);

      $date = new \Moment\Moment('@' . $meta['_igv_date'][0]);
  ?>
  <section id="home-events" class="border-bottom">
    <div class="container">
      <a href="<?php the_permalink(); ?>"
        <div class="grid-row">
          <div class="grid-item item-s-6 border-left padding-basic">
            <h2 class="rotated-heading"><?php echo __('[:es]Proximo Evento![:en]Upcoming Event!'); ?></h2>
          </div>
          <div class="grid-item item-s-5 flex-center padding-basic">
            <h3 class="font-serif font-capitalize"><?php echo $date->format($date_format); ?></h3>
          </div>
          <div class="grid-item item-s-11 border-right flex-center flex-left-align padding-basic">
            <h2><?php the_title(); ?></h2>
          </div>
        </div>
      </a>
    </div>
  </section>
  <?php
    }
  ?>

  <!-- home slideshow -->
  <section id="home-slideshow" class="border-bottom">
    <div class="container">
      <div class="grid-row">
        <div class="grid-item item-s-1 only-mobile"></div>
        <div class="grid-item item-s-22 border-left border-right">
          <?php
            $home_slideshow = IGV_get_option('_igv_home_slideshow');
            if ($home_slideshow) {
              echo do_shortcode($home_slideshow);
            }
          ?>
        </div>
      </div>
    </div>
  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>