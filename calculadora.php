<?php
$tipo_servico = $_GET['bt-servico'];

if($tipo_servico == "Abertura de matrícula"){
    require_once('tipos_servico/abertura_de_matricula/abertura_matricula.php');
}
if($tipo_servico == "Escritura de Compra e Venda - Simples"){
    require_once('tipos_servico/compra_e_venda_simples/compra_e_venda.php');
}
if($tipo_servico == "Escritura de Compra e Venda + Alienação"){
    require_once('tipos_servico/compra_e_venda_alienação/compra_e_venda_alienação.php');
}
if($tipo_servico == "Cancelamento de Ônus"){
    require_once('tipos_servico/cancelamento_de_onus/cancelamento_onus.php');
}
if($tipo_servico == "Averbações"){
    require_once('tipos_servico/averbacao_CUEOD/averbacao_cueod.php');
}
if($tipo_servico == "Doação - Simples"){
    require_once('tipos_servico/doacao_simples/doacao_simples.php');
}
if($tipo_servico == "Resgate de Aforamento"){
    require_once('tipos_servico/resgate_de_aforamento/resgate_aforamento.php');
}
if($tipo_servico == "Certidões"){
    require_once('tipos_servico/certidão/certidao.php');
}
if($tipo_servico == "Averbação de Construção"){
    require_once('tipos_servico/averbacao_de_construcao/averbacao_construcao.php');
}