<?php
if(!session_id()) session_start();
$filename = 0;
if(!isset($_SESSION['filename'])) {
    $_SESSION['filename'] = $filename;
}

header('location:frontPage.php');

?>