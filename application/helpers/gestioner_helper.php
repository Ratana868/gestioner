<?php

function array2object($array) {
    if (is_array($array)) {
        $obj = new StdClass();

        foreach ($array as $key => $val) {
            $obj->$key = $val;
        }
    }
    else {
        $obj = $array;
    }

    return $obj;
}

function object2array($object) {
    if (is_array($object)) {
        foreach ($object as $o) {
            foreach ($o as $key => $value) {
                $array[$key] = $value;
            }
        }

    }
    elseif (is_object($object)) {
        foreach ($object as $key => $value) {
            $array[$key] = $value;
        }
    }
    else {
        $array = $object;
    }

    return $array;
}

function fecha_to_mysql($fecha, $format = false) {
    if ($format)
        return date($format, strtotime($fecha));

    $date = explode ("/", $fecha);

    return date("Y-m-d", strtotime($date[2] . "-" . $date[1] . "-" . $date[0]));
}

function getLangByCode($code) {
    switch ($code) {
        case "en":
            return "english";
            break;
        case "es":
            return "spanish";
            break;
    }
}

function get_rol($rol = null)
{
    switch((int)$rol) {
        case 1:
            return 'Administrador';
            break;
        case 2:
            return "";
            break;
        case 3:
            return "";
            break;
    }
}

function get_mes($mes = null)
{
    switch((int)$mes) {
        case 1:
            return 'Enero';
            break;
        case 2:
            return "Febrero";
            break;
        case 3:
            return "Marzo";
            break;
        case 4:
            return "Abril";
            break;
        case 5:
            return "Mayo";
            break;
        case 6:
            return "Junio";
            break;
        case 7:
            return "Julio";
            break;
        case 8:
            return "Agosto";
            break;
        case 9:
            return "Septiembre";
            break;
        case 10:
            return "Octubre";
            break;
        case 11:
            return "Noviembre";
            break;
        case 12:
            return "Diciembre";
            break;
    }
}

function search_object_array($needle_key, $needle_val, $haystack)
{
    // iterate through our haystack
    for ( $i = 0; $i < count($haystack); $i++ )
    {
            // ensure this array element is an object and has a key that matches our needle's key
            if ( is_object($haystack[$i]) and property_exists($haystack[$i], $needle_key) )
            {
                    // determine if comparison is case sensitive
                    if ( strtolower($needle_val) == strtolower($haystack[$i]->$needle_key) ) return true;
            }
    }

    // no match found
    return false;
}

function normalize($texto)
{
    $texto = trim($texto);
    $texto = utf8_decode($texto);

    $_a = utf8_decode("Á|À|ã|â|à|á");
    $_e = utf8_decode("É|È|é|è");
    $_i = utf8_decode("Í|Ì|í|ì");
    $_o = utf8_decode("Ó|Ò|ó|ò");
    $_u = utf8_decode("Ú|Ù|ú|ù");
    $_n = utf8_decode("Ñ|ñ");
    $_c = utf8_decode("Ç|ç");
    $_b = utf8_decode("ß");
    $_dash = "\|.|,|_";
    $_space = " ";

    $texto = preg_replace("/$_a/", "a", $texto);
    $texto = preg_replace("/$_e/", "e", $texto);
    $texto = preg_replace("/$_i/", "i", $texto);
    $texto = preg_replace("/$_o/", "o", $texto);
    $texto = preg_replace("/$_u/", "u", $texto);
    $texto = preg_replace("/$_n/", "n", $texto);
    $texto = preg_replace("/$_c/", "c", $texto);
    $texto = preg_replace("/$_b/", "ss", $texto);

    $texto = preg_replace("/$_dash/", "", $texto);
    $texto = preg_replace("/$_space/", "-", $texto);
    $texto = preg_replace("/^a-zA-Z0-9\-/", "", $texto);

    $texto = utf8_encode($texto);
    return strtolower($texto);
}

function var_die($var = null)
{
    var_dump($var);
    die();
}

function elim_archi()
{
    
}

?>