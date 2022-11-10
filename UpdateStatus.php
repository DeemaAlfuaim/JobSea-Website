<?php
require 'connection.php'; 
    
$id = $_REQUEST['id'];
$status = $_REQUEST['status'];

$qurey2="UPDATE jobapplication SET application_status_id = '$status' WHERE id = '$id'";
$result2 = mysqli_query($connection, $qurey2) ;
?>

