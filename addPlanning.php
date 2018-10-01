<?php
$page_title="Add Planning";

require_once('includes/header.php');?>

<link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

<style>

    /* On screens that are 600px wide or less, the background color is olive */
    @media screen and (max-width: 650px) {
        .navbar-brand {
            display: none !important;
        }
    }
    .nav-link a:hover
    {
        background-color: skyblue !important;
    }
</style>
<?php
if(isset($_GET['del']))
{

    $del_id=$_GET['del'];
    $del_query="DELETE FROM `pasistence_planning` WHERE `pasistence_planning`.`id` =$del_id";
    if(isset($_SESSION['username']))
    {
        if(mysqli_query($con,$del_query))
        {
            $msg="Plan has been deleted";
        }
        else
        {
            $error="Plan has not been deleted";
        }
    }


}

?>

</head>
<body>


<?php require_once('includes/navbar.php');?>




    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" >

        <?php require_once('includes/rightPanelHeader.php');?>

        <!-- Header/Bradcrum-->


        <div class="content mt-3">
            <div class="animated">


                <div class="card col-md-2 col-xs-2">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title" v-if="headerText">Plans</strong>
                    </div>
                    <div class="card-body" >
                        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" style="background-color:#034c60;" data-target="#mediumModal">
                            <i class="fa fa-plus"></i>
                            Add Planning
                        </button>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php
                            $query2="select * from pasistence_planning ORDER BY id DESC";
                            $run2=mysqli_query($con,$query2);
                            if(mysqli_num_rows($run2) > 0)
                            {
                                while($row2=mysqli_fetch_array($run2))
                                {

                            ?>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php
                                    $city=ucfirst($row2['title']); 
                                    echo " $city ";?></a>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>

                </div>
                <div class="card col-md-10 col-xs-10">
                    <div class="card-header" style="display:inline;background-color:#a6dd4d;padding:2px;">
                        <div class="col col-xs-6 col-sm-6 col-md-6" >
                            <i class="mr-2 fa fa-align-justify"></i>
                            <strong class="card-title" v-if="headerText">View news from</strong>
                        </div>
                        <div class="col col-xs-3 col-sm-3 col-md-3">

                            <label for="sel1">Select City :</label>
                            <select data-placeholder="Choose a city..." class="form-control" tabindex="1">
                                <option value=""></option>
                                <?php
                                $query1="select * from pasistence_city ORDER BY id DESC";
                                $run1=mysqli_query($con,$query1);
                                if(mysqli_num_rows($run1) > 0)
                                {
                                    while($row1=mysqli_fetch_array($run1))
                                    {

                                ?>
                                <option value="United States"><?php
                                        $city=ucfirst($row1['name']); 
                                        echo " $city ";?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col col-xs-3 col-sm-3 col-md-3">

                            <label for="sel2">Select Club :</label>
                            <select data-placeholder="Choose a city..." class="form-control" tabindex="1">
                                <option value=""></option>

                                <?php
                                $query2="select * from pasistence_club ORDER BY id DESC";
                                $run2=mysqli_query($con,$query2);
                                if(mysqli_num_rows($run2) > 0)
                                {
                                    while($row2=mysqli_fetch_array($run2))
                                    {

                                ?>
                                <option value="United States"><?php
                                        $city=ucfirst($row2['name']); 
                                        echo " $city ";?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>

                        </div>
                    </div>
                    <div class="card-body"  style="background-color:rgba(0,0,0,0.2); ">

                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php

                            if(isset($error))
                            {

                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                            }
                            else if(isset($msg))
                            {

                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                            }
                            ?>

                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="2%;"></th>
                                      
                                        <th width="5%">Sr #</th>
                                        <th width="10%;">Date</th>
                                        <th width="20%;">Title</th>
                                        <th width="15%;">Plan</th> 
                                        <th width="5%;">City</th>
                                        <th width="5%;">Club</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query="select * from pasistence_planning ORDER BY id DESC";
                                    $run=mysqli_query($con,$query);
                                    while($row=mysqli_fetch_array($run))
                                    {
                                        $id=$row['id'];
                                        $dt = new DateTime($row['updated_at']);
                                        $title=ucfirst($row['title']);

                                        $plan=$row['image_url'];
                                        $city=ucfirst($row['city_name']);
                                        $club=ucfirst($row['club_name']);
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td>
                                          
                                    <a href="editPlan.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="addPlanning.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a> 
                                </td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $dt->format('d-m-y'); ?></td>
                            <td><?php echo $title; ?></td>
                            <td><img src="<?php echo $plan; ?>" width="30px"/></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $club; ?></td>
                            </tr>


                        <?php

                                    }
                        ?>

                        </tbody>
                    </table>

                </form>
        </div>
    </div>




    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Set News</strong>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>




                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php 
                                        if(isset($_POST['submit3']))
                                        {
                                            $option = isset($_POST['formsel1']) ? $_POST['formsel1'] : false;
                                            if ($option) 
                                            {
                                                echo htmlentities($_POST['formsel1'], ENT_QUOTES, "UTF-8");
                                            } else 
                                            {
                                                echo "<script>
                                                    alert('please insert data !');

                                                    </script>";

                                            }

                                            $city=$_POST['formsel1'];
                                            $club=$_POST['formsel2'];
                                            $title=mysqli_real_escape_string($con,$_POST['title']);
                                            $discription=mysqli_real_escape_string($con,$_POST['discription']);
                                            //                                            $date=mysqli_real_escape_string($con,$_POST['daterange']);


                                            $filenm = $_FILES["planningimage"]["name"]; //name of file
                                            $tempnm = $_FILES["planningimage"]["tmp_name"]; // temp name of file
                                            $t=time();
                                            $folder="img/planning/".$t.$filenm;
                                            move_uploaded_file($tempnm,$folder);



                                            if( empty($title) or empty($filenm))
                                            {
                                                $error="All * fields are required";


                                            }
                                            else
                                            {

                                                $q="INSERT INTO pasistence_planning (title, image_url, club_name, city_name, description) VALUES ('$title','$folder','$club','$city','$discription')";

                                                if (mysqli_query($con, $q)) 
                                                {
                                                    echo "<script>
                                                    alert('Plan Inserted successfully !');
                                                    location.replace('addPlanning.php');
                                                    </script>";
                                                } 
                                                else
                                                {
                                                    echo "<script>alert('Plan Not Inserted successfully !Check connection');
                                                    </script>";
                                                } 



                                            }

                                        }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <?php  
                                                if(isset($error))
                                                {
                                                    echo "<span class='pull-right' style='color:red;' >$error</span>";
                                                }else if(isset($msg))
                                                {
                                                    echo "<span class='pull-right' style='color:green;' >$msg</span>";
                                                }
                                                ?>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-xs-6 col-sm-6 col-md-6">
                                                    <div class="card-body">
                                                        <label for="formsel1" >Choose City</label>

                                                        <select data-placeholder="Choose a city..." class="form-control" name="formsel1">
                                                            <option value=""></option>
                                                            <?php
                                                            $query1="select * from pasistence_city ORDER BY id DESC";
                                                            $run1=mysqli_query($con,$query1);
                                                            if(mysqli_num_rows($run1) > 0)
                                                            {
                                                                while($row1=mysqli_fetch_array($run1))
                                                                {
                                                                    $city=ucfirst($row1['name']); 


                                                            ?>
                                                            <option value="<?php echo " $city "; ?> ">
                                                                <?php echo " $city ";?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-xs-6 col-sm-6 col-md-6">
                                                    <div class="card-body">
                                                        <label for="formsel2">Choose Club</label>
                                                        <select data-placeholder="Choose a city..." class="form-control" name="formsel2">
                                                            <option value=""></option>

                                                            <?php
                                                            $query2="select * from pasistence_club ORDER BY id DESC";
                                                            $run2=mysqli_query($con,$query2);
                                                            if(mysqli_num_rows($run2) > 0)
                                                            {
                                                                while($row2=mysqli_fetch_array($run2))
                                                                {
                                                                    $club=ucfirst($row2['name']); 

                                                            ?>
                                                            <option value="<?php echo " $club "; ?> ">
                                                                <?php echo " $club "; ?>
                                                            </option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr />
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="activity" class=" form-control-label">Title :*</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter news title" class="form-control"></div>
                                            </div>
                                            <hr />
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Planning image :*</label></div>
                                                <div class="col-12 col-md-9"><input type="file" id="planningimage" name="planningimage" ></div>
                                            </div>


                                            <hr />
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Discription</label></div>
                                                <div class="col-12 col-md-9"><textarea name="discription" id="discription" rows="3" placeholder="Content..." class="form-control"></textarea></div>
                                            </div>

                                            <!--
<hr />
<div class="row form-group">
<div class="col col-md-3"><label for="date-input" class=" form-control-label">From-To date : </label></div>
<div class="col-12 col-md-9"><input type="text" name="daterange" placeholder="yyyy-mm-dd" /></div>
</div>
-->


                                            <div class="modal-footer">
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm" name="submit3">
                                                        <i class="fa fa-dot-circle-o"></i> Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Reset
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>




    </div><!-- .animated -->
</div><!-- .content -->
<div class="content mt-3">

</div> <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>








<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                }
            }
        });
    });


</script>


</body>
</html>
