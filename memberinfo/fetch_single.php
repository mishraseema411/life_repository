  <?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM pasistence_club 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["name"] = $row["name"];
  $output["address"] = $row["address"];
  $output["city_id"] = $row["city_id"];
  $output["zip_code"] = $row["zip_code"];
  $output["phone"] = $row["phone"];
  $output["email"] = $row["email"];
  if($row["image_url"] != '')
  {
   $output['image_url'] = '<img src="../img/club/'.$row["image_url"].'" class="img-thumbnail img-responsive"  /><input type="hidden" name="hidden_user_image" value="'.$row["image_url"].'" />';
  }
  else
  {
   $output['image_url'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>
   