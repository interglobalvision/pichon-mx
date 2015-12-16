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
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

      <?php the_content(); ?>

      <div>
        <h4>ingredients</h4>
        <ol>
      <?php
        if (!empty($ingredients)) {
          foreach ($ingredients[0] as $ingredient) {
            echo '<li>' . $ingredient . '</li>';
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