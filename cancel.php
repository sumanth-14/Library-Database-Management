<?php 
include 'config.php';
$id= $_GET['id'];
$q1="DELETE 
      FROM books 
      WHERE book_id='$id'";
mysqli_query($conn,$q1);
$q3="delete from library_branch where branch_id="." select branch_id from books where book_id='$id'";
mysqli_query($conn,$q3);
$q4="delete from publisher where publisher_id="." select publisher_id from books where book_id='$id'";
mysqli_query($conn,$q4);

header('location: manage_books.php');


?>