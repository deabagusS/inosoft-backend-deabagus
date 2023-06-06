<?php

if (!function_exists('generateNoMesin')) {
    function generateNoMesin(int $length): string
    {
        $str = '1234567890ABCDE';
        return substr(str_shuffle($str), 0, $length);
    }
}

if (!function_exists('setFilterInput')) {
    function setFilterInput(array $filter, array $input): array
    {
        foreach ($input as $key => $value) {
            if (! in_array($key, $filter))
                unset($input[$key]);
        }
        
        return $input;
    }
}

if (!function_exists('setResponse')) {
    function setResponse(bool $success, string $message, array $data = []): array
    {
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        
        if ($success === true){
            if (!empty($data)) 
                $response['data'] = $data;
        } else {
            if (!empty($data)) 
                $response['error'] = $data;
        }
        
        return $response;
    }
}

if (!function_exists('setResponseDataList')) {
    function setResponseDataList(array $data, string $listName): array
    {
        $success = (count($data[$listName]) < 1) ? false : true;
        $message = (count($data[$listName]) < 1) ? 'Data tidak ditemukan' : '';
        $data = (count($data[$listName]) < 1) ? [] : $data;

        return setResponse($success, $message, $data);
    }
}

if (!function_exists('getCodeResponse')) {
    function getCodeResponse(bool $success, string $type): int
    {
        if ($type == 'get') {
            if ($success === true) 
                return 200;
            else 
                return 400;
        } elseif ($type == 'post') {
            if ($success === true) 
                return 201;
            else 
                return 400;
        }
    }
}