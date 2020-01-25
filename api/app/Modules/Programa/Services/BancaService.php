<?php


namespace App\Modules\Programa\Services;


use App\Modules\Programa\Models\Banca as BancaModel;
use Core\Services\AApiResourceService;

class BancaService extends AApiResourceService
{
    public function __construct(BancaModel $model)
    {
        parent::__construct($model);
    }
}