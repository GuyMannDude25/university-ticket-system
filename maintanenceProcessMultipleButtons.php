<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	//Process WORK ON
		if (isset($_POST['workOn'])) {
			$url = "maintanence_work_on_my_single_active_ticket_page.php";
			header('Location: ' . $url);
	//Process PENDING
		} else if (isset($_POST['pending'])) {
			require ('serverConnect.php');
			
			$ticketId = $_SESSION['mySingleTicket'];
			
			$query = "UPDATE ticket ";
			$query .= "SET ticketStatus='Pending' ";
			$query .= "WHERE ticketId = ?";
			$q = mysqli_stmt_init($conn);
	  
			mysqli_stmt_prepare($q, $query);

		// bind $id to SQL Statement
			mysqli_stmt_bind_param($q, "s", $ticketId); 

		// execute query	   
			mysqli_stmt_execute($q);
			
			$url = "maintanence_view_active_tickets_page.php";
			header('Location: ' . $url);
	//Process DELETE non popup
		} else if (isset($_POST['delete'])) {
			echo "
			<div class='toast show'>
				<div class='toast-header'>
					Delete Toast
					<button type='button' class='btn-close' data-bs-dismiss='toast'></button>
				</div>
				<div class='toast-body'>
					Do you really want to Delete? If not, close this pop-up
					<form action='' method='post' id='finalDelete'>
						<input class='btn btn-danger' type='submit' id='finalDelete' name='finalDelete' value='Delete'>
					</form>
				</div>
			</div>";
	//Process FINAL DELETE from popup
		} else if (isset($_POST['finalDelete'])) {
			require ('serverConnect.php');
			
			$ticketId = $_SESSION['singleTicket'];
			
			$query = "DELETE FROM ticket ";
			$query .= "WHERE ticketId = ?";
			$q = mysqli_stmt_init($conn);
	  
			mysqli_stmt_prepare($q, $query);

		// bind $id to SQL Statement
			mysqli_stmt_bind_param($q, "s", $ticketId); 

		// execute query	   
			mysqli_stmt_execute($q);
			
			$url = "maintanence_view_active_tickets_page.php";
			header('Location: ' . $url);
	//Process TICKET SELECT single ticket
		} else if (isset($_POST['singleTicket'])) {
			session_start();
			$singleTicket = $_POST['singleTicket'];
			$_SESSION['singleTicket'] = $singleTicket;
		
			$url = "maintanence_view_single_active_ticket_page.php";
			header('Location: ' . $url);
	//Process MY SINGLE TICKET SELECT single ticket
		} else if (isset($_POST['mySingleTicket'])) {
			session_start();
			$mySingleTicket = $_POST['mySingleTicket'];
			$_SESSION['mySingleTicket'] = $mySingleTicket;
		
			$url = "maintanence_view_my_single_active_ticket_page.php";
			header('Location: ' . $url);
	//Process CLAIM TICKET
		} else if (isset($_POST['claim'])) {
			require ('serverConnect.php');
			
			$ownerId = $_SESSION['idNum'];
			$ownerFirstName = $_SESSION['firstName'];
			$ownerLastName = $_SESSION['lastName'];
			$ticketId = $_SESSION['singleTicket'];
		//prevent multiple people from claiming the ticket
		//get ticketId and ticket Status	
			$sql = "SELECT ticketStatus, ticketId FROM  ticket ";
			$sql .="WHERE ticketId = $ticketId";			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
		//assign database info to variables
				while($row = $result->fetch_assoc()) {
					$dbTicketId = $row['ticketId'];
					$dbTicketStatus = $row['ticketStatus'];
				}
			} else {
				echo "Cannot find ticket. Please try again later";
			}
		//Check if the status is unclaimed
		//if fine, update tcket, otherwse load error page
			if ($dbTicketStatus == "Unclaimed") {
				$query = "UPDATE ticket ";
				$query .= "SET ownerId=? , ownerFirstName=? , ownerLastName=? , ticketStatus='Pending' ";
				$query .= "WHERE ticketId = ? AND ownerId IS NULL";
				$q = mysqli_stmt_init($conn);
		  
				mysqli_stmt_prepare($q, $query);
				
			// bind $id to SQL Statement
				mysqli_stmt_bind_param($q, "ssss",$ownerId, $ownerFirstName, $ownerLastName, $ticketId); 

			// execute query	   
				mysqli_stmt_execute($q);
				
				$url = "maintanence_view_my_active_tickets_page.php";
				header('Location: ' . $url);
			}
			else {
				$url = "maintanence_claim_ticket_error_page.php";
				header('Location: ' . $url);
			}		
	//Process LOGOUT
		} else if (isset($_POST['logout'])){
			session_start();
		// remove all session variables
			session_unset();

		// destroy the session
			session_destroy();
			
			$url = "index.php";
			header('Location: ' . $url);
	//Process UPDATE COMPLETE
		} else if (isset($_POST['updateComplete'])) {
			require ('serverConnect.php');
			
			$ticketId = $_SESSION['mySingleTicket'];
			$workNotes = $_POST['workNotes'];
			
			$query = "UPDATE ticket ";
			$query .= "SET ticketStatus='Complete', workNotes ='$workNotes' ";
			$query .= "WHERE ticketId = ?";
			$q = mysqli_stmt_init($conn);
	  
			mysqli_stmt_prepare($q, $query);

		// bind $id to SQL Statement
			mysqli_stmt_bind_param($q, "s", $ticketId); 

		// execute query	   
			mysqli_stmt_execute($q);
			
			$url = "maintanence_view_my_active_tickets_page.php";
			header('Location: ' . $url);
	//Process UPDATE PENDING
		} else if (isset($_POST['updatePending'])) {
			require ('serverConnect.php');
			
			$ticketId = $_SESSION['mySingleTicket'];
			$workNotes = $_POST['workNotes'];
			
			$query = "UPDATE ticket ";
			$query .= "SET ticketStatus='Pending', workNotes ='$workNotes' ";
			$query .= "WHERE ticketId = ?";
			$q = mysqli_stmt_init($conn);
	  
			mysqli_stmt_prepare($q, $query);

		// bind $id to SQL Statement
			mysqli_stmt_bind_param($q, "s", $ticketId); 

		// execute query	   
			mysqli_stmt_execute($q);
			
			$url = "maintanence_view_my_active_tickets_page.php";
			header('Location: ' . $url);
	//Process DISCARD NO UPDATE
		} else if (isset($_POST['discardNoUpdate'])) {
			$url = "maintanence_view_my_active_tickets_page.php";
			header('Location: ' . $url);
	//Process NEW TICKET
		} else if (isset($_POST['submitNew'])) {
			include('maintanenceProcessNewTicket.php');
	//Process CANCEL
		} else if (isset($_POST['cancelNew'])) {
			$url = "maintanence_view_active_tickets_page.php";
			header('Location: ' . $url);
	//Process SUBMIT ORDER
		} else if(isset($_POST['submitOrder'])) {
			require('maintanenceProcessNewPartOrder.php');
	//Process SUBMIT REQUESTS
		} else if(isset($_POST['submitRequests'])) {
			require('maintanenceProcessOtherWorkActions.php');
		}
	}
?>