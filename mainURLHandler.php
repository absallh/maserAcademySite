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
			'url' => ''.$call_type.'',
			'data'=>file_get_contents('../gui/editProfile.php')
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
}
