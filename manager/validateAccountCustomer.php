<?php
include('./includes/header.php');
include('../shared/sanitize.php');

$id = $_GET['id'];

$result1 = "SELECT * from cashier WHERE id = '$id'";
$query1 = mysqli_query($connection, $result1) or die("Il ya une erreur" .mysqli_error($connection));
$row1 = mysqli_fetch_array($query1);
$email = $row1['email'];

$error = false;



if(isset($_POST['validateAccount'])){
    $actif = cleanForm($_POST['actif']);

    if(empty($actif)){
        $error = true;
        $actifError =  "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("#^(1|2)$#", $actif)){
        $error = true;
        $actifError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Veuillez insérer 1 si le compte est valide sinon 2.</div>";
    }


      if(!$error){
        if($actif == '1'){
        $sql = "UPDATE cashier SET actif='1' WHERE id='$id'";
        $result = mysqli_query($connection, $sql) or die("Il ya une erreur" .mysqli_error($connection));
        if($result == 1){
            $to = $email;
            $subject = ' Validation compte '; 
            $message = 'Merci pour votre inscription !
        Votre compte est créé, vous pouvez vous connectez avec votre email et mot de passe.';
            mail($to, $subject, $message);
            header('Location: validateCustomers.php?psdmg');
        }
        
    }else if ($actif == '2'){
        $sql1 = "delete from cashier WHERE id='$id'";
        $result1 = mysqli_query($connection, $sql1) or die("Il ya une erreur" .mysqli_error($connection));
        if($result1 == 1){
            header('Location: validateCustomers.php?msg');
        }
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
                                    <h3 class="text-center text-uppercase">Valider un nouveau compte client</h3>
                                </div>
                                <div class="card-body">
                                  
                                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                        method="POST">

                                        
                                        <div class="form-group">
                                            <label for="validateAccount">Activer Ce compte client</label>
                                            <input type="actif"
                                                class="form-control"
                                                name="actif"
                                                id="validateAccount"
                                                placeholder="Insérer 1 pour activer le compte">
                                        </div>
                                        <?php if(isset($actifError)){
                                            echo $actifError;
                                        } ?>
                                        <span id="errorPassword"></span>
                                        <button type="submit"
                                            name="validateAccount"
                                            id="validateAccountCustomer"
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