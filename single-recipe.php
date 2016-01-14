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
    $ingredients = get_post_meta($post->ID, '_igv_ingredients');
    $ingredients_tags = get_terms('ingredient');
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <div class="border-bottom">
        <div class="container">
          <div class="row">
            <div class="col s-col24 border-left">
              <h2><?php the_title(); ?></h2>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="row">
            <div class="col s-col2 force-col"></div>
            <div class="col s-col14 border-left border-right">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="col s-col6 border-right">
              <h3>Ingredients</h3>
              <ol>
              <?php
                  // If theres ingredients
                  if (!empty($ingredients)) {
                    foreach ($ingredients[0] as $ingredient_text) {
                      // Check ingredient text against ingredient tags
                      foreach($ingredients_tags as $ingredient_tag) { 
                        $ingredient_name = $ingredient_tag->name;
                        // Find tag in ingredient text
                        if( strpos($ingredient_text, $ingredient_name) !== false) {
                          $ingredient_link = get_term_link($ingredient_tag);
                          $ingredient_text = str_replace($ingredient_name, '<a href="' . $ingredient_link . '">' . $ingredient_name . '</a>', $ingredient_text);
                          break;
                        }
                      }
                      echo '<li>' . $ingredient_text . '</li>';
                    }
                  }
              ?>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="border-bottom">
        <div class="container">
          <div class="row">
            <div class="col s-col4 force-col"></div>
            <div class="col s-col14 border-left border-right">
              <?php the_content(); ?>
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
