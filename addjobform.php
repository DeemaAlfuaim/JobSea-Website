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

﻿<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>add job form</title>
        <link rel="stylesheet" href="style.css">
            <script src="java.js" defer></script>
    </head>
    <body>

        <div class=" fadeInDown logo">
            <img class="logo" src="images/logo.PNG" alt="logo">
        </div>

        <div class="wrapper fadeInDown ">
            <div class="formContent">
                <!-- Tabs Titles -->
                <h2 class="h2 active"> job offer Details </h2>


                <!-- Login Form -->
                <form action="insertData.php" method="Post">
                    <input type="text" id="title" class="fadeIn third" name="title" placeholder="title">

                        <input type="text" id="salary" class="fadeIn third" name="salary" placeholder="salary">


                            <input type="text" id="location" class="fadeIn third" name="location" placeholder="location">

                                <h4 class="fadeIn third lang">Category :  </h4>
                                <select class="fadeIn third" id="cat" name="category">
                                    <option value="-1" disabled selected>Choose :</option>
                                    <option value="1">CS</option>
                                    <option value="2">IT</option>
                                    <option value="3">IS</option>

                                </select>
                                <br />

                                <h4 class="fadeIn third lang">Work Time :  </h4>
                                <select class="fadeIn third" id="fullorpart" name="time">
                                    <option disabled selected>Choose :</option>
                                    <option value="full-time">Full-Time</option>
                                    <option value="part-time">Part-Time</option>

                                </select>

                                <br>
                                    <h4 class="fadeIn third lang">Description : </h4>
                                    <textarea class="fadeIn third" name="desc" rows="7" cols="40" placeholder="This job is XXXXXXX"></textarea>

                                    <h4 class="fadeIn third lang">requirements : </h4>
                                    <input type="text" id="crtic" class="fadeIn third" name="req" >
                                        <br>


                                            <br>
                                                <input type="submit" class="fadeIn fourth"  name="submit">


                                                    </form>
                                                    </div>
                                                    </div>
                                                    </body>
                                 