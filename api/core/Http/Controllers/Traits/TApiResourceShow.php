<?php

namespace Core\Http\Controllers\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

trait TApiResourceShow
{
    public function show(Model $model): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse(
            $model->toArray(),
            __('responses.success.show'),
            Response::HTTP_OK
        );
    }
}
