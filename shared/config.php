<?php


ob_start();

session_start();

$connection = mysqli_connect( 'localhost', 'root', '','loyalty');

if(!$connection){

    die("could not connect to the database ".mysqli_error($connection));
}
?>