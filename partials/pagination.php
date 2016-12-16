<?php
if (get_next_posts_link() || get_previous_posts_link()) {

  $previous = get_previous_posts_link(__('[:es]<span class="arrow">&#8606;</span> Anterior[:en]<span class="arrow">&#8606;</span> Previous'));
  $next = get_next_posts_link(__('[:es]Siguente <span class="arrow">&#8608;</span>[:en]Next <span class="arrow">&#8608;</span>'));

?>
  <!-- post pagination -->
  <nav id="pagination" class="border-bottom u-overflow-hidden">
    <div class="container">
      <div class="grid-row">
  <?php
    if ($previous) {
  ?>
        <div id="pagination-previous" class="grid-item item-s-10 item-m-7 pagination-block font-sans border-right force-col background-yellow flex-center padding-basic">
    <?php echo $previous; ?>
        </div>
        <div class="grid-item item-s-2 item-m-10"></div>
  <?php
    } else {
  ?>
        <div class="grid-item item-s-14 item-m-10"></div>
  <?php
    }
  ?>
    <?php
      if ($next) {
    ?>
        <div id="pagination-next" class="grid-item item-s-10 item-m-7 pagination-block font-sans border-left force-col background-blue flex-center padding-basic">
          <?php echo $next; ?>
        </div>
    <?php
      }
    ?>
      </div>
    </div>
  </nav>
<?php
}
?>
