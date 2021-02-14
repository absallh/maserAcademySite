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
	elseif ($call_type == "searchOnMembers") {
		//get url
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$keySearch = $_GET['keySearch'];
		include "../Model/admin.php";
		$model = new admin();
		$db = new database();
		$result = $model->searchOnMembers($_GET['keySearch']);
		if ($result != -1) {
			foreach ($result as $member) {
				$member['payed'] = $db->isPayed($member['mail']);
				$member['t_shirt'] = $db->getTshirtNumber($member['mail']);
				if ($member['t_shirt'] == -1) {
					$member['t_shirt'] = 'None';
				}
			}
		}
		echo json_encode(array(
			'status'=>'success',
			'title'=>'Edite Profile',
			'description' => $result,
			'url' => $keySearch,
			'data'=> $result
		));
	}
}
