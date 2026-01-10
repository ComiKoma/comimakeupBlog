<?php
    session_start();
    session_unset();
    session_destroy();

    header("Location: http://comimakeupBlog.ml/index.php?page=pocetna"); /* Redirect browser */
    
?>