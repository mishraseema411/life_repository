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
                                if(isset($_POST['submit_news']))
                                {
                                    if(empty($f_name) or empty($addr) or empty($cl_city) or empty($z_code) or empty($phone) or empty($email) or empty($imageurl))
                                    {

                                        $error="All (*) fields are required!";
                                    }
                                    
                                    
                                }


                            ?>




                            <div class="card">
                                <div class="card-header">
                                    <strong>Add Club</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="f_name" class=" form-control-label">First Name</label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <input type="text" id="f_name" name="f_name" placeholder="First Name" class="form-control" value="" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="addr" class=" form-control-label">Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea class="form-control" id="addr" name="addr" value="" placeholder="Address" cols="5" rows="4">
                                                    
                                                </textarea>

                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="cl_city" class=" form-control-label">City
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                               <select class="form-control" id="cl_city" name="cl_city" style=" min-height: 35px;">
                                                   <option>Avignon</option>
                                                   <option>Marseille</option>
                                               </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="z_code" class=" form-control-label">Zip Code</label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <input type="text" id="z_code" name="z_code" class="form-control" value="" required>
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
                                                <input type="file" id="imageurl" name="imageurl" >
                                            </div>
                                        </div>


                                        <div class="card-footer text-center">
                                            <button type="submit" name="submit_club" id="submit_club" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Add
                                            </button>
                                            <button type="reset" name="close_club" id="close_club" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Close
                                            </button>
                                        </div>

                                    </form>
                                </div>

                            </div>

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



 

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>


