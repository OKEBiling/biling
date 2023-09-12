<?php
include('header.php');

?>

<body data-sidebar="colored">
    <div id="layout-wrapper">
        <?php
         include('headerbar.php');
        include('sindebar.php');
        ?>
        <?php
        if (isset($content)) {
            echo $content;
        }
        ?>
    </div>

    <?php include('footer.php') ?>

</body>
</html>