<?php

include('sanitize.php');

$id = $_GET['id'];

$error = false;

if($id != $_SESSION['cashierId']){
    header("Location: index.php");
} else {
    $cashierId = $_SESSION['cashierId'];
}

if(isset($_POST['updatePassword'])){
    $password = cleanForm($_POST['password']);

    if(empty($password)){
        $error = true;
        $passwordError =  "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Ce champ ne peut pas être vide.</div>";
    } else if( !preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,15}$/", $password)){
        //"/^\S(?=\S{6,15})(?=\S[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/"  
        $error = true;
        $passwordError = "<div class='alert alert-danger'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Mot de passe doit contenir entre 6 et 15 caractères dont une lettre majuscule, une lettre minuscule et un chiffre.</div>";
      }

      $password = md5($password);

      if(!$error){
          $sql = "UPDATE cashier SET password='$password' WHERE id='$cashierId'";

          $result = mysqli_query($connection, $sql) or die("Il ya une erreure" .mysqli_error($connection));
          if($result == 1){
              $passwordUpdateSucess = "<div class='alert alert-success'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Nouveau mot de passe enregistré.</div>";
          

          }
      }
}

?>                            
                            
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center text-uppercase">Modifier votre mot de passe</h3>
                                </div>
                                <div class="card-body">
                                    <?php

                                    if(isset($passwordUpdateSucess)){
                                        echo $passwordUpdateSucess;
                                    }
                                    ?>
                                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                    method="POST">

                                        <div class="form-group">
                                            <label for="updatePassword">Nouveau mot de passe</label>

                                            <input type="password" 
                                            class="form-control" 
                                            name="password"
                                            id="updatePassword" 
                                            placeholder="Nouveau mot de passe">
                                        </div>
                                        <span id="errorPassword"></span>

                                        <?php
                                    
                                        if(isset($passwordError)){
                                            echo $passwordError;
                                        }
                                        ?>
                                        <button type="submit" 
                                        name="updatePassword"
                                        id="updateCashierPassword"
                                        class="btn btn-outline-primary btn-lg w-100 text-uppercase">
                                        Enregistrer</button>
                                    </form>
                                </div>
                            </div>