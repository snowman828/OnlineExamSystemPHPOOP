<?php 
    $filepath = realpath(dirname(__FILE__));
	  include_once ($filepath.'/inc/header.php');
	  include_once ($filepath.'/../classes/Question.php');
	 $ques=new Question();
?>
<?php  
if (isset($_GET['removeid'])) {
     $id=(int)$_GET['removeid'];
     $delques=$ques->delQuestion($id);
      }
?>


<div class="main">
<h1>Admin Panel-Question List</h1>
  <?php 
    if (isset($delques)) {
      echo $delques;
    }

   ?>
  <div class="manageuser">
  	<table class="tblone">
  		<tr>
  			<th width="10%">No</th>
  			<th width="70%%">Question</th>
  			<th width="20%">Action</th>
  		</tr>
      <?php 
        $getquestion=$ques->getallQuestion();
         if($getquestion)
         {
          $i=0;
          while ($result=$getquestion->fetch_assoc()) {
          $i++;

      ?>
  		<tr>
  			
  			<td><?php echo $i; ?></td>
  			<td><?php echo $result['quesName']; ?></td>
  			<td><a onclick="return confirm('Are You Sure');" href="?removeid=<?php echo $result['quesNo']; ?>">Remove</a>--<a href="edit.php?quesNo=<?php echo $result['quesNo']; ?>">Edit</a></td>
  		</tr>
   
         <?php } }else{ ?>
          <tr>
            <td colspan="3"><?php "No Data Avialabale" ?></td>
          </tr>
     <?php } ?>
  	</table>
  </div>


	
</div>
<?php include 'inc/footer.php'; ?>