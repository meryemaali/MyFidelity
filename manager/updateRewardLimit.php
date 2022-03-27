<?php
include('./includes/header.php');
include('../shared/sanitize.php');

$id = $_GET['id'];

$error = false;

if(isset($_POST['updateLimit'])){
    $rewardLimit = cleanForm($_POST['updateRewardLimit']);
    $updateGift = cleanForm($_POST['updateGift']);


    if( empty($rewardLimit) ){
        $error = true;
        $rewardLimitError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^[0-9]*$/", $rewardLimit)){
        $error = true;
        $rewardLimitError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne doit contenir que des lettres.</div>";
    }

    if( empty($updateGift) ){
        $error = true;
        $giftError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
} 

    
    if(!$error){

        $sql = "UPDATE rewardlimit SET reward_limit = '$rewardLimit', gift = '$updateGift', dateUpdated=Now() WHERE id='$id' "; 
        
        $result = mysqli_query($connection, $sql ) or die("Il y a une erreur".mysqli_error($connection));
       
        if ($result == 1) {
            header('Location: rewardLimit.php?msg');
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
                        <div class="col-sm-6">
                            <h1 class="text-uppercase m-2">Modifier le palier de récompense</h1>
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

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center text-uppercase">Modifier le palier</h3>
                                </div>
                                <div class="card-body">
                                <?php

                               $sql = "SELECT * from rewardLimit WHERE id='$id' ";
                               $query = mysqli_query($connection, $sql) or die("Il y a une erreure" .mysqli_error($connevtion));

                                $row = mysqli_fetch_array($query);

                                $reward_limit = $row['reward_limit'];
                                $gift = $row['gift'];
                                ?>
                                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                    method = "POST">
                                        <div class="form-group">
                                            <label for="updateReward">Modifier le palier</label>
                                            <input type="text" 
                                            class="form-control" 
                                            value="<?php echo $reward_limit; ?>"
                                            name="updateRewardLimit"
                                            id="updateRewardLimit" 
                                            placeholder="Modifier le palier de récompense">
                                            <?php
                                            if(isset($rewardLimitError)){
                                                echo $rewardLimitError;
                                            }
                                            ?>
                                            <span id="errorUpdateRewardLimit"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="updateReward">Modifier le cadeau</label>
                                            <input type="text" 
                                            class="form-control" 
                                            value="<?php echo $gift; ?>"
                                            name="updateGift"
                                            id="updateGift" 
                                            placeholder="Modifier le cadeau">
                                            <?php
                                            if(isset($giftError)){
                                                echo $gifttError;
                                            }
                                            ?>
                                            <span id="errorUpdateGift"></span>
                                        </div>
                                        
                                        <button type="submit" 
                                        name="updateLimit"
                                        id="updateLimit"
                                        class="btn btn-outline-primary btn-lg w-100 text-uppercase">
                                        Enregistrer</button>
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