<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM pasistence_club ";
if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR address LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR city LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR zip_code LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR phone LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR email LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
    $image = '';
    if($row["image_url"] != '')
    {
        $image = '<img src="img/club/'.$row["image_url"].'" class="img-thumbnail" width="80" height="80" />';
    }
    else
    {
        $image = '<img src="img/club/'.$row["image_url"].'" class="img-thumbnail" width="80" height="80';
    }
    $sub_array = array();
    $sub_array[] = $image;
    $sub_array[] = $row["name"];
    $sub_array[] = $row["address"];
    $sub_array[] = $row["city"];
    $sub_array[] = $row["zip_code"];
    $sub_array[] = $row["phone"];
    $sub_array[] = $row["email"];
    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
    $data[] = $sub_array;
}
$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data"    => $data
);
echo json_encode($output);
?>
