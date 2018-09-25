<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 25-09-2018
 * Time: 04:55 PM
 */
include('db.php');
include('function.php');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lifeclub_db";

if(isset($_POST['add'])){
    $title = $_POST['n_title'];
    $plan = $_POST['n_content'];

    $cityString = $_POST['city'];
    $cityArray = explode(',', $cityString);
    $city=$cityArray[0];
    $city_id=$cityArray[1];


    $clubString = $_POST['club'];
    $clubArray = explode(',', $clubString);
    $club=$clubArray[0];
    $club_id=$clubArray[1];



    $date = $_POST['n_date'];
    $filename = $_FILES['photo']['name'];
//    $city_id = $_POST['title'];
//    $club_id = $_POST['title'];
    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'],'img/news/'.$filename);
    }

//    if($connection->query($sql)){
//        echo 'Data Inserted';
//    }else
//    {
//        echo 'Data Not Inserted';
//    }


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "Insert into pasistence_news(title,content,image_url, date, city_id,club_id,city,club) VALUES('$title','$plan','$filename','$date','$city_id','$club_id','$city','$club')";

    if ($conn->query($sql) === TRUE) {
        header("Location: newsAdd.php");
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}?>
