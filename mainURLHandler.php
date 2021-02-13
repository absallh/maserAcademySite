<?php
if(isset($_GET['call_type']))
{
	$call_type = $_GET['call_type'];

	if($call_type == "profile")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Edit Profile',
			'description' => 'Edit user profile',
			'url' => $call_type,
			'data'=>file_get_contents('../gui/editProfile.html')
		));
	}
	elseif ($call_type == "contact") {
		echo json_encode(array(
			'status'=>'success',
			'title'=>'contact',
			'description' => 'contact the trainer',
			'url' => $call_type,
			'data'=>file_get_contents('../gui/contact.html')
		));
	}
	elseif ($call_type == "editProfile") {
		include "../Model/person.php";
		$model = new person();
		$validate = $model->validatePassword($_SESSION['email'] ,$_GET['password']);

		echo json_encode(array(
			'status'=>'success',
			'title'=>'Edite Profile',
			'description' => 'Edit user profile',
			'url' => $call_type,
			'data'=>$validate
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
}
