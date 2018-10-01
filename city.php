<?php
$page_title="add City";
require_once('includes/header.php');
if((!isset($_SESSION['username'])) or (!isset($_SESSION['email'])))
{
    header('location:login.php');
}
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<link rel="stylesheet" href="assets/scss/style.css">


<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body>
<?php require_once('includes/navbar.php');?>





    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" >

        <?php require_once('includes/rightPanelHeader.php');?>

        <div class="content mt-3">
            <div class="container">
                <div class="animated fadeIn">
                    <div class="row ">
                        <div class="col col-md-8">
                           

                            <div class="card">
                                <div class="card-header">
                                    <strong>Add</strong> City
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row justify-content-md-center">
                                            <?php
                                            if(isset($error))
                                            {
                                                echo "<span class='pull-right' style='color:red;'>$error</span>";
                                            }
                                            else if(isset($error))
                                            {
                                                echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                            }
                                            ?>

                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="c_name" class=" form-control-label">City Name*</label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <input type="text" id="c_name" name="c_name" placeholder="first name" class="form-control" value="<?php if(isset($c_name)){ echo $c_name;} ?>"></div>
                                        </div>

                                    
                                    

                                     

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Select Image*</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="imageurl" name="imageurl" ></div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <button type="submit" name="submit" class="btn btn-primary btn-md">
                                                <i class="fa fa-dot-circle-o"></i> Add
                                            </button>
                                            <!-- <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button> -->
                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div>
                        <div class="col col-md-4">
                            <?php
                            if(isset($check_image))
                                echo"<img src='img/admin/$check_image' width='100%'/>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<!--

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>





    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>

    <script src="assets/js/lib/data-table/datatables-init.js"></script>
-->
    
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>



 

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>



