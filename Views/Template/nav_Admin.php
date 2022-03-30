<body class="animsition">
    <div class="page-wrapper">
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="<?= media(); ?>/img/icon/logonav.png" alt="" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?= media() ?>/img/icon/User_M.jpeg" alt="Angels" />
                    </div>
                    <h4 class="name"><?= $_SESSION['userData']['nombre'] ?></h4>
                    <?php if ($_SESSION['userData']['tipo'] == 1) { ?>
                        <smal class="">Administrador</smal>
                    <?php } else { ?>
                        <small class="">Asistente</small>
                    <?php } ?>
                    <a href="<?= base_url(); ?>/logout">Cerrar sesion</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Lista usuarios
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?= base_url(); ?>/usuarios">
                                        <i class="fas fa-tachometer-alt"></i>Usuarios</a>
                                </li>
                                <li>
                                    <a href="<?= base_url(); ?>/clientes">
                                        <i class="fa fa-handshake-o"></i>Clientes</a>
                                </li>
                                <!-- <li>
                                    <a href="index2.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                </li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/ventas">
                                <i class="fas fa-chart-bar"></i>Ventas</a>

                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/productos">
                                <i class="fas fa-box"></i>Productos</a>

                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/citas">
                                <i class="fa fa-calendar"></i>Citas</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/ventasproductos">
                                <i class="fa fa-line-chart"></i>Ventas de productos</a>
                        </li>


                    </ul>
                    </li>
                    </ul>
                </nav>
            </div>
        </aside>