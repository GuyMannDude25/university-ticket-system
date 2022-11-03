<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	//Process DELETE non popup
		if (isset($_POST['delete'])) {
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
			
			$url = "student_view_my_tickets_page.php";
			header('Location: ' . $url);
	//Process TICKET SELECT single ticket
		} else if (isset($_POST['singleTicket'])) {
			session_start();
			$singleTicket = $_POST['singleTicket'];
			$_SESSION['singleTicket'] = $singleTicket;
			
			$url = "student_view_my_single_ticket_page.php";
			header('Location: ' . $url);
	//Process NEW TICKET
		} else if (isset($_POST['submitNew'])) {
			include('studentProcessNewTicket.php');
	//Process CANCEL
		} else if (isset($_POST['cancelNew'])) {
			echo "cancel";
			$url = "student_view_my_tickets_page.php";
			header('Location: ' . $url);
	//Process LOGOUT
		} else if (isset($_POST['logout'])) {
			session_start();
		// remove all session variables
			session_unset();

		// destroy the session
			session_destroy();
			
			$url = "index.php";
			header('Location: ' . $url);
		}
	}
?>