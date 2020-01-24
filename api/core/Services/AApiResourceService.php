<?php

namespace Core\Services;

use Core\Database\Eloquent\AModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

abstract class AApiResourceService extends AApiService implements IServiceApiResource
{

    public function obterUm($identificador): ?Model
    {
        return $this->getModel()->find($identificador);
    }

    public function obterTodos(): ?Collection
    {
        return $this->getModel()->get();
    }

    public function cadastrar($dados): ?Model
    {
        if (is_object($dados) && $dados instanceof Request) {
            $dados = $dados->post();
        }

        return $this->getModel()->create($dados);
    }

    public function atualizar(Request $request, Model $modelo): ?Model
    {
        $modelo->existOrFail();
        $modelo->fill($request->post());
        $modelo->save();
        return $modelo;
    }

    public function remover(Request $request, Model $modelo)
    {
        $modelo->existOrFail();
        $modelo->delete();
        return $modelo;
    }

    /**
     * @param Collection | BelongsToMany $modelo
     * @return \Illuminate\Database\Eloquent\Collection|Collection
     */
    public function removerColecao($modelo)
    {
        try {

            $colecao = new Collection();

            if ($modelo instanceof BelongsToMany) {
                $colecao = $modelo->get();
                $modelo->detach();
            } else if ($modelo instanceof Collection) {
                $colecao = $modelo;
            }

            return $colecao->each(function (Model $modelo){
                $modelo->delete();
            });
        } catch (QueryException $queryException) {
            throw $queryException;
        }

    }
}
