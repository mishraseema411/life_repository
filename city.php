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

                            <?php
                            include 'dbConnection.php';
                            include 'city_model.php';

                            if(isset($_POST['userId']))
                            {
                            if(isset($_POST['userId'])) {
                                $id = $_POST['userId'];
                                $sql = "SELECT * FROM pasistence_city WHERE id = '$id'";
                                $query = $conn->query($sql);
                                $row1 = $query->fetch_assoc();
                                $josnObj = json_encode($row1);
                                $conn->close();

                                $someObject = json_decode($josnObj,true);
                                // print_r($someObject);      // Dump all data of the Object
                                $city = new city_model(
                                    $someObject["id"],
                                    $someObject["name"],
                                    $someObject["image"],
                                    $someObject["created_at"],
                                    $someObject["updated_at"],
                                    $someObject["website"]
                                );
                               //  print_r($city);
                            }
                            ?>
<!--                            Update block-->
                                <div class="card">
                                    <div class="card-header">
                                        <strong> Add City </strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="Update_City.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row justify-content-md-center">

                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="cityname" class=" form-control-label">City Name*</label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="cityname" name="cityname" placeholder="City name" class="form-control" value="<?php echo $city->name ?>"></div>
                                                <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $city->id ?>">
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="cityweb" class=" form-control-label">City Website*</label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="cityweb" name="cityweb" placeholder="City Website" class="form-control" value="<?php echo $city->website ?>"></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="cityimage" class=" form-control-label">Select Image*</label></div>
                                                <div class="col-12 col-md-9"><input type="file" id="photo" name="photo" ></div>
                                                <img src="<?php echo $city->image?>" class="img-thumbnail img-responsive"/>
                                                <input type="hidden"  id="photo_edit" name="photo_edit" value="<?php echo $city->image?>" />
                                            </div>

                                            <div class="card-footer text-center">
                                                <button type="submit" name="update" class="btn btn-primary btn-md">
                                                    Update
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-md">
                                                    Reset
                                                </button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
<!--                            /Update block-->
                                <?php
                            }else{?>
<!--                            Addnew CIty-->
                            <div class="card">
                                <div class="card-header">
                                    <strong> Add City </strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="Insert_City.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row justify-content-md-center">

                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="cityname" class=" form-control-label">City Name*</label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <input type="text" id="cityname" name="cityname" placeholder="City name" class="form-control" value="<?php if(isset($c_name)){ echo $c_name;} ?>"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="cityweb" class=" form-control-label">City Website*</label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <input type="text" id="cityweb" name="cityweb" placeholder="City Website" class="form-control" value="<?php if(isset($c_name)){ echo $c_name;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="cityimage" class=" form-control-label">Select Image*</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="cityimage" name="cityimage" ></div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <button type="submit" name="submit" class="btn btn-primary btn-md">
                                                 Add
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-md">
                                                 Reset
                                            </button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                            <?php    }?>
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

</body>


