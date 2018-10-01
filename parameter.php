<?php
$page_title="add Admin";
require_once('includes/header.php');

?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

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
                    <div class="row">
                        <div class="col col-md-12">
                            <section class="card">
                                <div class="card-header">
                                    <strong>Push News Now</strong>  
                                </div>
                                <div class="card-body text-secondary">
                                    <div class="card-body card-block">


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Admin Email Id</label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Enter news</label>
                                            </div>

                                            <div class="col-12 col-md-9">

                                                <textarea id="push_news" name="news" placeholder="Push News" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select_city" class=" form-control-label">Select City</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select data-placeholder="Choose a city..." class="form-control" name="city_id" id="city_id" style=" min-height: 35px;">
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

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <button type="submit" id="submit_news" name="Submit" class="btn btn-primary btn-md" style="width:120px;">
                                                    <i class="fa fa-dot-circle-o"></i>&nbsp; OK
                                                </button>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </div><!-- .column -->
                        </div><!-- .row -->
                    </div><!-- .animated -->
                </div><!-- .container -->
            </div> <!-- .content -->

        </div><!-- /#right-panel -->
        <!-- Right Panel -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){

                $("#submit_news").click(function(){

                    var email = document.getElementById('email').value;
                    var news = document.getElementById('push_news').value;
                    var city = document.getElementById('select_city').value;


                    var x = "<br><strong>Email:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+email+
                        "<br><strong>News:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+news+
                        "<br><strong>City:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+city;


                    $.post("http://52.172.221.235:8985/mantra/sendgrid/slimRestfulAPI/public/index.php/api/email",
                           {
                        from_email:"abc@gmail.com",
                        from_name:name,
                        subject:"LifeCLub",
                        to_email:email,
                        to_name:"LifeCLub",
                        text_type:"html",
                        content:x
                    },
                           function(response){
                        if(response.response == 202)
                        {
                            alert("Your News is pushed.");
                        }
                        else{
                            alert("There is some server issue");
                        }
                    });
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
            
            

        </script>


        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>





        <script src="assets/js/lib/data-table/datatables.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>


