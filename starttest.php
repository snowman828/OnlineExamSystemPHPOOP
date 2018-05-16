<?php include 'inc/header.php'; ?>
<?php 
Session::checkUserSession();
  $userId=Session::get("userId");
?>
<?php 
  $question=$ques->getQuestion();
  $total=$ques->getTotalRows();
?>
<div class="main">
<h1>Welcome to Online Exam - Start Now</h1>
	
	<div class="starttest">
	<h2>Test Your Konowledge</h2>
	<p>This Is multiple Choice Quiz</p>
	<ul>
		<li><strong>Number Of Ques-</strong><?php echo $total;  ?></li>
		<li><strong>Question Type-</strong>Multiple</li>
	</ul>
	<a href="test.php?q=<?php echo $question['quesNo']; ?>">Start Test</a>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>