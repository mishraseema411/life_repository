<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 01-10-2018
 * Time: 08:52 PM
 */

include('db.php');
include("cityfunction.php");

if(isset($_POST["user_id"]))
{
    $image = get_image_name($_POST["user_id"]);

    $statement = $connection->prepare(
        "DELETE FROM pasistence_city WHERE id = :id"
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

