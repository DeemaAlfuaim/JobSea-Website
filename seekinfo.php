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

require 'connection.php';
///////////////////////////////////
$id = $_GET['id'];

$JSeeQuery = "SELECT * FROM jobseeker WHERE id = $id";
$getInfo = mysqli_query($connection, $JSeeQuery);

if (mysqli_num_rows($getInfo) > 0) {
    while ($JSeeInfo = mysqli_fetch_assoc($getInfo)) {
        $fName = $JSeeInfo['first_name'];
        $lName = $JSeeInfo['last_name'];
        $age = $JSeeInfo['age'];
        $quali = $JSeeInfo['qualifications'];
        $workExp = $JSeeInfo['work_experience'];
        $lang = $JSeeInfo['languages'];
        $phoneNum = $JSeeInfo['phone_number'];
        $emailAddr = $JSeeInfo['email_address'];
    }
}
?>


﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Seeker Information</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jobProviderStyle.css">
    <script src="java.js" defer></script>
</head>
<body>
    <div class=" fadeInDown " class="logo">
        <img class="logo" src="images/logo.PNG" alt="logo">
    </div>
   
    <h2 style="color:aliceblue; " class="fadeIn first marg">Seeker Information : </h2>

   
  
    <div class="Info">

        <table class="fadeIn second">
            <tr id="frH">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th colspan="2">Phone Number</th>
            </tr>
            <tr id="infofrH">
                <td><?php echo $fName ?></td>
                <td><?php echo $lName ?></td>
                <td><?php echo $age ?></td>
                <td colspan="2"><?php echo $phoneNum ?></td>
            </tr>

            <tr id="srH">
                <th colspan="3">Qualifications</th>
                <th colspan="2">Languages</th>
            </tr>
            <tr id="infosrH">
                <td colspan="3"><?php echo $quali ?></td>
                <td colspan="2"><?php echo $lang ?></td>
            </tr>

            <tr id="thrH">
                <th colspan="2">Email Address</th>
                <th colspan="3">Work Experience</th>
            </tr>
            <tr id="infothrH">
                <td colspan="2"><?php echo $emailAddr ?>.com</td>
                <td colspan="3"><?php echo $workExp ?></td>
            </tr>
        </table>
    </div>

</body>
</html>