<?php
require 'connection.php'; 
$id = $_REQUEST['userId'];

?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<table class="fadeIn fourth" >
    <tr class="UDStat">
        <th>Job Title</th>
        <th>Applicants</th>
        <th>Status</th>
        <th>Update Status</th>
    </tr>
    <tr class="UDStat">
        
        <?php 
       $sql2 =  "SELECT joboffer.title, joboffer.id , jobseeker.first_name ,jobseeker.last_name,applicationstatus.status FROM jobseeker INNER JOIN jobapplication  ON jobapplication.job_seeker_id =jobseeker.id INNER JOIN joboffer ON jobapplication.job_offer_id=joboffer.id INNER JOIN applicationstatus ON jobapplication.application_status_id=applicationstatus.id  WHERE joboffer.job_provider_id='$id' " ;
       $result2 = mysqli_query($connection,$sql2);
        while($row2=mysqli_fetch_assoc($result2)){
     ?>
         <td><a href="jobOfferDetails.php?title=<?php echo $row2["title"]; ?>"> <?php echo $row2["title"]; ?></a></td>
         
         <td><a href="seekinfo.php?id=<?php echo $row2["id"]; ?>"><?php echo $row2["first_name"]." ".$row2["last_name"] ; ?></a></td>
        
        <td> <?php echo $row2["status"]; ?></td>
        <td>  
        <div>
                <select class="fadeIn third" id="status" name="status" required>
                    <option value="-1">Choose :</option>
                    <option value="4">accepted</option>
                    <option value="3">declined</option>
                    <option value="1">under consideration</option>
                    <option value="2">request for interview</option>
                </select>
           
               <a> <button class="buttonS btnUpdateStatus" value="<?php echo $row2["id"]; ?>" name="insert">Update Status</button></a>
                </div>
        </td>
        <?php } ?>
        <div>
      <?php 
          ?>
                   <?php 
     ?>
          </div></td>
    </tr>
       
</table>
<script>
 $(".btnUpdateStatus").click(function(){

 var id=$(this).val();
 var statusId = $("#status").find(":selected").val();
 if(statusId==="-1"){
      alert("select proper status");
      return;
 }

   $.ajax
  ({
   url: 'UpdateStatus.php',
   data: 'id='+id+'&status='+statusId,
   cache: false,
   success: function(r)
   {
     getAllReceivedApplications();;
   }
  })
   
  }); 
  var userId="<?php echo $id?>";
function getAllReceivedApplications(){
  $.ajax
  ({
   url: 'getAllReceivedApplications.php',
   data: 'userId='+userId,
   cache: false,
   success: function(r)
   {
   alert("Status Udpdated")
    $("#displayReceivedApplications").html(r);
   }
  });   
 }
</script>