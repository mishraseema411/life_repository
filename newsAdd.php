<?php
$page_title="Add News";
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
      
        width: 120px !important;
        height: 36px!important;
		margin-top: 10px;
    }
    #user_data_filter input{
       margin-top: 10px;
    }

 
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



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



                        <div class="col-sm-12 col-lg-12 ">
                            <section class="card">
                                <div class="card-header">
                               <div class="col-sm-8 col-xs-8 col-lg-8" style="padding:1%;text-align: left;">
                                    <strong><h3>News</h3> </strong>
									  
                                   
                                    </div>
                                    <div class="col-sm-4 col-lg-4 col-xs-4" style="padding:1%;text-align: right;">
                                        <button  type="button" id="add_button" data-toggle="modal" data-target="#userModal"  class="btn btn-primary btn-sm" >
                                            <i class="fa fa-plus"></i> Add News
                                        </button>

                                    </div>



                                </div>
                                <div class="card-body text-secondary" style="padding:0px;margin:0px;">


                                    <div class="table-responsive">

                                        <table id="user_data" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Date</th>
                                                    <th width="10%">Image</th>
                                                    <th width="10%">Title</th>
                                                    <th width="10%">Content</th>
                                                    <th width="10%">City</th>
                                                    <th width="10%">Club</th>
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
                $('.modal-title').text("Add News");
                $('#action').val("Add");
                $('#operation').val("Add");
                $('#user_uploaded_image').html('');
            });

            var dataTable = $('#user_data').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"newsfetch.php",
                    type:"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0, 6, 7],
                        "orderable":false,
                    },
                ],

            });

            $(document).on('submit', '#user_form', function(event){
                event.preventDefault();
                var date = $('#date').val();  
                var title = $('#title').val();
                var content = $('#content').val();
                var city = $('#city').val();
                var club = $('#club').val();
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
                if(title != '' && content != '' && city != '' && club != '' && date != '' )
                {
                    $.ajax({
                        url:"newsinsert.php",
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
                    url:"newsfetch_single.php",
                    method:"POST",
                    data:{user_id:user_id},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#userModal').modal('show');
                        $('#title').val(data.title);
                        $('#content').val(data.content);
                        $('#date').val(data.date);
                        $('#city').val(data.city);
                        $('#club').val(data.club);


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
                        url:"newsdelete.php",
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





    function sortDropDownListByText() {
        // Loop for each select element on the page.
        $("select").each(function() {             
            // Keep track of the selected option.
            var selectedValue = $(this).val();     
            // Sort all the options by text. I could easily sort these by val.
            $(this).html($("option", $(this)).sort(function(a, b) {
                return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
            }));     
            // Select one option.
            $(this).val(selectedValue);
        });
    }
     $(document).ready(sortDropDownListByText);

     function hideIt() {
        if(document.getElementById) { 
            document.getElementById('userModal').style.visibility='hidden';
        }
    }
    </script>




</body>
</html>


<div id="userModal" class="modal fade">
    <div class="modal-dialog">



        <form method="post" id="user_form" enctype="multipart/form-data" autocomplete="off" onsubmit="hideIt()">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add News</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" />
                    <br />
                    <label>News</label>
                    <input type="textarea" name="content" id="content" class="form-control" />
                    <br/>


                    <label>City</label>
                    <select data-placeholder="Choose a city..." class="form-control " name="city" id="city" style=" min-height: 35px;">
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
                    <br/>
                    <label>Club</label>
                    <select data-placeholder="Choose a club..." class="form-control" name="club" id="club" style=" min-height: 35px;">
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
                            <?php echo " $club ";?></option>
                        <?php
                            }
                        }
                        ?>
                    </select><br/>
                    <label>Date</label>
                    <input type="date" name="date" id="date" class="form-control" />
                    <br />

                    <br />
                    <label>Select News Image</label>
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

