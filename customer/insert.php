<?php
include('../shared/header.php');


$cashierId = $_SESSION['cashierId'];


$sql = "SELECT * FROM rewardlimit";
$query = mysqli_query($connection, $sql) or die("Il y a une erreur" .mysqli_error($connection));
$row = mysqli_fetch_array($query);

$reward = $row['point'];

function referenceNumber($length){
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($chars), 0, $length);
}

$error = false;

if(isset($_POST['text'])){

    //$voice = new com("SAPI.SpVoice");
    
    $text = $_POST['text'];
    $data = explode(";",$text);
    $id = $data[0];
    $idClient = $data[1];
    $price = $data[2];
    $datePurchase = $data[3];

    //$message = "Bonjour Votre ticket est scanner Merci pour votre visite";

    $selectPhone = "SELECT * FROM cashier WHERE id='$cashierId'";
    $phoneQuery = mysqli_query($connection, $selectPhone) or die("Il y a une erreur" .mysqli_error($connection));
    $rowP = mysqli_fetch_array($phoneQuery);
    $phonenumber = $rowP['phonenumber'];
    $idC = $rowP['id'];

    $selectCode = "SELECT * from scan where id = '$id' and idClient = '$idC'";
    $codeQuery = mysqli_query($connection, $selectCode) or die("Il y a une erreur".mysqli_error($connection));
    

    $checkCode = mysqli_num_rows($codeQuery);

    if( $checkCode > 0 ){
        $error = true;
        header('Location: index.php?psdmg');
    }

    $reference = referenceNumber(12);
    $points = intval(floatval($price) / floatval($reward));

    if(!$error){

        $sql = "insert into scan(id, idClient, price, datePurchase) values('$id', '$idC', '$price', '$datePurchase' )";
        $sql1 = "insert into points(phonenumber, casheerId, points, totalPurchase, referenceNumber, dateTime) values('$phonenumber', '$cashierId', '$points', '$price', '$reference', '$datePurchase' )";
        
        $result = mysqli_query($connection, $sql ) or die("L'insertion des données a échouée".mysqli_error($connection));
        $result1 = mysqli_query($connection, $sql1 ) or die("L'insertion des données a échouée".mysqli_error($connection));

        if ($result == 1 && $result1 == 1) {
           // $voice->speak($message);
            header('Location: index.php?msg');
                }
    }
}
?>