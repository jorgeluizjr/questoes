<?php

namespace Core\Http\Requests;

use App\Exceptions\ValidacaoCustomizadaException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

abstract class AFormRequest extends FormRequest
{
    const REQUIRED = 'required';
    const INTEGER = 'integer';
    const STRING = 'string';
    const SOMETIMES = 'sometimes';
    const BOOLEAN = 'boolean';
    const ARRAY = 'array';
    const JSON = 'json';
    const SIZE = 'size:';
    const IN = 'in:';
    const MAX = 'max:';
    const ENUM_KEY = 'enum_key:';
    const ENUM_VALUE = 'enum_value:';
    const REQUIRED_IF = 'required_if:';
    const ALPHA_NUM = 'alpha_num';
    const NUMERIC = 'numeric';
    const ENUM = 'enum_value:';

    protected function failedValidation(Validator $validator)
    {
        throw new ValidacaoCustomizadaException(
            $validator->errors()->first(),
            Response::HTTP_BAD_REQUEST
        );
    }
}
