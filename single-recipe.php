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

      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

      <?php the_content(); ?>

      <div>
        <h4>ingredients</h4>
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
