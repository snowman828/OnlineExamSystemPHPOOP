<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	 $usr=new User();
?>
 <?php  
if (isset($_GET['dis'])) {
     $id=(int)$_GET['dis'];
     $dissuser=$usr->disableUser($id);
      }
?>
<?php  
if (isset($_GET['enable'])) {
     $id=(int)$_GET['enable'];
     $enable=$usr->enableUser($id);
      }
?>
<?php  
if (isset($_GET['del'])) {
     $id=(int)$_GET['del'];
     $deldata=$usr->delUserdata($id);
      }
?>

<div class="main">
<h1>Admin Panel</h1>
  <?php 
    if (isset($deldata)) {
    	echo $deldata;
    }


  ?>
  <div class="manageuser">
  	<table class="tblone">
  		<tr>
  			<th width="10%">No</th>
  			<th width="25%">Name</th>
  			<th width="20%">User Name</th>
  			<th width="20%">Email</th>
  			<th width="25%">Action</th>
  		</tr>
  		<?php 
          
           $getData=$usr->getAlluserData();
           if($getData)
           {
           	$i=0;
           	while ($result=$getData->fetch_assoc()) {
           	$i++;	
           	
           

  		?>
  		<tr>
  			<td>
  			
  			<?php 
  			if ($result['status']==1)
  			{
  			echo "<span style='color:red'>$i</span>";
  		    }else
  		    {
              echo $i;
  			
  		    }
  		    ?>
  				
  			</td>
  			<td><?php echo $result['name']; ?></td>
  			<td><?php echo $result['userName']; ?></td>
  			<td><?php echo $result['userEmail']; ?></td>
  			
  			<td>
           <?php if ($result['status']==0) {?>
           	 <a onclick="return confirm('Are You Sure');" href="?dis=<?php echo $result['userId'];  ?>">Disable</a>
           <?php   } else { ?>
            <a onclick="return confirm('Are You Sure');" href="?enable=<?php echo $result['userId'];  ?>">Enable</a>
            <?php } ?>

  			--<a onclick="return confirm('Are You Sure');" href="?del=<?php echo $result['userId'];  ?>">Remove</a>
           
            
  			</td>
  		</tr>
      <?php } }else { ?>
        <tr>
        	<td colspan="5"><?php echo "No Data Found"; ?></td>
        </tr>
      <?php	} ?>
  	</table>
  </div>


	
</div>
<?php include 'inc/footer.php'; ?>