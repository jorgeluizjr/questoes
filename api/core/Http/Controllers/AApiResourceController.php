<?php

namespace Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Core\Services\IServiceApiResource;
use Core\Http\Controllers\Traits\TApiResourceIndex;
use Core\Http\Controllers\Traits\TApiResourceShow;
use Core\Http\Controllers\Traits\TApiResourceStore;

abstract class AApiResourceController extends Controller implements IApiResourceController
{
    use TApiResourceShow,
        TApiResourceIndex,
        TApiResourceStore;

    /**
     * @var IServiceApiResource
     */
    protected $service;

    public function __construct(IServiceApiResource $service)
    {
        $this->service = $service;
    }
}
