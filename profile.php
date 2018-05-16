<style type="text/css">
  .segment {
  border: 1px solid #d3d3d3 !important;
  border-radius: 4px !important;
  float: left !important;
  min-height: 225px !important;
  padding: 20px !important;
  width: 785px !important;
}
</style>
<?php include 'inc/header.php'; ?>
<?php 
  Session::checkUserSession();
  $userId=Session::get("userId");
 ?>
<?php 
 
?>
<div class="main">
<h1>Online Exam System - User Profile</h1>
  

  <form action="" method="post">
    <table>
     <?php 
     $getprofile=$usr->getprofileData($userId);
     if($getprofile)
     {
      while ($value=$getprofile->fetch_assoc()) {
    

     ?>
    <tr>
           <td>Name</td>
           <td><input type="text" name="userName" id="userName" value="<?php echo $value['userName'];   ?>"></td>
          
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
           <td><input type="submit" name="update" value="Update" id="update">
           </td>
         </tr>

         <?php  } } ?>
       </table>
     </form>
  
  </div>


  



	

<?php include 'inc/footer.php'; ?>