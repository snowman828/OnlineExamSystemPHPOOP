<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
 class Question
 {
 	private $db;
 	private $fm;

 	public function __construct()
 	{
 		$this->db=new Database();
 		$this->fm=new Format();
 	}

 	public function getallQuestion()
 	{
 		$query="SELECT * FROM tbl_ques order by quesNo desc";
 		$result=$this->db->select($query);
 		return $result;
 	}

 	public function delQuestion($id)
 	{

 		$quesNo=mysqli_real_escape_string($this->db->link,$id);
 		$query="DELETE tbl_ques, tbl_ans
			FROM tbl_ques
			INNER JOIN tbl_ans ON tbl_ques.quesNo = tbl_ans.quesNo
			WHERE tbl_ques.quesNo='$quesNo';";
 		$result=$this->db->delete($query);
 		if($result)
 		{
 			$msg="<span style='color:red;font-size:25px;'>SuccessFully Deleted</span>";
 			return $msg;
 		}
 		else
 		{
 			$msg="<span style='color:red;font-size:25px;'>Not Deleted</span>";
 			return $msg;
 		}
 	}

 	public function getTotalRows()
 	{
 		$query="SELECT * FROM tbl_ques";
 		$result=$this->db->select($query);
    if ($result) {
      $total=$result->num_rows;
    return $total;
    }
 		
 	}

 	public function addQuestion($data)
 	{

 	  $quesNo=$this->fm->validation($data['quesNo']);
 	  $quesNo=mysqli_real_escape_string($this->db->link,$quesNo);
 	  $ques=$this->fm->validation($data['ques']);
 	  $ques=mysqli_real_escape_string($this->db->link,$ques);
      
        $ans=array();

      $ans[1]=$data['ans1'];
      $ans[2]=$data['ans2'];
      $ans[3]=$data['ans3'];
      $ans[4]=$data['ans4'];
      //$ans[1]=$data['ans1'];
      $rightAns=$data['rightAns'];

      $ans[1]=mysqli_real_escape_string($this->db->link,$ans[1]);
      $ans[2]=mysqli_real_escape_string($this->db->link,$ans[2]);
      $ans[3]=mysqli_real_escape_string($this->db->link,$ans[3]);
      $ans[4]=mysqli_real_escape_string($this->db->link,$ans[4]);

      $rightAns=mysqli_real_escape_string($this->db->link,$rightAns);
      if ($quesNo=='' or $ques=='' or $ans=='' or $rightAns=='') {
      	   
      	   $msg="<span style='color:red;font-size:25px;'>Field Must Not Be Empty </span>";
 			return $msg;
      }

      $query="INSERT INTO tbl_ques(quesNo,quesName)
             Values('$quesNo','$ques')";
       $result=$this->db->insert($query);
       if($result)
       {
       	foreach ($ans as $key => $ansName) {
       		 if ($ansName!='') {
       		 	if ($rightAns==$ansName) {
       		 		$rquery="INSERT INTO tbl_ans(quesNo,rightAns,ansName)
                     Values('$quesNo','1','$ansName')";
       		 	}else
       		 	{
       		 	    $rquery="INSERT INTO tbl_ans(quesNo,rightAns,ansName)
                     Values('$quesNo','0','$ansName')";	
       		 	}
       		 	$insertrow=$this->db->insert($rquery);
       		 	if ($insertrow) {
       		 		continue;
       		 	}
       		 	else
       		 	{
       		 		die('Error....');
       		 	}
       		 }
       	}
         $msg="<span style='color:red;font-size:25px;'>Success </span>";
 			  return $msg;

       }      
 	}

  public function getQuestion()
  {
    $query="SELECT * FROM tbl_ques";
    $getdata=$this->db->select($query);
    $result=$getdata->fetch_assoc();
    return $result;
  }

  public function getQuesByNumber($number)
  {
    $quesNo=$this->fm->validation($number);
    $quesNo=mysqli_real_escape_string($this->db->link,$quesNo);
    $query="SELECT * FROM tbl_ques where quesNo='$quesNo'";
    $getdata=$this->db->select($query);
    if ($getdata) {
      $result=$getdata->fetch_assoc();
      return $result;
    }
    

  }

  public function getanswer($number)
  {
      $quesNo=$this->fm->validation($number);
      $quesNo=mysqli_real_escape_string($this->db->link,$quesNo);

      $query="SELECT * from tbl_ans where quesNo='$quesNo'";
       $getdata=$this->db->select($query);
       return $getdata;

  }
  public function getQueByorder()
  {
    $query="SELECT * FROM tbl_ques order by quesNo asc";
    $result=$this->db->select($query);
    
    return $result;
  }

  public function getCorrectAnswer($number){
     $quesNo=$this->fm->validation($number);
     $quesNo=mysqli_real_escape_string($this->db->link,$quesNo);
     $query="SELECT ansName FROM tbl_ans WHERE quesNo='$number' AND rightAns = 1";
     $result=$this->db->select($query);
     if ($result) {
       $result=$result->fetch_assoc();
       return $result;
     }
     
  }

  public function updateQuestion($data , $number){

    $quesNo=$this->fm->validation($number);
    $quesNo=mysqli_real_escape_string($this->db->link,$number);
    $ques=$this->fm->validation($data['ques']);
    $ques=mysqli_real_escape_string($this->db->link,$ques);
      
        $ans=array();

      $ans[1]=$data['ans1'];
      $ans[2]=$data['ans2'];
      $ans[3]=$data['ans3'];
      $ans[4]=$data['ans4'];
      
      //$ans[1]=$data['ans1'];
      $rightAns=$data['rightAns'];

      $ans[1]=mysqli_real_escape_string($this->db->link,$ans[1]);
      $ans[2]=mysqli_real_escape_string($this->db->link,$ans[2]);
      $ans[3]=mysqli_real_escape_string($this->db->link,$ans[3]);
      $ans[4]=mysqli_real_escape_string($this->db->link,$ans[4]);

      $rightAns=mysqli_real_escape_string($this->db->link,$rightAns);
      if ($quesNo=='' or $ques=='' or $ans=='' or $rightAns=='') {
           
           $msg="<span style='color:red;font-size:25px;'>Field Must Not Be Empty </span>";
      return $msg;
      }

      $query="UPDATE tbl_ques
             SET 
             quesName='$ques'
             WHERE quesNo='$quesNo'";
       $result=$this->db->update($query);
       if($result)
       {
        foreach ($ans as $key => $ansName) {
           if ($ansName!='') {
            if ($rightAns==$ansName) {
              $rquery="UPDATE tbl_ans
                        SET 
                        rightAns='1',
                        ansName='$ansName'
                     WHERE ansName='$ansName'";
            }else
            {
                $rquery="UPDATE tbl_ans
                        SET 
                        rightAns='0',
                        ansName='$ansName'
                     WHERE ansName='$ansName'"; 
            }
            $insertrow=$this->db->update($rquery);
            if ($insertrow) {
              continue;
            }
            else
            {
              die('Error....');
            }
           }
        }
         $msg="<span style='color:red;font-size:25px;'>Success </span>";
        return $msg;

       }
  }


 }