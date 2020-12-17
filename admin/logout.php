<?php    
    session_start();
    if(isset($_SESSION['userdata'])) {

        session_unset();
        session_destroy();
        echo '<script>window.location="../index.php";</script>';
    }
?>

