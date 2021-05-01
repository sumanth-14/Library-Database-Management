<?php

include 'config.php';
$iid= $_GET['id'];
$q1="CALL returnbook('$iid')";
mysqli_query($conn,$q1);
header('location: issue.php');



?>