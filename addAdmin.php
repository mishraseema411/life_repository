<?php
$page_title="Admin";
require_once('includes/header.php');
if(!isset($_SESSION['username']))
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
 

<?php
    if(isset($_GET['del']))
    {
        $del_id=$_GET['del'];
        $del_query="DELETE FROM `pasistence_admin` WHERE `pasistence_admin`.`id` = $del_id and `pasistence_admin`.`id`<>24 ";
       if(isset($_SESSION['username']))
       {
            if(mysqli_query($con,$del_query))
        {
            $msg="<script>alert('Admin Deleted !');location.replace('addAdmin.php');</script>";
        }
        else
        {
            $error="<script>alert('Admin not Deleted !');location.replace('addAdmin.php');</script>";
        }
       }
    }
    
  
    ?>



    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" >

        <?php require_once('includes/rightPanelHeader.php');?>

        <!-- Header/Bradcrum-->

        <?php 
        $query="select * from pasistence_admin order by id desc";
        $run=mysqli_query($con,$query);
        if(mysqli_num_rows($run)>0)
        {


        ?>
        <div class="content mt-3">
            <div class="container">
                <div class="animated fadeIn">
                    <form action="" method="post" autocomplete="off">
                        <div class="row justify-content-md-center">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding:0%;text-align: right;">
                                <div class="card">
                                    <div class="card-header">

                                        <a href="admin.php" class="btn btn-primary btn-sm">Add New Admin</a>

                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>


                        <div class="row card">
                            <?php
                                if(isset($error))
                                {
                                    echo $error;
                                }
                                else if(isset($msg))
                                {
                                    echo $msg;
                                }

                            ?>
                            <table id="admintb" class="table datatable table-striped table-borderd table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Name</th>
                                        <th>DOB</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Image</th>
                                        <th>Phone</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php
                                        while($row=mysqli_fetch_array($run))
                                        {
                                            $id=$row['id'];
                                            $fname=$row['fname'];
                                            $lname=$row['lname'];
                                            $username=$row['username'];
                                            $email=$row['email'];
                                            $image=$row['image'];
                                            $password=$row['password'];
                                            $phone=$row['phone'];

                                            $date    = $row['dob'];


                                            //                $datee= new \DateTime($row['dob']);
                                            //  
                                            //                $date=$datee->format('d-m-Y'); 

                                            //                $date=new datetime($row['dob']);
                                            //                $d=$date['mday'];
                                            //                $m=substr($date['month'],0,3);
                                            //                $y=$date['year'];

                                                                ?>
                                    <tr>
                                        
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo "$fname "; ?></td>
                                        <td><?php echo "$date"; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td>***********</td>
                                        <td><img src=<?php echo "img/admin/$image" ?> width="30px"/></td>
                                        <td><?php echo $phone; ?></td>

                                        <td><a href="editAdmin.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="addAdmin.php?del=<?php echo $id; ?>"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php
            }
                                    ?>

                                </tbody>
                            </table>
                        </div>


                    </form>
                </div>
            </div>
        </div> <!-- .content -->

        <?php 
        }
        else
        {
            echo "<center><h2>No Users Available Now</h2></center>";
        }
        ?>
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
<script type="application/javascript">
    $(document).ready(function() {
   $("#admintb").find("tr:gt(0)").remove();
});
    </script>

    
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>



 

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>

</body>
</html>


