    </div>
  </section>
  <footer class="footer has-text-centered">
    <?php
      $startYear = 2020;
      $yearTag = "";
      If (date('Y') > $startYear) {
        $yearTag = $startYear . '-' . date('Y');
      } else {
        $yearTag = $startYear;
      }
    ?>
    &copy;<?php echo $yearTag . get_bloginfo('name'); ?>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>