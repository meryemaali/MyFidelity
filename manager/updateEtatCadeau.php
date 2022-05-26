<?php
include('./includes/header.php');
include('../shared/sanitize.php');

$id = $_GET['id'];

$result1 = "SELECT * from cashier WHERE id = '$id'";
$query1 = mysqli_query($connection, $result1) or die("Il ya une erreur" .mysqli_error($connection));
$row1 = mysqli_fetch_array($query1);
$phonenumber = $row1['phonenumber'];

$error = false;



if(isset($_POST['updateCadeau'])){
    $totalPurchase = cleanForm($_POST['totalPurchase']);

    if( empty($totalPurchase) ){
        $error = true;
        $cadeauError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Veuillez insérer OUI ou NON.</div>";
    } 


      if(!$error && $totalPurchase == 'OUI'){
       
        $sql = "UPDATE points SET totalPurchase = '-1' WHERE phonenumber = '$phonenumber' and totalPurchase = '0'";
        $result = mysqli_query($connection, $sql) or die("Il ya une erreur" .mysqli_error($connection));
        $sqll = "insert into cadeau(phonenumber, cadeau, etat, date) values('$phonenumber', '$cadeau', 'pris', Now() )";
        $resultt = mysqli_query($connection, $sqll) or die("Il ya une erreur" .mysqli_error($connection));
        if($result == 1 && $resultt == 1){
            header('Location: customers.php?msgg');
        } }else if(!$error && $totalPurchase == 'NON'){
            $sqlN = "insert into cadeau(phonenumber, cadeau, etat, date) values('$phonenumber', '$cadeau', 'non pris', '-' )";
            $resultN = mysqli_query($connection, $sqlN) or die("Il ya une erreur" .mysqli_error($connection));
            header('Location: customers.php?msggg');
         } else {
            $cadeauError =  "<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Veuillez insérer OUI ou NON.</div>";

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
                                    <h3 class="text-center text-uppercase">Modifier état du cadeau de votre client</h3>
                                </div>
                                <div class="card-body">
                                  
                                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                        method="POST">

                                        
                                        <div class="form-group">
                                            <label for="updatePassword">Cadeau récupéré</label>
                                            <input type="totalPurchase"
                                                class="form-control"
                                                name="totalPurchase"
                                                id="updateCadeau"
                                                placeholder="Etat cadeau (OUI ou NON)">
                                        </div>
                                        <?php if(isset($cadeauError)){
                                            echo $cadeauError;
                                        } ?>
                                        <span id="cadeauError"></span>
                                        <button type="submit"
                                            name="updateCadeau"
                                            id="updateClientCadeau"
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