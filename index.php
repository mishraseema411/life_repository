<?php
$page_title="dashboard";
require_once('includes/db.php');
require_once('includes/header.php');?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<link rel="stylesheet" href="assets/scss/style.css">


<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<!--    --><?php //require_once('includes/navbar.php');?>
    <?php require_once('leftpanel.php');?>
    <?php require_once('script.php');?>


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" >

        <?php require_once('includes/rightPanelHeader.php');?>

        <!-- Header/Bradcrum-->

        <?php  
        $result1 = mysqli_query($con,"select count(1) FROM pasistence_city");
        $result2 = mysqli_query($con,"select count(1) FROM pasistence_club");
        $result3 = mysqli_query($con,"select count(1) FROM pasistence_planning");
        $result4 = mysqli_query($con,"select count(1) FROM pasistence_news");
        
        $row1 = mysqli_fetch_array($result1);
        $row2 = mysqli_fetch_array($result2);
        $row3 = mysqli_fetch_array($result3);
        $row4 = mysqli_fetch_array($result4);

//        $total = $row[0];
//        echo "Total rows: " . $total;
//        
//        $q1="Select count(id)  from pasistence_city";
//        $q2="Select count(id)  from pasistence_club";
//        $q3="Select count(id)  from pasistence_planning";
//        $q4="Select count(id)  from pasistence_news";

        $city=$row1[0];
        $club=$row2[0];
        $plans=$row3[0];
        $news=$row4[0];

        ?>


        <div class="content mt-3">


            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo $city; ?></span>
                        </h4>
                        <p class="text-light">City</p>

                        <div class="chart-wrapper px-0" style="height:50px;" height="50">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo $club; ?></span>
                        </h4>
                        <p class="text-light">Clubs</p>

                        <div class="chart-wrapper px-3" style="height:50px;" height="50">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo $plans; ?></span>
                        </h4>
                        <p class="text-light">Plannings</p>

                        <div class="chart-wrapper px-0" style="height:50px;" height="50">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo $news; ?></span>
                        </h4>
                        <p class="text-light">News</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:50px;" height="50">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Profit</div>
                                <div class="stat-digit">1,012</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">New Customer</div>
                                <div class="stat-digit">961</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Active Projects</div>
                                <div class="stat-digit">770</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">New Customer</div>
                                <div class="stat-digit">961</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

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
