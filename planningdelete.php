    <?php

include('db.php');
include("planningfunction.php");

if(isset($_POST["user_id"]))
{
 $image = get_image_name($_POST["user_id"]);
 if($image != '')
 {
  unlink("img/planning/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM pasistence_planning WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["user_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>
   