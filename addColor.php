<?php
require_once 'application/autoload.php';

$color = $_POST['color'];
Db::AddColor($color);

header("Location: admin");