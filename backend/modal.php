<?php
session_start();
require 'Database.php';

/*$_SESSION['username']="";*/
/*error_reporting(0);*/

class DB 
{

  private $mydbs=null;

/*  function connectdb(){
   $mydbs = new Database('studentdatab','root','','localhost');
   return  $mydbs;
  }*/
  function __construct() 
  {
    try 
    {
     $this->mydbs=new Database('studentdatab','root','','localhost');
    }
    catch (Exception $ex)
     { die($ex->getMessage()); }
  }

/*  public function getConnection()
  {
    return $this->mydbs;
  }*/

  public function insertdata($fname,$lname,$uname,$bday,$gend,$eml,$pass,$cpass,$cntr,$cty)
  {
    $recordarray = array('firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
    $this->mydbs->insert('regtab',$recordarray);
    
    $insid=$this->mydbs->id();

  $result=array('id'=>$insid,'firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
  
    return $result;
    /*return json_encode($result);*/
  }


  public function updatedata($id,$fname,$lname,$uname,$bday,$gend,$eml,$pass,$cpass,$cntr,$cty)
  {

          $recordarray = array('firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
 
          $updid = array('id' =>$id);
           $this->mydbs->update('regtab', $recordarray, $where = $updid, $limit = false, $order = false);

          $result=array('id'=>$id,'firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
          
          return $result;
          /*echo json_encode($result);*/

  }


  public function deletedata($id)
  {
   
       $delarray = array('id' =>$id);
       $this->mydbs->delete('regtab', $where = $delarray, $where_mode = false, $limit = false, $order = false);
   
  }

      public function userLogin($uname, $pwd)
      {

          $this->mydbs->query("SELECT * FROM regtab WHERE username = '" . $uname. "' and password = '" . $pwd . "'");
          
          if($this->mydbs->count()>0)
          {
              // success
              //@session_start();
              //$row = $result->fetch_assoc();
              $row =$this->mydbs->result_array();
             // print_r($row);
              $_SESSION['myuser'] = $row[0]['username'];


              $this->mydbs->select('regtab', $where = array(), $limit = false, $order = false, $where_mode = false, $select_fields = '*');
               $rows = $this->mydbs->result_array(); 
               return $rows;
              //return $row[0];
              //return true;
          }
          else
          {
              $inv="InvalidUser";
              $invarr=array('invl' => $inv);
              return $invarr;
          }

      }

      public function selectalldatas()
      {
        //echo "new reg";
         $this->mydbs->select('regtab', $where = array(), $limit = false, $order = false, $where_mode = false, $select_fields = '*');

         $totalrows = $this->mydbs->result_array(); 
         //echo "string reg";
        // exit();
         return $totalrows;
      }
}

?>