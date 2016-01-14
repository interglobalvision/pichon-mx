<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section id="posts">

<?php
if( have_posts() ) {
  $i = 1;
  while( have_posts() ) {
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