<?php
include('./includes/header.php');

$id = $_SESSION['cashierId'];

$result1 = "SELECT * from cashier WHERE id = '$id'";
$query1 = mysqli_query($connection, $result1) or die("Il ya une erreure" .mysqli_error($connection));
$row1 = mysqli_fetch_array($query1);
$phonenumber = $row1['phonenumber'];
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('includes/aside.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <?php
            if(isset($_GET['psdmg'])){
                $passwordUpdateSucess =  "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ticket déjà scanné.</div>";
                echo $passwordUpdateSucess;  
            }

            if(isset($_GET['msg'])){
                $editCashierSucess =  "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ticket scanné avec succès.</div>";
                echo $editCashierSucess;  
            }
            ?>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                <?php include('notify.php'); ?>
                            <h1 class="m-4">    Dashboard</h1>
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

                                    $selectReward = "SELECT sum(points) as total FROM points WHERE phonenumber = '$phonenumber' and totalPurchase != '0' ";
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
                           
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            
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
                            <div class="col text-center" >
                            <div class="card-body d-flex flex-column">
                            <a href="scanTicket.php">
                            <button type="submit"
                                            name="scanTicket"
                                            id="scanTicket"
                                            class="btn btn-outline-primary btn-lg w-50 text-uppercase">
                                            Scanner un ticket
                                            </button>
                                            
                                    </div>
                                    </div>
                               
                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->


                            
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

           

                    
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php
        include('./includes/footer.php');
        ?>