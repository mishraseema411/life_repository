<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 25-09-2018
 * Time: 04:55 PM
 */
include ('dbConnection.php');
include('session.php');


if(isset($_POST['update'])){
    $id=$_POST['id'];
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


    if($filename===''){
        //sql without image
        $sql ="UPDATE pasistence_news SET title='$title',content='$plan',date='$date',club_id='$club_id',city_id='$city_id',city='$city',club='$club' WHERE id='$id'";
    }else{
        if(!empty($filename)){
            move_uploaded_file($_FILES['photo']['tmp_name'],'img/news/'.$filename);
        }
        //sql with image
        $sql ="UPDATE pasistence_news SET title='$title',content='$plan',image_url='$filename',date='$date',club_id='$club_id',city_id='$city_id',city='$city',club='$club' WHERE id='$id'";

    }

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Data Updated Successfully';
        header("Location: newsAdd.php");
        die();
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
        header("Location: newsAdd.php");
        die();
    }
    $conn->close();
}?>
