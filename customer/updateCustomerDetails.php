<?php
include('./includes/header.php');
include('../shared/sanitize.php');

$id = $_SESSION['cashierId'];

$error = false;


if(isset($_POST['updateCustomerDetails'])){
    $firstname = cleanForm($_POST['firstname']);
    $lastname = cleanForm($_POST['lastname']);
    $gender = cleanForm($_POST['gender']);
    $phonenumber = cleanForm($_POST['phonenumber']);
    $adresse = cleanForm($_POST['adresse']);
    $email = cleanForm($_POST['email']);

    //validation form
    if( empty($firstname) ){
        $error = true;
        $firstnameError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^[a-zA-Z]*$/", $firstname)){
        $error = true;
        $firstnameError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne doit contenir que des lettres.</div>";
    }


    if( empty($lastname) ){
        $error = true;
        $lastnameError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^[a-zA-Z]*$/", $lastname)){
        $error = true;
        $lastnameError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne doit contenir que des lettres.</div>";
    }

    if( empty($gender) ){
        $error = true;
        $genderError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } 

    if( empty($phonenumber) ){
        $error = true;
        $phonenumberError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^[0-9]*$/", $phonenumber)){
        $error = true;
        $phonenumberError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne doit contenir que des chiffres.</div>";
    }

    if( empty($email) ){
        $error = true;
        $emailError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $error = true;
        $emailError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Email non valide.</div>";
    }

	if( empty($adresse) ){
			$error = true;
			$adresseError = "<div class='alert alert-danger'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
	} 

   

    if(!$error){
        $sqlCustomer = "UPDATE cashier SET firstname='$firstname',
        lastname='$lastname', gender='$gender', phonenumber='$phonenumber',
        adresse='$adresse', email='$email'
        WHERE id='$id' ";

        $resultCustomer = mysqli_query($connection, $sqlCustomer) or die("Il ya une erreure" .mysqli_error($connection));
        if($resultCustomer == 1){
            header('Location: customerDetails.php?msg');
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
                            <h1 class="text-uppercase m-2">Modifier les informations</h1>
                            <p>Veuillez remplir tous les champs</p>
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
                        <section class="col-lg-12">
                            <!-- Custom tabs (Charts with tabs)-->

                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">Entrer vos informations</div>
                                <div class="card-body">

                                <?php
                                

                                $result = "SELECT * from cashier WHERE cashierRole = 'client' AND id = '$id'";
                                $query = mysqli_query($connection, $result) or die("Il ya une erreure" .mysqli_error($connection));
                                $row = mysqli_fetch_array($query);

                                $firstname = $row['firstname'];
                                $lastname = $row['lastname'];
                                $gender = $row['gender'];
                                $phonenumber = $row['phonenumber'];
                                $adresse = $row['adresse'];
                                $email = $row['email'];


                                ?>

                                    <form method="post"
                                        action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>"
                                        name="addCashierForm">

                                        

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstname">Nom</label>
                                                    <input type="text"
                                                        class="form-control"
                                                        value="<?php echo $firstname; ?>"
                                                        name="firstname"
                                                        id="firstname"
                                                        placeholder="Nom">
                                                    <span id="errorFirstname"></span>
                                                    <?php 

                                                    if(isset($firstnameError)){
                                                        echo $firstnameError;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Prénom</label>
                                            <input type="text"
                                                class="form-control"
                                                value="<?php echo $lastname; ?>"
                                                name="lastname"
                                                id="lastname"
                                                placeholder="Prénom">
                                            <span id="errorLastname"></span>
                                            <?php 

                                                    if(isset($lastnameError)){
                                                        echo $lastnameError;
                                                    }
                                                    ?>
                                        </div>
                                        </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Genre</label>
                                                    <select class="custom-select form-control-border"
                                                        name="gender"
                                                        id="gender">
                                                        <option value="">Choisir genre</option>
                                                        <option value="Homme" <?php
                                                         if($gender == 'Homme'){
                                                            echo 'selected';
                                                        } ?>
                                                        >Homme</option>
                                                        <option value="Femme"
                                                        <?php if($gender == 'Femme'){
                                                            echo 'selected';
                                                        } ?>
                                                            >Femme</option>
                                                    </select>
                                                    <span id="errorGender"></span>
                                                    <?php 

                                                    if(isset($genderError)){
                                                        echo $genderError;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="idNumber">Téléphone</label>
                                                    <input type="text"
                                                        class="form-control"
                                                        value="<?php echo $phonenumber; ?>"
                                                        name="phonenumber"
                                                        id="phonenumber"
                                                        placeholder="0615287845">
                                                    <span id="errorPhonenumber"></span>
                                                    <?php 

                                                    if(isset($phonenumberError)){
                                                        echo $phonenumberError;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="Phonenumber">Adresse </label>
                                            <input type="text"
                                                class="form-control"
                                                value="<?php echo $adresse; ?>"
                                                name="adresse"
                                                id="adresse"
                                                placeholder="Hay Riyad, Rabat">
                                            <span id="errorAdresse"></span>
                                            <?php 

                                                    if(isset($adresseError)){
                                                        echo $adresseError;
                                                    }
                                                    ?>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email"
                                                        class="form-control"
                                                        value="<?php echo $email; ?>"
                                                        name="email"
                                                        id="email"
                                                        placeholder="exemple@domain.ex">
                                                    <span id="errorEmail"></span>
                                                    <?php 

                                                    if(isset($emailError)){
                                                        echo $emailError;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>

                                        <button type="submit"
                                            name="updateCustomerDetails"
                                            id="updateCustomerDetails"
                                            class="btn btn-outline-primary btn-lg w-100 text-uppercase">
                                            Enregistrer
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