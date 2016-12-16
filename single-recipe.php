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

    $ingredients_items = get_post_meta($post->ID, '_igv_ingredient_group');
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-24 border-left">
              <h2 class="padding-basic "><?php the_title(); ?></h2>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-22 offset-s-2 item-m-14 offset-m-2 border-left border-right">
              <?php the_post_thumbnail('col14'); ?>
            </div>
            <div class="grid-item item-s-24 item-m-6 border-right">
              <h3 id="single-recipe-ingredients-heading" class="rotated-heading"><?php echo __('[:es]Ingredientes:[:en]Ingredients'); ?></h3>
              <ul id="single-recipe-ingredients" class="padding-basic">
              <?php
                  // If theres ingredients
                  if (!empty($ingredients_items)) {
                    foreach ($ingredients_items[0] as $ingredient_item) {

                      $ingredient_id = $ingredient_item['ingredient'];

                      if (qtranxf_getLanguage() == 'en' && $ingredient_item['english']) {
                        $ingredient_text = $ingredient_item['english'];
                      } else {
                        $ingredient_text = $ingredient_item['espanol'];
                      }

                      if ($ingredient_text) {

                        // Find tag in ingredient text
                        if( strpos($ingredient_text, '**') !== false) {
                          $ingredient_link = get_term_link( intval( $ingredient_id ) );

                          $ingredient_split = explode( '**', $ingredient_text );

                          $ingredient_text = $ingredient_split[0] . '<a href="' . $ingredient_link . '">' . $ingredient_split[1] . '</a>' . $ingredient_split[2];
                        }

                        echo '<li>' . $ingredient_text . '</li>';

                      }
                    }
                  }
              ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="grid-row">
            <div class="grid-item item-s-24 item-m-14 offset-m-4 border-left border-right">
              <div class="copy">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        </div>
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