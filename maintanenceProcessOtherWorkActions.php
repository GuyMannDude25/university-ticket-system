<?php
//Check for server request from otherActionsForm
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		try {
		//connect to database
			require('serverConnect.php');
			
		//Check if they are checked with a value
		//Only one needs to be checked and then handled
		//If none are checked use else with error message
		
		
		//POSSIBLE CHANGE -- NOT YET TESTES
		
		if(!isset($_POST['damageCheck']) && !isset($_POST['roomChangeCheck'])) {
			$errors[] = 'Please check at least one valid box';
		} else {
			if(isset($_POST['damageCheck']) || isset($_POST['roomChangeCheck'])) {
				
				if(isset($_POST['damageCheck']) && filter_var( $_POST['damageCheck'], FILTER_SANITIZE_STRING) == 'damageCheck') {
					$damageCheck = filter_var( $_POST['damageCheck'], FILTER_SANITIZE_STRING);
					
					if (empty($errors)) { // If everything's OK.         #1
					// Add everything to database
						$ticketId = $_SESSION['mySingleTicket'];
								
						$query = "INSERT INTO damagerequest (ticketId) ";
						$query .= "VALUES (?)"; 	
						$q = mysqli_stmt_init($conn);
						mysqli_stmt_prepare($q, $query);
					// use prepared statement to insure that only text is inserted
					// bind fields to SQL Statement
						mysqli_stmt_bind_param($q, 'i', $ticketId);
					// execute query
						mysqli_stmt_execute($q);
					} 
				}
				if(isset($_POST['roomChangeCheck']) && filter_var( $_POST['roomChangeCheck'], FILTER_SANITIZE_STRING) == 'roomChangeCheck') {
					$roomChangeCheck = filter_var( $_POST['roomChangeCheck'], FILTER_SANITIZE_STRING);
					if (empty($errors)) { // If everything's OK.         #1
					// Add everything to database
						$ticketId = $_SESSION['mySingleTicket'];
								
						$query = "INSERT INTO roomchangerequest (ticketId) ";
						$query .= "VALUES (?)"; 	
						$q = mysqli_stmt_init($conn);
						mysqli_stmt_prepare($q, $query);
					// use prepared statement to insure that only text is inserted
					// bind fields to SQL Statement
						mysqli_stmt_bind_param($q, 'i', $ticketId);
					// execute query
						mysqli_stmt_execute($q);
					}
				}
				echo "
					<div class='toast show'>
						<div class='toast-header'>
							Success Toast
							<button type='button' class='btn-close' data-bs-dismiss='toast'></button>
						</div>
						<div class='toast-body'>
							Request Submitted Successfully
						</div>
					</div>";
			}
			else {
				$errors[] = 'Please check at least one valid box';
			}
		}
		
		
		
		
		
		
		/*
			if(isset($_POST['damageCheck']) || isset($_POST['roomChangeCheck'])) {
				$damageCheck = filter_var( $_POST['damageCheck'], FILTER_SANITIZE_STRING);
				$roomChangeCheck = filter_var( $_POST['roomChangeCheck'], FILTER_SANITIZE_STRING);
				
				if(isset($damageCheck) && $damageCheck == 'damageCheck') {
					if (empty($errors)) { // If everything's OK.         #1
					// Add everything to database
						$ticketId = $_SESSION['mySingleTicket'];
								
						$query = "INSERT INTO damagerequest (ticketId) ";
						$query .= "VALUES (?)"; 	
						$q = mysqli_stmt_init($conn);
						mysqli_stmt_prepare($q, $query);
					// use prepared statement to insure that only text is inserted
					// bind fields to SQL Statement
						mysqli_stmt_bind_param($q, 'i', $ticketId);
					// execute query
						mysqli_stmt_execute($q);
					} 
				}
				if(isset($roomChangeCheck) && $roomChangeCheck == 'roomChangeCheck') {
					if (empty($errors)) { // If everything's OK.         #1
					// Add everything to database
						$ticketId = $_SESSION['mySingleTicket'];
								
						$query = "INSERT INTO roomchangerequest (ticketId) ";
						$query .= "VALUES (?)"; 	
						$q = mysqli_stmt_init($conn);
						mysqli_stmt_prepare($q, $query);
					// use prepared statement to insure that only text is inserted
					// bind fields to SQL Statement
						mysqli_stmt_bind_param($q, 'i', $ticketId);
					// execute query
						mysqli_stmt_execute($q);
					}
				}
				echo "
					<div class='toast show'>
						<div class='toast-header'>
							Success Toast
							<button type='button' class='btn-close' data-bs-dismiss='toast'></button>
						</div>
						<div class='toast-body'>
							Request Submitted Successfully
						</div>
					</div>";
			}
			else {
				$errors[] = 'Please check at least one valid box';
			}
			*/
			
			if (!empty($errors)) {
				$errorstring = "Error! <br /> The following error(s) occurred:<br>";
				foreach ($errors as $msg) { // Print each error.
					$errorstring .= " $msg<br>\n";
				}
				$errorstring .= "Please try again.<br>";
				echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
			}// End of if (!empty($errors)) IF.
		}
		catch(Exception $e) // We finally handle any problems here   
		{
		// print "An Exception occurred. Message: " . $e->getMessage();
			print "Exception The system is busy please try later";
		}
		catch(Error $e)
		{
		//print "An Error occurred. Message: " . $e->getMessage();
			print "Error The system is busy please try again later.";
		}
	}
//No else
?>