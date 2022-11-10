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

 include_once 'connection.php';
                  if (isset($_GET['update'])){
                    
                       #save to DB
                      $id=$_GET['id'];
                      $cat = $_GET['cat'];
                      
                      
                      $tit=$_GET['title'];
                    
                      $ft=$_GET['qual'];
                      $s=$_GET['salary'];
                      $l=$_GET['location'];
                      $d=$_GET['desc'];
                      $r=$_GET['req'];
           $sql = "UPDATE joboffer SET `job_category_id`='$cat',`title`='$tit',`full_time`='$ft',`salary`='$s',`location`='$l',`description`='$d',`requirements`='$r' WHERE id ='$id'";
           
           $result = mysqli_query($connection, $sql);
             header("Refresh:0; url='JobProviderHomePage.php'");
                  }
           
           ?>
            