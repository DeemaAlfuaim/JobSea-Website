<!DOCTYPE html>
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

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Edit job Offer</title>
    <link rel="stylesheet" href="style.css">
    <script src="java.js" defer></script>
</head>
<body>
   <?php 
   
     require 'connection.php';
     if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET["id"])){
         
        
         
         
   $id = $_GET['id'];
   $idd=$id;
 $qurey="SELECT * FROM joboffer WHERE id = '$id' ";
 $result = mysqli_query($connection, $qurey) ;
 $row= mysqli_fetch_assoc($result); 
  
 $cc= $row['job_category_id'];
 $qurey="SELECT * FROM jobcategory WHERE id = '$cc' ";
 $result = mysqli_query($connection, $qurey);
  $ccc= mysqli_fetch_assoc($result); 
 }
   ?>
    <div class=" fadeInDown logo">
        <img class="logo" src="images/logo.PNG" alt="logo">
    </div>

    <div class="wrapper fadeInDown ">
        <div class="formContent">
            <!-- Tabs Titles -->
            <h2 class="h2 active"> job offer Details </h2>


            <!-- Login Form -->
                 <?php
                   
                  ?>
            <form action="jobedit.php" Method="GET">
                
                <input name = 'id' type="hidden" value="<?php echo $id; ?>">
                <input type="text" id="title" class="fadeIn third" name="title" placeholder="" value="<?php echo $row['title'];?>">

                <input type="text" id="salary" class="fadeIn third" name="salary" placeholder="" value="<?php echo $row['salary'] ?>">

                <input type="text" id="location" class="fadeIn third" name="location" placeholder="" value="<?php echo $row['location'];?>">
                    

                <h4 class="fadeIn third lang">Category :  </h4>
                
                <select class="fadeIn third" id="cat" name="cat" value="<?php echo $ccc['category'];?>">
                    <option value="2">CS</option>
                    <option value="-1">Choose :</option>
                    <option value="2">IT</option>
                    <option value="3">IS</option>
                 

                </select>
                <br />

                <h4 class="fadeIn third lang">Work Time :  </h4>
                <select class="fadeIn third" id="fullorpart" name="qual" value="<?php echo $row['full_time'];?>">
                    <option value="full time">Full-Time</option>
                    <option value="-1">Choose :</option>
                    <option value="part time">Part-Time</option>

                </select>
          
                
                 <br />
                <h4 class="fadeIn third lang">Description : </h4>
                <textarea class="fadeIn third" name="desc" rows="7" cols="40" required><?php echo $row['description'];?></textarea>
                <h4 class="fadeIn third lang">requirements : </h4>
                <textarea class="fadeIn third" name="req" rows="7" cols="40" required><?php echo $row['requirements'];?></textarea>
               
               


                 <br />
                <input type="submit" class="fadeIn fourth" value="submit" name="update">
            

            </form>
            
           

       
        </div>
    </div>
</body>
</html>