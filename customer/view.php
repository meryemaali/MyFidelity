
<?php
include('./includes/header.php');
    include("functions.php");
    $id = $_SESSION['cashierId'];

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Mes notifications</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  

  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('includes/aside.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <div class="content-header">
                <div class="container-fluid">
      
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #363638;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
     

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 
                <?php
               
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
      </div>

      </div>

    </nav>


    
    <section class="content">
                <div class="container-fluid">
                <h1 class="m-4">    Toutes les notifications</h1>
                    <!-- Small boxes (Stat box) -->
                            <!-- small box -->
                            <table id="customerTable"
                                        class="table m-0">
                                <?php
    

    $id = $_SESSION['cashierId'];
    $lastname = $_SESSION['lastname'];

    $query ="UPDATE notifications SET status = 'read' WHERE id = '$id'";
    performQuery($query);

    $query = "SELECT * from notifications where id = '$id'";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='palier'){
                ?>
                 <tr>
                    <td><?php  echo "Mme/M. ". $lastname. " " .$i['message'] ."<br/>" ." " .$i['date']."</br>"?></td>
                </tr>
                <?php
                
            }else if($i['type']=='promotion'){
                ?>
                 <tr>
                    <td><?php   echo "Mme/M. ". $lastname. " " .$i['message']. " " . $i['date']."</br>"?></td>
                </tr>
                <?php
               
            }
        }
    }
    
?>
</table>
               
               
                                </div>
                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->



                    </div>
                    <!-- /.row (main row) -->


                </div>
                <!-- /.container-fluid -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div> </div>

  </body>
</html>
       <?php   
        include('./includes/footer.php');
        ?>