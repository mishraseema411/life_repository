  <?php
include('db.php');
include('newsfunction.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM pasistence_news
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["title"] = $row["title"];
  $output["content"] = $row["content"];
  $output["city"] = $row["city"];
  $output["club"] = $row["club"];
  $output["date"] = $row["date"];
  if($row["image_url"] != '')
  {
   $output['image_url'] = '<img src="img/club/'.$row["image_url"].'" class="img-thumbnail img-responsive"  /><input type="hidden" name="hidden_user_image" value="'.$row["image_url"].'" />';
  }
  else
  {
   $output['image_url'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>
   