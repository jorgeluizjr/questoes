<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function sendResponse($data = [], $message = '', $status = Response::HTTP_OK)
    {
        $responseDefault = [
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($responseDefault, $status);
    }

    public function getService()
    {
        return $this->service;
    }
}
