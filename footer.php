      </div>
    </section>
    <footer class="footer">
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
  </div>
  <?php wp_footer(); ?>
  </body>
</html>