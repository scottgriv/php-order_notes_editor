 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Notes - Header</title>
<link rel="icon" 
		type="image/png" 
		href="favicon.ico">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
<script>

function refresh(){
    // SHOW overlay
    $('#overlay').show();
    // Retrieve data:
    $.ajax({
    url: 'http://localhost/php-order_notes_editor/header.php?order=' + order,
    context: document.body,
    success: function(s,x){
        $(this).html(s);
		$('#overlay').hide();
    }
});

return false;
}

/*
function refresh()
           
{
//    url: "http://localhost/webapps/OrderNotes/header.php?order="<?php echo $order ?>"",
	$('#overlay').show();
    window.location = 'http://localhost/webapps/OrderNotes/header.php?order=<?php echo $order; ?>';
	//window.location = 'http://localhost/webapps/OrderNotes/error.php';
	return false;
}
*/

$(document).ready(function(){
    // Create overlay and append to body:
    $('<div id="overlay"/>').css({
        position: 'absolute',
        top: 0,
        left: 0,
        width: '100%',
        height: $(window).height() + 'px',
        opacity:0.4, 
        background: 'lightgray url(loading.gif) no-repeat center'

    }).hide().appendTo('table');
});

</script>
<style>

body{
 margin:0px;
 }
 
 table.mainTable{
 
	border: 3px solid #000000;
	width: 600px;
	vertical-align: middle;
 
 }


table.subTable tr.hoverRow:hover {
      background: #C0C0C0 !important;
   }

table.subTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  color: #000000;
}

table.subTable td, table.subTable th {
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  padding: 3px;
}

table.subTable thead {
  background-color: #000000;
}

label.info {
    display: block;
    text-align: center;
    line-height: 150%;
    font-size: .85em;
}

.segmented-control {
    display: table;
    width: 100%;
    margin: 1em 0;
    padding: 0;
}

.segmented-control__item_1 {
    display: table-cell;
	width: 200px;
    margin: 0;
    padding: 0;
    list-style-type: none;
}

.segmented-control__item_2 {
    display: table-cell;
	width: 200px;
    margin: 0;
    padding: 0;
    list-style-type: none;
	background-color:#000000;

}

.segmented-control__input {
    position: absolute;
    visibility: hidden;
}

.segmented-control__label {
    display: block;
    margin: 0 -1px -1px 0; /* -1px margin removes double-thickness borders between items */
    padding: 1em .25em;

    border: 1px solid #ddd;


    font: 14px; 
    text-align: center;  

    cursor: pointer;
}

.segmented-control__input:checked + .segmented-control__label {
    background: #eee;
    color: #333; 
}

/* unvisited link */
a:link {
    color: green;
}

/* visited link */
a:visited {
    color: green;
}

/* mouse over link */
a:hover {
    color: red;
}

/* selected link */
a:active {
    color: yellow;
}



</style>
</head>
<?php 

if(isset($_GET["order"]) && $_GET["order"] != '') {

	$order = $_GET['order'];
	echo("<script>var order = $order;</script>");
	
} else {

	echo("<script>location.href = 'http://localhost/php-order_notes_editor/error.php';</script>");

}
		
?>
<br>
<br>
<br>
<body>
<form action="" method="post">
<table class="mainTable" bgcolor="#f2f2f2" style="padding:10px" align="center">
<tr>
<td>
<label class="info">Lines for Order: <b><?php echo $order ?></b></label>
<label class="info"><i>Select a Product to view the Line Notes</i></label>
</td>
</tr>
<td colspan="2">
<ul class="segmented-control">
    <li class="segmented-control__item_1">
        <input class="segmented-control__input" type="submit" name="submit" value="header" id="option-1" onClick="return goToHeader()">
        <label class="segmented-control__label" for="option-1">Header</label>
    </li>
    <li class="segmented-control__item_2">
        <input class="segmented-control__input" type="submit" name="submit" value="lines" id="option-2" disabled>
        <label class="segmented-control__label" for="option-2">Lines</label>
    </li>
</ul>
</td>
<tr>
<td>
        <table class="subTable" align="center">
        <thead>
            <tr>
                <td><b><center><font color="white">Line</font></center></b></td>
                <td><b><center><font color="white">Product</font></center></b></td>
            </tr>
        </thead>
        <tbody>

        <?php 
include 'dbconfig.php';
if(isset($_GET["order"])) {
    $order = $_GET['order'];

    if ($order != '') {
        $order = $conn->real_escape_string($order);
        $query = "SELECT COUNT(*) AS COUNT FROM Order_Lines WHERE Line_Order_ID = '$order'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $query2 = "SELECT Line_Status, Line_Line, Line_Product FROM Order_Lines WHERE Line_Order_ID = '$order'";
            $results = $conn->query($query2);

            if ($results) {
                while($row = $results->fetch_assoc()) {
					?>
					<tr class="hoverRow">
						<td><?php echo $row['Line_Line']?></td>
						<td><?php echo $row['Line_Product']?></td>
					</tr>

				<?php                }
            } else {
				echo("<script>location.href = 'http://localhost/php-order_notes_editor/error.php';</script>");
            }
        } else {
            echo("<script>location.href = 'http://localhost/php-order_notes_editor/error.php';</script>");
        }
    }
    // $conn->close();
}
?>
</tbody>
</table>
</td>
</tr>
</form>
</table>
</table>
<?php
//include 'header.php';

if(isset($_POST["submit"])) {

$value = $_POST['submit'];

if($value == "header") {
	//header("Location: http://localhost/webapps/OrderNotes/lines.php?order=".$order."");
	//exit;
	
	//echo("<script>    
	//location.href = 'http://localhost/webapps/OrderNotes/header.php?order=$order';
	//</script>");
	
}

}

?>
</body>
<br>
<br>
<br>
</html>
