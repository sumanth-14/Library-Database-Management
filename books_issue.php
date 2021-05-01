<?php

session_start();

include 'config.php';
$uname=$_SESSION['username'];
$id=$_GET['id'];
$q2= "SELECT user_id FROM readers WHERE username='$uname'";
$uid=mysqli_query($conn,$q2);
$row=mysqli_fetch_array($uid);
$return_date  = mktime(0, 0, 0, date("m")  , date("d")+14, date("Y"));
$q1= "INSERT INTO issue (book_id,user_id,return_date) VALUES ('$id','$row[user_id]','')";
mysqli_query($conn,$q1);


header("location: books.php");



?>

<td><input type="date" id="menu-field" name="date" form="orderform'.$rown.'" value="'.$date.'" readonly /></td>