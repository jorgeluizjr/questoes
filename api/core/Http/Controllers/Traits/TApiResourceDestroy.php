<?php

namespace Core\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait TApiResourceDestroy
{
    public function destroy(Request $request, $identificador)
    {
        return $this->sendResponse(
            $this->service->remover($request, $identificador),
            __('responses.success.destroy'),
            Response::HTTP_NO_CONTENT
        );
    }
}
