<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 25-09-2018
 * Time: 04:55 PM
 */
include('db.php');
include('function.php');
include('dbConnection.php');
include ('session.php');


if(isset($_POST['add'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cityString = $_POST['city'];

    $cityArray = explode(',', $cityString);
    $city=$cityArray[0];
    $city_id=$cityArray[1];

    $zipcode = $_POST['z_code'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $filename = $_FILES['photo']['name'];
//    $city_id = $_POST['title'];
//    $club_id = $_POST['title'];
    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'],'img/club/'.$filename);
    }

//    if($connection->query($sql)){
//        echo 'Data Inserted';
//    }else
//    {
//        echo 'Data Not Inserted';
//    }


    // Create connection
   // $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  /*  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/

    $sql = "Insert into pasistence_club(name,address,city_id, city, zip_code,phone,email,image_url) VALUES('$name','$address','$city_id','$city','$zipcode','$phone','$email','$filename')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Data Inserted Successfully';
        header("Location: add_city_club.php");
        die();
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: add_city_club.php");
        die();
    }
    $conn->close();
}?>
