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


        $statement1 = $connection->prepare(
            "SELECT id FROM pasistence_city
  WHERE name = '".$_POST["city"]."' 
  LIMIT 1");
        $statement1->execute();  
        $city_id = $statement1->fetchColumn();


        $statement2 = $connection->prepare(
            "SELECT id FROM pasistence_club
  WHERE name = '".$_POST["club"]."' 
  LIMIT 1");
        $statement2->execute();  
        $club_id= $statement2->fetchColumn();



        $statement = $connection->prepare("
   INSERT INTO pasistence_planning (title, content, image_url,city,club,date,city_id,club_id) 
   VALUES (:title, :content, :image_url, :city, :club, :date, : city_id, : club_id)
  ");
        $result = $statement->execute(
            array(
                ':title' => $_POST["title"],
                ':content' => $_POST["content"],
                ':city' => $_POST["city"],
                ':club' => $_POST["club"],
                ':date' => $_POST["date"],
                ':image_url'  => $image_url,
                ':city_id'  => $city_id,
                ':club_id'  => $club_id

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

        $statement3 = $connection->prepare(
            "SELECT id FROM pasistence_city
  WHERE name = '".$_POST["city"]."' 
  LIMIT 1");
        $statement3->execute();  
        $city_id = $statement3->fetchColumn();


        $statement4 = $connection->prepare(
            "SELECT id FROM pasistence_club
  WHERE name = '".$_POST["club"]."' 
  LIMIT 1");
        $statement4->execute();  
        $club_id= $statement4->fetchColumn();

        $statement = $connection->prepare(
            "UPDATE pasistence_planning 
   SET title = :title, content = :content, city = :city, club = :club, date = :date, image_url = :image_url, city_id :city_id,club_id :club_id 
   WHERE id = :id");
        $result = $statement->execute(
            array(
                ':title' => $_POST["title"],
                ':content' => $_POST["content"],
                ':city' => $_POST["city"],
                ':club' => $_POST["club"],
                ':date' => $_POST["date"],
                ':image_url' => $image_url,
                ':id' => $_POST["user_id"],
                ':city_id'  => $city_id,
                ':club_id'  => $club_id
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }
}

?>

