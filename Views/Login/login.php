<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Montse TA">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?php echo $data['page_tag']; ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= media(); ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link type="text/css" rel="stylesheet" href="<?= media(); ?>/vendor/bootstrap-4.1/bootstrap.min.css">

    <!-- Vendor CSS-->
    <link href="<?= media(); ?>/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?= media(); ?>/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css"> -->
    <!-- Main CSS-->
    <link rel="stylesheet"  type="text/css" href="<?= media(); ?>/css/theme.css">

</head>
<body class="animsition">
<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#"> Agenda Digital
                                <img src="" alt="">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" name="formLogin" id="formLogin" method="POST">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="au-input au-input--full" type="text" id="txtEmail" name="txtEmail" placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" id="txtpassword" name="txtpassword" placeholder="Contraseña">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Recordarme
                                    </label>
                                    <label>
                                        <a href="<?= base_url();?>/password">olvidaste tu contraseña?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Iniciar Sesion</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> -->
                            </form>
                            <!-- <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <script src="<?=  media(); ?>/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=  media(); ?>/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=  media(); ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=  media(); ?>/vendor/slick/slick.min.js"></script>
    <script src="<?=  media(); ?>/vendor/wow/wow.min.js"></script>
    <script src="<?=  media(); ?>/vendor/animsition/animsition.min.js"></script>
    <script src="<?=  media(); ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?=  media(); ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=  media(); ?>/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="<?=  media(); ?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=  media(); ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=  media(); ?>/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=  media(); ?>/vendor/select2/select2.min.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.world.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.world.js"></script>
   
    <!-- Main JS= -->
     <script src="<?=  media();?>/js/main.js"></script>
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?=  media(); ?>/js/plugins/sweetalert.min.js"></script>
    <script src="<?=  media();?>/js/<?= $data['page_funtions_js']; ?>"></script>
  

    </body>

</html>
    