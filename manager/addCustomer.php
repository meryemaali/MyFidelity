<?php
include('./includes/header.php');
include('../shared/sanitize.php');

$error = false;

//vérifier et voir si le bouton Soumettre est cliquable
if (isset($_POST['addCustomerr']) ) {
    $firstname = cleanForm($_POST['firstname']);
    $lastname = cleanForm($_POST['lastname']);
    $gender = cleanForm($_POST['gender']);
    $phonenumber = cleanForm($_POST['phonenumber']);
	$adresse = cleanForm($_POST['adresse']);
    $email = cleanForm($_POST['email']);
    //$idNumber = cleanForm($_POST['idNumber']);
    $password = cleanForm($_POST['password']);

    
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

    // if( empty($idNumber) ){
    //     $error = true;
    //     $idNumberError = "<div class='alert alert-danger'>
    //     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    // } else if( !preg_match("/^[0-9]*$/", $idNumber)){
    //     $error = true;
    //     $idNumberError = "<div class='alert alert-danger'>
    //     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne doit contenir que des chiffres.</div>";
    // }

    if( empty($password) ){
        $error = true;
        $passwordError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,15}$/", $password)){
      //"/^\S(?=\S{6,15})(?=\S[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/"  
			$error = true;
        $passwordError = "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Mot de passe doit contenir entre 6 et 15 caractères dont une lettre majuscule, une lettre minuscule et un chiffre.</div>";
    }

		if( empty($adresse) ){
			$error = true;
			$adresseError = "<div class='alert alert-danger'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
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

    $selectEmail = "SELECT * from cashier where email = '$email'";
    $emailQuery = mysqli_query($connection, $selectEmail) or die("Il y a une erreur".mysqli_error($connection));

    $checkEmail = mysqli_num_rows($emailQuery);

    if( $checkEmail > 0 ){
        $error = true;
        $emailError =  "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Cette adresse email existe déjà! Veuillez saisir une autre adresse.</div>";
    
    }

    $password = md5($password);


    if(!$error){

			$sql = "insert into customer(phonenumber, firstname, lastname, gender, adresse, idNumber, email, password, registerDate) values('$phonenumber', '$firstname', '$lastname', '$gender', '$adresse', '0', '$email', '$password', Now())";
			$sql1 = "insert into cashier(firstname, lastname, gender, phonenumber, adresse, email, cashierRole, password, dateRegistred, actif) values('$firstname', '$lastname', '$gender', '$phonenumber', '$adresse', '$email', 'client', '$password', Now(), '1' )";
			
            $result = mysqli_query($connection, $sql ) or die("L'insertion des données a échouée".mysqli_error($connection));
            $result1 = mysqli_query($connection, $sql1 ) or die("L'insertion des données a échouée".mysqli_error($connection));
			if ($result == 1 && $result1 == 1 ) {
				$addManagerSucess = "<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Un client a été ajouté avec succès.</div>";
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
                            <h1 class="text-uppercase m-2">Ajouter client</h1>
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

                    <?php

                    if(isset($addManagerSucess)) {
                        echo $addManagerSucess;
                    }

                    ?>

                    <!-- Main row -->

                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12">
                            <!-- Custom tabs (Charts with tabs)-->

                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">Saisir les informations suivantes :</div>
                                <div class="card-body">

                                    <form method="post" 
                                        action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" 
                                        name="addCashierForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstname">Nom</label>
                                                    <input type="text"
                                                        class="form-control" name="firstname"
                                                        id="firstname"
                                                        placeholder="Nom">
														<span id="errorFirstname"></span>
                                                        <?php
                                                        if( isset($firstnameError)){
                                                            echo $firstnameError;
                                                        }
                                                        ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    
                                                </div>
                                            </div>
                                        </div>
											<div class="col-md-6">
                                                <div class="form-group">
                                        <div class="form-group">
                                            <label for="lastname">Prénom</label>
                                            <input type="text"
                                                class="form-control" name="lastname"
                                                id="lastname"
                                                placeholder="Pénom">
												<span id="errorLastname"></span>
                                                <?php
                                                if( isset($lastnameError)){
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
                                                    <select class="custom-select form-control-border" name="gender"
                                                        id="gender">
                                                        <option value="">Choisir un genre</option>
                                                        <option value="Homme">Homme</option>
                                                        <option value="Femme">Femme</option>
                                                    </select>
													<span id="errorGender"></span>
                                                    <?php
                                                    if( isset($genderError)){
                                                       echo $genderError;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                
													<div class="form-group">
                                                    <label for="Phonenumber">Téléphone </label>
                                                    <input type="text"
                                                        class="form-control"
                                                        name="phonenumber"
                                                        id="phonenumber"
                                                        placeholder="0615299812">
                                                    <span id="errorPhonenumber"></span>
                                                    <?php
                                                    if( isset($phonenumberError)){
                                                        echo $phonenumberError;
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            </div>
                                            <div class="col-md-8">
                                                
                                        </div>
												<div class="row">
                                            <div class="col-md-6">
                                                
													<div class="form-group">
                                                    <label for="Adresse">Adresse </label>
                                                    <input type="text"
                                                        class="form-control"
                                                        name="adresse"
                                                        id="adresse"
                                                        placeholder="16, quartier riyad, Rabat">
                                                    <span id="errorAdresse"></span>
                                                    <?php
                                                    if( isset($adresseError)){
                                                        echo $adresseError;
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            </div>
                                            <div class="col-md-8">
                                                
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email"
                                                        class="form-control" name="email"
                                                        id="email"
                                                        placeholder="exemple@domain.ex">
														<span id="errorEmail"></span>
                                                        <?php
                                                        if( isset($emailError)){
                                                           echo $emailError;
                                                        }
                                                        ?>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Mot de passe</label>
                                            <input type="password"
                                                class="form-control" name="password"
                                                id="password"
                                                placeholder="Mot de passe">
												<span id="errorPassword"></span>
                                                <?php
                                                if( isset($passwordError)){
                                                    echo $passwordError;
                                                }
                                                ?>
                                        </div>
                                        </div>
                                        <button type="submit"
                                            name="addCustomerr"
											id="addCustomerr"
                                            class="btn btn-outline-primary btn-lg w-100 text-uppercase">Ajouter Client
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