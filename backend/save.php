 <?php
include 'Database.php';


function connectdb(){
   $db = new Database('studentdatab','root','','localhost');
   return  $db;
}

$retn=connectdb();


if(count($_POST)>0){
	if($_POST['type']==1){

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

			$recordarray = array('firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
			$retn->insert('regtab',$recordarray);
			
			$insid=$retn->id();
			$result=array('id'=>$insid,'firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
	
			echo json_encode($result);


	}
}

if(count($_POST)>0){
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

		$recordarray = array('firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
		/*$retn->insert('regtab',$recordarray);*/
		
	
		/*echo "ID is".$id*/;
		$updid = array('id' =>$id);
		$retn->update('regtab', $recordarray, $where = $updid, $limit = false, $order = false);

		$result=array('id'=>$id,'firstname' =>$fname,'lastname' =>$lname,'username' =>$uname,'birthdate' =>$bday,'gender' =>$gend,'email' =>$eml,'password' =>$pass,'confirmpass' =>$cpass,'country' =>$cntr,'city' =>$cty);
	
		echo json_encode($result);

		
	}
}

if(count($_POST)>0){
	if($_POST['type']==3){

		$id=$_POST['id'];
		$delarray = array('id' =>$id);
		$retn->delete('regtab', $where = $delarray, $where_mode = false, $limit = false, $order = false);

	}
}

/*if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM crud WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}*/

?>