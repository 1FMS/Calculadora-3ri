<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

    $multiplicador_arquivamento;
    $multiplicador_conferencia;

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
</head>
<body>
    <h1>Cancelamento de Ônus</h1>
    <p>Escolha o tipo de Ônus:</p>
    <form action="" method="post">
        <p>Alienação Fiduciária<input type="radio" name="alienacao"></p>
        <p>Cédula de Crédito Imobiliário<input type="radio" name="cedula"></p>
        <p>Hipoteca<input type="radio" name="hipoteca"></p>
        <p>Usufruto<input type="radio" name="usufruto"></p>
        <p>Penhora<input type="radio" name="penhora"></p>
        <p>Indisponibidade<input type="radio" name="indisponibilidade"></p>

        <p>Possui matrícula aberta no 3° Registro?</p>
        <input type="hidden" name="abertura_matricula">
        <p>Sim<input type="radio" name="abertura_matricula" id="" value="sim"></p>
        <p>Não<input type="radio" name="abertura_matricula" id="" value="nao"></p>

        <button type="submit" name="calcular">Calcular</button>
        <button><a href="principal.php" style="text-decoration: none; color: black;">Voltar</a></button>

    </form>

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
            if(isset($_POST['usufruto'])){
                $custo_total += $valor_usufruto;
            }
            if(isset($_POST['indisponibilidade'])){
                $custo_total += $valor_indisponibilidade;
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

                $custo_total += $valor_arquivamento*$multiplicador_arquivamento;
                $custo_total += $valor_conferencia*$multiplicador_conferencia;
                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;

            }elseif($_POST['abertura_matricula'] == 'nao'){
                $multiplicador_arquivamento = 2;
                $multiplicador_conferencia = 2;

                $custo_total += $valor_arquivamento*$multiplicador_arquivamento;
                $custo_total += $valor_conferencia*$multiplicador_conferencia;
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
                    <td><?php echo "R$ ".$valor_alienacao ?></td>
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
                    <td><?php echo "R$ ".$valor_cedula ?></td>
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
                    <td><?php echo "R$ ".$valor_penhora ?></td>
                </tr>
    <?php
            }    
    ?>
    <?php
            if(isset($_POST['usufruto'])){
    ?>
                <tr>
                    <td><?php echo $codigo_usufruto ?></td>
                    <td><?php echo $nome_usufruto ?></td>
                    <td><?php echo "R$ ".$valor_usufruto ?></td>
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
                    <td><?php echo "R$ ".$valor_hipoteca ?></td>
                </tr>
    <?php
            }    
    ?>
    <?php
            if(isset($_POST['indisponibilidade'])){
    ?>
                <tr>
                    <td><?php echo $codigo_indisponibilidade ?></td>
                    <td><?php echo $nome_indisponibilidade ?></td>
                    <td><?php echo "R$ ".$valor_indisponibilidade ?></td>
                </tr>
    <?php
            }    
    ?>


                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao?></td>
                    <td><?php echo "R$ ".$valor_prenotacao?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_arquivamento?></td>
                    <td><?php echo $nome_arquivamento . " ($multiplicador_arquivamento x)"?></td>
                    <td><?php echo "R$ ".($valor_arquivamento * $multiplicador_arquivamento)?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_conferencia?></td>
                    <td><?php echo $nome_conferencia . " ($multiplicador_conferencia x) "?></td>
                    <td><?php echo "R$ ".($valor_conferencia * $multiplicador_conferencia)?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_certidao?></td>
                    <td><?php echo $nome_certidao?></td>
                    <td><?php echo "R$ ".$valor_certidao?></td>
                </tr>
            
    <?php
            if($_POST['abertura_matricula']=='nao'){
    ?>
                <tr>
                    <td><?php echo $codigo_matricula?></td>
                    <td><?php echo $nome_matricula. "(3º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_matricula?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao. "(1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_prenotacao?></td>
                </tr>
            
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo " Encerramento de matrícula (1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_semvalor?></td> 
                </tr>

                <tr>
                    <td><?php echo $codigo_comunicacao?></td>
                    <td><?php echo $nome_comunicacao. "(1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_comunicacao?></td> 
                </tr>
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo "Transporte de Ônus"?></td>
                    <td><?php echo "R$ ".$valor_semvalor?></td> 
                </tr>
    
    
           

    
    <?php
            }
    ?>
                <tr>
                    <th>Emolumentos Totais</th>
                
                
                    <th></th>
                
                
                    <th><?php echo "R$ ".$custo_total ?></th>
                </tr>
            </table>
    <?php  
        }
    ?>
    
</body>
</html>