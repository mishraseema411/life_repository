<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 25-09-2018
 * Time: 04:55 PM
 */
include('db.php');
include('function.php');
include ('dbConnection.php');
include ('session.php');
//
//
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "lifeclub_db";

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $plan = $_POST['content'];

    $cityString = $_POST['city'];
    $cityArray = explode(',', $cityString);
    $city=$cityArray[0];
    $city_id=$cityArray[1];


    $clubString = $_POST['club'];
    $clubArray = explode(',', $clubString);
    $club=$clubArray[0];
    $club_id=$clubArray[1];



    $date = $_POST['date'];
    $filename = $_FILES['photo']['name'];
//    $city_id = $_POST['title'];
//    $club_id = $_POST['title'];
    if(!empty($filename)){
        $filename = $_FILES["photo"]["name"]; //name of file
        $tempnm = $_FILES["photo"]["tmp_name"]; // temp name of file
        $folder="img/planning/".time().$filename;
        // move_uploaded_file($_FILES['photo']['tmp_name'],'img/news/'.$tempnm);
        move_uploaded_file($tempnm,$folder);

        //move_uploaded_file($_FILES['photo']['tmp_name'],'img/planning/'.$filename);

        $sql = "Insert into pasistence_planning(name, image_url, date, city, club, description,city_id,club_id) VALUES('$title','$folder','$date','$city','$club','$plan','$city_id','$club_id')";

    }else{
        $sql = "Insert into pasistence_planning(name, date, city, club, description,city_id,club_id) VALUES('$title','$date','$city','$club','$plan','$city_id','$club_id')";

    }

//    if($connection->query($sql)){
//        echo 'Data Inserted';
//    }else
//    {
//        echo 'Data Not Inserted';
//    }


    // Create connection
//    $conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }


    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Data Inserted Successfully';
        header("Location: planningAdd.php");
        die();
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: planningAdd.php");
        die();
    }
    $conn->close();
}
?>
