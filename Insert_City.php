<?php
require("includes/db.php");

try{
    if(isset($_POST['submit']))
    {
        $cityname=$_POST['cityname'];
        $cityweb=$_POST['cityweb'];
        $cityimage=$_FILES['cityimage']['name'];


        $stmt=("select * from pasistence_city where name='". $cityname. "'");

        $result = mysqli_query($con, $stmt);

        if (mysqli_num_rows($result) > 0)
        {
            echo "<script>alert('City Already Exists!');location.replace('add_city_club.php');</script>";
        } else {
            if (($_FILES ["cityimage"] != "") and ($_POST ["cityname"] != ""))
            {
                if( $cityimage === ''){

                    $sql = "INSERT INTO pasistence_city(name,website) values ('$cityname','$cityweb')";

                }else
                {
                    $filenm = $_FILES["cityimage"]["name"]; //name of file
                    $tempnm = $_FILES["cityimage"]["tmp_name"]; // temp name of file

                    $folder="img/city/".time().$filenm;
                    move_uploaded_file($tempnm,$folder);
                     $sql = "INSERT INTO pasistence_city(name,image,website) values ('$cityname','$folder','$cityweb')";

                }

                if (mysqli_query($con, $sql))
                {
                    echo "<script>alert('City Inserted !');location.replace('City_list.php');</script>";
                }

            }else {
                echo "<script>alert('All (*) fields are required !');location.replace('City_list.php');</script>";

            }

        }
    }
}
catch(Exception $e)
{
    echo 'Message: ' .$e->getMessage();
}


?>

