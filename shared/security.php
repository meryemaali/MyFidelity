<?php

if( !isset($_SESSION['cashierId']) && !$_SESSION['cashierRole']){
    header("Location: ../index.php");
}
?>