<?php
require 'connection.php'; 
$id = $_REQUEST['userId'];
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <table class="fadeIn fourth">
    <tr>
        <th id="jt" >
            Job Title
        </th>
    </tr>
    <tr>
    <?php 
    $sql5="SELECT * FROM joboffer WHERE job_provider_id='$id' ";
    $result5 = mysqli_query($connection, $sql5);
    while (    $row5=mysqli_fetch_assoc($result5)){
    ?>
    <tr>
    <td><a href="jobOfferDetails.php?title=<?php echo $row5['title']; ?>"><?php echo $row5['title']; ?></a></td>
      
    <form action="jobedite.php" method="GET">
       <input type="hidden" name="id" value="<?php echo $row5['id']?>"> 
        <td> <a href="jobedite.php?id=<?php echo $row5['id']?>"><button class="buttonS" name="id" value="<?php echo $row5['id']?>">edit</button></td></a>
       </form>
    
    
    <div>
        <input type="hidden" name="id" value="<?php echo $row5['id']?>">
        <td><button   class="buttonSD btnDelete" name="id" value="<?php echo $row5['id']?>">delete</button></td>
   </div>
</tr>
   <?php  
    ?>
<?php } ?>
</tr>
</table>


<script>
 $(".btnDelete").click(function(){
 var id=$(this).val();

   $.ajax
  ({
   url: 'delete.php',
   data: 'id='+id,
   cache: false,
   success: function(r)
   {
     getAllOfferdJobs();;
   }
  })
  }); 
  var userId="<?php echo $id?>";
 function getAllOfferdJobs(){
  $.ajax
  ({
   url: 'getAllOfferdJobs.php',
   data: 'userId='+userId,
   cache: false,
   success: function(r)
   {
   alert("Deleted Succesfully!!");
    $("#displayOfferdJobs").html(r);
   }
  });   
 }
</script>