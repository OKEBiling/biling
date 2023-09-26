<?php
include('header.php');

?>
<body data-sidebar="colored">
        <div id="layout-wrapper">

<?php
if (isset($content)) {
    echo $content;
} 

?>

       
       
<?php
include('footer.php')


?>
<!-- Vendors JS -->
  <script src="/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
  <!-- Page JS -->
  <script src="/assets/js/pages-auth.js"></script>
<!-- Custoom js-->
</body>
</html>