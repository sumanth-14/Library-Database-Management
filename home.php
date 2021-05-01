<?php 

include 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>City Central Library</title>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style type="text/css">
		body
		{
			max-width:700px;
	        width:80%;
	        margin:250px auto;
	        border:15px solid #FAFAF4;
	        padding:20px;
			background-color: #0F100F;
			color: #BEC1A5;

		}
		h1{
			text-align: center;
	        font-family: 'Bebas Neue', cursive;
	        text-decoration: underline;
	        color: #DEF23D;

		}
		p{
	
	       font-family: 'Source Sans Pro', sans-serif;

         }
         a{
         	text-decoration: none;
         	color: white;
         }
	</style>
</head>
<body>
	<h1>CITY CENTRAL LIBRARY</h1>
	<hr>
	<div class="container-fluid">

       <div class="d-grid gap-2 col-6 mx-auto">
		  <button class="btn btn-success" type="button"><a href="login.php">Reader</a></button>
		  
		  <button class="btn btn-success" type="button" ><a href="loginstaff.php">Staff</a></button>
		</div>
    </div>
</body>
</html>