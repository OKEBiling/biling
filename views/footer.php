<?php

if (!empty($footerScripts)) {
    foreach ($footerScripts as $footerScript) {
        echo "<script   src=\"$footerScript\"></script>";
    }
}

?>