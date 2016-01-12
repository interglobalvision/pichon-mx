<?php
if (get_next_posts_link() || get_previous_posts_link()) {
  $previous = get_previous_posts_link('Newer');
  $next = get_next_posts_link('Older');
?>
  <!-- post pagination -->
  <nav id="pagination" class="border-bottom">
    <div class="container">
      <div class="row">
        <?php
          if ($previous) {
        ?>
        <div class="col s-col7 border-right force-col background-yellow">
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
        <div class="col s-col7 border-left force-col background-blue">
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