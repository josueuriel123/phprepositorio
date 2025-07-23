<?php
/*$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_php";
*/

$host = "sql307.infinityfree.com ";
$user = "if0_39533126";
$pass = "jUMunXbb3F";
$db = "if0_39533126_productos ";



$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>