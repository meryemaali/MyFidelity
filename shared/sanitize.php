<?php
    //désinfecter les valeurs d’entrée du formulaire
    function cleanForm($data)
    {
        global $connection;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        //$data = mysqli_escape_string($connection, $data);
    
        return $data;
    }
    
?>