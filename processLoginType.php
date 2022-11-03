<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['userType'])) {
		$userType = $_POST['userType'];
	
		if ($userType == "student") {
			include('studentProcessLogin.php');
		} else if ($userType == "maintanenceStaff"){
			include('maintanenceProcessLogin.php');
		}
		else {
			echo "Invalid User Entry";
		}
	}
}
?>