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
         //sql with image
        // $sql =" UPDATE pasistence_club SET name ='$name',address= '$address',city_id ='$city_id',city='$city',zip_code='$zipcode',phone='$phone',email='$email',image_url='$filename' WHERE id = '$id'";
         if($filename===''){
             //sql without image
             $sql =" UPDATE pasistence_club SET name ='$name',address= '$address',city_id ='$city_id',city='$city',zip_code='$zipcode',phone='$phone',email='$email' WHERE id = '$id'";
         }else{
             if(!empty($filename)) {
                 move_uploaded_file($_FILES['photo']['tmp_name'], 'img/club/' . $filename);
             }
             //sql with image
             $sql =" UPDATE pasistence_club SET name ='$name',address= '$address',city_id ='$city_id',city='$city',zip_code='$zipcode',phone='$phone',email='$email',image_url='$filename' WHERE id = '$id'";

         }
   //  $sql = "Insert into pasistence_club(name,address,city_id, city, zip_code,phone,email,image_url) VALUES('$name','$address','$city_id','$city','$zipcode','$phone','$email','$filename')";
    // $sql =" UPDATE pasistence_club SET name ='$name',address= '$address',city_id ='$city_id',city='$city',zip_code='$zipcode',phone='$phone',email='$email',image_url='$filename' WHERE id = '$id'";

     if ($conn->query($sql) === TRUE) {
         $_SESSION['success'] = 'Data Updated Successfully';
         header("Location: add_city_club.php");
         die();
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
         $_SESSION['error'] =  "Error: " . $sql . "<br>" . $conn->error;
     }
     $conn->close();
 }