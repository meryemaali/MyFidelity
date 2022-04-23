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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-uppercase m-2">Tous les points récompensés</h1>
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
                                    <h3 class="card-title">Points gagnés</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="pointReward"
                                        class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Téléphone</th>
                                                <th>Points récompensés</th>
                                                <th>Référence</th>
                                                <th>Date de récompense</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        $selectPoints = "SELECT * FROM points where totalPurchase > '0' ORDER BY dateTime desc";
                                        $queryPoints = mysqli_query($connection, $selectPoints) or die("Il y a une erreur" .mysqli_error($connection));
                                        while($row = mysqli_fetch_array($queryPoints)){

                                        ?>
                                            <tr>
                                                <td><?php echo $row['phonenumber']; ?></td>
                                                <td><?php echo $row['points']; ?></td>
                                                <td><?php echo $row['referenceNumber']; ?></td>
                                                <td><?php echo $row['dateTime']; ?></td>
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
            $(document).ready(function(){
                $('#pointReward').DataTable({
                    // order: [],
                    // columnDefs: [{
                    //     orderable: false,
                    //     targets: [0]
                    // }]
                });
            });
            </script>