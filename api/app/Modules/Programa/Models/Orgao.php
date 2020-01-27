<?php


namespace App\Modules\Programa\Models;


use Core\Database\Eloquent\AModel;

class Orgao extends AModel
{
    protected $table = 'tb_orgao';

    protected $primaryKey = 'id_orgao';

    public $timestamps = false;

    protected $fillable = [
        'no_orgao',
        'sg_orgao',
    ];
}
