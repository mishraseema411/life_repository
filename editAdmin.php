<?php
$page_title="Edit Admin";
require_once('includes/header.php');
if((!isset($_SESSION['username'])) or (!isset($_SESSION['email'])))
{
    header('location:login.php');
}

if(isset($_GET['edit']))
{
    $edit_id=$_GET['edit'];
    $edit_query="select * from pasistence_admin where id=$edit_id";
    $edit_run=mysqli_query($con,$edit_query);
    if(mysqli_num_rows($edit_run)>0)
    {
        $edit_row=mysqli_fetch_array($edit_run);
        $e_fname=$edit_row['fname'];
        $e_lname=$edit_row['lname'];
        $e_dob=$edit_row['dob'];
        $e_phone=$edit_row['phone'];
        $e_email=$edit_row['email'];
        $e_password=($edit_row['password']);
        $e_imageurl=$edit_row['image'];

    }
    else
    {
        header("location:index.php"); 
    }
}
else
{
    header("location:index.php"); 
}
?>

<!--    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" /> -->

<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
<link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
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
                               

                                $email=mysqli_real_escape_string($con,strtolower($_POST['email']));
//                                $password=mysqli_real_escape_string($con,md5($_POST['password']));
                                
                             

                                $phone=mysqli_real_escape_string($con,$_POST['phone']);
                                $dob=mysqli_real_escape_string($con,$_POST['dob']);
                                $imageurl=$_FILES['imageurl']['name'];
                                $imageurl_temp=$_FILES['imageurl']['tmp_name'];
                                
                                if(empty($imageurl))
                                {
                                    $imageurl=$e_imageurl;
                                }


                                if(empty($fname) or empty($lname) or empty($email)  or empty($phone) or empty($dob))
                                {

                                    $error="All (*) fields are required!";
                                }
                                else
                                {
                                   $update_query="UPDATE `pasistence_admin` SET  `email` = '$email', `image` = '$imageurl', `phone` = '$phone', `dob` = '$dob', `fname` = '$fname', `lname` = '$lname' WHERE `pasistence_admin`.`id` = $edit_id";
                                    
                                   

                                    if(mysqli_query($con,$update_query))
                                    {
                                        $msg="user has been updated!";
                                        header("refresh:0;url=editAdmin.php?edit=$edit_id");
                                        
                                        
                                        if(!empty($imageurl))
                                        {
                                             move_uploaded_file($imageurl_temp,"img/admin/$imageurl");
                                        }
                                        
                                    }
                                    else
                                    {
                                        $error="User has not been updated";
                                    }
                                }

                            }


                            ?>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Edit </strong>Admin
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

                                            <div class="col-12 col-md-9"><input type="text" id="fname" name="fname" placeholder="first name" class="form-control" value="<?php { echo $e_fname;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="lname" class=" form-control-label">Last Name*</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="lname" name="lname" placeholder="Last name" class="form-control"value="<?php { echo $e_lname;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="dob" class=" form-control-label">Date of Birth*</label></div>
                                            <div class="col-12 col-md-9"><input type="date" id="dob" name="dob" placeholder="YYYY-MM-DD" class="form-control" value="<?php { echo $e_dob;} ?>"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="phone" class=" form-control-label">Phone Number*</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Contact no" class="form-control" value="<?php { echo $e_phone;} ?>"></div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email* </label></div>
                                            <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="<?php { echo $e_email;} ?>"></div>
                                        </div>

<!--
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password*</label></div>
                                            <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Password" class="form-control" value="<?php { echo $e_password;} ?>"></div>
                                        </div>
-->

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Profile Picture*</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="imageurl" name="imageurl" ></div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <button type="submit" name="submit1" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Update Admin
                                            </button>
                                             <a href="addAdmin.php">  <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa fa-dot-circle-o"> </i> OKAY
                                            </button></a>

                                        </div>
                                        
                                        
                                       
                                    </form>
                                </div>

                            </div>

                        </div>
                        <div class="col col-md-4">
                            <?php
                            
                                echo"<img src='img/admin/$e_imageurl' width='100%'/>";
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

    <script src="assets/js/lib/data-table/datatables-init.js"></script>


