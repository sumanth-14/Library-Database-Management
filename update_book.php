<?php 
include 'config.php';
$id=$_GET['id'];
$isbn_num=$_POST['isbn_num'];
$title=$_POST['title'];
$author=$_POST['author'];
$branch_name=$_POST['branch_name'];
$branch_address=$_POST['branch_address'];
$publisher_name=$_POST['publisher_name'];
$publisher_address=$_POST['publisher_address'];
$q2="UPDATE library_branch L, books B, publisher P SET  B.title='$title' , B.author='$author', B.isbn_num='$isbn_num', L.branch_name='$branch_name', L.branch_address='$branch_address', P.publisher_name='$publisher_name', P.publisher_address='$publisher_address' WHERE B.branch_id=L.branch_id AND B.publisher_id=P.publisher_id AND B.book_id='$id'";
mysqli_query($conn,$q2);
header('location: manage_books.php');




?>