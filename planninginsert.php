<?php
include('db.php');
include('planningfunction.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $image_url = '';
        if($_FILES["image_url"]["name"] != '')
        {
            $image_url = upload_image();
        }

        $value = $_POST["makecity"];
        $text = $_POST["make_text"];

        $value2 = $_POST["makeclub"];
        $text2 = $_POST["make_text2"];


        $statement = $connection->prepare("INSERT INTO pasistence_planning (name, description, image_url,city,club,city_id,club_id,date) 
   VALUES(:title, :content, :image_url,:city,:club, :city_id, :club_id, :date)
  ");
        $result = $statement->execute(
            array(
                ':title' => $_POST["title"],
                ':content' => $_POST["content"],
                ':image_url'  => $image_url,
                ':city' => $text,
                ':club' => $text2,
                ':city_id' => $value,
                ':club_id' => $value2,
                ':date' => $_POST["date"]

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
        $value = $_POST["makecity"];
        $text = $_POST["make_text"];

        $value2 = $_POST["makeclub"];
        $text2 = $_POST["make_text2"];



        $statement = $connection->prepare(
            "UPDATE pasistence_planning 
   SET name = :title, description = :content, city = :city, club = :club, date = :date, image_url = :image_url, city_id :city_id,club_id :club_id 
   WHERE id = :id");
        $result = $statement->execute(
            array(
                ':title' => $_POST["title"],
                ':content' => $_POST["content"],
                ':city' => $text,
                ':club' => $text2,
                ':date' => $_POST["date"],
                ':image_url' => $image_url,
                ':city_id' => $value,
                ':club_id' => $value2,
                ':id' => $_POST["user_id"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated ';
        }
    }
}

?>

