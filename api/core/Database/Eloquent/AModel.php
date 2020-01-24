<?php
namespace Core\Database\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use App\Exceptions\ValidacaoCustomizadaException;
use Illuminate\Support\Carbon;

abstract class AModel extends Model
{
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    public function existOrFail()
    {
        if (!$this->exists()) {
            throw new ValidacaoCustomizadaException(
                __('responses.validation.exist-or-fail'),
                Response::HTTP_NOT_ACCEPTABLE
            );
        }

        return true;
    }

    protected function castAttribute($key, $value)
    {
        switch ($this->getCastType($key)) {
            case 'datetime':
                return (new Carbon($value));
            default:
                return parent::castAttribute($key, $value);
        }
    }
}