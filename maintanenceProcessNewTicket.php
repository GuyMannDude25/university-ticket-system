<?php 
// This section processes submissions from the login form
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connect to database
try {
    require ('serverConnect.php');
// Check that a first name has been entered				
$firstName = filter_var( $_POST['firstName'], FILTER_SANITIZE_STRING);
$string_length = strlen($firstName);		
if (empty($firstName) || (strlen($firstName) > 10)){  
$errors[] ='Please enter a valid first name';
}

else {
if(!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {  //                        #8
$errors[] = 'Invalid first Name, 1 to 10 letters.';
}
//Format String to all Lower
//Then Cap first letter
$firstName = strtolower($firstName);
$firstName = ucfirst($firstName);
}

// Check that a last name has been entered
$lastName = filter_var( $_POST['lastName'], FILTER_SANITIZE_STRING);
$string_length = strlen($lastName);		
if (empty($lastName) || (strlen($lastName) > 10)){  
$errors[] ='Please enter a valid last lame';
}
else {
if(!preg_match("/^[a-zA-Z]*$/", $lastName)) {  //                        #8
$errors[] = 'Invalid last Name, 1 to 10 letters.';
}
//Format String to all Lower
//Then Cap first letter
 $lastName = strtolower($lastName);
 $lastName =ucfirst($lastName);
}

// Check that an id number has been entered
$idNum = filter_var( $_POST['idNum'], FILTER_SANITIZE_STRING);
$string_length = strlen($idNum);		
if (empty($idNum) || (strlen($idNum) > 9)){  
$errors[] ='Please enter a valid id number';
}
else {
if(!preg_match("/^[0-9]*$/", $idNum)) {  //                        #8
$errors[] = 'Invalid id number, numbers only.';
}
}

   if (empty($errors)) { // If everything's OK.         #1
// Retrieve the first name and last name for that id number
 $query = "SELECT firstName, lastName FROM maintanence ";
 $query .= "WHERE idNum=?";
      $q = mysqli_stmt_init($conn);
	  
      mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
	  mysqli_stmt_bind_param($q, "s", $idNum); 

       // execute query	   
       mysqli_stmt_execute($q);

$result = mysqli_stmt_get_result($q);

$row = mysqli_fetch_array($result, MYSQLI_NUM);

if (mysqli_num_rows($result) == 1) {
//if one database row (record) matches the input:- 
if ($idNum and $firstName and $lastName === $row[1]) {	//#2
	
	//Sanitize comment
	// Check that a comment has been entered				
	$comment = filter_var( $_POST['comment'], FILTER_SANITIZE_STRING);
	$string_length = strlen($comment);		
	if (empty($comment) || (strlen($comment) > 200)){  
		$errors[] ='Please enter a valid comment';
	}
	else {
	//Post all drop-down values
	$roomNum = $_POST['roomNum'];
	switch ($roomNum){
		case '100':
			break;
		case '101':
			break;
		case '102':
			break;
		case '103':
			break;
		case '104':
			break;
		case '105':
			break;
		case '200':
			break;
		case '201':
			break;
		case '202':
			break;
		case '203':
			break;
		case '204':
			break;
		case '205':
			break;
		default:
			$errors[] = 'Invalid room number';
	}

	if(isset($_POST['mainNeed'])) {
		$mainNeed = $_POST['mainNeed'];
		//Create work Priority
		$workPriority;
		if ($mainNeed == 'Light Out') {
			$workPriority = "1";
		} else if ($mainNeed == 'General Cleaning') {
			$workPriority = "1";
		} else if ($mainNeed == 'Broken Item') {
			$workPriority = "2";
		} else if ($mainNeed == 'Leaking Pipe') {
			$workPriority = "2";
		} else if ($mainNeed == 'Clogged Toilet') {
			$workPriority = "2";
		} else if ($mainNeed == 'Broken Appliance') {
			$workPriority = "3";
		} else if ($mainNeed == 'Broken Window') {
			$workPriority = "3";
		} else if ($mainNeed == 'Locked Out') {
			$workPriority = "3";
		} else if ($mainNeed == 'No Power') {
			$workPriority = "3";
		} else if ($mainNeed == 'No Water') {
			$workPriority = "3";
		} else {$errors[] ='Invalid Entry';}
	}
	
$query = "INSERT INTO ticket (placerFirstName, placerLastName, placerId, roomNum, workType, workPriority, workDescription) ";
    $query .= "VALUES (?, ?, ?, ?, ?, ?, ?)"; 	
$q = mysqli_stmt_init($conn);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
mysqli_stmt_bind_param($q, 'sssssss', $firstName, $lastName, $idNum, $roomNum, $mainNeed, $workPriority, $comment);
// execute query
mysqli_stmt_execute($q);

		echo "<div class='toast show'>
				<div class='toast-header'>
					Success Toast
					<button type='button' class='btn-close' data-bs-dismiss='toast'></button>
				</div>
				<div class='toast-body'>
					Request Submitted Successfully
				</div>
			</div>";
	
	}

} else { // No student match was made.
	$errors[] = 'First name, last name, or id number does not match our records. ';
	$errors[] = 'Please verify your information ';
}
} else { // No student ID was found.
	$errors[] = 'Id Number entered does not match our records. ';
	$errors[] = 'Please verify your number ';
}
} 

if (!empty($errors)) {                     
		$errorstring = "Error! <br /> The following error(s) occurred:<br>";
		foreach ($errors as $msg) { // Print each error.
			$errorstring .= " $msg<br>\n";
		}
		$errorstring .= "Please try again.<br>";
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}// End of if (!empty($errors)) IF.
mysqli_stmt_free_result($q);
mysqli_stmt_close($q);
}

 catch(Exception $e) // We finally handle any problems here   
  {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "Exception - The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "Error -  The system is busy please try again later.";
   }
} // no else to allow user to enter values
?>