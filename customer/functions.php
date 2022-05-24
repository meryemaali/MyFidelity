<?php

    define('DBINFO', 'mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_b62de6d95fae9c3');
    define('DBUSER','bfa812fd18fa85');
    define('DBPASS','cc5d51e0');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

?>