<?php

session_start();

# security

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
      
      
if($_SESSION['role']=='jobseeker'){
    header("Location: JobSeekerHomePage.php");
}
else if($_SESSION['role']!='jobprovider')
    header("Location: index.php");
    


    
?>
<?php


require_once'connection.php';
//get Categoyr ID
if (isset($_POST['category'])) {
    $categID = $_POST['category'];

//get JobProv ID
    $provID = $_SESSION['id'];
//;/////////////////////////////
//insert into joboffer
    $title = $_POST['title'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];
    $time = $_POST['time'];
    $desc = $_POST['desc'];
    $req = $_POST['req'];

    $id = rand(1, 999999);

    $sql = "INSERT INTO  `joboffer`(`id`, `job_provider_id`, `job_category_id`, `title`, `full_time`, `salary`, `location`, `description`, `requirements`) VALUES ($id, $provID, $categID, '$title', '$time', '$salary', '$location', '$desc', '$req')";

    if (mysqli_query($connection, $sql)) {
        echo "<p> New record created successfully </p>";
        header('Location: jobOfferDetails.php?title='.$title);
    } else {
        echo "<p style=\"color: red; \"> Error: " . $sql . "<br>" . mysqli_error($connection) . "</p>";
    }
}
?>