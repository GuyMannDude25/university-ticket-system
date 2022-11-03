<?php
	$mySingleTicket = $_SESSION['mySingleTicket'];
	$sql = "SELECT ticketId, dateCreated, workType, workPriority, workDescription, ticketStatus, placerFirstName, placerLastName, placerId, roomNum FROM ticket ";
	$sql .="WHERE ownerId = $_SESSION[idNum] AND ticketId = '".$mySingleTicket."'";
	$result = $conn->query($sql);
	$_POST['workNotes'] = "";

	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "	
			<div class='row'>
				<div class='col-sm-3'>
					<h5>Ticket Number</h5>
					" . $row["ticketId"] . "<hr>
				</div>
				<div class='col-sm-3'>	
					<h5>Date Created</h5>
					" . $row["dateCreated"] . "<hr>
				</div>
				<div class='col-sm-3'>
					<h5>Request</h5>
					" . $row["workType"] . "<hr>
				</div>
				<div class='col-sm-3'>
					<h5>Priority</h5>
					" . $row["workPriority"] . "<hr>					
				</div>
			</div>
			
			<div class='row'>
				<div class='col-sm-12'>		
					<h5>Work Description</h5>					
					" . $row["workDescription"] . "<hr>					
				</div>
			</div>

			<div class='row'>
				<div class='col-sm-4'>
					<h5>Student Name</h5>
					" . $row["placerFirstName"] . "<hr>
				</div>
				<div class='col-sm-4'>
					<h5>Student ID</h5>					
					" . $row["placerId"] . "<hr>					
				</div>
				<div class='col-sm-4'>		
					<h5>Room Number</h5>				
					" . $row["roomNum"] . "<hr>					
				</div>
			</div>

			<div class='row'>
				<div class='col-sm-12'>		
					<h5>Work Notes</h5>
<form action='' method='post' id='workNotes'>
						<div>
							<label for='workNotes'>Work Notes:</label>
							<textarea class='form-control' rows='5' name='workNotes' id='comment' maxlength='200'
								value="."<?php if (isset(".$_POST['workNotes'].")) echo htmlspecialchars(".$_POST['workNotes'].",ENT_QUOTES); ?>"."
							</textarea>
							<hr>
						</div>
				</div>
			</div>

			<div class='row'>
				<div class='col-sm-12'>	
					<div class='row'>
						<div class='col-sm-4'>
							<input class='btn btn-success' type='submit' id='updateComplete' name='updateComplete' value='Save and Complete'>
						</div>
						<br>
						<br>
						<div class='col-sm-4'>
							<input class='btn btn-warning' type='submit' id='updatePending' name='updatePending' value='Save and set Pending'>
						</div>
						<br>
						<br>
						<div class='col-sm-4'>
							<input class='btn btn-danger' type='submit' id='discardNoUpdate' name='discardNoUpdate' value='Discard Changes'>
						</div>
					</div>
</form>
					
				</div>
			</div>
			<hr>

			<div class='row'>
				<div class='col-sm-6'>
					<button type='button' class='btn btn-primary' data-bs-toggle='collapse' data-bs-target='#collapseOrder'>Order Parts</button>
					<div id='collapseOrder' class='collapse'>
						<form action='' method='post' name='orderPartForm' id='orderPartForm'>
							<div class='row'>
								<div class='col-md'>
									<label for='partName'>Part/Item:</label>
									<select class='form-select' name='partName'>
										<option>Hallway Lightbulb</option>
										<option>Dorm Lightbulb</option>
									</select>
								</div>
								<div class='col-md'>
									<label for='quantity'>Quantity (Max 5):</label>
									<br>
									<input type='number' id='quantity' name='quantity' min='1' max='5'>
								</div>
								<div class='col-md'>
									<input class='btn btn-success' type='submit' id='submitOrder' name='submitOrder' value='Submit Order'>
								</div>
							</div>
						</form>
					</div>			
				</div>
				<div class='col-sm-6'>
					<button type='button' class='btn btn-primary' data-bs-toggle='collapse' data-bs-target='#collapseOther'>Other Actions</button>
					<div id='collapseOther' class='collapse'>
						<form action='' method='post' name='otherActionsForm' id='otherActionsForm'>
							<div class='row'>
								<div class='col-md'>
									<div class='form-check'>
										<input type='checkbox' class='form-check-input' id='damageCheck' name='damageCheck' value='damageCheck'>
										<label class='form-check-label' for='damageCheck'>Intentional Damage Suspected</label>
									</div>
								</div>
								<div class='col-md'>
									<div class='form-check'>
										<input type='checkbox' class='form-check-input' id='roomChangeCheck' name='roomChangeCheck' value='roomChangeCheck'>
										<label class='form-check-label' for='roomChangeCheck'>Room Change Needed</label>
									</div>
								</div>
								<div class='col-md'>
									<input class='btn btn-success' type='submit' id='submitRequests' name='submitRequests' value='Submit Requests'>
								</div>
							</div>
						</form>
					</div>			
				</div>
			</div>";
		}
	} else {
		echo "You have entered this page without selecting a valid ticket <br>";
		echo "Select a ticket from the MY TICKETS page";
		}
	//$conn->close();
?>