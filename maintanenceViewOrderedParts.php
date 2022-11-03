<?php
	$sql = "SELECT orderId, ticketId, partName, quantity FROM currentpartorders ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "
					<tr>
						<td>" . $row["orderId"] . "</td>
						<td>" . $row["ticketId"] . "</td>
						<td>" . $row["partName"]. "</td>
						<td>" . $row["quantity"] . "</td>
					</tr>
					";
		}
	} else {
		echo "No part orders at this time";
		}
	$conn->close();
?>