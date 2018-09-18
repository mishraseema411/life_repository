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
       



        $statement = $connection->prepare("INSERT INTO pasistence_planning (title, content, image_url,city,club,city_id,club_id,date) 
   VALUES(:title, :content, :image_url,:city,:club, :city_id, :club_id, :date)
  ");
        $result = $statement->execute(
            array(
                ':title' => $_POST["title"],
                ':content' => $_POST["content"],
                ':image_url'  => $image_url,
                ':city' => $_POST["city"],
                ':club' => $_POST["club"],
                ':city_id' => $_POST["city"],
                ':club_id' => $_POST["club"],
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
                ':city_id'  => $_POST["city"],
                ':club_id'  => $_POST["club"]
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }
}

?>

