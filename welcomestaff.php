<?php

session_start();

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
            <li><a class="dropdown-item" href="add_books.php">Add books</a></li>
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
<h2><?php echo "Welcome ". $_SESSION['username']?>!!</h2>
<hr>

</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

   

<div class="container mt-5">
<div class="card">
<div class="card-header">
 List of Books
</div>
<div class="card-body"> 
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book Name</th>
      <th scope="col">Author</th>
      
      <th scope="col">Branch</th>
      
    </tr>
  </thead>
  <tbody>
   <?php
           require('config.php');
 

$all="SELECT * FROM books ";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
    
    echo "<td>".$row['book_id']."</td>";
    echo "<td>".$row['title']."</td>";
    echo "<td>".$row['author']."</td>";
    echo "<td>".$row['branch_id']."</td>";
    
    
    
    

    echo "</tr><br>";
    }
} else {
    echo "0 results";
}


 
  
?>
      
  
    
  </tbody>
</table>
</div>
</div>
</div>



  </body>
</html>