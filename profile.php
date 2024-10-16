<?php
// session_start();
$id = $_GET['id'];
$conn = new mysqli("localhost", "electron", "Rr@9415252192", "class");
$query = "Select * from student where id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1>
    <table border=2>
        <tr>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <tr>
            <td><?php echo "$data[fName] $data[lName]" ?></td>
            <td><?php echo "$data[email]" ?></td>
        </tr>
    </table>
</body>
</html>

