<?php
//CAPTCHA Matching code
session_start();
if ($_SESSION['captcha']['code'] == $_POST["captcha"]) {
echo "Form Submitted successfully....!";
} else {
die("Wrong TEXT Entered");
}
?>