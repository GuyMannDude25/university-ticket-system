<?php session_start();
if (!isset($_SESSION['userLevel']) or ($_SESSION['userLevel'] != 2))
{ header("Location: index.php");
exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Parts Ordered</title>
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
	
		<!-- Current Tickets Table -->
		<div class="container">
			<div class ="mt-4 p-5 bg-light rounded">
				<h1>Parts Ordered</h1>
				<div class="table-responsive-sm">
					<table class="table table-hover table-responsive-md table-striped">
						<thead>
							<tr>
								<th>Order Number</th>
								<th>Ticket Number</th>
								<th>Part Name</th>
								<th>Quantity</th>
							 </tr>
						</thead>
						<tbody>
							<?php include("maintanenceViewOrderedParts.php") ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php include('allFooter.php'); ?>
	</body>
</html>