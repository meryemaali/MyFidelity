<?php
    include("functions.php");

    $id = $_SESSION['cashierId'];
    $lastname = $_SESSION['lastname'];
    $result1 = "SELECT * from cashier WHERE id = '$id'";
$query1 = mysqli_query($connection, $result1) or die("Il ya une erreur" .mysqli_error($connection));
$row1 = mysqli_fetch_array($query1);
$phonenumber = $row1['phonenumber'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>


        <!-- Main Sidebar Container -->
      
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #363638;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>      
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 
                
                <?php
                $sqlR = "SELECT * FROM rewardlimit";
                $queryR = mysqli_query($connection, $sqlR) or die("Il y a une erreur" .mysqli_error($connection));
                $row = mysqli_fetch_array($queryR);
                
                $rewardLimit = $row['reward_limit'];
                $gift = $row['gift'];

                $sqlP = "SELECT sum(points) as total FROM points WHERE phonenumber = '$phonenumber' ";
                $queryP = mysqli_query($connection, $sqlP) or die("Il y a une erreur" .mysqli_error($connection));
                $row = mysqli_fetch_assoc($queryP);
                $points = $row['total'];            

                if($points >= $rewardLimit){
                  $sqlUpdate = "insert into notifications(id, name, type, message, status, giftStatus, date) values('$id', '$lastname', 'palier', 'Félicatations! Vous avez un cadeau. Rendez-vous dans votre magasin.', 'unread', 'non', Now() )";
                  $updateQuery = mysqli_query($connection, $sqlUpdate) or die("Il y a une erreur" .mysqli_error($connection));
                  $sqll = "insert into points(phonenumber, casheerId, points, totalPurchase, referenceNumber, dateTime) values('$phonenumber', '0', '-$rewardLimit', '0', '0', Now()) ";
                  $result = mysqli_query($connection, $sqll) or die("Il ya une erreure" .mysqli_error($connection));
                  if($updateQuery == 1 && $result == 1){
                    $updateSucess =  "<div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Réussi</div>"; 
          
        }
                }
              

                $query = "SELECT * from notifications where status = 'unread' and id = '$id' order by date DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from notifications where id = '$id' order by date DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                  if($i['type']=='promotion'){
                    echo "Il y a de nouvelles promotions.";
                }else if($i['type']=='palier'){
                    echo "Vous avez atteint un palier. Rendez-vous sur votre magasin pour avoir votre cadeau !";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "Pas de notifications.";
                 }
                     ?>
            </div>
          </li>
        </ul>
         
     
        
      </div>
    </nav>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div> </div>

</html>
