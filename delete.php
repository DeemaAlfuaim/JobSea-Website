<?php
require 'connection.php';
       $id = $_REQUEST['id'];
        global $connection;
        $qurey = "DELETE FROM joboffer WHERE id = '$id'" ;
        $result = mysqli_query($connection, $qurey);
?>