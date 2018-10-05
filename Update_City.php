<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 26-09-2018
 * Time: 03:01 PM
 */
include('dbConnection.php');
include('session.php');

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['cityname'];
    $website = $_POST['cityweb'];
    $filename = $_FILES['photo']['name'];
    //sql with image
    // $sql =" UPDATE pasistence_club SET name ='$name',address= '$address',city_id ='$city_id',city='$city',zip_code='$zipcode',phone='$phone',email='$email',image_url='$filename' WHERE id = '$id'";
    if($filename===''){
        //sql without image
        $sql =" UPDATE pasistence_city SET name ='$name',website ='$website' WHERE id = '$id'";
    }else{
        if(!empty($filename)) {

            $filenm = $_FILES["photo"]["name"]; //name of file
            $tempnm = $_FILES["photo"]["tmp_name"]; // temp name of file

            $folder="img/city/".time().$filenm;
            move_uploaded_file($tempnm,$folder);

           // move_uploaded_file($_FILES['photo']['tmp_name'], 'img/club/' . $filename);
        }
        //sql with image
        $sql =" UPDATE pasistence_city SET name ='$name',image='$folder',website ='$website' WHERE id = '$id'";

    }
    //  $sql = "Insert into pasistence_club(name,address,city_id, city, zip_code,phone,email,image_url) VALUES('$name','$address','$city_id','$city','$zipcode','$phone','$email','$filename')";
    // $sql =" UPDATE pasistence_club SET name ='$name',address= '$address',city_id ='$city_id',city='$city',zip_code='$zipcode',phone='$phone',email='$email',image_url='$filename' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Data Updated Successfully';
        header("Location: City_list.php");
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}