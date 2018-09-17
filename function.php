    <?php

function upload_image()
{
 if(isset($_FILES["image_url"]))
 {
  $extension = explode('.', $_FILES['image_url']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = 'img/club/' . $new_name;
  move_uploaded_file($_FILES['image_url']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_image_name($user_id)
{
 include('db.php');
 $statement = $connection->prepare("SELECT image_url FROM pasistence_club WHERE id = '$user_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image_url"];
 }
}

function get_total_all_records()
{
 include('db.php');
 $statement = $connection->prepare("SELECT * FROM pasistence_club");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>
   