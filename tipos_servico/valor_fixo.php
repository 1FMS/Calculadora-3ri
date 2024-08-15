<?php
    include("BD/bd.php");

    //prenotação

    $codigo_prenotacao;
    $nome_prenotacao;
    $valor_prenotacao;

    //arquivamento

    $codigo_arquivamento;
    $nome_arquivamento;
    $valor_arquivamento;

    //conferencia

    $codigo_conferencia;
    $nome_conferencia;
    $valor_conferencia;

    //certidao

    $codigo_certidao;
    $nome_certidao;
    $valor_certidao;

    //comunicação

    $codigo_comunicacao;
    $nome_comunicacao;
    $valor_comunicacao;

    //abertura de matricula

    $codigo_matricula;
    $nome_matricula;
    $valor_matricula;

    //Sem valor declarado

    $codigo_semvalor;
    $nome_semvalor;
    $valor_semvalor;

    //Busca
    $codigo_busca;
    $nome_busca;
    $valor_busca;

    //Certidao(1 folha)
    $codigo_certidaounica;
    $nome_certidaounica;
    $valor_certidaounica;


    //Querry
    $sql_code_dados_averb_can = "SELECT * FROM servico_valor_fixo";
    $sql_exec_dados_averb_can = $mysqli->query($sql_code_dados_averb_can);

    while( $dados_valor_fixo = $sql_exec_dados_averb_can->fetch_assoc()){
        $nome_servico = $dados_valor_fixo['nome_servico_fixo'];
        if($nome_servico == 'Prenotação'){

            $codigo_prenotacao = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_prenotacao = $dados_valor_fixo['nome_servico_fixo'];
            $valor_prenotacao = $dados_valor_fixo['total_fixo'];

        }
        elseif($nome_servico == 'Arquivamento'){

            $codigo_arquivamento = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_arquivamento = $dados_valor_fixo['nome_servico_fixo'];
            $valor_arquivamento = $dados_valor_fixo['total_fixo'];

        }
        elseif($nome_servico == 'Conferência'){

            $codigo_conferencia = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_conferencia = $dados_valor_fixo['nome_servico_fixo'];
            $valor_conferencia = $dados_valor_fixo['total_fixo'];

        }
        elseif($nome_servico == 'Certidão'){

            $codigo_certidao = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_certidao = $dados_valor_fixo['nome_servico_fixo'];
            $valor_certidao = $dados_valor_fixo['total_fixo'];

        }
        elseif($nome_servico== 'Comunicação'){
            $codigo_comunicacao = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_comunicacao = $dados_valor_fixo['nome_servico_fixo'];
            $valor_comunicacao = $dados_valor_fixo['total_fixo'];
        }
        elseif($nome_servico== 'Abertura de matrícula'){
            $codigo_matricula = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_matricula = $dados_valor_fixo['nome_servico_fixo'];
            $valor_matricula = $dados_valor_fixo['total_fixo'];
        }
        elseif($nome_servico == 'Sem valor declarado'){
            $codigo_semvalor = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_semvalor = $dados_valor_fixo['nome_servico_fixo'];
            $valor_semvalor = $dados_valor_fixo['total_fixo'];
        }
        elseif($nome_servico == 'Busca(Até 5 anos)'){
            $codigo_busca = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_busca = $dados_valor_fixo['nome_servico_fixo'];
            $valor_busca = $dados_valor_fixo['total_fixo'];
        }
        elseif($nome_servico == 'Certidão(1 folha)'){
            $codigo_certidaounica = $dados_valor_fixo['codigo_servico_fixo'];
            $nome_certidaounica = $dados_valor_fixo['nome_servico_fixo'];
            $valor_certidaounica = $dados_valor_fixo['total_fixo'];
        }

        
    }
