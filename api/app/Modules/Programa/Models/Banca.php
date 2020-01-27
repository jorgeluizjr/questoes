<?php


namespace App\Modules\Programa\Models;


use Core\Database\Eloquent\AModel;

class Banca extends AModel
{
    protected $table = 'tb_banca';

    protected $primaryKey = 'id_banca';

    public $timestamps = false;

    protected $fillable = [
        'no_banca',
    ];
}
