<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 26-09-2018
 * Time: 02:32 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lifeclub_db";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}