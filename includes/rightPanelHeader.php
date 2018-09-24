
<?php 
if((!isset($_SESSION['username'])) or (!isset($_SESSION['email'])) or (!isset($_SESSION['image'])))
{
    header('location:login.php');
}
$img=$_SESSION['image'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
?>
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7 col-md-7 col-lg-7 col-xs-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

                </div>

                <div class="col-sm-5 col-md-5 col-lg-5 col-xs-5">
                    <div class="user-area dropdown float-right" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src=<?php echo "img/admin/$img"; ?> alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu" id="admin">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i><?php echo "$email"; ?></a>
                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>


                </div>
            </div>
            <style type="text/css">
                #admin
                {
                    background-color:white  !important;
                    color:black !important;
                    text-align: center;
                }
                #admin a:hover
                {
                    background-color:rgba(0,0,0,0.4);
                    color:white;
                    border-radius: 10px;
                    text-align: center;
                }
            </style>

        </header>
      