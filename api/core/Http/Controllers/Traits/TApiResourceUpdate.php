<?php

namespace Core\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait TApiResourceUpdate
{
    public function update(Request $request, $identificador)
    {
        return $this->sendResponse(
            $this->service->atualizar($request, $identificador),
            __('responses.success.update'),
            Response::HTTP_OK
        );
    }
}
