<?php

/**
 * pb_debug
 *
 * @param  mixed $debug
 * @return mixed
 */
function pb_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

/**
 * pb_version
 *
 * @return string
 */
function pb_version()
{
    // $version = '1.0.1';
    $version = rand(0, 9999);

    // generate random version
    return $version;
}

/**
 * pb_format_money
 *
 * @param  mixed $number
 * @return string
 */
function pb_format_money($number, $decimal = 0)
{
    if (!is_numeric($number)) {
        $number = str_replace('.', '', $number);
        $number = str_replace(',', '.', $number);
    }
    $number = floatval($number);
    return number_format($number, $decimal, ',', '.');
}

/**
 * pb_format_number
 *
 * @param  string $number
 * @return float
 */
function pb_format_number($number)
{
    $number = str_replace('.', '', $number);
    $number = str_replace(',', '.', $number);
    $number = floatval($number);
    return $number;
}

/**
 * pb_slugify
 *
 * @param  string $text
 * @param  string $divider
 * @return string
 */
function pb_slugify($text, string $divider = '-')
{
    // Mapeamento de caracteres acentuados comuns em português
    $acentos = array(
        'à',
        'á',
        'â',
        'ã',
        'ä',
        'å',
        'ç',
        'è',
        'é',
        'ê',
        'ë',
        'ì',
        'í',
        'î',
        'ï',
        'ñ',
        'ò',
        'ó',
        'ô',
        'õ',
        'ö',
        'ù',
        'ü',
        'ú',
        'ÿ',
        'À',
        'Á',
        'Â',
        'Ã',
        'Ä',
        'Å',
        'Ç',
        'È',
        'É',
        'Ê',
        'Ë',
        'Ì',
        'Í',
        'Î',
        'Ï',
        'Ñ',
        'Ò',
        'Ó',
        'Ô',
        'Õ',
        'Ö',
        'Ù',
        'Ü',
        'Ú',
        'Ÿ',
        'ä',
        'ö',
        'ü',
        'ß',
        'Ä',
        'Ö',
        'Ü'
    );

    $semAcentos = array(
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'c',
        'e',
        'e',
        'e',
        'e',
        'i',
        'i',
        'i',
        'i',
        'n',
        'o',
        'o',
        'o',
        'o',
        'o',
        'u',
        'u',
        'u',
        'y',
        'A',
        'A',
        'A',
        'A',
        'A',
        'A',
        'C',
        'E',
        'E',
        'E',
        'E',
        'I',
        'I',
        'I',
        'I',
        'N',
        'O',
        'O',
        'O',
        'O',
        'O',
        'U',
        'U',
        'U',
        'Y',
        'ae',
        'oe',
        'ue',
        'ss',
        'Ae',
        'Oe',
        'Ue'
    );

    $text = strtolower($text); // Converte para minúsculas
    $text = str_replace($acentos, $semAcentos, $text); // Remove acentos

    // Substitui caracteres não alfanuméricos e espaços por hífen
    $text = preg_replace('~[^\\pL\\pN]+~u', $divider, $text);
    $text = trim($text, $divider); // Remove hífens extras no início/fim
    $text = preg_replace('~-+~', $divider, $text); // Remove hífens duplicados

    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}
