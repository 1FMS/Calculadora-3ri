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

<main>
<img src="assets/logo-calculadora-nome.svg" alt="" srcset="" id="logo">
    <h1>CALCULADORA DE EMOLUMENTOS</h1>
    <h2>Cancelamento de Ônus</h2>
    <div class="form-area">
        <p class="text-servico">Selecione o tipo de Ônus:</p>
        <form action="" method="post">
            <label for="alienacao"><div class="bt-type-radio">
                <p class="text-type-radio">Alienação Fiduciária</p><input type="checkbox" name="alienacao" id="alienacao">
            </div></label>
            <label for="cedula"><div class="bt-type-radio"> 
                <p class="text-type-radio">Cédula de Crédito Imobiliário</p><input type="checkbox" name="cedula" id="cedula">
            </div></label>
            <label for="hipoteca"><div class="bt-type-radio">
                <p class="text-type-radio">Hipoteca</p><input type="checkbox" name="hipoteca" id="hipoteca">
            </div></label>
            <label for="penhora"><div class="bt-type-radio">
                <p class="text-type-radio">Penhora</p><input type="checkbox" name="penhora" id="penhora">
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
            <table id="tabela">
                <tr>
                    <th class="start-table" id="primeiro-table">Código</th>
                    <th class="start-table">Ato</th>
                    <th class="start-table" id="ultimo-table">Valor</th>
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
    
</main>
</html>