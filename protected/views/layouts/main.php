<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Bio-estadística</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    
    <!-- Custom Css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes/all-themes.css" rel="stylesheet" />
    <!-- autosugestion-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/autocomplete.css">
    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">BIOESTADÍSTICA</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
<!--                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">NAVEGACIÓN PRINCIPAL</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">text_fields</i>
                            <span>Consultas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/searchProcedimiento">Consultar entidades</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">text_fields</i>
                            <span>Reportes</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/reportes/reportesProducto">Consultar productos</a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/reportes/reportesDian">Consultar Dian</a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/reportes/reportesAfiliacion">Consultar afiliaciones</a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/reportes/reportesProcedimiento">Consultar procedimientos </a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/reportes/reportesServicios">Consultar servicios prestador</a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/reportes/reportesCapInstalada">Consultar capacidad instalada prestador</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
       
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php
                echo $content;
            ?>
        </div>
    </section>

    <?php
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
    ?>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-countto/jquery.countTo.js"></script>

  
    <!-- Custom Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin.js"></script>
    

    <!-- Demo Js -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/demo.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.preloaders.js" type="text/javascript"></script>
    <?php 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/plugins/bootstrap-notify/bootstrap-notify.js");
    ?>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/Bioest.js" type="text/javascript"></script>
</body>

</html>
