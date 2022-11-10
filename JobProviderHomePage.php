
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
$id = $_SESSION['id']; 

     $sql1 = "SELECT * FROM jobprovider WHERE id= '$id' ";
     


    $result1 = mysqli_query($connection, $sql1);
    
    
        $error = mysqli_connect_error();
       
        if ($error != null) {
            echo "<p> Could not connect to the database. $error</p>";
            exit(); 
        }

    $row1 = mysqli_fetch_assoc($result1);
    
    
    
    ?>
   <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jobProviderStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class=" fadeInDown " class="logo">
        <img class="logo" src="images/logo.PNG" alt="logo" >
    </div>
    <br/>
<h1 class="child fadeIn first" id="welcom">welcome,<?php echo $row1['name'] ?> </h1>
<h2  class="fadeIn first"style="text-align: right" id="logOut"> <a href="logout.php">Log-out</a>   </h2>
    <br/>

    <br/>
<table class="fadeIn fourth" >
    <tr class="UDStat">
        <th style="background-color: rgb(33, 111, 152);
        height: 60px;">name</th>
        <th style="background-color: rgb(33, 111, 152);
        height: 60px;">main location</th>
        <th style="background-color: rgb(33, 111, 152);
        height: 60px;">phone number</th>
        <th style="background-color: rgb(33, 111, 152);
        height: 60px;">email address</th>
      
    </tr>
   
    <tr class="UDStat">
         
        <td class ="black" style="height: 60px;"><?php echo $row1["name"]; ?></td>
        <td class ="black" style="height: 60px;"><?php echo $row1["main_location"]; ?></td>
        <td class ="black" style="height: 60px;"><?php echo $row1["phone_number"]; ?></td>
        <td class ="black" style="height: 60px;"><?php echo $row1["email_address"]; ?></td>
      
        
    </tr>
</table>

<h2 class="fadeIn third marg">Received Applications</h2>
 <div id="displayReceivedApplications">
    
 </div>
 <br />
<h2 id="oferdjob" class="child fadeIn third marg">Offered Jobs </h2>
<h4 style="text-decoration:underline" id="Addjob" class="child fadeIn third"><a href="addjobform.php">Add new Job Offer</a></h4>

<div id="displayOfferdJobs">
    
</div>


</body>
</html>
<script>
$(document).ready(function()
{ 
var userId="<?php echo $id?>";
function getAllReceivedApplications(){
  $.ajax
  ({
   url: 'getAllReceivedApplications.php',
   data: 'userId='+userId,
   cache: false,
   success: function(r)
   {
    $("#displayReceivedApplications").html(r);
   }
  });   
 }
 function getAllOfferdJobs(){
  $.ajax
  ({
   url: 'getAllOfferdJobs.php',
   data: 'userId='+userId,
   cache: false,
   success: function(r)
   {
    $("#displayOfferdJobs").html(r);
   }
  });   
 }
 getAllReceivedApplications();
 getAllOfferdJobs();
});
 </script>