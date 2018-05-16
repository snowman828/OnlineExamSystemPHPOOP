<?php include 'inc/header.php'; ?>
<?php Session::checkUserSession();
$total=$ques->getTotalRows();

 ?>

<div class="main">
<h1>Questions & Answer of <?php echo $total ?> of <?php echo $total; ?></h1>
	<div class="test">
		
		<table> 
          <?php 
             $getQues=$ques->getQueByorder();
              if ($getQues) {
              	while ($question=$getQues->fetch_assoc()) {
              	
          ?>

			<tr>
				<td colspan="2">
				 <h3>Question <?php echo $question['quesNo']; ?>:<?php echo $question['quesName']  ?></h3>
				</td>
			</tr>
            <?php 
              $number=$question['quesNo'];
               $answer=$ques->getanswer($number);
                if ($answer) {
                	while ($result=$answer->fetch_assoc()) {
                		
            ?>
			<tr>
				<td>
				 <input type="radio"/><?php 
				  if ($result['rightAns']==1) {
				    echo "<span style='color:blue;'>".$result['ansName']."</span>";  
				  }else {

				 echo $result['ansName'] ;
				} ?>
				</td>
			</tr>
		
            <?php  } } ?>   
		
			 <?php  } } ?>  
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>