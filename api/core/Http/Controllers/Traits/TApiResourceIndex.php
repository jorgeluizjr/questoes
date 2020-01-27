<?php

namespace Core\Http\Controllers\Traits;

use Illuminate\Http\Response;

trait TApiResourceIndex
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse(
            $this->service->obterTodos(),
            __('responses.success.index'),
            Response::HTTP_OK
        );
    }
}
