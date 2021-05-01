<?php

session_start();

include 'config.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: loginstaff.php");
}
$id=$_GET['id'];
$q1="SELECT B.book_id,B.title,B.author,B.isbn_num,L.branch_name,L.branch_address,P.publisher_name,P.publisher_address
      FROM books B, library_branch L, publisher P
      WHERE B.branch_id=L.branch_id
      AND B.publisher_id=P.publisher_id
      AND B.book_id='$id'";
$result=mysqli_query($conn,$q1);


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
  <?php 
  if($result->num_rows>0){
    while($row=$result->fetch_array()){



  
  ?>
    <form action="update_book.php?id=<?php echo $row['book_id']?>" method="POST">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Book Name</label>
        <div class="col-sm-10">
        <input type="text"  class="form-control" name="title" value="<?php echo $row['title'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Author</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="author" value="<?php echo $row['author'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPasswor3" class="col-sm-2 col-form-label">ISBN No.</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="isbn_num" value="<?php echo $row['isbn_num'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPasswo3" class="col-sm-2 col-form-label">Branch </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="branch_name" value="<?php echo $row['branch_name'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPasswrd3" class="col-sm-2 col-form-label">Branch Address </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="branch_address" value="<?php echo $row['branch_address'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPasword3" class="col-sm-2 col-form-label">Publisher </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="publisher_name" value="<?php echo $row['publisher_name'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inpuPassword3" class="col-sm-2 col-form-label">Publisher Address </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="publisher_address" value="<?php echo $row['publisher_address'] ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    <?php 
    }
  }
    ?>
</div>
</div>
</div>
</div>
</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>