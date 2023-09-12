        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/js/app.js"></script>
        <!-- Icon -->

        <!-- apexcharts -->

        <!-- Vector map-->


        <!-- App js -->

       <!-- Custoom js-->

<?php
if (!empty($scripts)) {
    foreach ($scripts as $scripts) {
        echo "<script  src=\"$scripts\"></script>";
    }
}

?>