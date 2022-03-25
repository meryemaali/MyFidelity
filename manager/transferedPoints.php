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
                            <h1 class="text-uppercase m-2">Tous les points transférés</h1>
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
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tous les points de fidélité transférés</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="transferedPoints"
                                        class="table m-0">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>émetteur</th>
                                                <th>Récepteur</th>
                                                <th>Points transférés</th>
                                                <th>Référence</th>
                                                <th>Date de transfert</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                         $selectTransferPoints = "SELECT * FROM transferpoints ORDER BY dateTime desc";
                                         $queryTransferPoints = mysqli_query($connection, $selectTransferPoints) or die("Il y a une erreur" .mysqli_error($connection));
                                         while($row = mysqli_fetch_array($queryTransferPoints)){

                                        ?>
                                            <tr>
                                                <td><?php echo $row['fromPhonenumber']; ?></td>
                                                <td><?php echo $row['toPhonenumber']; ?></td>
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
                $('#transferedPoints').DataTable({
                    // order: [],
                    // columnDefs: [{
                    //     orderable: false,
                    //     targets: [0]
                    // }]
                });
            });
            </script>