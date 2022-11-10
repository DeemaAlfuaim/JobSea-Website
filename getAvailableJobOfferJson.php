<?php
require 'connection.php'; 
$userId = $_REQUEST['userId'];
$action = $_REQUEST['action'];

?>
            <?php
       $sql3 = "SELECT DISTINCT joboffer.id ,joboffer.title , joboffer.job_category_id , joboffer.salary , jobprovider.name FROM joboffer INNER JOIN jobcategory ON joboffer.job_category_id = jobcategory.id INNER JOIN jobprovider ON joboffer.job_provider_id = jobprovider.id INNER JOIN jobapplication ON jobapplication.job_seeker_id='$userId' WHERE joboffer.id NOT IN (SELECT job_offer_id FROM jobapplication)";
       
        if ($action != "all" && $action != "-1") {
           $cat = $action;
           $sql3 = $sql3 = "SELECT DISTINCT joboffer.id ,joboffer.title , joboffer.job_category_id , joboffer.salary , jobprovider.name FROM joboffer INNER JOIN jobcategory ON joboffer.job_category_id = '$cat' INNER JOIN jobprovider ON joboffer.job_provider_id = jobprovider.id INNER JOIN jobapplication ON jobapplication.job_seeker_id='$userId' WHERE joboffer.id NOT IN (SELECT job_offer_id FROM jobapplication)";
       }
       $result6 = mysqli_query($connection, $sql3);
       $return_arr = array();
         while($row = mysqli_fetch_array($result6))
        {
         $job_category_id = $row["job_category_id"];
         $title = $row["title"];
         $name = $row["name"];
         $salary = $row["salary"];
          $return_arr[] = array(
                    "job_category_id" => $job_category_id,
                    "title" => $title,
                    "name" => $name,
                    "salary" => $salary);
        }
        echo json_encode($return_arr);
        mysqli_close($connection);
        ?>
