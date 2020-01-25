<?php


namespace App\Modules\Programa\Models;


use Core\Database\Eloquent\AModel;

class ArvoreAssunto extends AModel
{
    protected $table = 'rl_arvore_assunto';

    protected $primaryKey = 'id_arvore_assunto';

    public $timestamps = false;

    public function assuntoPai()
    {
        return $this->hasOne(
            Assunto::class,
            'id_assunto',
            'id_assunto_pai'
        );
    }

    public function assuntoFilho()
    {
        return $this->hasOne(
            Assunto::class,
            'id_assunto',
            'id_assunto_filho'
        );
    }

}
