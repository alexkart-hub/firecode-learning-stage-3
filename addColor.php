<?php
require_once 'application/autoload.php';

$color = $_POST['color'];
if ($color) {
    Color::Add($color, $db);
}
header("Location: admin");
