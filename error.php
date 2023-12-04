 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Error</title>
<link rel="icon" 
		type="image/png" 
		href="favicon.ico">
<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
<script type="text/javascript" language="JavaScript">
     
function returnToAccess()
           
{

    window.location = 'access.php'

}

</script>
<style>

body{
 margin:0px;
 }
 
 table{
 
	border: 3px solid #000000;
 
 }

input[type=text], select {
 width: 100%;
 border-radius: 5px;
 margin: 7px 0;
 border: 1px solid #ccc;
 padding: 14px 18px; 
 display: inline-block;
 box-sizing: border-box;
}

input[type=submit]:hover {
 background-color: #C0C0C0;
}

textarea, select {
 width: 100%;
 border-radius: 5px;
 margin: 7px 0;
 border: 1px solid #ccc;
 padding: 14px 18px; 
 display: inline-block;
 box-sizing: border-box;
 resize: none;
}

input[type=submit] {
 width: 100%;
 border: none;
 color: white;
 padding: 14px 20px;
 background-color: #000000;
 margin: 8px 0;
 cursor: pointer;
 border-radius: 4px;
 
 
}

button
{
  width:200px; 
  height:50px; 
  border: 0;
  background-size: 100%; /* To fill the dimensions of container (button), or */
  background-size: 200px auto; /* to specify dimensions explicitly */
}

</style>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="text-align:center;">
<img src="./images/logo.png" height="200" width="200" align="center" />
<h3 align="center" style="color:red"><b>An Error has occured. Please return to the Access Page.</b></h3>
<div style="text-align:center;">
<br>
<button input type="submit" onClick="returnToAccess();"><img src="ReturnBtn.png"></button>
</div>
</body>
</html>