<?php session_start();

if (!isset($_SESSION['userLevel']) or ($_SESSION['userLevel'] != 1))
{ header("Location: index.php");
exit();
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>New Ticket</title>
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
		include('student_navbar.php');
	
	?>
	
	<!-- Validate Input -->
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				require('studentProcessMultipleButtons.php');
			}
		?>
		
		<!-- New Tickets Form -->
		<div class="container">
			<div class ="mt-4 p-5 bg-light rounded">
				<h1>New Ticket</h1>
				<form action="student_new_ticket_page.php" method="post" name="newTicketForm" id="newTicketForm">
					<div class="row">
					<!-- First Name Field -->
						<div class="col-md">
						<label for="firstName">First Name:</label>
							<input type="text" class="form-control" placeholder="First Name" name="firstName" id="firstName" required
							value=
								"<?php if (isset($_POST['firstName']))
									echo htmlspecialchars($_POST['firstName'],ENT_QUOTES); ?>">
						</div>
					<!-- Last Name Field -->	
						<div class="col-md">
						<label for="lastName">Last Name:</label>
							<input type="text" class="form-control" placeholder="Last Name" name="lastName" id="lastName" required
							value=
								"<?php if (isset($_POST['lastName']))
									echo htmlspecialchars($_POST['lastName'],ENT_QUOTES); ?>">
						</div>
					<!-- ID Number Field -->	
						<div class="col-md">
						<label for="pswd">Student ID:</label>
							<input type="text" class="form-control" placeholder="Student Id" name="idNum" id="idNum" required
							value=
								"<?php if (isset($_POST['idNum']))
									echo htmlspecialchars($_POST['idNum'],ENT_QUOTES); ?>">
						</div>
					<!-- Room Number -->	
						<div class="col-md">
							<label for="roomNum">Room Number:</label>
							<select class="form-select" name="roomNum" id="roomNum">
								<option value="100">100</option>
								<option value="101">101</option>
								<option value="102">102</option>
								<option value="103">103</option>
								<option value="104">104</option>
								<option value="105">105</option>
								<option value="200">200</option>
								<option value="201">201</option>
								<option value="202">202</option>
								<option value="203">203</option>
								<option value="204">204</option>
								<option value="205">205</option>
								
							</select>
						</div>
					</div>
					<br />
					
					<!-- Maintanence Type Field -->
					<div class="row">
						<div class="col">
							<label for="mainNeed">Maintenance Needed:</label>
							<select class="form-select" name="mainNeed" id="mainNeed">
								<option value="Broken Item">Broken Item</option>
								<option value="Broken Appliance">Broken Appliance</option>
								<option value="Broken Window">Broken Window</option>
								<option value="Clogged Toilet">Clogged Toilet</option>
								<option value="General Cleaning">General Cleaning</option>
								<option value="Leaking Pipe">Leaking Pipe</option>
								<option value="Light Out">Light out</option>
								<option value="Locked Out">Locked Out</option>
								<option value="No Power">No Power</option>
								<option value="No Water">No Water</option>		
							</select>
						</div>
					</div>
					
					<!-- Description Field -->
					<br />
					<div class="row">
						<label for="comment">Description:</label>
						<textarea class="form-control" rows="5" name="comment" id="comment" maxlength="200" required
							value=
								"<?php if (isset($_POST['comment']))
									echo htmlspecialchars($_POST['comment'],ENT_QUOTES); ?>"></textarea>
					</div>
					<div>
					<br />
						<div class="btn-group">
							<input class="btn btn-success" type="submit" id="submitNew" name="submitNew" value="Submit">
							<input class="btn btn-danger" type="submit" id="cancelNew" name="cancelNew" value="Cancel" formnovalidate>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include('allFooter.php'); ?>
	</body>
</html>