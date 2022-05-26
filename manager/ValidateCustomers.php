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
                $customerValidateSucess =  "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Nouveau client validé.</div>";
                echo $customerValidateSucess;  
            }

            if(isset($_GET['msg'])){
                $customerNonValidate =  "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Nouveau client supprimé.</div>";
                echo $customerNonValidate;  
            }

            
            ?>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-uppercase m-2">Les nouveaux clients</h1>
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
                                    <h3 class="card-title">Les clients inscrits</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="customerTable"
                                        class="table m-0">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Téléphone</th>
                                                <th>Genre</th>
                                                <th>Adresse</th>
                                               
                                                <th>Email</th>
                                                <th>Date enregistrement</th>
                                                <th>Valider</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $selectCustomers = "SELECT * from cashier WHERE cashierRole = 'client' and actif = '0' ORDER BY dateRegistred desc";
                                            $queryCustomers = mysqli_query($connection, $selectCustomers) or die("Il y a une erreur" .mysqli_error($connection));
                                            
                                            while($row = mysqli_fetch_array($queryCustomers)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['firstname'] ?></td>
                                                <td><?php echo $row['lastname'] ?></td>
                                                <td><?php echo $row['phonenumber'] ?></td>
                                                <td><?php echo $row['gender'] ?></td>
                                                <td><?php echo $row['adresse'] ?></td>
                                                
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['dateRegistred'] ?></td>
                                               
                                                    <td><a href="validateAccountCustomer.php?id=<?php echo $row['id']; ?>"
                                                            class="btn btn-warning">Valider</a>
                                                    </td>
                                                    
                                            </tr>
                                           <?php }
                                           ?>

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
        </body>
        <?php
        include('./includes/footer.php');
        ?>
<!-- 
        <script>
            $(document).ready( function(){
                $('#customerTable').DataTable({
                    order: [],
                    columnDefs: [{
                        orderable: false,
                        //targets: [0, 6]
                    }]

                })
            });
        </script> -->