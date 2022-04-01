<?php
include('../shared/header.php');

$error = false;

if(isset($_POST['text'])){

    
    $text = $_POST['text'];

    if(!$error){

        $result = "SELECT * from cashier WHERE email = '$text' ";
        $query = mysqli_query($connection, $result) or die("Il y a une erreur".mysqli_error($connection));
        $row = mysqli_fetch_array($query);

        if($row > 0){
            $_SESSION['cashierId'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['cashierRole'] = $row['cashierRole'];

            if($_SESSION['cashierRole']  == 'administrateur'){
                header("Location: ./manager/index.php");
            } else if($_SESSION['cashierRole'] == 'caissier'){
                header("Location: ./cashier/index.php");
            } else if($_SESSION['cashierRole'] == 'client'){
                header("Location: index.php");
            } else {
                
                $errormsg = "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Non autorisé !</div>";
             }
        } else {
            $errormsg = "<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Email ou mot de passe est incorrecte !</div>";
        }
    
    }


   
  
}
?>