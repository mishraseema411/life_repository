<?php
$page_title="City List";
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


    });
</script>

</head>
<body>
<?php require_once('includes/navbar.php');?>

<!-- Right Panel -->
<div id = "right-panel" class = "right-panel">

    <?php require_once('includes/rightPanelHeader.php');?>

    <!-- Header/Bradcrum-->

    <div class="content mt-3">
        <div class="container">
            <div class="animated fadeIn">

                <?php
                if(isset($_SESSION['error'])){
                    echo "
                   <div class='alert alert-danger alert-dismissible'>
                   <button type='button'class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                   <h4><i class='fa fa-warning'></i> Error !</h4>
                   ".$_SESSION['error']." </div>
                   ";
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                    echo "
                   <div class='alert alert-success alert-dismissible'>
                   <button type='button'class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                   <h4><i class='fa fa-check'></i> Success !</h4>
                   ".$_SESSION['success']." </div>
                   ";
                    unset($_SESSION['success']);
                }

                ?>

                <div class="col-sm-12 col-lg-12">
                    <section class="card">
                        <div class="card-header">

                            <div class="col-sm-6 col-xs-6 col-lg-6" style="padding:1%;text-align: left;">
                                <h3><strong>Cities </strong> </h3>

                            </div>
                            <div class="col-sm-6 col-lg-6 col-xs-6" style="padding:1%; text-align: right;">
                                <button id="city" type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cityModal" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Add City
                                </button>
                                <!-- <button  type="button" id="add_button" data-toggle="modal" data-target="#userModal"  class="btn btn-primary btn-sm" >
                                    <i class="fa fa-plus"></i> Add Club
                                </button>
                                </button> -->
<!--                                <a href="club_r.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>  Add Club</a>-->
                            </div>

                        </div>
                        <div class="card-body text-secondary" style="padding:0px;margin:0px;">

                            <div class="table-responsive">

                                <table id="city_data" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th width="50%">Image</th>
                                        <th width="40%">Name</th>
                                        <th width="5%">Edit</th>
                                        <th width="5%">Delete</th>

                                    </tr>
                                    </thead>
<!--                                    <tbody>-->
<!--                                    --><?php
//                                    include('dbConnection.php');
//                                    $sql = "SELECT * FROM pasistence_city ";
//                                    $query = $conn->query($sql);
//                                    while($row = $query->fetch_assoc()){
//                                      echo "
//                                    <tr>
//                                      <td class='hidden'></td>
//                                      <td>".date('M d, Y', strtotime($row['created_at']))."</td>
//                                      <td>".$row['image']."</td>
//                                      <td><button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['id']."'><i class='fa fa-edit'></i>Edit</button></td>
//                                      <td>
//                                        <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
//                                      </td>
//                                    </tr>
//                                  ";
//                                    }
//
//                                    ?>
<!--                                    </tbody>-->
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

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>




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
                url:"fetch_city.php",
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0, 2, 3],
                    "orderable":false,
                },
            ],
            console.log(order);

        });

       /* $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var name = $('#name').val();
            var address = $('#address').val();
            var makecity = $('#makecity').val();
            var make_text = $('#make_text').val();
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
            if(name != '' && address != '' && makecity != '' && zip_code != '' && phone != '' && email != '' )
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
            var url = 'club_r.php';
            var form = $('<form action="' + url + '" method="post">' +
                '<input type="text" name="userId" value="' + user_id + '" />' +
                '</form>');
            $('body').append(form);
            form.submit()
//            $.ajax({
//                url:"fetch.php",
//                method:"POST",
//                data:{user_id:user_id},
//                dataType:"json",
//                success:function(data)
//                {
//                    window.location.href = "club_r.php";
//                }
//            })

            // window.location.href = "club_r.php";
        });

        $(document).on('click', '.delete', function() {
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
        });*/

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


</script>

<script type="text/javascript">
    function setTextField(ddl)
    {
        document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;

    }

</script>

</body>
</html>

