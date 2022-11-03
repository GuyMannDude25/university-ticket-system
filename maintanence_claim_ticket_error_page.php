<?php session_start();
	if (!isset($_SESSION['userLevel']) or ($_SESSION['userLevel'] != 2)) {
		header("Location: index.php");
		exit();
	}
?>
<!DOCTYPE=hml>
<html>
	<head>
		<title>Claim Ticket Error</title>
		<meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1" />
		 <!-- Latest compiled and minified CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Latest compiled JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	
	<body>
		<?php
			include('serverConnect.php');
			include('maintanence_navbar.php');
			include('maintanenceProcessMultipleButtons.php');
			
		//DELETE singleTicket from session to protect ticket
			if(isset($_SESSION['singleTicket'])) {
				unset($_SESSION['singleTicket']);
			}
		?>

<!-- View Ticket Medium to Large Screens-->
		<div class="container">
			<div class ="mt-4 p-5 bg-light rounded">
				<h1>Sorry...</h1>
				<p>
					This ticket has been claimed while you were viewing the ticket.
					Please select <a href="maintanence_view_active_tickets_page.php">CURRENT TICKET</a> from this message or from the navigation bar.
				</p>
			</div>
						
		</div>
		<?php include('allFooter.php'); ?>
	</body>
</html>