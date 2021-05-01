<?php

session_start();

include 'config.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
$q1="SELECT I.issue_id, B.title, I.issue_date, I.return_date 
    FROM books B, issue I, readers R
    WHERE B.book_id=I.book_id
    AND I.user_id=R.user_id
    AND R.username='$_SESSION[username]'";
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
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issue_reader.php">Issue</a>
        </li>
        
      </ul>
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto" style="float:right;">
            
            <li class="nav-item">
               <a class="nav-link" href="logout.php">Logout</a>
            </li>
       </ul>
      </div>
    </div>
  </div>
</nav>


<div class="container mt-5">
<div class="card">
<div class="card-header">
 List of Books
</div>
<div class="card-body"> 
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Issue ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">Issue Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<form action='return.php?id=$row[issue_id]' method='POST'>";
        echo "<td>$row[issue_id]</td>";
        echo "<td>$row[title]</td>";
        echo "<td>$row[issue_date]</td>";
        echo "<td>$row[return_date]</td>";
        echo "<td><button class='btn btn-outline-dark'>Return</button></td></form>";
        echo "</tr>";


      }
    }
  

    ?>
    
  </tbody>
</table>
</div>
</div>
</div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>