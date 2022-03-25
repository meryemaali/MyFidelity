<?php

session_start();

if(isset($_SESSION['cashierId']) && $_SESSION['cashierRole']) {
    session_destroy();
    unset($_SESSION['cashierId']);
    unset($_SESSION['cashierRole']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);

    header("Location: ../index.php");

}
?>