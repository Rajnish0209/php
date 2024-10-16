<?php
$email = $_GET['email'];
$emailhash = $_GET['emailhash'];
$conn = new mysqli("localhost", "electron", "Rr@9415252192", "class") or die(mysqli_error($conn));
$query = "update student set status = 1 where email= '$email' and emailhash = '$emailhash'";
$result = mysqli_query($conn, $query);
echo '<h3>Email Verification Successfull</h3>
<button><a href="login.html">Click hear to login</a></button>'
?>
