<?php include('./includes/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('includes/aside.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <?php
            if(isset($_GET['psdmg'])){
                $passwordUpdateSucess =  "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Nouveau mot de passe enregistré.</div>";
                echo $passwordUpdateSucess;  
            }

            if(isset($_GET['msg'])){
                $editCashierSucess =  "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Mise à jour bien effectué.</div>";
                echo $editCashierSucess;  
            }
            ?>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-uppercase m-2">Informations personnelles</h1>
                        </div>
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

                            <div class="row">
                                <?php

                                $customerId = $_SESSION['cashierId'];
                                $sql = "SELECT * from cashier WHERE id = '$customerId' ";
                                $result = mysqli_query($connection, $sql) or die("Il ya une erreure".mysqli_error($connection));
                                $row = mysqli_fetch_array($result);
                                
                                ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <p><strong>Nom :</strong> <?php echo $row
                                            ['firstname']; ?></p>
                                            <p><strong>Prénom :</strong> <?php echo $row
                                            ['lastname']; ?></p>
                                            <p><strong>Genre :</strong> <?php echo $row
                                            ['gender']; ?></p>
                                            <p><strong>Numéro téléphone :</strong> <?php echo $row
                                            ['phonenumber']; ?></p>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.card -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <p><strong>Adresse :</strong> <?php echo $row
                                                ['adresse']; ?></p>
                                                <p><strong>Email :</strong> <?php echo $row
                                                ['email']; ?></p>
                                                <p><strong>Rôle utilisateur :</strong> <?php echo $row
                                                ['cashierRole']; ?></p>
                                                <p><a href="./updatePassword.php?id=<?php echo $row['id'];?>" 
                                                class="text-center text-uppercase btn btn-outline-primary btn-lg w-100 m-2">
                                                Modifier mot de passe 
                                                <i class="fas fa-arrow-right"></i> </a></p>
                                            </div>
                                        </div>
                                    </div>
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
        <?php include('./includes/footer.php'); ?>