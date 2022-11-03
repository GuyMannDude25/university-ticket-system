<!-- Navigation Bar -->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
			<div class="container-fluid">
				<div class="navbar-brand">
					<a href="#">
						<img src="logo.png" alt="college logo" style="width:75%;" />
					</a>
				</div>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="maintanence_view_active_tickets_page.php">Current Tickets</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="maintanence_view_my_active_tickets_page.php">My Tickets</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="maintanence_new_ticket_page.php">New Ticket</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="maintanence_view_ordered_parts.php">Orderd Parts</a>
						</li>
					</ul>
				</div>
			</div>
			
			<!--Image to open Offcanvas Sidebar -->
			<img src="profile_images/<?php echo $_SESSION['profilePic']; ?>" alt="Profile" usemap="#profile" style="width:80px;height:80px;" class="rounded-circle">
			
			<!-- Image map -->
			<map name="profile">
				<area shape="default" alt="Open OffCanvas" data-bs-toggle="offcanvas" data-bs-target="#demo" >
			</map>	
		</nav>
			
		<!-- Offcanvas Sidebar -->
		<div class="offcanvas offcanvas-start" id="demo">
		  <div class="offcanvas-header">
			<h1 class="offcanvas-title">Hello Again, <?php echo $_SESSION['firstName']?>!</h1>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
		  </div>
		  <div class="offcanvas-body">
			<p>User: <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>
			<p>ID Number: <?php echo $_SESSION['idNum']; ?></p>
			<p>Specialty: <?php echo $_SESSION['specialty']; ?></p>
			
			<form action='' method='post' id='logout'>
				<input class='btn btn-secondary' type='submit' id='logout' name='logout' value='Logout'>
			</form>
		</div>
	</div>