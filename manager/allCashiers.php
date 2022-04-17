<?php
include('./includes/header.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('includes/aside.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-uppercase m-2">Tous les caissiers</h1>
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
                    <!-- Small boxes (Stat box) -->

                    <!-- Main row -->


                    <div class="row">

                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Liste des caissiers</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                        <table id="allCashiers"
                                            class="table m-0">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Genre</th>
                                                    <th>Téléphone</th>
                                                    <th>Adresse</th>
                                                    <th>Email</th>
                                                    <th>Rôle</th>
                                                    <th>Date </th>
                                                    <th>MAJ Détails</th>
                                                    <th>MAJ MDP</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $selectCashiers = "SELECT * from cashier WHERE cashierRole = 'administrateur' OR cashierRole ='caissier' ORDER BY dateRegistred desc";
                                                $cashiersQuery = mysqli_query($connection, $selectCashiers) or die("Il y a une erreure" .mysqli_error($connection));
                                                while($row = mysqli_fetch_array($cashiersQuery)){



                                                ?>
                                                <tr>
                                                    <td><?php echo $row['firstname'] ?></td>
                                                    <td><?php echo $row['lastname'] ?></td>
                                                    <td><?php echo $row['gender'] ?></td>
                                                    <td><?php echo $row['phonenumber'] ?></td>
                                                    <td><?php echo $row['adresse'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['cashierRole'] ?></td>
                                                    <td><?php echo $row['dateRegistred'] ?></td>
                                                    <td><a href="updateCashierDetails.php?id=<?php echo $row['id']; ?>"
                                                            class="btn btn-warning">MAJ Détails</a></td>
                                                    <td><a href="updateCashierPassword.php?id=<?php echo $row['id']; ?>"
                                                            class="btn btn-warning">MAJ MDP</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                

                                               



                                            </tbody>

                                        </table>
                                    
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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

        <script>
            $(document).ready( function(){
                $('#allCashiers').DataTable({
                    order: [],
                    columnDefs: [{
                        orderable: false,
                        targets: [8, 9]
                    }]
                })
            });
        </script>