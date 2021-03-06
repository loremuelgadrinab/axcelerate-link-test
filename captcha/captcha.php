<?php
// Create the image
$im = imagecreatetruecolor(120, 30);

// Create some colors
$white = imagecolorallocate($im, 206, 206, 206);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$text = $_GET['captcha_code'];
// Replace path by your own font path
$font = 'fonts/times_new_yorker.ttf';

// Add some shadow to the text
imagettftext($im, 20, -5, 11, 21, $grey, $font, $text);

// Add the text
imagettftext($im, 20, -5, 10, 20, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
?>