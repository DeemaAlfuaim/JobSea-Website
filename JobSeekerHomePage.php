<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
if ($_SESSION['role'] == 'jobprovider') {
    header("Location: JobProviderHomePage.php");
} else if ($_SESSION['role'] != 'jobseeker')
    header("Location: index.php");
 
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jobProviderStyle.css">
    <script src="java.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class=" fadeInDown " class="logo">
    <img class="logo" src="images/logo.PNG" alt="logo">
</div>
<?php
$host = "localhost";
$database = "jobseadb";
$user = "root";
$pass = "";
$connection = mysqli_connect($host, $user, $pass, $database);

	
$error = mysqli_connect_error();
if ($error != null) {
    
     $output = "<p>Unable to connect </p>" . $error;
    exit($output);
}
//a
if (!isset($_SESSION["id"])) {
    $id = 1111;
} else {
    $id = $_SESSION["id"];
}
$sql = "SELECT * FROM jobseeker WHERE id='$id'";
$result = mysqli_query($connection, $sql);
//retrieve jobSeeker name
$sqlN = "SELECT * FROM jobseeker WHERE jobseeker.id = '$id'";
$result1 = mysqli_query($connection, $sqlN);
$n = mysqli_fetch_assoc($result1);

?>
<input type="hidden" id="sessionId" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : '' ?>">

<h2 style="text-align: right" id="logOut"><a href="logout.php">Log-out</a></h2>
<h1 class="child fadein first"> welcome <?php echo $n['first_name'];
    ?></h1>
<br/>
<div class="Info">
    <h2>Information</h2>
    <table class ="fadeIn third">
        <tr id="frH">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th colspan="2">Phone Number</th>
        </tr>
        <tr id="infofrH">
            <?php
            while ($row = mysqli_fetch_assoc($result))
            {
            ?>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td colspan="2"><?php echo $row['phone_number']; ?></td>
        </tr>
        <?php
        }
        ?>
        <tr id="srH">
            <th colspan="3">Qualifications</th>
            <th colspan="2">Languages</th>
        </tr>
        <tr id="infosrH">
            <?php
            $result3 = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result3))
            {
            ?>
            <td colspan="3"><?php echo $row['qualifications']; ?></td>
            <td colspan="2"><?php echo $row['languages']; ?></td>
        </tr>
    <?php
    }
    ?>
        <tr id="thrH">
            <th colspan="2">Email Address</th>
            <th colspan="3">Work Experience</th>
        </tr>
        <tr id="infothrH">
            <?php
            $result2 = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result2))
            {
            ?>
            <td colspan="2"><?php echo $row['email_address']; ?></td>
            <td colspan="3"><?php echo $row['work_experience']; ?></td>
        </tr>
    <?php
    }
    ?>
    </table>
</div>
<br>
<?php
//b
$sql2 = "SELECT * FROM jobapplication INNER JOIN joboffer ON jobapplication.job_offer_id = joboffer.id INNER JOIN jobprovider ON joboffer.job_provider_id = jobprovider.id INNER JOIN applicationstatus ON jobapplication.application_status_id = applicationstatus.id WHERE jobapplication.job_seeker_id='$id'";
$result4 = mysqli_query($connection, $sql2);
?>
<div class="JApp">
    <h2>Jop Applications</h2>
    <table>
        <tr id="JAppH">
            <th colspan="2">Job Title</th>
            <th colspan="2">Job Provider</th>
            <th colspan="2">Status</th>
            <!--“under consideration”, “request for interview”, “declined”, or “accepted”.-->
        </tr>
        <tr id="infothrH">
            <?php
            while ($row = mysqli_fetch_assoc($result4))
            {
            ?>
            <td colspan="2"><a href="jobOfferDetails.php?title=<?php echo $row['title']; ?>"><?php echo $row['title']; ?> </a></td>
            <td colspan="2"><?php echo $row['name']; ?></td>
            <td colspan="2"><?php echo $row['status']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
<br>
<?php
//c
//d
$sqlD = "SELECT * FROM jobcategory";  //make sure for all queries
$resultD = mysqli_query($connection, $sqlD);
?>
<div class="AJOff">
    <h2>Available Jop Offers</h2>
    <form action="" method="GET" style="float: right;">
        <label style="color:white; font-size:19px;" for="lang">Jobs Category : </label>
        <select name="JobsCategory" id="lang">
            <option name='Cat' value="-1"> All :</option>
            <?php
            while ($row = mysqli_fetch_array($resultD)) {
                               ?>
                <option name='Cat'
                        value="<?php echo $row['id']; ?>"> <?php echo $row['category']; ?> </option>  <!-- here -->
                <?php
            }
            ?>
        </select>
    </form>
    <table id="tableAvailableJobs">
        <tr id="AJOffH">
            <th>Job Category</th>
            <th>Job Title</th>
            <th>Job Provider</th>
            <th>Salary</th>
        </tr>
    </table>
</div>
</body>
</html>
<script>
$(document).ready(function()
{ 
var userId="<?php echo $id?>";
function getAll(){
  $.ajax
  ({
   url: 'getAvailableJobOffer.php',
   data: 'userId='+userId+'&action='+"all",
   cache: false,
   success: function(r)
   {
    $("#tableAvailableJobs").append(r);
   }
  });   
 }
 getAll();

  $("#lang").change(function(){

  var id = $(this).find(":selected").val();
   $.ajax({

   url: 'getAvailableJobOfferJson.php',
   data: 'userId='+userId+'&action='+id,
   cache: false,
   success: function(response)
   {
    $("#tableAvailableJobs").find("tr:gt(0)").remove();
      var category="";
      console.log(JSON.parse(response));
       $.each(JSON.parse(response), function(key,value) {
       
       console.log(value.title);

       	 if(value.job_category_id==2){
               category="IT";
               } else if(value.job_category_id==3){
               category="IS";
               }else{
                 category="CS";
               }
                  var tr_str = "<tr>" +
                    "<td>" + category + "</td>" +
                    "<td>" + value.title + "</td>" +
                    "<td>" + value.name + "</td>" +
                    "<td>" + value.salary + "</td>" +
                    "<form>"+
                     "<td> <a href='jobOfferDetails.php?title="+value.title+"'>  Details </a></td>" +
                     "<td> <a href='jobseekerApplyButton.php?title="+value.title+"'>  Apply </a></td>" +
                    "</form>"+
                    "</tr>";
                $("#tableAvailableJobs").append(tr_str);
       });
   }
  }); 
 });

});
 </script>