<?php
if(isset($_GET['call_type']))
{
	$call_type = $_GET['call_type'];

	if($call_type == "editProfile")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Edit Profile',
			'description' => 'Edit user profile',
			'url' => $call_type,
			'data'=>file_get_contents('../gui/editeProfile.php')
		));
	}
	elseif ($call_type == "getUserData") {
		include '../Model/person.php';
		$model = new person();
		$result = $model->getPersonData();
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Edit Profile',
			'description' => 'Edit user profile',
			'url' => $call_type,
			'data'=>$result
		));
	}
	elseif ($call_type == "getMemberPayHistory") {
		include '../Model/Member.php';
		$model = new Member();
		$result = $model->getPayHistory();
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Edit Profile',
			'description' => 'Edit user profile',
			'url' => $call_type,
			'data'=>$result
		));
	}
	elseif ($call_type == "contact") {
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Contact us',
			'description' => 'contact the trainer',
			'url' => $call_type,
			'data'=>file_get_contents('../gui/contact.html')
		));
	}
	elseif ($call_type == "memberCheckedPayed") {
		include "../Model/admin.php";
		$model = new admin();
		$model->selectMemberPayed($_GET['member']);
	}
	elseif ($call_type == "memberNotPayed") {
		include "../Model/admin.php";
		$model = new admin();
		$model->selectMemberNotPayed($_GET['member']);
	}
	elseif ($call_type == "searchOnMembers") {
		$keySearch = $_GET['keySearch'];
		include "../Model/admin.php";
		$model = new admin();
		$result = $model->searchOnMembers($_GET['keySearch']);
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Edite Profile',
			'description' => 'search on all members by search key',
			'url' => $keySearch,
			'data'=> $result
		));
	}
	elseif ($call_type == "goToAllTrainee") {
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Show all trainee',
			'description' => 'Show all trainee who signup at maser academy',
			'url' => 'allTrainee',
			'data'=>file_get_contents('../gui/AllMember.php')
		));
	}
}
