<?php 
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/User.php');
	$usr= new User();
    if(($_SERVER['REQUEST_METHOD']=='POST'))
  {
  	 $userEmail=$_POST['userEmail'];
     $userPass=$_POST['userPass'];
     
  	 $userLogin=$usr->userLoginData($userEmail,$userPass);
  }





?>