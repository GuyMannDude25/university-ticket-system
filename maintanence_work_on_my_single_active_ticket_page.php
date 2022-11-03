<?php session_start();
if (!isset($_SESSION['userLevel']) or ($_SESSION['userLevel'] != 2))
{ header("Location: index.php");
exit();

if (!isset($_SESSION['mySingleTicket']))
	{ 
		$_SESSION['mySingleTicket'] = 0;
	}
}
?>
<!DOCTYPE=hml>
<html>
	<head>
		<title>Work on Ticket</title>
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
		?>

<!-- View Ticket Medium to Large Screens-->
		<div class="container">
			<div class ="mt-4 p-5 bg-light rounded">
				<h1>Work On My Ticket</h1>
					<?php include("maintanenceWorkOnMySingleActiveTicket.php") ?>
			</div>
		</div>
		
		<?php include('allFooter.php'); ?>
		
	</body>
</html>