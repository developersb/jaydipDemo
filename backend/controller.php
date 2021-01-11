<?php
require 'modal.php';
//session_start();
//require "modal.php";

$DB = new DB();
/*$DB->connectdb();*/
if(count($_POST)>0)
{
	if(isset($_POST['page']))
	{ 
		$retRows=$DB->selectalldatas();
		echo json_encode($retRows);
	}
}

if(count($_POST)>0)
{
	if(isset($_POST['type']))
	{ 

		if($_POST['type']==1)
		{

			$fname=$_POST['firstname'];
			$lname=$_POST['lastname'];
			$uname=$_POST['username'];
			$bday=$_POST['birthday'];
			$gend=$_POST['gender'][0];
			$eml=$_POST['email'];
			$pass=$_POST['password'];
			$cpass=$_POST['cpassword'];
			$cntr=$_POST['country'];
			$cty=$_POST['city'];

			$insresult=$DB->insertdata($fname,$lname,$uname,$bday,$gend,$eml,$pass,$cpass,$cntr,$cty);

			echo json_encode($insresult);
		}
	}
}

if(count($_POST)>0)
{
	if(isset($_POST['type']))
	{ 

	if($_POST['type']==2)
	{
		$id=$_POST['id'];
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
		$uname=$_POST['username'];
		$bday=$_POST['birthday'];
		$gend=$_POST['gender'][0];
		$eml=$_POST['email'];
		$pass=$_POST['password'];
		$cpass=$_POST['cpassword'];
		$cntr=$_POST['country'];
		$cty=$_POST['city'];

		$updres=$DB->updatedata($id,$fname,$lname,$uname,$bday,$gend,$eml,$pass,$cpass,$cntr,$cty);

		echo json_encode($updres);
	}
	}
}

if(count($_POST)>0)
{
	if(isset($_POST['type']))
	{ 

		if($_POST['type']==3)
		{

			$id=$_POST['id'];
			$DB->deletedata($id);
		}
	}
}

if(count($_POST)>0)
{
	if(isset($_POST['type']))
	{ 

			if($_POST['type']==4)
			{
				$username=$_POST['username'];
				$pass=$_POST['password'];
				$retRow=$DB->userLogin($username,$pass);
				echo json_encode($retRow);
			}
	}
}


if(count($_POST)>0)
{
	if(isset($_POST['type']))
	{ 

		if($_POST['type']==5)
		{
			unset($_SESSION['myuser']);  
			session_destroy();
			//setcookie(session_name(), session_id(), 1); // to expire the session
			$_SESSION = [];
		}
	}
}


?>