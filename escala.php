<?php

    header('Content-Type: application/json; charset=utf-8');

    //ARGUMENTOS DE ENTRADA
    $day    = 1;   // DIA DO MES GET(DATE).DAY
    $month  = 10;
    $year   = 2026;

    $DFT = explode("_", $_POST['dia_escala']);

    //FT Folga ou Trabalho
    $diaFT  = $DFT[0];
    $tipo   = $DFT[1];

    /*
    $semana     = $_GET['semana'] OR " ";
    $mes        = $_GET['mes'] OR " ";
    $bissexto   = $_GET['bissexto'] OR " ";
    */    

    //DADOS FIXOS
    //DIAS DA SEMANA
    $weekDay[1] = "Domingo";
    $weekDay[2] = "Segunda";
    $weekDay[3] = "Terça";
    $weekDay[4] = "Quarta";
    $weekDay[5] = "Quinta";
    $weekDay[6] = "Sexta";
    $weekDay[7] = "Sábado";    

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

    $dados = array(
        'weekDay' => $weekDay[$day],
        'mes' => "$mes[$month]",
        'ano' => $year,
        'diaFT' => $diaFT,
        'tipo' => $tipo
    );


    //VALIDAÇÕES DE PARAMETROS DE ENTRADA "REDUNDANTES"
    if ( $diaFT > 2 && $tipo == "F" ) {
        echo "Erro - Folga não pode ser maior que 2 dias";
        return;
    }

    if ( $diaFT > 4 && $tipo == "T" ) {
        echo "Erro - Trabalho não pode ser maior que 4 dias";
        return;
    }

    $indice = 0;

    while ( $day < $ultimo_dia_do_mes[$month] ) { 

        if (  $diaFT > 0 && $diaFT < 3 && $tipo == "F" ) {
            //echo "$day de $mes[$month] , $diaFT º dia de Folga <br>";
            $dados[$indice] = array(
                'day' => $day,
                'mes' => "$mes[$month]",
                'ano' => $year,
                'diaFT' => $diaFT,
                'tipo' => $tipo
            );
            $diaFT++;                                               
            $day++;
            if ( $diaFT > 2 ) {
                $diaFT = 1;
                $tipo   = "T";
            }            
        } else if ( $diaFT > 0 && $diaFT < 5 && $tipo == "T") {
            //echo "$day de $mes[$month] , $diaFT º dia de Trabalho <br>";
            $dados[$indice] = array(
                'day' => $day,
                'mes' => "$mes[$month]",
                'ano' => $year,
                'diaFT' => $diaFT,
                'tipo' => $tipo
            );
            $diaFT++;
            $day++;
            if ( $diaFT > 4 ) {
                $diaFT = 1;
                $tipo   = "F";            
            }
        }

    $indice++;

    }

    $dadosJSON = json_encode($dados, JSON_UNESCAPED_UNICODE);
    
?>