<?php

if (!function_exists('generateNoMesin')) {
    function generateNoMesin(int $length): string
    {
        $str = '1234567890ABCDE';
        return substr(str_shuffle($str), 0, $length);
    }
}

if (!function_exists('setResponse')) {
    function setResponse(bool $success, string $message, array $data = [])
    {
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        
        if ($success === true){
            if (!empty($data)) 
                $response['data'] = $data;
        } else {
            $response['error'] = $data;
        }
        
        return $response;
    }
}

if (!function_exists('setResponseDataList')) {
    function setResponseDataList(array $data, string $listName)
    {
        $success = (count($data[$listName]) < 1) ? false : true;
        $message = (count($data[$listName]) < 1) ? 'Data tidak ditemukan' : '';
        $data = (count($data[$listName]) < 1) ? [] : $data;

        return setResponse($success, $message, $data);
        // return [
        //     'success' => $success,
        //     'message' => $message,
        //     'data' => $data,
        // ];
    }
}