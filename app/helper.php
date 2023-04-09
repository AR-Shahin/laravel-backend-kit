<?php


use Illuminate\Support\Facades\DB;

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


function userRolePermissions($roleId)
{
    return DB::table('permission_role')
    ->where('role_id',$roleId)
    ->get();
}

function checkAdminCanSee() :bool
{
    return \Laratrust::hasRole(auth()->user()->roles[0]->id);
}


function deleteAndEditButton($edit,$delete)
{
    return "
    <a href='{$edit}}' class='btn btn-sm btn-info'><i class='fa fa-edit'></i></a>
    <a href='{$delete}' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>
    ";
}
