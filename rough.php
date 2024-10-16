<?php
$to = "rajnishkumargupta3@gmail.com";
$subject = "Your Subject";
$message = "Your Message Body";
$headers = "From: rajnishkumargupta331@gmail.com";
if (mail($to, $subject, $message, $headers)) {
    echo "Mail Send successfully";
} else {
    echo "Fail to send mail";
}
