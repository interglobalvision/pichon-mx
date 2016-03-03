<?php
if (get_next_posts_link() || get_previous_posts_link()) {

  $previous = get_previous_posts_link(__('[:es]<span class="arrow">&#8606;</span> Anterior[:en]<span class="arrow">&#8606;</span> Previous'));
  $next = get_next_posts_link(__('[:es]Siguente <span class="arrow">&#8608;</span>[:en]Next <span class="arrow">&#8608;</span>'));

?>
  <!-- post pagination -->
  <nav id="pagination" class="border-bottom">
    <div class="container">
      <div class="row">
        <?php
          if ($previous) {
        ?>
        <div class="col s-col7 pagination-block fonts-sans border-right force-col background-yellow flex-center">
          <?php echo $previous; ?>
        </div>
        <div class="col s-col10 force-col"></div>
        <?php
          } else {
        ?>
        <div class="col s-col17 force-col"></div>
        <?php
          }
        ?>
        <div class="col s-col7 pagination-block font-sans border-left force-col background-blue flex-center">
          <?php
            if ($next) {
              echo $next;
            }
          ?>
        </div>
      </div>
    </div>
  </nav>
<?php
}
?>