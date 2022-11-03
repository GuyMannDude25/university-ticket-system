<!DOCTYPE html>
<html>
	<head>
		<title>Maintanence System Login</title>
		<meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1" />
		 <!-- Latest compiled and minified CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Latest compiled JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<?php include('logoutNavbar.php'); ?>
		
		  <!-- Validate Input -->
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				require('processLoginType.php');
			}
		?>
	<!-- Login Form -->	
		<div class="container">
			<div class ="mt-4 p-5 bg-light">
				<h1>Maintenance System Login</h1>
				
				<form action="index.php" method="post" name="loginform" id="loginform">				
					<div class="input-group mt-3 mb-3 mx-auto" style="width:75%;">
						<!-- email box -->
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="50" required value=
							"<?php if (isset($_POST['email'])) 
						echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" >
					</div>
					
					<div class="input-group mb-3 mx-auto" style="width:75%">
					<!-- Password box -->
						<input type="password" class="form-control" id="password" name="password"
							pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}"
							title="One number, one upper, one lower, one special, with 8 to 30 characters"\
							placeholder="Password" minlength="8" maxlength="30" required
							value=
								"<?php if (isset($_POST['password']))
									echo htmlspecialchars($_POST['password'],ENT_QUOTES); ?>">
					</div>
					
					<div class="input-group mt-3 mb-3 mx-auto" style="width:75%;">
						<!-- Drop-down select -->
						<select class="form-select" style="width:25%;" id="userType" name="userType">
							<option <?php if (isset($userType) && $userType === 'student') { echo 'selected="selected" ';}?> value="student">Student</option>
							<option <?php if (isset($userType) && $userType === 'maintanenceStaff') { echo 'selected="selected" ';}?> value="maintanenceStaff">Maintanence Staff</option>
						</select>
					</div>
					
					<div class="input-group mt-3 mb-3 mx-auto" style="width:10%;">
						<input class="btn btn-primary" type="submit" id="submit" name="submit" value="Login">
					</div>
				</form>
			</div>
		</div>

		
		<?php include('allFooter.php'); ?>
<?php
 if(!isset($errorstring)) {
	echo '</div>';
	echo '<footer class="jumbotron text-center row col-sm-12"
		style="padding-bottom:1px; padding-top:8px;">';
 }
 else
 {
	echo '<footer class="jumbotron text-center col-sm-12"
	style="padding-bottom:1px; padding-top:8px;">';
 }
 ?>
	</body>
</html>