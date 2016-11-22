<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <section id="search">
    <div class="container">
      <div class="grid-row">
        <div class="grid-item item-s-1"></div>
        <div class="grid-item item-s-23 padding-basic border-bottom border-left border-right">
          <h2><?php echo __('[:es]Buscar por Categoría[:en]Search by Category'); ?> :</h2>
          <ul class="u-inline-list font-larger">
          <?php
            $taxonomies = array(
              'recipe_category',
            );
            $args = array(
              'orderby' => 'none',
            );
            $categories = get_terms($taxonomies, $args);
            if ($categories) {
              foreach ($categories  as $category) {
            ?>
              <li class="taxonomy-recipe-category"><a href="<?php echo get_term_link( $category ); ?>"><?php echo $category->name; ?></a></li>
            <?php
              }
            }
          ?>
          </ul>
        </div>
      </div>
      <div class="grid-row">
        <div class="grid-item item-s-1 force-col"></div>
        <div class="grid-item item-s-23 padding-basic border-left">
          <h2><?php echo __('[:es]Buscar por ingrediente[:en]Search by Ingredient'); ?> :</h2>
          <ul class="u-inline-list font-larger">
          <?php
            $taxonomies = array(
              'ingredient',
            );
            $args = array(
              'orderby' => 'none',
            );
            $ingredients = get_terms($taxonomies, $args);
            if ($ingredients) {
              foreach ($ingredients  as $ingredient) {
                $ingredient_name_es = get_term_meta( $ingredient->term_id, '_igv_ingredient_name_es', true );
            ?>
              <li class="taxonomy-ingredient"><a href="<?php echo get_term_link( $ingredient ); ?>">
                <?php
                  if (qtranxf_getLanguage() == 'es' && $ingredient_name_es) {
                    echo $ingredient_name_es;
                  } else {
                    echo $ingredient->name;
                  }
                ?>
              </a></li>
            <?php
              }
            }
          ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="border-bottom">

    </div>
  </section>

  <!-- main posts loop -->
  <section id="posts">

<?php
if (have_posts()) {
  $i = 1;
  while (have_posts()) {
    the_post();
?>
    <div class="border-bottom">
      <div class="container">
        <article <?php post_class('grid-row'); ?> id="post-<?php the_ID(); ?>">
          <?php
            if ($i % 2 === 0) {
              echo '<div class="grid-item item-s-1"></div>';
            }
          ?>
          <div class="grid-item item-s-10 border-left flex-center">
            <a href="<?php the_permalink() ?>"><h2 class="padding-basic"><?php the_title(); ?></h2></a>
          </div>
          <div class="grid-item item-s-10 border-left border-right flex-center">
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