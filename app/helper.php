<?php

function greetings($name = 'Shahin')
{
    return "Hello {$name}";
}

function sendSuccessResponse($result, $message, $code = 200)
{
    $response = [
        'success' => true,
        'code' => $code,
        'message' => $message,
        'data' => $result,
    ];


    return response()->json($response, $code);
}


function sendErrorResponse($error, $errorMessages = [], $code = 404)
{
    $response = [
        'success' => false,
        'code' => $code,
        'message' => $error,
    ];

    if (!empty($errorMessages)) {
        $response['data'] = $errorMessages;
    }
    return response()->json($response, $code);
}
