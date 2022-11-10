<?php
require 'connection.php'; 
$userId = $_REQUEST['userId'];
$action = $_REQUEST['action'];

?>
        <tr>
            <?php
            $sql3 = "SELECT DISTINCT joboffer.id ,joboffer.title , joboffer.job_category_id , joboffer.salary , jobprovider.name FROM joboffer INNER JOIN jobcategory ON joboffer.job_category_id = jobcategory.id INNER JOIN jobprovider ON joboffer.job_provider_id = jobprovider.id INNER JOIN jobapplication ON jobapplication.job_seeker_id='$userId' WHERE joboffer.id NOT IN (SELECT job_offer_id FROM jobapplication)";
            
             if ($action != "all" && $action != "-1") {
                $cat = $action;
                $sql3 = $sql3 = "SELECT DISTINCT joboffer.id ,joboffer.title , joboffer.job_category_id , joboffer.salary , jobprovider.name FROM joboffer INNER JOIN jobcategory ON joboffer.job_category_id = '$cat' INNER JOIN jobprovider ON joboffer.job_provider_id = jobprovider.id INNER JOIN jobapplication ON jobapplication.job_seeker_id='$userId' WHERE joboffer.id NOT IN (SELECT job_offer_id FROM jobapplication)";
            }



            $result6 = mysqli_query($connection, $sql3);
            while ($row = mysqli_fetch_assoc($result6))
            {
            ?>
            <td><?php if($row['job_category_id']==2)echo 'IT';
            else if($row['job_category_id']==3)echo 'IS';
            else{ echo 'CS'; }?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <form action='jobseekerApplyButton.php' method='GET'>
                <td><a href=" jobOfferDetails.php?title=<?php echo $row['title']; ?>"> Details </a></td>
                <td name="" value=""><a href="jobseekerApplyButton.php?title=<?php echo $row['title']; ?>">
                        Apply </a></button>  </td>  <!-- here -->
            </form>
        </tr>
        <?php
            }
        ?>
        <?php
        mysqli_close($connection);
        ?>

