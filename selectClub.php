<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 26-09-2018
 * Time: 03:32 PM
 */

include('dbConnection.php');

if(isset($_POST['userId'])) {
    $id = $_POST['userId'];
    $sql = "SELECT * FROM pasistence_club WHERE id = '139'";
    $query = $conn->query($sql);
    $row1 = $query->fetch_assoc();
    echo json_encode($row1);
    $conn->close();
}