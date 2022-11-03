<?php
			require ('serverConnect.php');

// This section processes submissions from the oderParts form
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connect to database
	
try {
    require ('serverConnect.php');
	
// Check for a quantity
	$quantity = filter_var( $_POST['quantity'], FILTER_SANITIZE_STRING);
	$string_length = strlen($quantity);		
	if ($quantity < 1 || $quantity > 5) {
		$errors[] = 'Invalid quantity; 1-5 only';
	} else {
// Check for a part name:
		$partName = filter_var( $_POST['partName'], FILTER_SANITIZE_STRING);
		$string_length = strlen($partName);		
		if (empty($partName)){  
			$errors[] ='Please enter a valid partName';
		}
		else {
			switch ($partName) {
				case "Hallway Lightbulb":
					break;
				case "Dorm Lightbulb":
					break;
				default:
					$errors[] = 'Invalid part name';
			}
		}
	}

   if (empty($errors)) { // If everything's OK.         #1
// Add everything to database
$ticketId = $_SESSION['mySingleTicket'];
			
			$query = "INSERT INTO currentPartOrders (ticketId, partName, quantity) ";
    $query .= "VALUES (?, ?, ?)"; 	
$q = mysqli_stmt_init($conn);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
mysqli_stmt_bind_param($q, 'isi', $ticketId, $partName, $quantity);
// execute query
mysqli_stmt_execute($q);
	echo "
			<div class='toast show'>
				<div class='toast-header'>
					Success Toast
					<button type='button' class='btn-close' data-bs-dismiss='toast'></button>
				</div>
				<div class='toast-body'>
					Request Submitted Successfully
				</div>
			</div>";

} 
if (!empty($errors)) {                     
		$errorstring = "Error! <br /> The following error(s) occurred:<br>";
		foreach ($errors as $msg) { // Print each error.
			$errorstring .= " $msg<br>\n";
		}
		$errorstring .= "Please try again.<br>";
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}// End of if (!empty($errors)) IF.
}
 catch(Exception $e) // We finally handle any problems here   
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "Exception The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "Error The system is busy please try again later.";
   }
} // no else to allow user to enter values
?>