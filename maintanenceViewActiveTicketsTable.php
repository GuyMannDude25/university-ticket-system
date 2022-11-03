<?php
	$sql = "SELECT ticketId, dateCreated, workType, workPriority, roomNum, ticketStatus FROM ticket ";
	$sql .="WHERE ticketStatus ='Unclaimed'";
	$result = $conn->query($sql);

	if ($result !== false && $result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "
				<form action='maintanence_view_active_tickets_page.php' method='post' name='ticketProcess' id='ticketProcess'>
					<tr>
						<td><input class='btn btn-primary' type='submit' id='ticketSelect' name='ticketSelect' value='$row[ticketId]'>" . "</td>
						<td>" . $row["dateCreated"] . "</td>
						<td>" . $row["workType"] . "</td>
						<td>" . $row["workPriority"]. "</td>
						<td>" . $row["roomNum"] . "</td>
						<td>" . $row["ticketStatus"]. "</td>
						<td><input type='hidden' name='singleTicket' value='$row[ticketId]'></td>
					</tr>
				</form>";
		}
	} else {
		echo "No tickets at this time";
		}
	$conn->close();
?>