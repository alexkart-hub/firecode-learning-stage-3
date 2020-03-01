<?php
require_once "application/autoload.php";

$id = $_POST['id'];
$value = $_POST['value'];
$data = Db::GetSetting();
$quantity_ceiling = $_POST['area']==0 ? 0 : $_POST['area'];
$quantity_lamp = $_POST['q_lamp']==0 ? 0 : $_POST['q_lamp'];
$quantity_chandelier = $_POST['q_chandelier']==0 ? 0 : $_POST['q_chandelier'];
$quantity_pipe = $_POST['q_pipe']==0 ? 0 : $_POST['q_pipe'];
$quantity_corner = $_POST['q_corner']==0 ? 0 : $_POST['q_corner'];
$factura = $_POST['factura']==1 ? $data['price_glossy_texture'] : $data['price_matte_texture'] ;

switch ($id) {
    case 'area': $quantity_ceiling = $value==0 ? 0 : $value; break;
    case 'q_lamp': $quantity_lamp = $value==0 ? 0 : $value; break;
    case 'q_chandelier': $quantity_chandelier = $value==0 ? 0 : $value; break;
    case 'q_pipe': $quantity_pipe = $value==0 ? 0 : $value; break;
    case 'q_corner': $quantity_corner = $value==0 ? 0 : $value; break;
}

$total_prise = ($data['price_ceiling'] * $quantity_ceiling * $factura)+($data['price_lamp'] * $quantity_lamp) + ($data['price_chandelier'] * $quantity_chandelier)+($data['price_pipe'] * $quantity_pipe)+($data['price_corner'] * $quantity_corner);
echo $total_prise.' рублей';