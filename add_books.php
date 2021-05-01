<?php

session_start();
include 'config.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: loginstaff.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Library</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">City Central Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcomestaff.php">Home</a>
        </li>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Books
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Add books</a></li>
            <li><a class="dropdown-item" href="manage_books.php">Manage books</a></li>
          </ul>
        </li>
      </ul>
    </div>
        <li class="nav-item">
          <a class="nav-link" href="issue.php">Issue</a>
        </li>
        
      </ul>
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto" style="float:right;">
            
            <li class="nav-item">
               <a class="nav-link" href="logoutstaff.php">Logout</a>
            </li>
       </ul>
      </div>
    </div>
  </div>
</nav>


<div class="container mt-5">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="card">
<div class="card-header">
  Book Info
</div>
<div class="card-body">
    <form action="add_bookbackend.php" method="POST">

    <div class="row mb-3">
        <label for="isbn" class="col-sm-2 col-form-label">ISBN number</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="isbn_num" name="isbn_num" >
        </div>
    </div>
   
    <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label">title</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="author" class="col-sm-2 col-form-label">Author</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="author" name="author" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="branch" class="col-sm-2 col-form-label">Branch</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="branch_name" name="branch_name" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="branchaddress" class="col-sm-2 col-form-label">Branch Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="branch_address" name="branch_address" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="publisher_name" name="publisher_name" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="publisheraddress" class="col-sm-2 col-form-label">Publisher Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="publisher_address" name="publisher_address" >
        </div>
    </div>
    <button type="submit" name="ad_book" id= "ad_book" class="btn btn-primary">Add Book</button>
    </form>
</div>
</div>
</div>
</div>
</div>
<?php
 
if(isset($_POST['ad_book']))
{  
 
   $isbn_num = $_POST['isbn_num'];
   $title = $_POST['title'];
   $author = $_POST['author'];
   $branch_id = $_POST['branch_id'];
   $sql = "INSERT INTO books (isbn_num,title,author,branch_id)
   VALUES ('$isbn_num','$title','$author','$branch_id')";
   if (mysqli_query($conn, $sql)) {
    echo "New record created successfully !";
   } else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
   }
   mysqli_close($conn);
}
?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
    
  </body>



</html>


