<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function convertEnglishDigitToBengali($input = '')
{
    $bn_digits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    $output = str_replace(range(0, 9), $bn_digits, $input);

    return $output;
}


function randString($length = 5)
{
    $str = '';
    $cha = "0123456789abcdefghijklmnopqrstuvwxyz";
    for ($x = 0; $x < $length; $x++) {
        $str .= $cha[mt_rand(0, strlen($cha))];
    }
    return $str;
}

