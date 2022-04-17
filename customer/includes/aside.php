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
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Paramètres
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./customerDetails.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mes détails </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./updateCustomerDetails.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modifier Détails </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./updateCustomerPassword.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modifier mot de passe</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Historique
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./purchaseHistory.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Historique achats </p>
                                    </a>
                                </li>
                                
                                
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="../shared/logout.php" class="nav-link">
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