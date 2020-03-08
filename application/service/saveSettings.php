<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/application/autoload.php';
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $data[$key] = $value;
    }
    Settings::Save($data, $db);
}
header("Location: admin");
