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
    $title = $_POST['n_title'];
    $title = str_replace("'","\'",$title);
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
        $filename = $_FILES["photo"]["name"]; //name of file
        $tempnm = $_FILES["photo"]["tmp_name"]; // temp name of file
        $folder="img/news/".time().$filename;
       // move_uploaded_file($_FILES['photo']['tmp_name'],'img/news/'.$tempnm);
        move_uploaded_file($tempnm,$folder);
        $sql = "Insert into pasistence_news(title,content,image_url, date, city_id,club_id,city,club) VALUES('$title','$plan','$folder','$date','$city_id','$club_id','$city','$club')";
    }else{
        $sql = "Insert into pasistence_news(title,content, date, city_id,club_id,city,club) VALUES('$title','$plan','$date','$city_id','$club_id','$city','$club')";
    }

//    if($connection->query($sql)){
//        echo 'Data Inserted';
//    }else
//    {
//        echo 'Data Not Inserted';
//    }




    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Data Inserted Successfully';
        header("Location: newsAdd.php");
        die();
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: newsAdd.php");
        die();

    }
    $conn->close();
}?>
