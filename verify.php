<?php
session_start();
$link = $_SESSION['link'];
echo '<form action="'.$link.'" method = "post">
        <button type="submit">Click To Verify</button>
    </form>';
?>