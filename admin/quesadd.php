<?php 
    $filepath = realpath(dirname(__FILE__));
	  include_once ($filepath.'/inc/header.php');
	  include_once ($filepath.'/../classes/Question.php');
	 $ques=new Question();
?>
<?php
  // Session::checkLogin();
?>
<?php 
 if(($_SERVER['REQUEST_METHOD']=='POST')&&isset($_POST['submit']))
  {
  	

  	 $addques=$ques->addQuestion($_POST);
  }
 $total=$ques->getTotalRows();
 $next=$total+1;

?>

<div class="main">
<?php
   if (isset($addques)) {
   	 echo $addques;
   }
?>
  <div class="adminpanel">
  	<form action="" method="POST">
  	 <table class="tblone">
  		<tr>
  			<td>Ques NO</td>
  			<td>:</td>
  			<td>
            <?php if(isset($next)){ ?>
  			<input type="number" name="quesNo" value="<?php echo $next; ?>"></td>
  			<?php } ?>
  		</tr>
  		<tr>
  			<td>Ques</td>
  			<td>:</td>
  			<td><input type="text" name="ques" placeholder="Enter Question"></td>
  		</tr>
  		<tr>
  			<td>Choice 1</td>
  			<td>:</td>
  			<td><input type="text" name="ans1" placeholder="Enter choice 1"></td>
  		</tr>
  		<tr>
  			<td>Choice 2</td>
  			<td>:</td>
  			<td><input type="text" name="ans2" placeholder="Enter choice 2"></td>
  		</tr>
  		<tr>
  			<td>Choice 3</td>
  			<td>:</td>
  			<td><input type="text" name="ans3" placeholder="Enter choice 3"></td>
  		</tr>
  		<tr>
  			<td>Choice 4</td>
  			<td>:</td>
  			<td><input type="text" name="ans4" placeholder="Enter choice 4"></td>
  		</tr>
  		<tr>
  			<td>Correct Anaswer</td>
  			<td>:</td>
  			<td><input type="text" name="rightAns" placeholder="Enter Correct Ans"></td>
  		</tr>
  		<tr>
  			
  			<td colspan="3" align="center"><input type="submit" name="submit" value="Add Question"></td>
  		</tr>
   </table>
  	</form>
  </div>


	
</div>
<?php include 'inc/footer.php'; ?>