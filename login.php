<?php
ob_start();
session_start();
require_once('includes/db.php');


if(isset($_POST['submit']))
{
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,md5($_POST['password']));

    $check_uname_query="select * from pasistence_admin where username='$username' or email='$username'";
    $query_run=mysqli_query($con,$check_uname_query);
    if(mysqli_num_rows($query_run)>0)
    {
        $row=mysqli_fetch_array($query_run);

        $db_uname=$row['username'];
        $db_email=$row['email'];
        $db_password=$row['password'];
        $db_fname=$row['fname'];
       // $password=crypt($password, $db_password);

        if(($username==$db_uname && $password==$db_password)  or  ($username==$db_email && $password==$db_password))    
        {
            header('location:index.php');
            $_SESSION['username']=$db_uname;
            $_SESSION['email']=$db_email;         
        }

    }
    else
    {
        $error=" wrong username or password";
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login : LifeClub</title>
        <meta name="description" content="Login : LifeClub">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="img/logopng.png">
        <link rel="shortcut icon" href="img/logopng.png">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
        <link rel="stylesheet" href="assets/scss/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    </head>
    <body class="bg-dark">



        <div class="container">
            <div class="login-content">

                <div class="login-form" style="margin-top:150px;">
                    <form action="" method="post">
                        <div class="row animated zoomInDown" >
                            <div class="col-lg-6 col-md-6 col-sm-6" >
                                <img src="img/lifeclub.jpg" width="100%"></img>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top:20px;" >
                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Email or Username" name="username"/>
                            </div>
                            <div class="form-group">

                                <input type="password" class="form-control" placeholder="Password" name="password"/>
                            </div>

                            <input type="submit" value="Sign In" class="btn-success btn-flat m-b-30 m-t-30 form-control" style="border-radius:25px;" name="submit"/>

                            <label>
                                <?php
                                if(isset($error))
                                {
                                    echo "$error";
                                }
                                ?>
                            </label>
                        </div>


                        </div>

                    </form>
            </div>
        </div>
        </div>



    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    </body>
</html>
