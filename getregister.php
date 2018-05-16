<?php 
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/User.php');
	$usr= new User();
    if(($_SERVER['REQUEST_METHOD']=='POST'))
  {
  	 $userName=$_POST['userName'];
     $name=$_POST['name'];
     $userEmail=$_POST['userEmail'];
     $userPass=$_POST['userPass'];
     $ruserPass=$_POST['ruserPass'];
  	 $userRigi=$usr->userRegistreition($userName,$name,$userEmail,$userPass,$ruserPass);
  }





?>