<?php
require_once '../dbcon.php';

$id = base64_decode($_GET['id']);

mysqli_query($db, "UPDATE students SET status ='1' WHERE id='$id'");
header('Location: students.php');

?>