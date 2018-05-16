<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
    include_once ($filepath.'/../lib/Session.php');
    //Session::init();
?>
<?php 
 class User
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm=new Format();
 	}

 	public function getAlluserData()
 	{
 		$query="SELECT * FROM tbl_user order by userId desc";
 		$result=$this->db->select($query);
 		return $result;
 	}

 	public function delUserdata( $id)
 	{
 		$userId=mysqli_real_escape_string($this->db->link,$id);
 		$query="DELETE FROM tbl_user WHERE userId='$userId'";
 		$result=$this->db->delete($query);
 		if($result)
 		{
 			$msg="<span style='color:red;font-size:25px;'>Deleted SuccessFully</span>";
            return $msg;
 		}
 		else
 		{
 		   $msg="<span style='color:red;font-size:25px;'>Not Deleted</span>";
            return $msg;	
 		}
 	}

 	public function disableUser($id)
 	{
 		$userId=mysqli_real_escape_string($this->db->link,$id);
 		$query="UPDATE tbl_user
 		       SET
 		       status=1
 		       where userId='$userId'";

 		 $result=$this->db->update($query);      
 		
 	}

 	public function enableUser($id)
 	{

 		$userId=mysqli_real_escape_string($this->db->link,$id);
 		$query="UPDATE tbl_user
 		       SET
 		       status=0
 		       where userId='$userId'";

 		 $result=$this->db->update($query);    
 	}

 	public function userRegistreition($userName,$name,$userEmail,$userPass,$ruserPass)
 	{

 	$userName=$this->fm->validation($userName);
    $userName=mysqli_real_escape_string($this->db->link,$userName);
    $name=$this->fm->validation($name);
    $name=mysqli_real_escape_string($this->db->link,$name);
    $userEmail=$this->fm->validation($userEmail);
    $userEmail=mysqli_real_escape_string($this->db->link,$userEmail);
    $userPass=$this->fm->validation($userPass);
    $userPass=mysqli_real_escape_string($this->db->link,$userPass);
    $ruserPass=$this->fm->validation($ruserPass);
    $ruserPass=mysqli_real_escape_string($this->db->link,$ruserPass);

    if($userName=='' or $name=='' or $userEmail=='' or $userPass=='' or $ruserPass=='')
    {
    	echo "<span style='color:red';font-size:25px;>Fielad Must Not Be Empty</span>";
    	exit();
    }
    elseif (filter_var($userEmail,FILTER_VALIDATE_EMAIL)===false) {
    	echo "<span style='color:red';font-size:25px;>Inavlid Email Address</span>";
    	exit();
    }
    else if ($userPass!=$ruserPass) {
        echo "<span style='color:red';font-size:25px;>Password Doesn't Match</span>";
        exit();
    }
   else
    {
    	$checkQuery="SELECT tbl_user.userEmail from tbl_user where userEmail='$userEmail'";
    	$chkresult=$this->db->select($checkQuery);
    	if($chkresult!=false)
    	{
    		echo "<span style='color:red';font-size:25px;>Email Address Exists</span>";
    	     exit();
    	}
    	else
    	{
    		$userPass=md5($userPass);
    		$query="INSERT INTO tbl_user(userName,name,userPass,userEmail)
             Values('$userName','$name','$userPass','$userEmail')";
             $result=$this->db->insert($query);
             if($result){
             echo "<span style='color:red';font-size:25px;>Success You Have Been Registered</span>";
    	     exit();
    	 }else
    	 {
    	 	echo "<span style='color:red';font-size:25px;>Sorry Some Thing Wrong</span>";
    	     exit();
    	 }
    	}
    }



 	}

    public  function userLoginData($userEmail,$userPass)
    {
       $userEmail=$this->fm->validation($userEmail);
       $userEmail=mysqli_real_escape_string($this->db->link,$userEmail);
       $userPass=$this->fm->validation($userPass);
       $userPass=mysqli_real_escape_string($this->db->link,$userPass);

    if($userEmail=='' or $userPass=='')
    {
        echo "empty";
        exit();
    }
    elseif (filter_var($userEmail,FILTER_VALIDATE_EMAIL)===false) {
        echo "Inavlid";
        exit();
    } 
     else
    {
        $userPass=md5($userPass);
        $query="SELECT * from tbl_user where userEmail='$userEmail' and userPass='$userPass'";
        $result=$this->db->select($query);
        if($result!=false)
        {
            $value=$result->fetch_assoc();
            
             if($value['status']==1)
            {
             echo "Disabled";
             exit();  
            }
            else
            {   
                Session::init();
                Session::set("userlogin",true);
                Session::set("userId",$value['userId']);
                Session::set("userName",$value['userName']);
               
            } 
        }
        else
        {
            
            echo "error";
             exit();  
        }
        }
    }

     public function getprofileData($userId)
     {
       
       $userId=$this->fm->validation($userId);
       $userId=mysqli_real_escape_string($this->db->link,$userId);
       $query="SELECT * FROM tbl_user WHERE userId='$userId'";
       $result=$this->db->select($query);
       return $result;
     }

     public function userDataUpdate($userName,$name,$userEmail,$userId)
     {
        $userName=$this->fm->validation($userName);
        $userName=mysqli_real_escape_string($this->db->link,$userName);
        $name=$this->fm->validation($name);
        $name=mysqli_real_escape_string($this->db->link,$name);
        $userEmail=$this->fm->validation($userEmail);
        $userEmail=mysqli_real_escape_string($this->db->link,$userEmail);
        $userId=$this->fm->validation($userId);
        $userId=mysqli_real_escape_string($this->db->link,$userId);;

        if ($userName=='' or $name=='' or $userEmail=='') {
            $msg="<span style='color:red';font-size:25px;>Field Must Not Be Empty</span>";
            return $msg;
        }
        else if (filter_var($userEmail,FILTER_VALIDATE_EMAIL)===false) {
            $msg="<span style='color:red';font-size:25px;>Invalid Email</span>";
            return $msg;
        }
        else
        {
            $query="UPDATE tbl_user
                   SET 
                   userName='$userName',
                   name='$name',
                   userEmail='$userEmail'
                   Where userId='userId'";
        }



     }

    }

 