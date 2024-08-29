
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Calculadora de Emolumentos</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nova+Round&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Palanquin+Dark:wght@400;500;600;700&display=swap');
        @import url('https://fonts.cdnfonts.com/css/padauk');


        body{
            height: auto;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;
            align-content: center;
            justify-content: center;

            margin: 20px;
            padding-left: 20px;
            padding-right: 20px;
            

            background-color: #C0CEBB;
        }
        main{
            height: auto;
            width: auto;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            align-content: center;

            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 5%;
            padding-right: 5%;
            

            border-radius: 11px;
            background-color: white;

            box-shadow: -6px 4px 15px -4px rgba(0, 0, 0, 0.75);
            
        }
        .form-area{

            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;

            margin-bottom: 10px;

            background-color: #62715C;
            
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 30px;
            border: none;
            border-radius: 5px;

            box-shadow: -6px 4px 15px -4px rgba(0, 0, 0, 0.75);
        }
        #logo{
            width: 218px;
            height: auto;
        }
        h1{
            margin-top: 15px;
            margin-bottom: 10px;
            font-family: "Nova Round", system-ui;
            font-size: 22px;
            color: #62715C;
            text-align: center;

            text-shadow: -1px 1px 1px rgba(0,0,0,0.24);
        }
        h2{
            font-family: "Palanquin Dark", sans-serif;
            font-weight: 400;
            font-size: 26px;
            text-align: center;
            color: #304B32;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .text-servico{
            font-family: "Palanquin Dark", sans-serif;
            color: white;
            font-weight: 400;
            font-size: 23px;
            text-align: center;

            margin-top: 10px;
        }

        .bt-type-radio{
            background-color: white;

            border-radius: 3px;

            width: 30vh;
            height: auto;
            margin-bottom: 12px;
            padding-left: 10px;
            padding-right: 10px;

            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: nowrap;
            align-items: center;
        }
        .text-type-radio{
            font-family: "Palanquin Dark", sans-serif;
            color: #73806E;
            font-weight: 400;
            font-size: 18px;
            line-height: 32px;
        }
        .texto-input-value{
            font-family: "Palanquin Dark", sans-serif;
            color: white;
            font-weight: 400;
            font-size: 18px;
            line-height: 32px;
        }
        .area-input{
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: flex-start;
        }
        .input-value{
            background-color: white;

            border: none;
            border-radius: 3px;

            width: 30vh;
            height: 40px;
            margin-bottom: 12px;
            padding-left: 10px;
            padding-right: 10px;

            font-family: 'Padauk', sans-serif;
            color: #73806E;
            font-size: 20px;


        }
        .input-type-select{
            background-color: white;

            border: none;
            border-radius: 3px;

            width: 32vh;
            height: 40px;
            margin-bottom: 12px;
            padding-left: 10px;
            padding-right: 10px;

            font-family: "Palanquin Dark", sans-serif;
            color: #73806E;
            font-weight: 400;
            font-size: 18px;
            line-height: 32px;
        }
        .bt-final-area{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: nowrap;
        }
        .bt-final{
            width: 15vh;
            height: auto;
            background-color: #324533;

            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            border-radius: 3px;
            border: none;


            font-family: "Palanquin Dark", sans-serif;
            color: white;
            font-size: 20px;
            text-align: center;
            font-weight: 400;

            margin-right: 8px;
        }
       
        form{
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: normal;
        }
        table{
            font-family: sans-serif;
            border-collapse: collapse;
        }
        .start-table{
            background-color: #324533;
            color: white;

            
            font-size: 14px;
            font-weight: 700;
            text-align: left;

            padding: 10px;
            
        }
        .end-table{
            background-color: #324533; 
            color:white;

            font-size: 14px;
            font-weight: 700;
            text-align: left;

            padding: 10px;
        }
        td{
            border: 1px solid #828282;
            width: auto;
            padding: 5px;
        }
        #primeiro-table{
            border-radius: 5px 0px 0px 0px;
        }
        #ultimo-table{
            border-radius: 0px 5px 0px 0px;
        }
        #inicio-result{
            border-radius: 0px 0px 0px 5px;
        }
        #fim-result{
            border-radius: 0px 0px 5px 0px;
        }











    </style>
</head>
<body>
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

    ?>    
    <script>
        document.getElementById('calcular').addEventListener('click', function() {
                    // Salvar o hash na sessão antes de enviar o formulário
            sessionStorage.setItem('scrollToHash', '#tabela');
        });
            
        window.addEventListener('load', function() {
                    // Verificar se há um hash salvo e rolar para ele
        var hash = sessionStorage.getItem('scrollToHash');
        if (hash) {
            sessionStorage.removeItem('scrollToHash'); // Remover o hash da sessão
            window.location.hash = hash; // Rolar para a tabela
            }
        });
    </script>
</body>
</html>
