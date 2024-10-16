<?php
$randomNum = rand(10, 99);
session_start();
$_SESSION = array();
$_SESSION['randamNum'] = $randomNum;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="process.php" method="POST" class="form-container">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" ><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="pass" id="password" placeholder="Password" ><br><br>
        
        
        <label>Captcha(<?php echo $randomNum;?>)</label>
        <input type="text" name="captcha">
        <button type="submit" name="form" value="login">Login</button>
    </form>

    <form action="signup.html" method="get" class="form-container">
        <button type="submit">Signup</button>
    </form>
</body>
</html>