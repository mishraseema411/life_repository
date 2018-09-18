<?php
require("includes/db.php");


try{	
    if(isset($_POST['submit']))
    {
        $cityname=$_POST['cityname'];
        $cityimage=$_FILES['cityimage'];	



        $stmt=("select * from pasistence_city where name='". $cityname. "'");

        $result = mysqli_query($con, $stmt);

        if (mysqli_num_rows($result) > 0) 
        {


            echo "<script>alert('City Already Exists!');location.replace('add_city_club.php');</script>";
        } else {
            if (($_FILES ["cityimage"] != "") and ($_POST ["cityname"] != ""))
            { 
                $filenm = $_FILES["cityimage"]["name"]; //name of file
                $tempnm = $_FILES["cityimage"]["tmp_name"]; // temp name of file

                $folder="img/city/".time().$filenm;
                move_uploaded_file($tempnm,$folder);

                $sql = "INSERT INTO   pasistence_city(name,image) values ('$cityname','$folder')";
                if (mysqli_query($con, $sql)) 
                {
                    echo "<script>alert('City Inserted !');location.replace('add_city_club.php');</script>";
                } 

            }else {

                echo "<script>alert('All (*) fields are required !');location.replace('add_city_club.php');</script>";

            }

        }
    }
}
catch(Exception $e)
{
    echo 'Message: ' .$e->getMessage();
}


?>

