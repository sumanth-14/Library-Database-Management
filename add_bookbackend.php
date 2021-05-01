<?php 
include 'config.php';
$isbn_num=$_POST['isbn_num'];
$title=$_POST['title'];
$author=$_POST['author'];
$branch_name=$_POST['branch_name'];
$branch_address=$_POST['branch_address'];
$publisher_name=$_POST['publisher_name'];
$publisher_address=$_POST['publisher_address'];
$q1="INSERT INTO library_branch(branch_name,branch_address) VALUES('$branch_name','$branch_address')";
mysqli_query($conn,$q1);
$q4="SELECT branch_id FROM library_branch WHERE branch_name='$branch_name'";
$result=mysqli_query($conn,$q4);
$row=$result->fetch_assoc();
$q2="INSERT INTO publisher(publisher_name,publisher_address) VALUES('$publisher_name','$publisher_address')";
mysqli_query($conn,$q2);
$q5="SELECT publisher_id FROM publisher WHERE publisher_name='$publisher_name'";
$result1=mysqli_query($conn,$q5);
$row1=$result1->fetch_assoc();
$q3="INSERT INTO books(isbn_num,title,author,branch_id,publisher_id) VALUES('$isbn_num','$title','$author','$row[branch_id]','$row1[publisher_id]')";
mysqli_query($conn,$q3);
header('location: add_books.php');

?>