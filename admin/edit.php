<?php 
    $filepath = realpath(dirname(__FILE__));
	  include_once ($filepath.'/inc/header.php');
	  include_once ($filepath.'/../classes/Question.php');
	 $ques=new Question();
?>
<?php 
    if(!isset($_GET['quesNo']) or $_GET['quesNo']==NULL)
  {
    echo "<script>window.lobrandion='queslist.php'</script>";
  }
  else
  {
    $number=$_GET['quesNo'];
  }
?>

<?php 
 if(($_SERVER['REQUEST_METHOD']=='POST')&&isset($_POST['update']))
  {
  	

  	 $updateques=$ques->updateQuestion($_POST , $number);
  }
 $total=$ques->getTotalRows();
 $next=$total+1;

?>

<div class="main">
<?php
   if (isset($updateques)) {
   	 echo $updateques;
   }
?>
  <div class="adminpanel">
  	<form action="" method="POST">
      
  	 <table class="tblone">
  		
  		<tr>
        <?php
           $getQuesByNumber=$ques->getQuesByNumber($number);
                 if ($getQuesByNumber) {
                  
         ?>
  			<td>Ques</td>
  			<td>:</td>
  			<td><input type="text" value="<?php echo $getQuesByNumber['quesName']; ?>" name="ques" placeholder="Enter Question"></td>
         <?php  } ?>
  		</tr>
      <?php 
        $getallans=$ques->getanswer($number);
                 $i= 0 ;
                 if ($getallans) {
                   while ($value=$getallans->fetch_assoc()) {
                    $i++;
       ?>
  		<tr>
  			<td>Choice <?php echo $i; ?></td>
  			<td>:</td>
  			<td><input type="text" value="<?php echo $value['ansName'] ?>" name="ans<?php echo $i; ?>" placeholder="Enter choice <?php echo $i; ?>"></td>
        
  		</tr>
  		<?php } } ?>
  		<tr>
        <?php
            $getCorrectAnswer=$ques->getCorrectAnswer($number);
                 if ($getCorrectAnswer) {
         ?>
  			<td>Correct Anaswer</td>
  			<td>:</td>
  			<td><input type="text" value="<?php echo $getCorrectAnswer['ansName'] ?>" name="rightAns" placeholder="Enter Correct Ans"></td>
        <?php } ?>
  		</tr>

      
  		<tr>
  			
  			<td colspan="3" align="center"><input type="submit" name="update" value="Update Question"></td>
  		</tr>
   </table>
  	</form>
  </div>


	
</div>
<?php include 'inc/footer.php'; ?>