<button class='btn btn-success' href='book.php?id=$row[book_id]'>Issue</button>



      $all="SELECT user_id FROM readers WHERE username = ? ";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
      echo "<form action='books_issue.php?id=$row[user_id]' method='POST'>";



a)	To build a system that can receive input and generate automatically output in easy way and short time.

b)	To build a monitoring system that is able to monitor and manage all library operations efficiently.

c)	Give an opportunity to librarians to reduce mistakes that always happen during manual method.

d)	To store properly the library items in order to maintain their security.

e)	



We are aiming to get a library system which is efficient for Users to use borrow books and for librarian to add and delete Books and keep track of which person has borrowed which book.

