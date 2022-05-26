<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link"
                data-widget="pushmenu"
                href="#"
                role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link">
        <span class="brand-text font-weight-light">MyFidelity Menu</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#"
                    class="d-block">
                    <?php echo $_SESSION['firstname'] . " ". $_SESSION['lastname'] ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="./index.php"
                        class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Points
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./rewardPoints.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Points de fidélité</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./PointsRewarded.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Points récompensés</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./transferedPoints.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Points transférés</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./redeemedPoints.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Points échangés</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Clients
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./addCustomer.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ajouter client</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./ValidateCustomers.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Valider les nouveaux clients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./customers.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tous les clients</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Caissiers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./addCashier.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ajouter caissier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./allCashiers.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tous les caissiers</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Paramètres
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="./rewardLimit.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modifier un palier fidélité</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./giftHistory.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Historique cadeau</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./cashierDetails.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mes détails </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="./updatePassword.php"
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modifier mot de passe</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="../shared/logout.php"
                        class="nav-link">
                        <i class="nav-icon fas fa-arrow-right"></i>
                        <p>
                            Déconnexion
                            <span class="right badge badge-danger">Quitter</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>