<?php

ini_set('memory_limit','256M');

require 'vendor/autoload.php';
require 'config.php';
require 'Database.php';

//date_default_timezone_set('Asia/Kolkata');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;

function connectdb(){
	$db = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST); 
	return  $db;
}

$app = new \Slim\App();

$container = $app->getContainer();
$container['upload_directory'] = __DIR__ . '/uploads';


$app->post('/insertdata', function (Request $request, Response $response, array $args) {
	
	$tname=$_POST['taskname'];
	$stdate=$_POST['startdate'];
	$duedate=$_POST['duedate'];
	$prio=$_POST['priority'];
	$assign=implode(',', $_POST['assignppl']);
	$status=$_POST['statussel'];

	$myconn=connectdb();

	$recordarray = array('taskname' =>$tname,'startdate'=>$stdate,'duedate' =>$duedate,'priority' =>$prio,'asignpeople' =>$assign,'status' =>$status);
	
	$myconn->insert('todotbl',$recordarray);

});


$app->post('/selectalldata', function (Request $request, Response $response, array $args) {
	
	$myconn=connectdb();

	$limit = 5;  
	if (isset($_POST["page"]))
	{ $page  = $_POST["page"]; } 	
	else
	{ $page=1; };  
	
	$start_from = ($page-1) * $limit;  

	$sql = "SELECT * FROM todotbl ORDER BY ID DESC LIMIT $start_from, $limit";  
	$myconn->query($sql);
	//$myconn->select('todotbl', $where = array(), $limit = false, $order = false, $where_mode = false, $select_fields = '*');
	$rows = $myconn->result_array();

	//print_r($row);	

	/*$totalrec=$myconn->num($table, $where = array(), $limit = false, $order = false, $where_mode = false);*/
	return json_encode($rows);
				            					
}); /*end select all post*/


$app->post('/pagination', function (Request $request, Response $response, array $args) {
	
	$myconn=connectdb();

	$limit = 5;  
	
	$sql = "SELECT * FROM todotbl";  
	$rs_result = $myconn->query($sql);
	$row = $myconn->result_array();

	$total_records = $myconn->count();  
	$total_pages = ceil($total_records / $limit); 
/*
	print_r($total_records);
	print_r($total_pages);*/
	$recordarray = array('totalpage' =>$total_pages);
	return json_encode($recordarray);
				            					
}); 


$app->post('/deletedata', function (Request $request, Response $response, array $args) {
	
	$myconn=connectdb();

	$id=$_POST['id'];
	$delarray = array('id' =>$id);
	$myconn->delete('todotbl', $where = $delarray, $where_mode = false, $limit = false, $order = false); 
				            					
}); 

$app->post('/updatedata', function (Request $request, Response $response, array $args) {
	
		$myconn=connectdb();

		$id=$_POST['id'];
		$updid = array('id' =>$id);

		$tname=$_POST['taskname'];
		$stdate=$_POST['startdate'];
		$duedate=$_POST['duedate'];
		$prio=$_POST['priority'];
		$assign=implode(', ', $_POST['assignppl']);
		$status=$_POST['statussel'];

					/*var str = response[i]['taskname'];
					var replaced = str.split(' ').join('_');
*/
		$recordarray = array('taskname' =>$tname,'startdate'=>$stdate,'duedate' =>$duedate,'priority' =>$prio,'asignpeople' =>$assign,'status' =>$status);

    $myconn->update('todotbl', $recordarray, $where = $updid, $limit = false, $order = false);
 	
 		 $result=array('id' =>$id,'taskname' =>$tname,'startdate'=>$stdate,'duedate' =>$duedate,'priority' =>$prio,'asignpeople' =>$assign,'status' =>$status);
 		
 		return json_encode($result);
				            					
}); 

$app->post('/deletemultiple', function (Request $request, Response $response, array $args) {
	
		$myconn=connectdb();
		$id=$_POST['id'];
		//print_r($id);
		//$delarray = array('id' =>$id);
		//print_r($delarray);
	//$myconn->delete('todotbl', $where = $delarray, $where_mode = "IN", $limit = false, $order = false);
		$qr="DELETE FROM todotbl where id in ($id)";
		$myconn->query($qr);			            					
}); 

$app->post('/fetchalldata', function (Request $request, Response $response, array $args) 
{
	
	$myconn=connectdb();

	$limit = '5';
	$page = 1;

	if($_POST['page'] > 1)
		{
			$start = (($_POST['page'] - 1) * $limit);
			$page = $_POST['page'];
		}
		else
		{
			$start = 0;
		}

		$query = "SELECT * FROM todotbl";

		if($_POST['query'] != '')
		{
			$query .= ' WHERE taskname LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
					OR startdate LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
					OR duedate LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
					OR priority LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
					OR asignpeople LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
					OR status LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ';
		}

		$query .= ' ORDER BY id DESC ';

		$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

		/*$statement = $connect->prepare($query);
		$statement->execute();*/
		$myconn->query($query);
		$total_data =$myconn->count();
		/*$total_data = $statement->rowCount();*/

		/*$statement = $connect->prepare($filter_query);
		$statement->execute();*/
		$myconn->query($filter_query);
		$row = $myconn->result_array();

		$total_filter_data = $myconn->count(); 
		///$result = $statement->fetchAll();
		//$total_filter_data = $statement->rowCount();

		$output="";
		$output = '<label>Total Records - '.$total_data.'</label><br>
		            	                    <table class="table table-striped table-hover">
		            	                    <thead class="info">
		            	                    <tr>
		            	                    <td><input type="checkbox" id="select_all"></td>
		            							<th>ID</th>
		            	                        <th>TaskName</th>
		            	                        <th>Start Date</th>
		            							<th>Due Date</th>
		            	                        <th>Priority</th>
		            	                        <th>Assign-People</th>
		            	                        <th>Status</th>
		            	                        <th>Edit</th>
		            	                        <th>Delete</th>
		            	                    </tr></thead>';



		if($total_data > 0)
		{
			$ind=0;
			/*foreach($result as $row)*/
			while($ind<$total_filter_data)
			{
				$output .= '<tr><td> <input type="checkbox" class="emp_checkbox" data-id='.$row[$ind]["id"].'></td> <td>'.$row[$ind]["id"].'</td><td>'.$row[$ind]["taskname"].'</td><td>'.$row[$ind]["startdate"].'</td><td>'.$row[$ind]["duedate"].'</td><td>'.$row[$ind]["priority"].'</td> <td>'.$row[$ind]["asignpeople"].'</td><td>'.$row[$ind]["status"].'</td><td><a href="#addTask" class="edit" data-toggle="modal"><i class="material-icons update" data-toggle="tooltip" data-id='.$row[$ind]["id"].' data-tname='.$row[$ind]["taskname"].' data-sdate='.$row[$ind]["startdate"].' data-duedate='.$row[$ind]["duedate"].' data-prt='.$row[$ind]["priority"].' data-asgnpl='.$row[$ind]["asignpeople"].' data-sts='.$row[$ind]["status"].' title="Edit"></i></a></td> <td><a href="#deleteEmployeeModal" class="delete" data-id='.$row[$ind]["id"].' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a></td></tr>';
				$ind++;
			}
		}
		else
		{
			$output .= '<tr><td colspan="2" align="center">No Data Found</td></tr>';
		}

		$output .= '</table><br/><div align="center"><ul class="pagination">';

		$total_links = ceil($total_data/$limit);
		$previous_link = '';
		$next_link = '';
		$page_link = '';

		//echo $total_links;
		$page_array[]="";

		if($total_links > 4)
		{
			if($page < 5)
			{
				for($count = 1; $count <= 5; $count++)
				{
					$page_array[] = $count;
				}
				$page_array[] = '...';
				$page_array[] = $total_links;
			}
			else
			{
				$end_limit = $total_links - 5;
				if($page > $end_limit)
				{
					$page_array[] = 1;
					$page_array[] = '...';
					for($count = $end_limit; $count <= $total_links; $count++)
					{
						$page_array[] = $count;
					}
				}
				else
				{
					$page_array[] = 1;
					$page_array[] = '...';
					for($count = $page - 1; $count <= $page + 1; $count++)
					{
						$page_array[] = $count;
					}
					$page_array[] = '...';
					$page_array[] = $total_links;
				}
			}
		}
		else
		{
			for($count = 1; $count <= $total_links; $count++)
			{
				$page_array[] = $count;
			}
		}

		for($count = 0; $count < count($page_array); $count++)
		{
			if($page == $page_array[$count])
			{
				$page_link .= '
				<li class="page-item active"> <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a></li>';

				$previous_id = $page_array[$count] - 1;
				if($previous_id > 0)
				{
					$previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
				}
				else
				{
					$previous_link = '
					<li class="page-item disabled">
					<a class="page-link" href="#">Previous</a></li>	';
				}
				$next_id = $page_array[$count] + 1;
				if($next_id >= $total_links)
				{
					$next_link = '
					<li class="page-item disabled">
					<a class="page-link" href="#">Next</a>	</li>';
				}
				else
				{
					$next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
				}
			}
			else
			{
				if($page_array[$count] == '...')
				{
					$page_link .= '
					<li class="page-item disabled">
					<a class="page-link" href="#">...</a>
					</li>
					';
				}
				else
				{
					$page_link .= '	<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>';
				}
			}
		}

		$output .= $previous_link . $page_link . $next_link;
		$output .= '</ul></div>';
		
	/*$myarry=array('output'=>$output);*/
		$myarry=array('output'=>$output);

		return json_encode($myarry);
				            					
}); 


$app->run();

