<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header" style="margin:40px 0px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php"><img src="img/logopng.png" height="150px" width="150px" alt="LifeClub"></a>
<!--            <a class="navbar hidden" href="./"><img src="img/logopng.png"alt="Logo"></a>-->
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
<!--                <li class="active">-->
<!--                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>-->
<!--                </li>-->
                <h3 class="menu-title">Administrator</h3><!-- /.menu-title -->
                <li>
                    <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
<!--                city & club-->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>City & Club</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-circle-o"></i><a href="City_list.php">City</a></li>
                        <li><i class="fa fa-circle-o"></i><a href="add_city_club.php">Club</a></li>
                    </ul>
                </li>
<!--                planning-->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Planning</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-circle-o"></i><a href="planningAdd.php">Planning List</a></li>
                        <li><i class="fa fa-circle-o"></i><a href="planning.php">Add Planning</a></li>
                    </ul>
                </li>
<!--                news-->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list-ul"></i>News</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-circle-o"></i><a href="newsAdd.php">News List</a></li>
                        <li><i class="fa fa-circle-o"></i><a href="news.php">Add News</a></li>
                    </ul>
                </li>
<!--                parameter-->
                <li class="menu-item-has-children dropdown">
                    <a href="parameter.php"> <i class="menu-icon fa fa-envelope"></i>Parameters </a>
                </li>
<!--                member-->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Member</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-circle-o"></i><a href="#">Members List</a></li>
                        <li><i class="fa fa-circle-o"></i><a href="#">Add Member</a></li>
                    </ul>
                </li>
<!--                admin-->
                <h3 class="menu-title">Control Panel</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-plus"></i>User/Admin</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-circle-o"></i><a href="addAdmin.php">Admin List</a></li>
                        <li><i class="fa fa-circle-o"></i><a href="admin.php">Add Admin</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>


<script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/widgets.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

</body>
</html>
