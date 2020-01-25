<?php

namespace App\Modules\Programa\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Programa\Http\Resources\AssuntoResource;
use App\Modules\Programa\Services\AssuntoService;
use Core\Http\Controllers\AApiResourceController;
use Illuminate\Http\Response;

class AssuntoController extends AApiResourceController
{
    public function __construct(AssuntoService $service)
    {
        parent::__construct($service);
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse(
            AssuntoResource::collection($this->getService()->obterTodos()),
            __('responses.success.index'),
            Response::HTTP_OK
        );
    }
}
