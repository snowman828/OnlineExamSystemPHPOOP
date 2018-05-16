<?php include 'inc/header.php'; ?>
<?php 
Session::checkUserSession();
  $userId=Session::get("userId");
?>
<div class="main">
   <h1>Final Page</h1>
	<p>Congratss You Have Finished Your Exam</p>
	 <p>Final Score : 
      <?php 
        if (isset($_SESSION['scor'])) {
        	echo $_SESSION['scor'];
        	unset($_SESSION['scor']);
        }

      ?>
	 </p>
	<h2>Start Test</h2>
	<ul>
		<li><a href="viewans.php">View Ans</a></li>
		<li><a href="starttest.php">Start Again</a></li>
	</ul>
	</div>
	
  
<?php include 'inc/footer.php'; ?>