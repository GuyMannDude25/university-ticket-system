<?php
	$singleTicket = $_SESSION['singleTicket'];
	$sql = "SELECT ticketId, dateCreated, workType, workPriority, workDescription, ticketStatus, placerFirstName, placerLastName, placerId, roomNum FROM ticket ";
	$sql .="WHERE ticketId = '".$singleTicket."' AND ticketStatus = 'unclaimed'";
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
											<form action='' method='post' id='claim'>
												<input class='btn btn-primary' type='submit' id='claim' name='claim' value='Claim'>
											</form>
										</div>
								</td>
							</tr>
						</tbody>";
		}
	} else {
		echo "You have entered this page without selecting a valid ticket <br>";
		echo "OR <br>";
		echo "This ticket has been claimed by someone else before this page loaded <br>";
		echo "Select a ticket from the CURRENT TICKETS page";
		}
	//$conn->close();
?>