<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/application/autoload.php';

$color = $_POST['color'];
if ($color) {
    Color::Add($color, $db);
}
header("Location: admin");
