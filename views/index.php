<?php
include('header.php');
$title=null;
?>

    
    <body>
        <div class="layout-wrapper layout-content-navbar  ">
            <div class="layout-container">
                
        <?php
        include('sindebar.php');
        ?>
        
        
        
        <div class="layout-page">
            <?php
        include('headerbar.php');
        ?> 
            
            
        <?php
        if (isset($content)) {
            echo $content;
        }
        ?>
         </div>
    </div>

    <?php include('footer.php') ?>
 </div>
</body>
</html>