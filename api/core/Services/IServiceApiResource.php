<?php

namespace Core\Services;

use Core\Database\Eloquent\AModel as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface IServiceApiResource extends IService
{
    public function cadastrar($dados): ?Model;

    public function obterUm($identificador): ?Model;

    public function obterTodos(): ?Collection;

    public function atualizar(Request $request, Model $modelo): ?Model;

    public function remover(Request $request, Model $modelo);

}
