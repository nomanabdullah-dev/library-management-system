<?php
require_once '../dbcon.php';

if (isset($_GET['bookdelete'])) {
    $id = base64_decode($_GET['bookdelete']);
    
    mysqli_query($db, "DELETE FROM books WHERE id='$id'");

    header('Location: manage-books.php');
}
?>