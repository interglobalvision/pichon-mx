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
        <article <?php post_class('grid-row'); ?> id="post-<?php the_ID(); ?>">
          <?php
            if ($i % 2 === 0) {
              echo '<div class="grid-item item-s-1"></div>';
            }
          ?>
          <div class="grid-item item-s-10 border-left flex-center">
            <a href="<?php the_permalink() ?>"><h2 class="padding-basic"><?php the_title(); ?></h2></a>
          </div>
          <div class="grid-item item-s-10 border-left border-right">
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