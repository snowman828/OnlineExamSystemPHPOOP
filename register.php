<?php include 'inc/header.php'; ?>

<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="userName" id="userName"></td>
          
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="name" type="text" id="name"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="userPass" id="userPass"></td>
           
         </tr>
          <tr>
           <td>ReType Password</td>
           <td><input type="password" name="ruserPass" id="ruserPass"></td>
           
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input  type="text" name="userEmail" id="userEmail" ></td>
            
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" name="submit" value="Signup" id="submit">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
     <span id="state"></span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>