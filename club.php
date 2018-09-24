<?php
require("inc/dbh.php");
if((!isset($_SESSION['username'])) or (!isset($_SESSION['email'])))
{
    header('location:login.php');
}
echo "1";
$object=new Dbh;
$object->connect();
try{	
    if(isset($_POST['clubsubmit']))
    {
     $clubnm=$_POST['clubnm'];
     $address=$_FILES['address'];
     $zipcode=$_POST['zipcode'];
     $city=$_POST['city'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];	
     $clubimage=$_FILES['clubimage'];


     if (($_FILES ["clubimage"] != "") and ($_POST ["clubnm"] != "") and ($_POST ["address"] != "") and ($_POST ["zipcode"] != "") and ($_POST ["city"] != "") and ($_POST ["phone"] != "") and ($_POST ["email"] != ""))
     { 
         $filenm = $_FILES["clubimage"]["name"]; //name of file
         $tempnm = $_FILES["clubimage"]["tmp_name"]; // temp name of file

         $folder="img/city/".time().$filenm;
         move_uploaded_file($tempnm,$folder);

         echo "1";


         $sql = "INSERT INTO pasistence_club (name,address,city_id,zip_code,phone,email,image_url) VALUES ('$clubnm', '$address', '1', '$zipcode', '$phone', '$email', '$folder')";

         if (mysqli_query($con, $sql)) 
         {
             echo "<script>alert('City Inserted !');location.replace('add_city_club.php');</script>";
         } 

     }else {

         echo "<script>alert('All (*) fields are required !');location.replace('add_city_club.php');</script>";

     }

    }else{echo "<script>alert('Button has not set on form !!!');location.replace('add_city_club.php');</script>";}
   }
catch(Exception $e)
{
    echo 'Message: ' .$e->getMessage();
}


?>

