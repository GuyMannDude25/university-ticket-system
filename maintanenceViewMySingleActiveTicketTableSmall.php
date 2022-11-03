<?php
	$mySingleTicket = $_SESSION['mySingleTicket'];
	$sql = "SELECT ticketId, dateCreated, workType, workPriority, workDescription, workNotes, ticketStatus, placerFirstName, placerLastName, placerId, roomNum FROM ticket ";
	$sql .="WHERE ownerId = $_SESSION[idNum] AND ticketId = '".$mySingleTicket."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "
						<thead>
							<tr>
								<th>Ticket Number</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["ticketId"] . "</td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th>Date Created</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["dateCreated"] . "</td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th>Request</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["workType"] . "</td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th>Priority</th>
							 </tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["workPriority"] . "</td>
							</tr>
						</tbody>
						<thead>
							 <tr>
								<th>Ticket Request Descrption</th>
							 </tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["workDescription"] . "</td>
							</tr>
						</tbody>
						
						<thead>
							 <tr>
								<th>Ticket Work Notes</th>
							 </tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["workNotes"] . "</td>
							</tr>
						</tbody>
						
						<thead>
							<tr>
								<th>Student Name</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["placerFirstName"] . " " . $row["placerLastName"] . "</td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th>Student Id</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["placerId"] . "</td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th>Room Number</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>" . $row["roomNum"] . "</td>
							</tr>
							 <tr>
								<td>
									<div class='btn-group'>
											<form action='' method='post' id='workOn'>
												<input class='btn btn-success' type='submit' id='workOn' name='workOn' value='Work On'>
											</form>
											<form action='' method='post' id='pending'>
												<input class='btn btn-warning' type='submit' id='pending' name='pending' value='Pending'>
											</form>
											<form action='' method='post' id='delete'>
												<input class='btn btn-danger' type='submit' id='delete' name='delete' value='Delete'>
											</form>
										</div>
								</td>
							</tr>
						</tbody>";
		}
	} else {
		echo "You have entered this page without selecing a valid ticket";
		echo "Select a ticket from the MY TICKETS page";
		}
	//$conn->close();
?>