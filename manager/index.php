<?php
include('./includes/header.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('includes/aside.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
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
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php

                                    $selectReward = "SELECT sum(points) as total FROM points WHERE totalPurchase > '0'";
                                    $queryReward = mysqli_query($connection, $selectReward) or die("Il y a une erreur" .mysqli_error($connection));
                                    while($row = mysqli_fetch_assoc($queryReward)){

                                    ?>
                                    <h3><?php echo number_format($row['total']); ?></h3>
                                    <p>Total points récompensés</p>
                                </div>
                                <?php } ?>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                <?php

                                 $selectRedeemed = "SELECT sum(points) as totalRedeemed FROM purchaseitem";
                                 $queryRedeemed = mysqli_query($connection, $selectRedeemed) or die("Il y a une erreur" .mysqli_error($connection));
                                 while($row = mysqli_fetch_assoc($queryRedeemed)){

                                ?>
                                    <h3><?php echo number_format($row['totalRedeemed'], 0); ?></h3>
                                    <p>Total points échangés</p>
                                    <?php } ?>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                <?php

                                $selectCustomers = "SELECT COUNT(*) as SUM FROM cashier where cashierRole = 'client' and actif = '1'";
                                $queryCustomers = mysqli_query($connection, $selectCustomers) or die("Il y a une erreur" .mysqli_error($connection));
                                $row = mysqli_fetch_assoc($queryCustomers);
                                echo '<h3>' .$row['SUM'].'</h3>';

                                ?>
                                    

                                    <p>Total clients enregistrés


</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <div class="row">

                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Points attribués récemment</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1"
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

                                        $selectRewardPoints = "SELECT * FROM points where totalPurchase > '0' ORDER BY dateTime desc LIMIT 10";
                                        $queryRewardPoints = mysqli_query($connection, $selectRewardPoints) or die("Il y a une erreur" .mysqli_error($connection));
                                        while($row = mysqli_fetch_array($queryRewardPoints)){

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
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="PointsRewarded.php">Afficher tout</a>
                                </div>
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