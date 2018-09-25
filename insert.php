<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $image_url = '';
        if($_FILES["image_url"]["name"] != '')
        {
            $image_url = upload_image();
        }

        $statement = $connection->prepare("
   INSERT INTO pasistence_club (name, address, city_id,city,zip_code,phone,email,image_url) 
   VALUES (:name, :address, :city_id, :city, :zip_code, :phone, :email, :image_url)
  ");
        $result = $statement->execute(
            array(
                ':name' => $_POST["name"],
                ':address' => $_POST["address"],
                ':city_id' => $_POST["makecity"], 
                ':city' =>$_POST["make_text"],
                ':zip_code' => $_POST["zip_code"],
                ':phone' => $_POST["phone"],
                ':email' => $_POST["email"],
                ':image_url'  => $image_url
            )
        );
        if(!empty($result))
        {
            echo 'Data Inserted';
        }
    }
    if($_POST["operation"] == "Edit")
    {
        $image_url = '';
        if($_FILES["image_url"]["name"] != '')
        {
            $image_url = upload_image();
        }
        else
        {
            $image_url = $_POST["hidden_user_image"];
        }
        $statement = $connection->prepare(
            "UPDATE pasistence_club 
   SET name = :name, address = :address,city= :city, city_id = :city_id, zip_code = :zip_code, phone = :phone, email = :email, image_url = :image_url  
   WHERE id = :id");
        $result = $statement->execute(
            array(
                ':name' => $_POST["name"],
                ':address' => $_POST["address"],
                ':city' => $_POST["make_text"], 
                ':city_id' => $_POST["makecity"],
                ':zip_code' => $_POST["zip_code"],
                ':phone' => $_POST["phone"],
                ':email' => $_POST["email"],
                ':image_url' => $image_url,
                ':id' => $_POST["user_id"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }
}

?>

