<?php
    include("tipos_servico/valor_fixo.php");


    $custo_total = 0;

    $multiplicador_arquivamento;
    $multiplicador_conferencia;
    $valor_arquivamento_final;
    $valor_conferencia_final;

    //Casamento
    $nome_casamento = "Averbação de casamento";
    $codigo_casamento = $codigo_semvalor;
    $valor_casamento = $valor_semvalor;
    //União Estável
    $nome_uniao = "Averbação de União Estável";
    $codigo_uniao = $codigo_semvalor;
    $valor_uniao = $valor_semvalor;
    //Óbito
    $nome_obito = "Averbação de Óbito";
    $codigo_obito = $codigo_semvalor;
    $valor_obito = $valor_semvalor;
    //Divorcio sem partilha
    $nome_divorcio = "Averbação de Divórcio";
    $codigo_divorcio = $codigo_semvalor;
    $valor_divorcio = $valor_semvalor;
?>

<main>
<img src="assets/logo-calculadora-nome.svg" alt="" srcset="" id="logo">
    <h1>CALCULADORA DE EMOLUMENTOS</h1>
    <h2>Averbações</h2>
    <div class="form-area">
        <p class="text-servico">Escolha o tipo de Averbação:</p>
        <form action="" method="post">
            <label for="casamento"><div class="bt-type-radio">
                 <p class="text-type-radio">Averbação de casamento</p><input type="checkbox" name="casamento" id="casamento">
            </div></label>
            <label for="uniao"><div class="bt-type-radio">
                <p class="text-type-radio">Averbação de União Estável</p><input type="checkbox" name="uniao" id="uniao">
            </div></label>
            <label for="obito"><div class="bt-type-radio">
                <p class="text-type-radio"> Averbação de Óbito</p><input type="checkbox" name="obito" id="obito">
            </div></label>
            <label for="divorcio"><div class="bt-type-radio">
                <p class="text-type-radio">Averbação de Divórcio</p><input type="checkbox" name="divorcio" id="divorcio">
            </div></label>
           

            <p class="texto-input-value">Possui matrícula aberta no 3º Registro?</p>
                <input type="hidden" name="abertura_matricula">
                <label for="abertura_matricula_sim"><div class="bt-type-radio">
                    <p class="text-type-radio">Sim</p><input type="radio" name="abertura_matricula" id="abertura_matricula_sim" value="sim">
                </div></label>
                <label for="abertura_matricula_nao"><div class="bt-type-radio">
                    <p class="text-type-radio">Não</p><input type="radio" name="abertura_matricula" id="abertura_matricula_nao" value="nao">
                </div></label>

                <div class="bt-final-area">

                    <label for="voltar"><button class="bt-final"><a id="voltar" href="principal.php" style="text-decoration: none; color: white;">Voltar</a></button></label>

                    <label for="calcular"><button type="submit" name="calcular" class="bt-final" id="calcular">Calcular</button></label>

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
            if(isset($_POST['casamento'])){
                $custo_total += $valor_casamento;
            }
            if(isset($_POST['uniao'])){
                $custo_total += $valor_uniao;
            }
            if(isset($_POST['obito'])){
                $custo_total += $valor_obito;
            }
            if(isset($_POST['divorcio'])){
                $custo_total += $valor_divorcio;
            }
            if($custo_total==0){
    ?>
                <p>Selecione algum serviço</p>
    <?php
                die();
            }

            if($_POST['abertura_matricula'] == "sim"){
                $multiplicador_arquivamento = 2;
                $multiplicador_conferencia = 2;

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_arquivamento_final;
                $custo_total += $valor_conferencia_final;
                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;
            }elseif($_POST['abertura_matricula'] == "nao"){
                $multiplicador_arquivamento = 4;
                $multiplicador_conferencia = 4;

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_arquivamento_final;
                $custo_total += $valor_conferencia_final;
                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;

                $custo_total += $valor_matricula;
                $custo_total += $valor_semvalor;//encerramento
                $custo_total += $valor_comunicacao;
                $custo_total += $valor_prenotacao;//prenotação 1ºri
            }
    ?>
        <table id="tabela">
                <tr>
                    <th class="start-table" id="primeiro-table">Código</th>
                    <th class="start-table">Ato</th>
                    <th class="start-table" id="ultimo-table">Valor</th>
                </tr>
    <?php
            if(isset($_POST['casamento'])){
    ?>
                <tr>
                    <td><?php echo $codigo_casamento ?></td>
                    <td><?php echo $nome_casamento ?></td>
                    <td><?php echo "R$ ".$valor_casamento = number_format($valor_casamento, 2, ',', '.')  ?></td>
                </tr>
    <?php
            }
    ?>
    <?php
            if(isset($_POST['uniao'])){
    ?>
                <tr>
                    <td><?php echo $codigo_uniao ?></td>
                    <td><?php echo $nome_uniao ?></td>
                    <td><?php echo "R$ ".$valor_uniao = number_format($valor_uniao, 2, ',', '.')  ?></td>
                </tr>
    <?php
            }
    ?>
    <?php
            if(isset($_POST['obito'])){
    ?>
                <tr>
                    <td><?php echo $codigo_obito ?></td>
                    <td><?php echo $nome_obito ?></td>
                    <td><?php echo "R$ ".$valor_obito = number_format($valor_obito, 2, ',', '.')?></td>
                </tr>
    <?php
            }
    ?>
    <?php
            if(isset($_POST['divorcio'])){
    ?>
                <tr>
                    <td><?php echo $codigo_divorcio ?></td>
                    <td><?php echo $nome_divorcio ?></td>
                    <td><?php echo "R$ ".$valor_divorcio = number_format($valor_divorcio, 2, ',', '.')?></td>
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
            </tr>

    <?php
        if($_POST['abertura_matricula'] == 'nao'){
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
        <tr>
                <th class="end-table" id="inicio-result">
                    Emolumentos Totais
                </th>
                <th class="end-table"></th>  
                <th class="end-table" id="fim-result">
                    <?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.') ?>
                </th>
            </tr>
        </table>
    <?php
        }
    ?>
</ma>
</html>