<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
 class Process
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm=new Format();
 	}

   public function processdata($data)
   {
   	$selectedans=$this->fm->validation($data['ans']);
    $selectedans=mysqli_real_escape_string($this->db->link,$selectedans);
    $number=$this->fm->validation($data['number']);
    $number=mysqli_real_escape_string($this->db->link,$number);
    $next=$number+1;

    if (!isset($_SESSION['scor'])) {
    	  $_SESSION['scor']=0;
    }
    $total=$this->getTotal();
    $right=$this->rightAns($number);
    if($right==$selectedans)
    {
    	$_SESSION['scor']++;
    }
    if ($number==$total) {
    	header("Location:final.php");
    }
    else
    {
       header("Location:test.php?q=".$next);	
    }
   }

   private function getTotal()
   {
   	    $query="SELECT * FROM tbl_ques";
 		$result=$this->db->select($query);
 		$total=$result->num_rows;
 		return $total;
   }

   private function rightAns($number)
   {
   	$query="SELECT * FROM tbl_ans WHERE quesNo='$number' AND rightAns='1'";
    $getdata=$this->db->select($query)->fetch_assoc();
    $result=$getdata['ansId'];
    return $result;
   }

}