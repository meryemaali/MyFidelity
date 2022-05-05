<?php
include('./shared/header.php');
include('./shared/sanitize.php');

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

                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                    method="post">
                    <div class="input-group mb-3">
                        <input type="email"
                            name="email" 
                            id="email"
                            class="form-control"
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span id="errorEmail"></span>
                    <?php
                    if( isset($emailError)){
                        echo $emailError;
                    }
                    ?>
                    <div class="input-group mb-3">
                        
                    
                        <input type="password"
                            name="password" 
                            id="password"
                            class="form-control"
                            placeholder="Mot de passe">
                       
                            
                                <i id="eye" class="far fa-eye-slash"></i>
                           
                          
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span id="errorPassword"></span>
                    <?php
                        if( isset($passwordError)){
                           echo $passwordError;
                        }
                        ?> 
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" 
                            name="login" 
                            id="login"
                            class="btn btn-primary btn-block">Connexion
                        </button>
                        <div class="text-center">Vous n'avez pas un compte ? <a href="register.php">Cliquez-ici</a></div>
                        <div class="text-center">Vous êtes client ? <a href="./customer/scanBadge.php">Scanner votre badge ici</a></div>
                        <div class="text-center">Page d'accueil <a href="index.php">Revenir</a></div>
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