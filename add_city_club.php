<?php
$page_title="addCityClubMembers";
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
<style>
    .flip
    {

        height: 60px !important;
        padding:0%;
        margin:0%;
    }
    #user_data_length select{
        padding: 15px 20px !important;
        width: 120px !important;
        margin-top: 10px;
    }
    #user_data_filter input{
        margin-top: 10px;
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $("#city").click(function () {
            $("#showinfo1").hide("slow");
            $("#showinfo2").show("slow");
        });
    });
    $(document).ready(function () {
        $("#club").click(function () {
            $("#showinfo2").hide("slow");
            $("#showinfo1").show("slow");
        });
    });
    $(document).ready(function () {
        $("#member").click(function () {
            $("#showinfo2").hide("slow");
            $("#showinfo3").show("slow");
        });
    });
    $(document).ready(function () {
        $("#cancel_club").click(function () {
            $("#showinfo1").hide("slow");
        });
    });
    $(document).ready(function () {
        $("#cancel_city").click(function () {
            $("#showinfo2").hide("slow");
        });
    });
</script>


</head>
<body>

    <?php require_once('includes/navbar.php');?>




    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" >

        <?php require_once('includes/rightPanelHeader.php');?>

        <!-- Header/Bradcrum-->


        <div class="content mt-3">
            <div class="container">
                <div class="animated fadeIn">
                    <div class="row">
                        <!-- <div class="col-sm-3 col-lg-3 ">
<section class="card">
<div class="card-header text-center">
<strong>Add City </strong>Set club details
<hr/>
<div class="col-sm-12 col-lg-12" style="padding:1%;">
<button id="city" type="submit" class="btn btn-primary btn-sm" >
<i class="fa fa-plus"></i> Add City
</button>


</div>
</div>
<div class="card-body text-secondary">
<div>

<?php

$query="select * from pasistence_city ORDER BY id DESC";
$run=mysqli_query($con,$query);

if(mysqli_num_rows($run) > 0)
{
    while($row=mysqli_fetch_array($run))
    {


?>

<a href="index.php?cat".'$id'>
<div class="text-center flip3"  style="height:35px;margin:3px;">

<?php
        //defining id to particular portion
        $city=ucfirst($row['name']); 
        echo " $city ";

?>
</div></a>

<?php
    }
}
else{
    $msg="No Cities yet !";
?>
<div class="text-center flip3" style="height:35px;margin:3px;">

<?php

    echo " $msg ";

?>
</div>
<?php

}

?>
</div>

</div>
</section>
</div> -->

                        <!-- <div class="col-sm-12 col-lg-12" id="showinfo2">
<section class="card">
<div class="card-header">
<strong>Enter City</strong> Details
</div>
<div class="card-body text-secondary">
<div class="card-body card-block">

<form id="formCity" action="city.php" method="post" enctype="multipart/form-data" class="form-horizontal">



<div class="row form-group">
<div class="col col-md-3">
<label class=" form-control-label">City Name</label>
</div>
<div class="col-12 col-md-9">
<input type="text" id="city" name="cityname" placeholder="Enter City" class="form-control" />
</div>
</div>

<div class="row form-group">
<div class="col col-md-3"><label for="file-input" class=" form-control-label">Select image</label></div>
<div class="col-12 col-md-9"><input type="file" id="file-input" name="cityimage" class="form-control-file"></div>
</div>



<div class="card-footer">
<button type="submit" name="Submit" class="btn btn-primary btn-sm">
<i class="fa fa-dot-circle-o"></i>&nbsp; Submit
</button>
<button type="reset" class="btn btn-danger btn-sm">
<i class="fa fa-ban"></i>&nbsp; Reset
</button>

<button type="button" id="cancel_city" class="btn btn-secondary btn-sm">
<i class="fa fa-close"></i>&nbsp; Cancel
</button>


<?php 
if(isset($error_msg))
{
    echo "<span style='color:red;' class='pull-right'> Error Here </span> ";
}
else if(isset($msg))
{
    {
        echo "<span style='color:green;' class='pull-right'> $msg </span> ";
    }
}
?>
</div>

</form>
</div>

</div>
</section>

</div> -->
                        <div class="col-sm-12 col-lg-12 ">
                            <section class="card">
                                <div class="card-header">

                                    <div class="col-sm-9 col-lg-9" style="padding:1%;text-align: center;">
                                        <strong>Add City </strong>Set club details

                                    </div>
                                    <div class="col-sm-3 col-lg-3" style="padding:1%; text-align: center;">
                                        <button id="city" type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cityModal" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Add City
                                        </button>
                                        <button  type="button" id="add_button" data-toggle="modal" data-target="#userModal"  class="btn btn-primary btn-sm" >
                                            <i class="fa fa-plus"></i> Add club
                                        </button>


                                    </div>


                                </div>
                                <div class="card-body text-secondary" style="padding:0px;margin:0px;">


                                    <div class="table-responsive">

                                        <table id="user_data" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Image</th>
                                                    <th width="10%">Name</th>
                                                    <th width="10%">Address</th>
                                                    <th width="10%">City Name</th>
                                                    <th width="10%">Zip Code</th>
                                                    <th width="10%">Phone</th>
                                                    <th width="10%">Email</th>
                                                    <th width="5%">Edit</th>
                                                    <th width="5%">Delete</th>

                                                </tr>
                                            </thead>
                                        </table>

                                    </div>

                                </div>
                            </section>
                        </div>

                    </div><!-- .row -->


                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->



    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>



    <!--

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
-->


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>

    <!--   <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script> -->
    <!-- <script src="assets/js/lib/data-table/jszip.min.js"></script>-->
    <!--  <script src="assets/js/lib/data-table/pdfmake.min.js"></script> -->
    <!--  <script src="assets/js/lib/data-table/vfs_fonts.js"></script> -->
    <!--  <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script> -->
    <!--<script src="assets/js/lib/data-table/datatables-init.js"></script>-->



    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('#add_button').click(function(){
                $('#user_form')[0].reset();
                $('.modal-title').text("Add User");
                $('#action').val("Add");
                $('#operation').val("Add");
                $('#user_uploaded_image').html('');
            });

            var dataTable = $('#user_data').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"fetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0, 7, 8],
                        "orderable":false,
                    },
                ],

            });

            $(document).on('submit', '#user_form', function(event){
                event.preventDefault();
                var name = $('#name').val();
                var address = $('#address').val();
                var city_id = $('#city_id').val();
                var zip_code = $('#zip_code').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var extension = $('#image_url').val().split('.').pop().toLowerCase();
                if(extension != '')
                {
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                    {
                        alert("Invalid Image File");
                        $('#image_url').val('');
                        return false;
                    }
                } 
                if(name != '' && address != '' && city_id != '' && zip_code != '' && phone != '' && email != '' )
                {
                    $.ajax({
                        url:"insert.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#user_form')[0].reset();
                            $('#userModal').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    alert("All Fields are Required");
                }
            });

            $(document).on('click', '.update', function(){
                var user_id = $(this).attr("id");
                $.ajax({
                    url:"fetch_single.php",
                    method:"POST",
                    data:{user_id:user_id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#userModal').modal('show');
                        $('#name').val(data.name);
                        $('#address').val(data.address);
                        $('#city_id').val(data.city_id);
                        $('#zip_code').val(data.zip_code);
                        $('#phone').val(data.phone);
                        $('#email').val(data.email);

                        $('.modal-title').text("Edit User");
                        $('#user_id').val(user_id);
                        $('#user_uploaded_image').html(data.image_url);
                        $('#action').val("Edit");
                        $('#operation').val("Edit");
                    }
                })
            });

            $(document).on('click', '.delete', function()
                           {
                var user_id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this?"))
                {
                    $.ajax({
                        url:"delete.php",
                        method:"POST",
                        data:{user_id:user_id},
                        success:function(data)
                        {
                            alert(data);
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false; 
                }
            });


        });
    </script>




</body>
</html>


<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <label>Enter First Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>Enter Address</label>
                    <input type="text" name="address" id="address" class="form-control" />
                    <br/>


                    <label>Enter City</label>
                    <select data-placeholder="Choose a city..." class="form-control" name="city_id" id="city_id">
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

                    <!--


<label>Enter City</label>
<input type="text" name="city_id" id="city_id" class="form-control" />
-->
                    <br/>
                    <label>Enter Zipcode</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control" />
                    <br/>
                    <label>Enter Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" />
                    <br/>
                    <label>Enter Email</label>
                    <input type="email" name="email" id="email" class="form-control" />
                    <br />
                    <label>Select User Image</label>
                    <input type="file" name="image_url" id="image_url" />
                    <span id="user_uploaded_image"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="cityModal" class="modal fade">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >Add City</h4> 
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form id="formCity" action="city.php" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">



                    <div class="row form-group">
                        <div class="col col-md-5">
                            <label class=" form-control-label">City Name</label>
                        </div>
                        <div class="col-12 col-md-7">
                            <input type="text" id="city" name="cityname" placeholder="Enter City" class="form-control" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-5"><label for="file-input" class="form-control-label">Select Image</label></div>
                        <div class="col-12 col-md-7"><input type="file" id="file-input" name="cityimage" class="form-control-file"></div>
                    </div>




                    <div class="modal-footer">

                        <input type="submit" name="submit" id="submit" class="btn btn-success form-control" value="Add" />

                        <?php 
                        if(isset($error_msg))
                        {
                            echo "<span style='color:red;' class='pull-right'> $error_msg </span> ";
                        }
                        else if(isset($msg))
                        {
                            {
                                echo "<span style='color:green;' class='pull-right'> $msg </span> ";
                            }
                        }
                        ?>

                    </div>
                </form>
            </div>


    </div>
</div>
</div>