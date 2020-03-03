<?php
require_once 'application/autoload.php';
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $data[$key] = $value;
    }
    Db::SetSetting($data);
}
header("Location: admin");
