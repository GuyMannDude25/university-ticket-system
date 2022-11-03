<?php
	$singleTicket = $_SESSION['singleTicket'];
	$sql = "SELECT ticketId, dateCreated, workType, workPriority, workDescription, workNotes, ticketStatus, placerFirstName, placerLastName, placerId, roomNum FROM ticket ";
	$sql .="WHERE ticketId = '".$singleTicket."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "
							<thead>
								<tr>
									<th colspan='3'>Ticket Number</th>
									<th></th>
									<th></th>
									<th colspan='3'>Date Created</th>
									<th></th>
									<th></th>
									<th colspan='3'>Request</th>
									<th></th>
									<th></th>
									<th colspan='3'>Priority</th>
									<th></th>
									<th></th>
								 </tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='3'>" . $row["ticketId"] . "</td>
									<td></td>
									<td></td>
									<td colspan='3'>" . $row["dateCreated"] . "</td>
									<td></td>
									<td></td>
									<td colspan='3'>" . $row["workType"] . "</td>
									<td></td>
									<td></td>
									<td colspan='3'>" . $row["workPriority"] . "</td>
									<td></td>
									<td></td>
								 </tr>
							</tbody>
							<thead>
								<tr>
									<th colspan='12'> Ticket Request Descrption </th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								 </tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='12'>" . $row["workDescription"] . "</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
							
							<thead>
								<tr>
									<th colspan='12'> Work Notes </th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								 </tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='12'>" . $row["workNotes"] . "</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
							
							<thead>
								<tr>
									<th colspan='4'>Student Name</th>
									<th></th>
									<th></th>
									<th></th>
									<th colspan='4'>Student Id</th>
									<th></th>
									<th></th>
									<th></th>
									<th colspan='4'>Room Number</th>
									<th></th>
									<th></th>
									<th></th>
								 </tr>
							</thead>
							<tbody>
								<tr>
									<td colspan='4'>" . $row["placerFirstName"] . " " . $row["placerLastName"] . "</td>
									<td></td>
									<td></td>
									<td></td>
									<td colspan='4'>" . $row["placerId"] . "</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td colspan='4'>" . $row["roomNum"] . "</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								 </tr>
								 <tr>
									<td colspan='12'>
										<div class='btn-group'>
											<form action='' method='post' id='delete'>
												<input class='btn btn-danger' type='submit' id='delete' name='delete' value='Delete'>
											</form>
										</div>
									</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>";
		}
	} else {
		if(isset($_SESSION['singleTicket'])){
			unset($_SESSION['singleTicket']);
		}
		echo "You have entered this page without selecting a valid ticket <br>";
		echo "Select a ticket from the MY TICKETS page";
		}
	//$conn->close();
?>