<?php
$page_title="add Admin";
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
                            if(isset($_POST['submit1']))
                            {
                                $fname=mysqli_real_escape_string($con,$_POST['fname']);
                                $lname=mysqli_real_escape_string($con,$_POST['lname']);
                                $username=mysqli_real_escape_string($con,strtolower($_POST['username']));
                                $username_trim=preg_replace("/\s+/",'',$username);
                                $email=mysqli_real_escape_string($con,strtolower($_POST['email']));
                                $password=mysqli_real_escape_string($con,md5($_POST['password']));
                               
                                $phone=mysqli_real_escape_string($con,$_POST['phone']);
                                $dob=mysqli_real_escape_string($con,$_POST['dob']);
                                $imageurl=$_FILES['imageurl']['name'];
                                $imageurl_temp=$_FILES['imageurl']['tmp_name'];

                                $check_query="select * from pasistence_admin where username='$username' or email='$email'";
                                $check_run=mysqli_query($con,$check_query);

//                                $salt_query="select * from pasistence_admin order by id desc limit 1";
//                                $salt_run=mysqli_query($con,$salt_query);
//                                $salt_row=mysqli_fetch_array($salt_run);
//                                $salt=$salt_row['salt'];
//
//
//                                //crypting 
//                                $password=crypt($password,$salt);

                                if(empty($fname) or empty($lname) or empty($username) or empty($email) or empty($password) or empty($phone) or empty($dob) or empty($imageurl))
                                {

                                    $error="All (*) fields are required!";
                                }
                                else if($username !=$username_trim)
                                {
                                    $error="Dont use spaces in username!";
                                }
                                else if(mysqli_num_rows($check_run)>0)
                                {

                                    $error="username or email already exists";
                                }
                                else
                                {
                                    $insert_query="INSERT INTO `pasistence_admin` (`username`, `password`,`email`, `image`, `phone`, `dob`, `fname`, `lname`) VALUES ('$username', '$password', '$email', '$imageurl', '$phone', '$dob','$fname', '$lname')";
                                    if(mysqli_query($con,$insert_query))
                                    {
                                        $msg="user has been added";
                                        move_uploaded_file($imageurl_temp,"img/admin/$imageurl");

                                        $image_check="select * from pasistence_admin order by id desc limit 1";
                                        $image_run=mysqli_query($con,$image_check);
                                        $image_row=mysqli_fetch_array($image_run);
                                        $check_image=$image_row['image'];
                                        
                                        $fname="";
                                        $lname="";
                                        $email="";
                                        $phone="";
                                        $lname="";
                                        $username="";
                                        $dob="";
                                    }
                                    else
                                    {
                                        $error="user has not been added";
                                    }
                                }

                            }


                            ?>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Admin</strong> Profile
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
                                            <div class="col col-md-3"><label for="fname" class=" form-control-label">First Name*</label></div>

                                            <div class="col-12 col-md-9"><input type="text" id="fname" name="fname" placeholder="first name" class="form-control" value="<?php if(isset($fname)){ echo $fname;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="lname" class=" form-control-label">Last Name*</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="lname" name="lname" placeholder="Last name" class="form-control"value="<?php if(isset($lname)){ echo $lname;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="dob" class=" form-control-label">Date of Birth*</label></div>
                                            <div class="col-12 col-md-9"><input type="date" id="dob" name="dob" placeholder="YYYY-MM-DD" class="form-control" value="<?php if(isset($dob)){ echo $dob;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="phone" class=" form-control-label">Phone Number*</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Contact no" class="form-control" value="<?php if(isset($phone)){ echo $phone;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="username" class=" form-control-label">Username*</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="Unique username" class="form-control" value="<?php if(isset($username)){ echo $username;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email* </label></div>
                                            <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="<?php if(isset($email)){ echo $email;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password*</label></div>
                                            <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Password" class="form-control"/></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Profile Picture*</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="imageurl" name="imageurl" ></div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <button type="submit" name="submit1" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
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



