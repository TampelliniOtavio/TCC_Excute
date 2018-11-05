<?php
$getdate = getdate();
$inicio = 1994;
$excute;

$mes = $getdate['mon'];
$ano = $getdate['year'];
$excute = 2*($ano - $inicio);


if($mes <=6){
    $excute--;
}
?>