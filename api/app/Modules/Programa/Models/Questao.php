<?php


namespace App\Modules\Programa\Models;


use Core\Database\Eloquent\AModel;

class Questao extends AModel
{
    protected $table = 'tb_questao';

    protected $primaryKey = 'id_questao';

    public $timestamps = false;

    protected $fillable = [
        'no_questao',
        'id_orgao',
        'id_banca',
        'id_assunto'
    ];


    public function orgao()
    {
        return $this->hasOne(
            Orgao::class,
            'id_orgao',
            'id_orgao'
        );
    }

    public function banca()
    {
        return $this->hasOne(
            Banca::class,
            'id_banca',
            'id_banca'
        );
    }

    public function assunto()
    {
        return $this->hasOne(
            Assunto::class,
            'id_assunto',
            'id_assunto_'
        );
    }
}
