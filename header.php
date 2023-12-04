<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Notes - Header</title>
<link rel="icon" 
		type="image/png" 
		href="./images/favicon.ico">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<br>
<br>
<br>
<body>
<form action="" method="post">
<table class="headerTable" bgcolor="#f2f2f2" align="center">
<tr class="headerBG">
<td>
<button input type="submit" id="backButton" onClick="return backClicked()"></button>
<button input type="button" id="printButton" onClick="printDiv();"></button>
</td>
<td>
<img src="./images/logo.png" align="right" style="margin: 0px 10px" width="40" height="40">
</td>
</tr>
<tr class="noBorder">
<td colspan="2">
    <li class="segmented-control__item_1">
        <input class="segmented-control__input" type="submit" name="submit" value="header" id="option-1" disabled>
        <label class="segmented-control__label" for="option-1"><b>Header</b></label>
    </li>
    <li class="segmented-control__item_2">
        <input class="segmented-control__input" type="submit" name="submit" value="lines" id="option-2" onClick="return goToLines()">
        <label class="segmented-control__label" for="option-2"><b>Lines</b></label>
    </li>
</td>
</tr>
</table>
</form>
<form action="" method="post">
<table class="notesTable" bgcolor="#f2f2f2" style="padding:10px" align="center">
<?php 
if(isset($_GET["order"])) {
    $order = $_GET['order'];
    echo("<script>var order = $order;</script>");
    
    include 'dbconfig.php';  // This file should return a mysqli connection object ($conn)

    if ($order != '') {
        $order = $conn->real_escape_string($order);
        $query = "SELECT COUNT(*) AS COUNT FROM Order_Header WHERE Header_Order_ID = '$order'"; 
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["COUNT"] > 0) {
                $query = "SELECT Header_Status AS STATUS FROM Order_Header WHERE Header_Order_ID = '$order'";
                $result = $conn->query($query);

                if ($result) {
                    $statusRow = $result->fetch_assoc();
                    if ($statusRow["STATUS"] == 'Open') {
                        // Get Customer Number and Name
                        $query = "SELECT Cust_ID, Cust_Name FROM Customers INNER JOIN Order_Header ON Cust_ID = Header_Customer_ID WHERE Header_Order_ID = '$order'";
                        $result = $conn->query($query);

                        if ($result) {
                            $customerDetails = $result->fetch_assoc();
                            $customer = $customerDetails["Cust_ID"];
                            $name = $customerDetails["Cust_Name"];

                            $query2 = "SELECT COUNT(Note_Note) AS COUNT FROM Notes WHERE Note_Type = 'H' AND Note_Order_ID = '$order'";
                            $result2 = $conn->query($query2);

                            if ($result2) {
                                $notesCount = $result2->fetch_assoc();
                                $count = $notesCount["COUNT"];
                            }
                        }
                    } else {
                        echo("<script>location.href = 'http://localhost/php-order_notes_editor/error.php';</script>");
                    }
                }
            } else {
                echo("<script>location.href = 'http://localhost/php-order_notes_editor/error.php';</script>");
            }
        } else {
            echo("<script>location.href = 'http://localhost/php-order_notes_editor/error.php';</script>"); 
        }
    } else {
        echo("<script>location.href = 'http://localhost/php-order_notes_editor/error.php';</script>");
    }
    
    // Close DB Connection
    // $conn->close();
}
?>
<tr>
<td> Customer: </td><td><?php echo $name; ?></td>
</tr>
<tr>
<td> Cust Number: </td><td><?php echo $customer; ?></td>
</tr>
<tr>
<td> Order Number: </td><td><?php echo $order; ?></td>
</tr>
<tr>
<td> Notes Total: </td><td><span id="linesUsed"><?php echo $count; ?></span></td>
</tr>
<tr>
<td><br></td>
</tr>
<tr>
<td> Notes : </td><td><div id="printableArea"><textarea id="countMe" name="comment" rows="<?php echo $count; ?>" cols="50" WRAP="HARD" style="overflow:hidden" id="description_id" onkeyup="new do_resize(this), updateDiv()">
<?php
// Assuming $conn is your mysqli connection object and is already opened

// Get Order Notes
if ($commentFlag = 1) {  // Make sure $commentFlag is being set correctly before this block

    $order = $conn->real_escape_string($order);
    $query2 = "SELECT Note_Note FROM Notes WHERE Note_Type = 'H' AND Note_Order_ID = '$order' ORDER BY Note_Seq ASC";
    $result2 = $conn->query($query2);

    if ($result2) {
        while($row = $result2->fetch_assoc()) {
            echo $row["Note_Note"] . "\n";
        }
    } else {
        // Handle query failure
    }
} else {
    echo "";
}
?>

</textarea></div></td>
<!-- style="overflow:hidden" id="description_id" onkeyup="new do_resize(this);" -->
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Update Header Notes"></td>
</tr>
</form>
</table>
<?php
include 'dbconfig.php';  // Include your database configuration file

if (isset($_POST["submit"])) {
    $value = $_POST['submit'];
    $order = $_GET['order'] ?? '';  // Get the order number from the URL
    $noteContent = $_POST['note_content'] ?? ''; // Get the note content from the form

    if ($value == "Update Header Notes" && $order != '' && $noteContent != '') {
        $order = $conn->real_escape_string($order);

        // Delete existing notes for the given order
        $deleteQuery = "DELETE FROM Notes WHERE Note_Type = 'H' AND Note_Order_ID = '$order'";
        $conn->query($deleteQuery);

        // Split the note content into lines and insert each line as a new note
        $noteLines = explode("\n", $noteContent);
        $seq = 1;  // Initialize sequence number

        foreach ($noteLines as $line) {
            $line = trim($line);  // Trim each line
            if (!empty($line)) {
                $line = $conn->real_escape_string($line);

                // Insert new note line
                $insertQuery = "INSERT INTO Notes (Note_Type, Note_Order_ID, Note_Note, Note_Seq) VALUES ('H', '$order', '$line', $seq)";
                $conn->query($insertQuery);
                $seq++;  // Increment sequence number
            }
        }

        echo '<center>Note Successfully Updated</center>';
    } elseif ($value == "lines") {
        echo("<script>location.href = 'http://localhost/php-order_notes_editor/lines.php?order=$order';</script>");
    }
}

// $conn->close();
?>

</body>
<br>
<br>
<br>
</html>
