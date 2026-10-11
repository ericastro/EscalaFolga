<?php

    header('Content-Type: application/json; charset=utf-8');

    //ARGUMENTOS DE ENTRADA
    $day    = 1;   // DIA DO MES GET(DATE).DAY
    $month  = 10;
    $year   = 2026;

    $DFT = explode("_", $_POST['dia_escala']);

    //FT Folga ou Trabalho

    $dayFT  = $DFT[0]; // Inicializa com o valor padrão
    $type   = $DFT[1]; // Inicializa com o valor padrão
 
    /*
    $semana     = $_GET['semana'] OR " ";
    $mes        = $_GET['mes'] OR " ";
    $bissexto   = $_GET['bissexto'] OR " ";
    */    

    //DADOS FIXOS
    //DIAS DA SEMANA
    $semana_dias[1] = "Domingo";
    $semana_dias[2] = "Segunda";
    $semana_dias[3] = "Terça";
    $semana_dias[4] = "Quarta";
    $semana_dias[5] = "Quinta";
    $semana_dias[6] = "Sexta";
    $semana_dias[7] = "Sábado";    

    //MESES DO ANOS
    $mes[1]     = "Janeiro";
    $mes[2]     = "Fevereiro";
    $mes[3]     = "Março";
    $mes[4]     = "Abril";
    $mes[5]     = "Maio";
    $mes[6]     = "Junho";
    $mes[7]     = "Julho";
    $mes[8]     = "Agosto";
    $mes[9]     = "Setembro";
    $mes[10]    = "Outubro";
    $mes[11]    = "Novembro";
    $mes[12]    = "Dezembro";

    //QTD DE DIA DOS MESES
    $ultimo_dia_do_mes[1]   = 31;
    $ultimo_dia_do_mes[2]   = 28;
    $ultimo_dia_do_mes[3]   = 31;
    $ultimo_dia_do_mes[4]   = 30;
    $ultimo_dia_do_mes[5]   = 30;
    $ultimo_dia_do_mes[6]   = 30;
    $ultimo_dia_do_mes[7]   = 31;
    $ultimo_dia_do_mes[8]   = 31;
    $ultimo_dia_do_mes[9]   = 30;
    $ultimo_dia_do_mes[10]  = 31;
    $ultimo_dia_do_mes[11]  = 30;
    $ultimo_dia_do_mes[12]  = 31;

    //VALIDAÇÕES DE PARAMETROS DE ENTRADA "REDUNDANTES"
    if ( $dayFT > 2 && $type == "F" ) {
        echo "Erro - Folga não pode ser maior que 2 dias";
        return;
    }

    if ( $dayFT > 4 && $type == "T" ) {
        echo "Erro - Trabalho não pode ser maior que 4 dias";
        return;
    }


    $indice = 0;
    $dados = array();

    while ( $day < $ultimo_dia_do_mes[$month] ) { 

        if (  $dayFT > 0 && $dayFT < 3 && $type == "F" ) {
            $dados[$indice] = array(
                "day" => $day,
                "month" => $mes[$month],
                "type" => "F",
                "year" => $year,
                "dayFT" => $dayFT
            );           
            $dayFT++;                                               
            $day++;
            if ( $dayFT > 2 ) {
                $dayFT = 1;
                $type   = "T";
            }            
        } else if ( $dayFT > 0 && $dayFT < 5 && $type == "T") {
            $dados[$indice] = array(
                "day" => $day,
                "month" => $mes[$month],
                "type" => "T",
                "year" => $year,
                "dayFT" => $dayFT
            );
            $dayFT++;
            $day++;
            if ( $dayFT > 4 ) {
                $dayFT = 1;
                $type   = "F";            
            }
        }

        $indice++;
    }

    echo json_encode($dados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
?>