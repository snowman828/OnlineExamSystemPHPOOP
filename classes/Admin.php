<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
 class Admin
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm=new Format();
 	}

 	public function adminLogin($data)
 	{
 	   $adminUser=$this->fm->validation($data['adminUser']);
      $adminPass=$this->fm->validation($data['adminPass']);	
      $adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
      $adminPass=mysqli_real_escape_string($this->db->link,$adminPass);
      if($adminUser=='' or $adminPass=='')
      {
          $loginmsg="<span style='color:red;font-size:25px;'>field Must Not Be Empty</span>";
            return $loginmsg;
      }
      elseif($adminUser!='' and $adminPass!=''){
      	$adminPass=md5($adminPass);
      	$query="SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
      	$result=$this->db->select($query);
      	if($result!=false)
   	{
   		$value=$result->fetch_assoc();
   		Session::init();
   		Session::set("login",true);
   		Session::set("adminId",$value['adminId']);
   		Session::set("adminUser",$value['adminUser']);
   		header('Location:index.php');
   	}else
   	{
   		   $loginmsg="<span style='color:red;font-size:25px;'>UserName Or Password Not Match</span>";
   	      return $loginmsg;
   	}
      }
   }
     
 	}
 




?>