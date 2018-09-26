<?php
$page_title="add Club";
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

    <div id="right-panel" class="right-panel">

        <?php require_once('includes/rightPanelHeader.php');?>

        <div class="content mt-3">
            <div class="container">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col col-md-8">
                            <?php
                            include 'dbConnection.php';
                            include 'clubModel.php';

                                if(isset($_POST['userId']))
                                {
                                    if(isset($_POST['userId'])) {
                                        $id = $_POST['userId'];
                                        $sql = "SELECT * FROM pasistence_club WHERE id = '$id'";
                                        $query = $conn->query($sql);
                                        $row1 = $query->fetch_assoc();
                                        $josnObj = json_encode($row1);
                                        $conn->close();

                                        $someObject = json_decode($josnObj,true);
                                       // print_r($someObject);      // Dump all data of the Object
                                        $clubmodel = new clubModel(
                                            $someObject["id"],
                                            $someObject["name"],
                                            $someObject["address"],
                                            $someObject["city_id"],
                                            $someObject["city"],
                                            $someObject["zip_code"],
                                            $someObject["phone"],
                                            $someObject["email"],
                                            $someObject["image_url"]
                                        );
                                       // print_r($clubmodel);
                                    }

                            ?>
                                <!--Update Block-->
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add Club</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="updateClub.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="f_name" class=" form-control-label">Club Name</label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name" name="name" placeholder="Club Name" class="form-control" value="<?php echo $clubmodel->name ?>" required>
                                                    <input type="text" id="id" name="id" class="form-control" value="<?php echo $clubmodel->id ?>">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="addr" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control" id="address" name="address" value="" placeholder="Address" cols="5" rows="4"><?php echo $clubmodel->address ?></textarea>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="city" class=" form-control-label">City</label></div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="city" name="city" style="min-height: 35px;">
                                                        <?php
                                                        $query1="select * from pasistence_city ORDER BY id DESC";
                                                        $run1=mysqli_query($con,$query1);
                                                        if(mysqli_num_rows($run1) > 0)
                                                        {
                                                            $key_value = $clubmodel->city.','.$clubmodel->city_id ;
                                                            echo '<option value = "'.$key_value.'" selected>'.$clubmodel->city.'</option>';
                                                            echo '<option value = "" disabled>--Select--</option>';
                                                            while($row1=mysqli_fetch_array($run1))
                                                            {
                                                                $city=$row1['name'];
                                                                $value=$row1['name'].','.$row1['id'];
                                                                echo '<option value = "'.$value.'">'.$city.'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="z_code" class=" form-control-label">Zip Code</label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="z_code" name="z_code" class="form-control" value="<?php echo $clubmodel->zip_code?>" maxlength="6" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="phone" class=" form-control-label">Phone
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $clubmodel->phone?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $clubmodel->email?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Select User Image
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="photo" name="photo" >
                                                    <img src="img/club/<?php echo $clubmodel->image_url?>" class="img-thumbnail img-responsive"/>
                                                    <input type="text"  id="photo_edit" name="photo_edit" value="<?php echo $clubmodel->image_url?>" />
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <button type="submit" name="update" id="update" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Update
                                                </button>
                                                <button type="reset" name="close_club" id="close_club" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                 <!--/Update Block-->
                                    <?php
                                }else{?>
                                <!--Insert Block-->
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add Club</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insertClub.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="f_name" class=" form-control-label">First Name</label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name" name="name" placeholder="Club Name" class="form-control" value="" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="addr" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control" id="address" name="address" value="" placeholder="Address" cols="5" rows="4"></textarea>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="city" class=" form-control-label">City</label></div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="city" name="city" style="min-height: 35px;">
                                                        <?php
                                                        $query1="select * from pasistence_city ORDER BY id DESC";
                                                        $run1=mysqli_query($con,$query1);
                                                        if(mysqli_num_rows($run1) > 0)
                                                        {
                                                            echo '<option value = "" disabled selected>--Select--</option>';

                                                            while($row1=mysqli_fetch_array($run1))
                                                            {
                                                                $city=$row1['name'];
                                                                $value=$row1['name'].','.$row1['id'];

                                                                echo '<option value = "'.$value.'">'.$city.'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="z_code" class=" form-control-label">Zip Code</label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="z_code" name="z_code" class="form-control" value="" maxlength="6" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="phone" class=" form-control-label">Phone
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="phone" name="phone" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Select User Image
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="photo" name="photo" >
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <button type="submit" name="add" id="add" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Add
                                                </button>
                                                <button type="reset" name="close_club" id="close_club" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <!--/Insert Block-->
                            <?php    }?>
                        </div>
                        <div class="col col-md-4">
                            <?php
                            if(isset($check_image))
                                echo"<img src='img/news/$check_image' width='100%'/>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

<!--    <script>-->
<!--    // Convert JSON String to JavaScript Object-->
<!--    var JSONString = '[{"id":"141","name":"Nagpur Club","address":"nagpur","city_id":"96","city":"Nagpur","zip_code":"420420","phone":"123456789","email":"fake@fake.com","image_url":"4.jpg","created_at":"2018-09-26 15:00:22","updated_at":"2018-09-26 15:00:22"}]';-->
<!--    var JSONObject = JSON.parse(JSONString);-->
<!--    console.log(JSONObject);      // Dump all data of the Object in the console-->
<!--    // Access Object data-->
<!--    </script>-->

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>

