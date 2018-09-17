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
  $statement = $connection->prepare("
   INSERT INTO pasistence_planning (title, content, image_url,city,club,date) 
   VALUES (:title, :content, :image_url, :city, :club, :date)
  ");
  $result = $statement->execute(
   array(
    ':title' => $_POST["title"],
    ':content' => $_POST["content"],
    ':city' => $_POST["city"],
    ':club' => $_POST["club"],
    ':date' => $_POST["date"],
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
   "UPDATE pasistence_planning 
   SET title = :title, content = :content, city = :city, club = :club, date = :date, image_url = :image_url  
   WHERE id = :id");
  $result = $statement->execute(
   array(
    ':title' => $_POST["title"],
    ':content' => $_POST["content"],
    ':city' => $_POST["city"],
    ':club' => $_POST["club"],
    ':date' => $_POST["date"],
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
   
