<?php

function getStateArray()
{
    $states = [
        ''   => '',
        'AC' => 'AC',
        'AL' => 'AL',
        'AM' => 'AM',
        'AP' => 'AP',
        'BA' => 'BA',
        'CE' => 'CE',
        'DF' => 'DF',
        'ES' => 'ES',
        'GO' => 'GO',
        'MA' => 'MA',
        'MG' => 'MG',
        'MS' => 'MS',
        'MT' => 'MT',
        'PA' => 'PA',
        'PB' => 'PB',
        'PE' => 'PE',
        'PI' => 'PI',
        'PR' => 'PR',
        'RJ' => 'RJ',
        'RN' => 'RN',
        'RO' => 'RO',
        'RR' => 'RR',
        'RS' => 'RS',
        'SC' => 'SC',
        'SE' => 'SE',
        'SP' => 'SP',
        'TO' => 'TO',
    ];
    return $states;
}

function formatTelefone($telefone = ""){
    $tel = preg_replace("/[^0-9]/", "", $telefone);

    if(strlen($tel) <= 9){
        return $tel;
    }else if(strlen($tel) <= 11){
        $ddd = substr($tel, 0, 2);
        $telefone2 = substr($tel, 2);

        return "(" . $ddd . ") " . $telefone2;
    }
    return $telefone;
}

function formatCpf($cpf = ""){
    if ($cpf == null || $cpf == "") return $cpf;

    $cpf = preg_replace("/[^0-9]/", "", $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    return substr($cpf, 0, 3) . "." .
        substr($cpf, 3, 3) . "." .
        substr($cpf, 6, 3) . "-" .
        substr($cpf, 9);
}

function formatDate($data = ""){
    if ($data == null || $data == "") return $data;

    if(strlen($data) == 10) {

        return substr($data, 8, 2) . "/" .
                substr($data, 5, 2) . "/" .
                substr($data, 0, 4);
    }

    return substr($data, 8, 2) . "/" .
        substr($data, 5, 2) . "/" .
        substr($data, 0, 4) . " " .
        substr($data, 11);
}

function verDate(){
    $dt = \Carbon\Carbon::now();
    $mes = "";
    switch ($dt->format("m")){
        case "01" : $mes = "Janeiro"; break;
        case "02" : $mes = "Fevereiro"; break;
        case "03" : $mes = "Março"; break;
        case "04" : $mes = "Abril"; break;
        case "05" : $mes = "Maio"; break;
        case "06" : $mes = "Junho"; break;
        case "07" : $mes = "Julho"; break;
        case "08" : $mes = "Agosto"; break;
        case "09" : $mes = "Setembro"; break;
        case "10" : $mes = "Outubro"; break;
        case "11" : $mes = "Novembro"; break;
        case "12" : $mes = "Dezembro"; break;
    }
    return $dt->format("d") . " de " . $mes . " de " . $dt->format("Y");
}

function format($value, $decimals = 2, $real = true){
    return (($real)?"R$ " : "") . number_format($value, $decimals,",","");
}


function getNumberOnly($value){
  $value = preg_replace('/[^0-9.]/', '', $value);
  return $value;
}

function getRotaTitle($index = ""){
    $elemento = [
        'admin' => 'Admin',
        'documento_exigido' => 'Documentos Exigidos',
        'fases' => 'Fases do Processo',
        'objeto' => 'Objeto do Processo',
        'perfil' => 'Perfil',
        'tag' => 'Tipos de Tags',
        'tipo_documento' => 'Tipos de Documentos',
        'tipo_pericia' => 'Tipos de Perícia',
        'usuario' => 'Usuário',
        'processo' => 'Processo',
    ];

    return isset($elemento[$index])?$elemento[$index]:"";
}

function checkRole($rota = ""){
    $user = auth()->user();
    if($user == null)
        return false;

    $rotaPerfil = session('rotas', []);
    return in_array($rota, $rotaPerfil);
}
