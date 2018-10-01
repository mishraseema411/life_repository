<?php
$page_title="add Planning";
require_once('includes/header.php');
if((!isset($_SESSION['username'])) or (!isset($_SESSION['email'])))
{
    header('location:login.php');
}

?>

<!--    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" /> -->

<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
<link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/scss/style.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<!--    --><?php //require_once('includes/navbar.php');?>
<?php require_once('leftpanel.php');?>
<?php require_once('script.php');
    require_once('cmodel.php');?>
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" >

        <?php require_once('includes/rightPanelHeader.php');?>

        <div class="content mt-3">
            <div class="container">
                <div class="animated fadeIn">
                    <?php
                    include 'dbConnection.php';
                    include 'planningModel.php';

                    if(isset($_POST['userId']))
                    {
                    if(isset($_POST['userId'])) {
                        $id = $_POST['userId'];
                        $sql = "SELECT * FROM pasistence_planning WHERE id = '$id'";
                        $query = $conn->query($sql);
                        $row1 = $query->fetch_assoc();
                        $josnObj = json_encode($row1);
                        $conn->close();

                        $someObject = json_decode($josnObj,true);
                        // print_r($someObject);      // Dump all data of the Object
                        $planning = new planningModel(
                            $someObject["id"],
                            $someObject["name"],
                            $someObject["image_url"],
                            $someObject["date"],
                            $someObject["city"],
                            $someObject["club"],
                            $someObject["description"],
                            $someObject["city_id"],
                            $someObject["club_id"]
                        );
                        // print_r($planning);
                    }?>
<!--                    Update Planning-->
                    <div class="row ">
                        <div class="col col-md-8">

                            <div class="card">
                                <div class="card-header">
                                    <strong>Add Planning</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="updatePlanning.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="title" class=" form-control-label">Title</label>
                    </div>

                    <div class="col-12 col-md-9">
                        <input type="text" id="title" name="title" placeholder="Add Title" class="form-control" value="<?php echo $planning->name ?>">
                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $planning->id ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="content" class=" form-control-label">Plan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" id="content" name="content" value="" placeholder="Planning Description" cols="5" rows="4"><?php echo $planning->description ?></textarea>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="city" class=" form-control-label">City</label></div>

                    <div class="col-12 col-md-9">

                        <select class="form-control" id="city" name="city" style="min-height: 35px;">
                            <?php
                            $query1="select * from pasistence_city ORDER BY id DESC";
                            $run1=mysqli_query($con,$query1);
                            if(mysqli_num_rows($run1) > 0)
                            {
                                $key_value = $planning->city.','.$planning->city_id ;
                                echo '<option value = "'.$key_value.'" selected>'.$planning->city.'</option>';
                                echo '<option value = "" disabled >--Select--</option>';

                                while($row1=mysqli_fetch_array($run1))
                                {
                                    $city=$row1['name'];
                                    $value=$row1['name'].','.$row1['id'];

                                    echo '<option value = "'.$value.'">'.$city.'</option>';
                                }
                            }
                            // $selectedcity='';
                            /*   $query1="select * from pasistence_city ORDER BY id DESC";
                               $run1=mysqli_query($con,$query1);
                               if(mysqli_num_rows($run1) > 0)
                               {
                                   while($row1=mysqli_fetch_array($run1))
                                   {
                                       $city=$row1['name'];
                                       $value=$row1['id'];
                                       if($value == $selectedcity){
                                           echo '<option value = "'.$value.'"selected>'.$city.'</option>';
                                       }else{
                                           echo '<option value = "'.$value.'">'.$city.'</option>';
                                       }
                                       //echo '<option value = "'.$value.'">'.$city.'</option>';
                             /*  ?>
                               <option value="<?php echo " $value "; ?> ">
                                   <?php echo " $city ";?></option>
                               <?php
                                   }
                               }*/
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="club" class=" form-control-label">Club</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" id="club" name="club" value="" style="min-height: 35px;">
                            <?php
                            //                                                   if(isset($_POST["city"])){
                            //													       $selectedcity = $_POST["city"];
                            //$query1="select * from pasistence_club where city_id = ".$selectedcity." ORDER BY id DESC";
                            $query1="select * from pasistence_club ORDER BY id DESC";
                            $run1=mysqli_query($con,$query1);
                            if(mysqli_num_rows($run1) > 0)
                            {
                                $key_value = $planning->club.','.$planning->club_id ;
                                echo '<option value = "'.$key_value.'" selected>'.$planning->club.'</option>';
                                echo '<option value = "" disabled >--Select--</option>';
                                while($row1=mysqli_fetch_array($run1))
                                {
                                    $club=$row1['name'];
                                    $value=$row1['name'].','.$row1['id'];
                                    echo '<option value = "'.$value.'">'.$club.'</option>';
                                    /*?>
                                    <option value="<?php echo " $value1 "; ?> ">
                                        <?php echo " $club ";?></option>
                                    <?php*/
                                }
                            }

                            /*function set_City(){
                                $query1="select * from pasistence_city ORDER BY id DESC";
                                $run1=mysqli_query($con,$query1);
                                //$options
                                if(mysqli_num_rows($run1) > 0)
                                {
                                    while($row1=mysqli_fetch_array($run1))
                                    {
                                        $city=$row1['name'];
                                        $value=$row1['id'];
                                        //if($value == $selectedcity){
                                        $options = '<option value = "'.$value.'"selected>'.$city.'</option>';
                                        //}else{
                                        //	$options= '<option value = "'.$value.'">'.$city.'</option>';
                                        //}
                                        //echo '<option value = "'.$value.'">'.$city.'</option>';

                                        }
                                }
                                return $options;
                              }	*/
                            // }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="date" class=" form-control-label">Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="date" id="date" name="date" placeholder="YYYY-MM-DD" class="form-control" value="<?php echo $planning->date ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Select Plan Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="photo" name="photo" >
                        <img src="img/planning/<?php echo $planning->image_url?>" class="img-thumbnail img-responsive"/>
                        <input type="hidden"  id="photo_edit" name="photo_edit" value="<?php echo $planning->image_url?>" />
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" name="update" id = "update" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                    <button type="reset" name="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> reset
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
<!--                    /Update Planning-->
                   <?php }else{ ?>
<!--                    Add Planning-->
                    <div class="row ">
                        <div class="col col-md-8">
  
                            <div class="card">
                                <div class="card-header">
                                    <strong>Add Planning</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="insertPlanning.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <!-- <div class="row justify-content-md-center">
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

                                        </div> -->

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="title" class=" form-control-label">Title</label>
                                            </div>

                                            <div class="col-12 col-md-9">
                                                <input type="text" id="title" name="title" placeholder="Add Title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="content" class=" form-control-label">Plan</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea class="form-control" id="content" name="content" value="" placeholder="Planning Description" cols="5" rows="4"></textarea>
                                                </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="city" class=" form-control-label">City</label></div>

                                            <div class="col-12 col-md-9">

                                               <select class="form-control" id="city" name="city" style="min-height: 35px;">
                                                    <?php
														 $query1="select * from pasistence_city ORDER BY id DESC";
									                        $run1=mysqli_query($con,$query1);
									                        if(mysqli_num_rows($run1) > 0)
									                        {
									                        	echo '<option value = "" disabled selected>--Select--</option>';

									                            while($row1=mysqli_fetch_array($run1))
									                            {
									                                $city=$row1['name'];
									                                $value=$row1['name'].','.$row1['id'];

									                                echo '<option value = "'.$value.'">'.$city.'</option>';
									                            }
									                        }
                                                    // $selectedcity='';
									                     /*   $query1="select * from pasistence_city ORDER BY id DESC";
									                        $run1=mysqli_query($con,$query1);
									                        if(mysqli_num_rows($run1) > 0)  
									                        {
									                            while($row1=mysqli_fetch_array($run1))
									                            {
									                                $city=$row1['name']; 
									                                $value=$row1['id'];
									                                if($value == $selectedcity){
																		echo '<option value = "'.$value.'"selected>'.$city.'</option>';
																	}else{
																		echo '<option value = "'.$value.'">'.$city.'</option>';
																	}
																	//echo '<option value = "'.$value.'">'.$city.'</option>';
									                      /*  ?>
									                        <option value="<?php echo " $value "; ?> ">
									                            <?php echo " $city ";?></option>
									                        <?php
									                            }
									                        }*/
									                        ?>
                                               </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="club" class=" form-control-label">Club</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                               <select class="form-control" id="club" name="club" value="" style="min-height: 35px;">
                                                  <?php
//                                                   if(isset($_POST["city"])){
//													       $selectedcity = $_POST["city"];
													       //$query1="select * from pasistence_club where city_id = ".$selectedcity." ORDER BY id DESC";
                                                           $query1="select * from pasistence_club ORDER BY id DESC";
									                        $run1=mysqli_query($con,$query1);
									                        if(mysqli_num_rows($run1) > 0)
									                        {
                                                                echo '<option value = "" disabled selected>--Select--</option>';
									                            while($row1=mysqli_fetch_array($run1))
									                            {

									                                $club=$row1['name'];
                                                                    $value=$row1['name'].','.$row1['id'];
																	echo '<option value = "'.$value.'">'.$club.'</option>';
									                        /*?>
									                        <option value="<?php echo " $value1 "; ?> ">
									                            <?php echo " $club ";?></option>
									                        <?php*/
									                            }
									                        }
									                        
									                        /*function set_City(){
																$query1="select * from pasistence_city ORDER BY id DESC";
									                        	$run1=mysqli_query($con,$query1);
									                        	//$options
										                        if(mysqli_num_rows($run1) > 0)
										                        {
										                            while($row1=mysqli_fetch_array($run1))
										                            {
										                                $city=$row1['name']; 
										                                $value=$row1['id'];
										                                //if($value == $selectedcity){
																		$options = '<option value = "'.$value.'"selected>'.$city.'</option>';
																		//}else{
																		//	$options= '<option value = "'.$value.'">'.$city.'</option>';
																		//}
																		//echo '<option value = "'.$value.'">'.$city.'</option>';
	
									                           	 	}
									                        	}
									                        	return $options;
															  }	*/								                        
									                       // }
									                        ?>
                                               </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="date" class=" form-control-label">Date</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="date" id="date" name="date" placeholder="YYYY-MM-DD" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">Select Plan Image</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="photo" name="photo" >
                                            </div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <button type="submit" name="add" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Add
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> reset
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
<!--                    /Add Planning-->
                    <?php
                    }
                    ?>
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
    
    <script>
		function run() {
		    document.getElementById("club").innerHTML = document.getElementById("city").value;
		    var a = document.getElementById("club").innerHTML; 
		}
	</script>

<!--Insett Script-->



