<?php

namespace Core\Services;

use App\Modules\Arquivo\Models\Fase as FaseModel;
use Illuminate\Database\Eloquent\Model;

abstract class AApiService implements IService
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel() : ?Model
    {
        return $this->model;
    }

    public function getUrlDiretorio($co_fase_arquivo, $co_tipo_arquivo)
    {
        $fase = FaseModel::find($co_fase_arquivo);
        $tipoArquivo = $fase->tiposArquivos()->find($co_tipo_arquivo);
        return date('Y') . "/$fase->no_fase_arquivo/$tipoArquivo->no_tipo_arquivo";
    }
}
