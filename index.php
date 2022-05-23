<?php
include('./shared/header.php');
include('./shared/sanitize.php');
//echo 'Version PHP courante : ' . phpversion();

if( isset($_SESSION['cashierId']) != "" && isset($_SESSION['cashierRole']) != ""){
    if($_SESSION['cashierRole'] == 'administrateur'){
        header("Location: ./manager/index.php");
    } else if($_SESSION['cashierRole'] == 'caisser'){
        header("Location: ./cashier/index.php");
    } else if($_SESSION['cashierRole'] == 'client' && $_SESSION['actif'] == '1'){
        header("Location: ./customer/index.php");
    } 
    else {
        $errormsg = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Non autorisé !</div>";
             
    }
}

$error = false;

if( isset($_POST['login'])){
    $email = cleanForm($_POST['email']);
    $password = cleanForm($_POST['password']);

    if(empty($email)){
        $error = true;
        $emailError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $error = true;
        $emailError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Email non valide.</div>";
    
    }

    if(empty($password)){
        $error = true;
        $passwordError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } 

    $password = md5($password);

    if(!$error){

        $result = "SELECT * from cashier WHERE email = '$email' and password = '$password'";
        $query = mysqli_query($connection, $result) or die("Il y a une erreure".mysqli_error($connection));
        $row = mysqli_fetch_array($query);

        if($row > 0){
            $_SESSION['cashierId'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['cashierRole'] = $row['cashierRole'];
            $_SESSION['actif'] = $row['actif'];

            if($_SESSION['cashierRole']  == 'administrateur'){
                header("Location: ./manager/index.php");
            } else if($_SESSION['cashierRole'] == 'caissier'){
                header("Location: ./cashier/index.php");
            } else if($_SESSION['cashierRole'] == 'client' && $_SESSION['actif'] == '1'){
                header("Location: ./customer/index.php");
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
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <?php

                if(isset($errormsg)){
                    echo $errormsg;
                }
                ?>
                <p class="h1"><b>MyFidelity </b>App</p>
            </div>
            <div class="card-body">
            <div class="text-center">Bienvenu ! Scannez votre badge ici
            <div style="text-align: center;">
            <button type="button" class="btn btn-light"> <a href="./customer/scanBadge.php"><span class='bi bi-qr-code-scan' style='color: blue; font-size: 10em'></span></a></button>
          
                        <div class="text-center">Connectez-vous ici ? <a href="index1.php">Connexion</a></div>
                        
                        </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <script src="./dist/js/all.js"></script>
                    </body>
                    </html>

    <?php
    include('./shared/footer.php');
    ?>