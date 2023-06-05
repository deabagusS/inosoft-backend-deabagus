<?php

declare(strict_types=1);

if (!function_exists('generateNoMesin')) {
    function generateNoMesin(int $length): string
    {
        $str = '1234567890ABCDE';
        return substr(str_shuffle($str), 0, $length);
    }
}