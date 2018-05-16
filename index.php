<?php include 'inc/header.php'; ?>
<?php Session::checkUserLogin(); ?>
<div class="main">
<h1>Online Exam System - User Login</h1>

	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="userEmail" id="userEmail" type="text"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="userPass" id="userPass" type="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login" id="login" value="Login">
			   </td>
			 </tr>
			 <tr>
			  <td colspan="2" id="empty"   style="display: none;color: red;font-size: 25px;">Field Must Not Be Empty</td>
			  <td colspan="2" id="inavalid"  style="display: none;color: red;font-size: 25px;">Inavalid Email Address</td>
			  <td colspan="2" id="notexixts" style="display: none;color: red;font-size: 25px;">Email Doesn't Exists</td>
			  <td colspan="2" id="disable"   style="display: none;color: red;font-size: 25px;">Sorry User Id Disabled</td> 
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>