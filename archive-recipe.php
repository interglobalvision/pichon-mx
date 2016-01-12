<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <section id="search">
    <div class="container">
      <div class="row">
        <div class="col s-col1 force-col"></div>
        <div class="col s-col23 border-bottom border-left border-right
          ">
          <h2>Search by Meal:</h2>
          Taxonomy name tbc here.
        </div>
      </div>
      <div class="row">
        <div class="col s-col1 force-col"></div>
        <div class="col s-col23 border-left">
          <h2>Search by Ingredient:</h2>
          <ul class="u-inline-list">
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
          ?>
            <li><a href="<?php echo get_term_link( $ingredient ); ?>">
              <?php echo $ingredient->name; ?>
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
        <article <?php post_class('row'); ?> id="post-<?php the_ID(); ?>">
          <?php
            if ($i % 2 === 0) {
              echo '<div class="col s-col1 force-col"></div>';
            }
          ?>
          <div class="col s-col10 border-left">
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
          </div>
          <div class="col s-col10 border-left">
            <?php the_post_thumbnail(); ?>
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