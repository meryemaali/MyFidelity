<?php
include('./includes/header.php');
include('../shared/sanitize.php');

$id = $_SESSION['cashierId'];

$error = false;



if(isset($_POST['updatePassword'])){
    $password = cleanForm($_POST['password']);

    if(empty($password)){
        $error = true;
        $passwordError =  "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,15}$/", $password)){
        //"/^\S(?=\S{6,15})(?=\S[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/"  
        $error = true;
        $passwordError = "<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Mot de passe doit contenir entre 6 et 15 caractères dont une lettre majuscule, une lettre minuscule et un chiffre.</div>";
      }

      $password = md5($password);

      if(!$error){
        $sql = "UPDATE cashier SET password='$password' WHERE id='$id'";

        $result = mysqli_query($connection, $sql) or die("Il ya une erreure" .mysqli_error($connection));
        if($result == 1){
            header('Location: customerDetails.php?psdmg');
        }
    }

     
}



?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('includes/aside.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Main row -->

                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12">
                            <!-- Custom tabs (Charts with tabs)-->

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center text-uppercase">Modifier mot de passe</h3>
                                </div>
                                <div class="card-body">
                                  
                                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                        method="POST">

                                        
                                        <div class="form-group">
                                            <label for="updatePassword">Nouveau mot de passe</label>
                                            <input type="password"
                                                class="form-control"
                                                name="password"
                                                id="updatePassword"
                                                placeholder="Nouveau mot de passe">
                                        </div>
                                        <?php if(isset($passwordError)){
                                            echo $passwordError;
                                        } ?>
                                        <span id="errorPassword"></span>
                                        <button type="submit"
                                            name="updatePassword"
                                            id="updateCashierPassword"
                                            class="btn btn-outline-primary btn-lg w-100 text-uppercase">Enregistrer
                                            </button>
                                    </form>
                                </div>
                            </div>


                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    </div>
                    <!-- /.row (main row) -->


                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include('./includes/footer.php');
        ?>