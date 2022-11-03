<?php
	$idNum = $_SESSION['idNum'];

	$sql = "SELECT ticketId, dateCreated, workType, workPriority, roomNum, ticketStatus FROM ticket ";
	$sql .="WHERE ownerId = $idNum AND ticketStatus = 'Pending'";
	$result = $conn->query($sql);

	if ($result !== false && $result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "
				<form action='maintanence_view_my_single_active_ticket_page.php' method='post' name='ticketProcess' id='ticketProcess'>
					<tr>
						<td><input class='btn btn-primary' type='submit' id='myTicketSelect' name='myTicketSelect' value='$row[ticketId]'>" . "</td>
						<td>" . $row["dateCreated"] . "</td>
						<td>" . $row["workType"] . "</td>
						<td>" . $row["workPriority"]. "</td>
						<td>" . $row["roomNum"] . "</td>
						<td>" . $row["ticketStatus"]. "</td>
						<td><input type='hidden' name='mySingleTicket' value='$row[ticketId]'></td>
					</tr>
				</form>";
		}
	} else {
		echo "No tickets at this time";
		}
?>