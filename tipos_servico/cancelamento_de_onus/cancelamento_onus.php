<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

    $multiplicador_arquivamento;
    $multiplicador_conferencia;
    $valor_arquivamento_final;
    $valor_conferencia_final;

    //Alienação
    $nome_alienacao = "Alienação Fiduciária";
    $codigo_alienacao = $codigo_semvalor;
    $valor_alienacao = $valor_semvalor;
    //Cédula
    $nome_cedula = "Cédula de Crédito Imobiliário";
    $codigo_cedula = $codigo_semvalor;
    $valor_cedula = $valor_semvalor;
    //Hipoteca
    $nome_hipoteca = "Hipoteca";
    $codigo_hipoteca = $codigo_semvalor;
    $valor_hipoteca = $valor_semvalor;
    //Usufruto
    $nome_usufruto = "Usufruto";
    $codigo_usufruto = $codigo_semvalor;
    $valor_usufruto = $valor_semvalor;
    //Penhora
    $nome_penhora = "Penhora";
    $codigo_penhora = $codigo_semvalor;
    $valor_penhora = $valor_semvalor;
    //Indisponibilidade
    $nome_indisponibilidade = "Indisponibilidade";
    $codigo_indisponibilidade = $codigo_semvalor;
    $valor_indisponibilidade = $valor_semvalor;


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora de Emolumentos</title>

    <style>
        body{
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;

            margin: 20px;

            background-color: #f5f5f5;
        }
        #logo {
            width: 360px;
            height: auto;
        }
        h1{
            color: #8A997A;
            text-align: center;
        }
        .form-area{

            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;

            margin-bottom: 10px;

            background-color: white;
            padding: 15px;
            border: 2px solid #314b33;
            border-radius: 5px;
        }
        .bt-servico{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: center;

            width: auto;
            height: 40px;
            margin-bottom: 10px;
            padding: 10px;

            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
        #text-servico{
            color: #8A997A;
            font-size: larger;
        }
        .text-servico{
            color: #8A997A;
            
        }
        .bt-input-radio{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: center;

            width: auto;
            height: 40px;
            margin-bottom: 10px;
            padding: 10px;

            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
        input{
            transform: scale(1.5);
            border: 2px solid red;
        }
        button{
            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
        .bt-final{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
        }
        table{
            border: 2px solid black;
            border-collapse: collapse
        }
        table, td, th{
            border: 2px solid #314b33;
        }
        td,th{
            padding: 4px;
        }
    </style>
</head>
<body>
    <img src="assets/LOGO_3RI 1_layerstyle.svg" alt="" srcset="" id="logo">
    <h1>Cancelamento de Ônus</h1>
    <div class="form-area">
        <p id="text-servico">Escolha o tipo de Ônus:</p>
        <form action="" method="post">
            <div class="bt-servico">
                <p>Alienação Fiduciária</p><input type="checkbox" name="alienacao">
            </div>
            <div class="bt-servico">
                <p>Cédula de Crédito Imobiliário</p><input type="checkbox" name="cedula">
            </div>
            <div class="bt-servico">
                <p>Hipoteca</p><input type="checkbox" name="hipoteca">
            </div>
            <div class="bt-servico">
                <p>Penhora</p><input type="checkbox" name="penhora">
            </div>
            
            
            
            
            

            <p class="text-servico">Possui matrícula aberta no 3º Registro?</p>
                <input type="hidden" name="abertura_matricula">
                <div class="bt-input-radio">
                    <p>Sim</p><input type="radio" name="abertura_matricula" id="" value="sim">
                </div>
                <div class="bt-input-radio">
                    <p>Não</p><input type="radio" name="abertura_matricula" id="" value="nao">
                </div>

                <div class="bt-final">
                    <button type="submit" name="calcular">Calcular</button>
                    <button><a href="principal.php" style="text-decoration: none; color: white;">Voltar</a></button>
                </div>

        </form>
    </div>
    

    <?php
        if(isset($_POST['calcular'])){

            if($_POST['abertura_matricula'] == ""){
    ?>
                <p>Selecione se você possui matrícula</p>
    <?php 
                die(); 
            }
    ?>

    <?php
            if(isset($_POST['alienacao'])){
                $custo_total += $valor_alienacao;
            }
            if(isset($_POST['cedula'])){
                $custo_total += $valor_cedula;
            }
            if(isset($_POST['hipoteca'])){
                $custo_total += $valor_hipoteca;
            }
            if(isset($_POST['penhora'])){
                $custo_total += $valor_penhora;
            }
            if($custo_total==0){
    ?>
                <p>Selecione algum serviço</p>
    <?php
                die();
            }

            if($_POST['abertura_matricula'] == 'sim' || $_POST['abertura_matricula'] == ''){
                $multiplicador_arquivamento = 4;
                $multiplicador_conferencia = 4;

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_arquivamento_final;
                $custo_total += $valor_conferencia_final;
                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;

            }elseif($_POST['abertura_matricula'] == 'nao'){
                $multiplicador_arquivamento = 2;
                $multiplicador_conferencia = 2;

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_arquivamento_final;
                $custo_total += $valor_conferencia_final;
                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;

                $custo_total += $valor_prenotacao;
                $custo_total += $valor_matricula;
                $custo_total += $valor_comunicacao;
                $custo_total += $valor_semvalor;//encerramento
                $custo_total += $valor_semvalor;
            }


    ?>
            <table>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Valor</th>
                </tr>
    <?php
            if(isset($_POST['alienacao'])){
    ?>
                <tr>
                    <td><?php echo $codigo_alienacao ?></td>
                    <td><?php echo $nome_alienacao ?></td>
                    <td><?php echo "R$ ".$valor_alienacao = number_format($valor_alienacao, 2, ',', '.') ?></td>
                </tr>
    <?php
            }    
    ?>
    <?php
            if(isset($_POST['cedula'])){
    ?>
                <tr>
                    <td><?php echo $codigo_cedula ?></td>
                    <td><?php echo $nome_cedula ?></td>
                    <td><?php echo "R$ ".$valor_cedula = number_format($valor_cedula, 2, ',', '.') ?></td>
                </tr>
    <?php
            }    
    ?>
    <?php
            if(isset($_POST['penhora'])){
    ?>
                <tr>
                    <td><?php echo $codigo_penhora ?></td>
                    <td><?php echo $nome_penhora ?></td>
                    <td><?php echo "R$ ".$valor_penhora = number_format($valor_penhora, 2, ',', '.') ?></td>
                </tr>
    <?php
            }    
    ?>
    
    <?php
            if(isset($_POST['hipoteca'])){
    ?>
                <tr>
                    <td><?php echo $codigo_hipoteca ?></td>
                    <td><?php echo $nome_hipoteca ?></td>
                    <td><?php echo "R$ ".$valor_hipoteca = number_format($valor_hipoteca, 2, ',', '.') ?></td>
                </tr>
    <?php
            }    
    ?>

                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao?></td>
                    <td><?php echo "R$ ".$valor_prenotacao = number_format($valor_prenotacao, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_arquivamento?></td>
                    <td><?php echo $nome_arquivamento . " ($multiplicador_arquivamento x)"?></td>
                    <td><?php echo "R$ ".$valor_arquivamento_final = number_format($valor_arquivamento_final, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_conferencia?></td>
                    <td><?php echo $nome_conferencia . " ($multiplicador_conferencia x) "?></td>
                    <td><?php echo "R$ ".$valor_conferencia_final = number_format($valor_conferencia_final, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_certidao?></td>
                    <td><?php echo $nome_certidao?></td>
                    <td><?php echo "R$ ".$valor_certidao = number_format($valor_certidao, 2, ',', '.')?></td>
                </tr>
            
    <?php
            if($_POST['abertura_matricula']=='nao'){
    ?>
                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao. '(1º Registro de Imóveis)'?></td>
                    <td><?php echo "R$ ".$valor_prenotacao?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_matricula?></td>
                    <td><?php echo $nome_matricula. "(3º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_matricula = number_format($valor_matricula, 2, ',', '.')?></td>
                </tr>
            
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo " Encerramento de matrícula (1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_semvalor = number_format($valor_semvalor, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo " Transporte de ônus (1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_semvalor?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_arquivamento?></td>
                    <td><?php echo $nome_arquivamento . "(1º Registro de Imóveis)"?></td>
                    <td ><?php echo "R$ ".$valor_arquivamento = number_format($valor_arquivamento, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_comunicacao?></td>
                    <td><?php echo $nome_comunicacao. "(1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_comunicacao = number_format($valor_comunicacao, 2, ',', '.')?></td>
                </tr>
    
    
           

    
    <?php
            }
    ?>
                <tr style=" background-color: #314b33; color:white">
                    <th>Emolumentos Totais</th>
                
                
                    <th></th>
                
                
                    <th><?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.')?></th>
                </tr>
            </table>
    <?php  
        }
    ?>
    
</body>
</html>