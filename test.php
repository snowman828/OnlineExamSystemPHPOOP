<?php include 'inc/header.php'; ?>
<?php Session::checkUserSession(); ?>
<?php 
$total=$ques->getTotalRows();
  if (isset($_GET['q'])) {
   $number=(int)$_GET['q'];
  }else
  {
  	header("Location:exam.php");
  }
  $question=$ques->getQuesByNumber($number);

?>
<?php 
if(($_SERVER['REQUEST_METHOD']=='POST'))
  {
        $process=$pro->processdata($_POST);
  }
?>
<div class="main">
<h1>Question <?php echo $question['quesNo']; ?> of <?php echo $total; ?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Question <?php echo $question['quesNo']; ?>:<?php echo $question['quesName']  ?></h3>
				</td>
			</tr>
            <?php 
               $answer=$ques->getanswer($number);
                if ($answer) {
                	while ($result=$answer->fetch_assoc()) {
                		
            ?>
			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo  $result['ansId'] ?>"/><?php echo $result['ansName'] ?>
				</td>
			</tr>
		
            <?php  } } ?>   
			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $number;  ?>" />
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>