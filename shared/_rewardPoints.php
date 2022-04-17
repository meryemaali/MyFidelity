<?php

include('sanitize.php');

$cashierId = $_SESSION['cashierId'];


$sql = "SELECT * FROM rewardlimit";
$query = mysqli_query($connection, $sql) or die("Il y a une erreur" .mysqli_error($connection));
$row = mysqli_fetch_array($query);

$rewardLimit = $row['reward_limit'];

function referenceNumber($length){
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($chars), 0, $length);
}


$error = false;

if(isset($_POST['rewardPoints'])){
    $phonenumber = cleanForm($_POST['phonenumber']);
    $totalPurchase = cleanForm($_POST['totalPurchase']);

    $selectPhone = "SELECT * FROM cashier WHERE phonenumber='$phonenumber' AND cashierRole='client'";
    $phoneQuery = mysqli_query($connection, $selectPhone) or die("Il y a une erreur" .mysqli_error($connection));
    $checkPhone = mysqli_num_rows($phoneQuery);

    //validation
    if(empty($phonenumber)){
        $error = true;
        $errorPhonenumber = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^[0-9]*$/", $phonenumber)){
        $error = true;
        $errorPhonenumber = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne doit contenir que des chiffres.</div>";
    } else if($checkPhone == 0){
        $error = true;
        $errorCheckPhone = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce numéro de téléphone $phonenumber n'existe pas.</div>";
    
    }

    if(empty($totalPurchase)){
        $error = true;
        $errorTotalPurchase = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^[0-9]*$/", $totalPurchase)){
        $error = true;
        $errorTotalPurchase = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne doit contenir que des chiffres.</div>";
    } else if($totalPurchase < $rewardLimit){
        $error = true;
        $errorTotalPurchase = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Total achat ne doit pas être moins de la récompense.</div>";
   
    }

    $reference = referenceNumber(12);
    $points = intval(floatval($totalPurchase) / floatval($rewardLimit));

    if(!$error){
        $sql = "insert into points(phonenumber, casheerId, points, totalPurchase, referenceNumber, dateTime) values('$phonenumber', '$cashierId', '$points', '$totalPurchase', '$reference', Now() )";

        $pointsQuery = mysqli_query($connection, $sql) or die("Il y a une erreur" .mysqli_error($connection));
        if($pointsQuery == 1){
            $rewardPointsSucess =  "<div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Vous avez ajouté des points au client avec succès.</div>"; 
          
        }
    }


}


?>                              
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Taux de points de récompense</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php
                                            
                                            ?>
                                            <h4>Le taux de récompense d’aujourd’hui est <strong><?php echo $rewardLimit; ?> points</strong></h4>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.card -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">points de fidélité</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            if(isset($errorCheckPhone)){
                                                echo $errorCheckPhone;
                                            }
                                            if(isset($rewardPointsSucess)){
                                                echo $rewardPointsSucess;
                                            }
                                            ?>
                                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                                method="POST">
                                                <div class="row">
                                                    
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label for="Phonenumber">Téléphone client</label>
                                                            <input type="text"
                                                                class="form-control"
                                                                name="phonenumber"
                                                                id="Phonenumber"
                                                                placeholder="0661025588">
                                                                <?php
                                            if(isset($errorPhonenumber)){
                                                echo $errorPhonenumber;
                                            }
                                            ?>
                                                                <span id="errorPhonenumber"></span>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-7">

                                                <div class="form-group">
                                                    <label for="totalpurchase">Total d'achat</label>
                                                    <input type="text"
                                                        class="form-control"
                                                        name="totalPurchase"
                                                        id="totalpurchase"
                                                        placeholder="Total des achats de biens">
                                                        <?php
                                            if(isset($errorTotalPurchase)){
                                                echo $errorTotalPurchase;
                                            }
                                            ?>
                                                        <span id="errorTotalPurchase"></span>
                                                </div>
                                                </div>
                                                <div class="text-center">

                                                <button type="submit"
                                                    name="rewardPoints"
                                                    id="rewardPoints"
                                                    class="btn btn-outline-primary btn-lg text-uppercase w-50 ">
                                                    Récompenser</button>
                                        </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>