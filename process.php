<?php
session_start();
if (isset($_POST["form"])) {
    $form = $_POST["form"];

    if ($form == "login") {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $captcha = $_POST['captcha'];

        if($_POST['captcha'] == $_SESSION['randamNum']){
            $conn = new mysqli("localhost", "electron", "Rr@9415252192", "class") or die(mysqli_error($conn));
            $query = "Select * from student where email = '$email'";

            $result = mysqli_query($conn, $query);

            $rows = mysqli_num_rows($result);

            if ($rows > 0) {
            } else {
                echo "User not Found.<br>";
            }

            $hash = sha1($pass);

            $query = "Select * from student where email = '$email' and password = '$hash'";
            $result = mysqli_query($conn, $query);

            $rows = mysqli_num_rows($result);
            if ($rows > 0) {
                $data = mysqli_fetch_assoc($result);
                $id = $data['id'];
                $status = $data['status'];
                if ($status != 0) {
                    // session_start();
                    // $_SESSION = array();
                    // $_SESSION['id'] = $id;
                    header("Location: profile.php?id=" . $id);
                    // session_destroy();
                } else {
                    echo "Email not verify";
                }

            } else {
                echo "Password incorrect.<br>";
            }
        }
        else{
            echo "captcha not matched";
        }
        

    }

    if ($form == "signup") {
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $confPass = $_POST["confPass"];
        if ($pass == $confPass) {
            $time = time();
            $passhash = sha1($pass);
            $emailhash = sha1($email);
            $conn = new mysqli("localhost", "electron", "Rr@9415252192", "class") or die(mysqli_error($conn));
            $query = "insert into student(fName,lName,email,password,time,emailhash) values('$fName','$lName','$email','$passhash','$time','$emailhash')";
            $result = mysqli_query($conn, $query);
            $link = 'emailverify.php?email=' . $email . '&emailhash=' . $emailhash;
            session_start();
            $_SESSION = array();
            $_SESSION['link'] = $link;
            header("Location: verify.php");
            session_destory();
        } else {
            echo '<h3>Password was not match</h3>
            <form action="signup.html">
            <button type= "submit">Go to signup page</button>
            </form>';
            // header("Location: signup.html");
        }

    }
}
?>