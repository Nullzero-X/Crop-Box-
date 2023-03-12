<?php
//session_start();
$_SESSION['count'] = time();
$image;
$flag = 5;
$resultado = "";

if (isset($_POST['flag'])) {
    $input = $_POST['input'];
    $flag = $_POST['flag'];
}

if ($flag == 1) {

    if ($input == $_SESSION['captcha_string']) {
        $resultado = "Respuesta correcta";
    } else {
        $resultado = "Respuesta incorrecta";
        create_image();
    }
} else {
    create_image();
}

echo $_SESSION['captcha_string'];

function create_image()
{

    global $image;
    $image = imagecreatetruecolor(250, 60) or die("No se puede inicializar la libreria GD");

    $backgroundcolor = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 255, 255);
    $line_color = imagecolorallocate($image, 64, 64, 64);
    $pixel_color = imagecolorallocate($image, 0, 0, 255);

    imagefilledrectangle($image, 0, 0, 250, 60, $backgroundcolor);

    for ($i = 0; $i < 3; $i++) {
        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
    }
    for ($i = 0; $i < 1000; $i++) {
        imagesetpixel($image, rand() % 200, rand(), $pixel_color);
    }

    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    $len = strlen($letters);
    $letter = $letters[rand(0, $len - 1)];

    $text_color = imagecolorallocate($image, 0, 0, 0);
    $word = '';

    for ($i = 0; $i < 6; $i++) {
        $letter = $letters[rand(0, $len - 1)];
        imagestring($image, 7, 5 + ($i * 30), 20, $letter, $text_color);
        $word .= $letter;

        $_SESSION['captcha_string'] = $word;

        $images = glob("*.png");
        foreach ($images as $image_to_delete) {
            @unlink($image_to_delete);
        }
        imagepng($image, "image" . $_SESSION['count'] . ".png");
    }
}


?>

