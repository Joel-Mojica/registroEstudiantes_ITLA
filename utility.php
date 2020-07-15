<?php

//Creo lista de carreras que se puede seleccionar
$carreras = [1 =>"Redes",2 =>"Software",3 =>"Multimedia",4 =>"Mecatronica",5 =>"Seguridad Informatica"];

//Aqui uso su mismo metodo de incremento, trate de hacerlo de otra forma y no pude
function getLastElement($list){
    $countList = count($list);
    $lastElement = $list[$countList - 1];
    return $lastElement;
}

//obtener propiedad del id array
function getCompanyName($carreraId){
    return $GLOBALS['carreras'][$carreraId];
}

//Funcion para el get metodo usado por el profesor(no lo entendi mucho)
function searchProperty($list,$property,$value){
    $filter = [];

    foreach($list as $item){
        if($item[$property]== $value){
            array_push($filter,$item);
        }
    }
    return $filter;
}

function getIndexElement($list,$property,$value){
    $index = 0;

    foreach($list as $key => $item){
        if($item[$property]== $value){
            $index = $key;
        }
    }
    return $index;
}

?>