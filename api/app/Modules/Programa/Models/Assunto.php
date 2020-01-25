<?php


namespace App\Modules\Programa\Models;


use Core\Database\Eloquent\AModel;

class Assunto extends AModel
{
    protected $table = 'tb_assunto';

    protected $primaryKey = 'id_assunto';

    public $timestamps = false;

    protected $fillable = [
        'no_assunto',
    ];


    public function assuntosFilhos()
    {
        return $this->belongsToMany(
            Assunto::class,
            'rl_arvore_assunto',
            'id_assunto_pai',
            'id_assunto_filho'
        );
    }

    public function questoes()
    {
        return $this->hasMany(
            Questao::class,
            'id_assunto',
            'id_assunto'
        );
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAssuntosPai($query)
    {
        return $query->has('assuntosFilhos');
    }
}