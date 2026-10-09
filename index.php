<?php
    //ARGUMENTOS DE ENTRADA
    $day    = 1;   // DIA DO MES GET(DATE).DAY
    $month  = 10;
    $year   = 2026;

    //FT Folga ou Trabalho
    $dia_FT     = $_GET['dia_FT'];
    $tipo       = $_GET['tipo'];
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
    
    if ( $dia_FT > 2 && $tipo == "F" ) {
        echo "Erro - Folga não pode ser maior que 2 dias";
        return;
    }

    if ( $dia_FT > 4 && $tipo == "T" ) {
        echo "Erro - Trabalho não pode ser maior que 4 dias";
        return;
    }
   
    while ( $day < $ultimo_dia_do_mes[$month] ) { 
        
        if (  $dia_FT > 0 && $dia_FT < 3 && $tipo == "F" ) {
            echo "Dia - $day de $mes[$month] , Folga : $dia_FT <br>";
            $dia_FT++;                                               
            $day++;
            if ( $dia_FT > 2 ) {
                $dia_FT = 1;
                $tipo   = "T";
            }            
        } else if ( $dia_FT > 0 && $dia_FT < 5 && $tipo == "T") {
            echo "Dia - $day de $mes[$month] , Trabalho : $dia_FT <br>";
            $dia_FT++;
            $day++;
            if ( $dia_FT > 4 ) {
                $dia_FT = 1;
                $tipo   = "F";            
            }
        }
    }
