<section class="col-lg-12">
                            <!-- Custom tabs (Charts with tabs)-->

                            <div class="row">
                                <?php	
                                $cashierId = $_SESSION['cashierId'];
                                $sql = "SELECT * from cashier WHERE id = '$cashierId' ";
                                $result = mysqli_query($connection, $sql) or die("Il ya une erreure".mysqli_error($connection));
                                $row = mysqli_fetch_array($result);
                                
                                ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <p><strong>Nom :</strong> <?php echo $row
                                            ['firstname']; ?></p>
                                            <p><strong>Prénom :</strong> <?php echo $row
                                            ['lastname']; ?></p>
                                            <p><strong>Genre :</strong> <?php echo $row
                                            ['gender']; ?></p>
                                            <p><strong>Numéro téléphone :</strong> <?php echo $row
                                            ['phonenumber']; ?></p>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.card -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <p><strong>Adresse :</strong> <?php echo $row
                                                ['adresse']; ?></p>
                                                <p><strong>Email :</strong> <?php echo $row
                                                ['email']; ?></p>
                                                <p><strong>Rôle utilisateur :</strong> <?php echo $row
                                                ['cashierRole']; ?></p>
                                                <p><a href="./updatePassword.php?id=<?php echo $row['id'];?>" 
                                                class="text-center text-uppercase btn btn-outline-primary btn-lg w-100 m-2">
                                                Modifier mot de passe 
                                                <i class="fas fa-arrow-right"></i> </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>