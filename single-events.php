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
            <div class="col s-col3 force-col"></div>
            <div class="col s-col20 border-left border-right">
              <?php the_post_thumbnail('col20'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="row">
            <div class="col s-col16 border-left">
              <h2 id="single-event-title"><?php the_title(); ?></h2>
              <div class="copy">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="col s-col8 border-left border-right">
              <div class="padding-basic font-leading-wide">
            <?php
              if (!empty($meta['_igv_date'][0])) {
            ?>
              <h4><span class="font-sans font-uppercase"><?php echo __('[:es]Cuando:[:en]When:'); ?></span>
            <?php
              $date = new \Moment\Moment('@' . $meta['_igv_date'][0]);
              echo $date->format($date_format); ?></h4>
            <?php
              }

              if (!empty($meta['_igv_location'][0])) {
            ?>
              <h4><span class="font-sans font-uppercase"><?php echo __('[:es]Donde:[:en]Where:'); ?></span>
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
            ?>
              </div>
            <?php
              if (!empty($meta['_igv_ticket_link'][0])) {
                echo '<a href="' . $meta['_igv_ticket_link'][0] . '" target="_blank">';
            ?>
                <div class="border-top border-bottom font-sans font-uppercase">
                  <button id="button-tickets"><?php echo __('[:es]Comprar boletos[:en]Book Tickets'); ?></button>
                </div>
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
