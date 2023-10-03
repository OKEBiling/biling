
  <script src="/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="/assets/vendor/libs/popper/popper.js"></script>
  <script src="/assets/vendor/js/bootstrap.js"></script>
  <script src="/assets/js/app.js"></script>
  <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/assets/vendor/libs/hammer/hammer.js"></script>
  <script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  

  <!-- Main JS -->
  <script src="/assets/js/main.js"></script>


<?php
if (!empty($scripts)) {
    foreach ($scripts as $scripts) {
        echo "<script  src=\"$scripts\"></script>";
    }
}

?>

