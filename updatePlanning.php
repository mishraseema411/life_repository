<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 26-09-2018
 * Time: 06:37 PM
 */


include ('dbConnection.php');
include('session.php');
//
//
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "lifeclub_db";
if(isset($_POST['update'])){
    $id=$_POST['id'];
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



    if($filename===''){
        //sql without image
        $sql ="UPDATE pasistence_planning SET name ='$title',date='$date',city='$city',club ='$club',description='$plan',city_id='$city_id',club_id='$club_id' WHERE id = '$id'";
    }else{
        if(!empty($filename)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'img/planning/' . $filename);
        }
        //sql with image
        $sql ="UPDATE pasistence_planning SET  name ='$title',image_url='$filename',date='$date',city='$city',club ='$club',description='$plan',city_id='$city_id',club_id='$club_id' WHERE id = '$id'";

    }

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Data Updated Successfully';
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