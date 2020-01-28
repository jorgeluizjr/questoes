<?php


namespace App\Modules\Programa\Models;


use Core\Database\Eloquent\AModel;

class Assunto extends AModel
{
    protected $table = 'tb_assunto';

    protected $primaryKey = 'id_assunto';

    public $timestamps = false;

    public $hidden = [
        'pivot'
    ];

    protected $fillable = [
        'no_assunto',
    ];

    public function pai()
    {
        return $this->hasOneThrough(
            Assunto::class,
            ArvoreAssunto::class,
            'id_assunto_filho',
            'id_assunto',
            'id_assunto',
            'id_assunto_pai'
        );
    }

    public function filhos()
    {
        return $this->belongsToMany(
            Assunto::class,
            'rl_arvore_assunto',
            'id_assunto_pai',
            'id_assunto_filho'
        );
    }

    public function questoes($arrParam = [])
    {
        $questoes = $this->hasMany(
            Questao::class,
            'id_assunto',
            'id_assunto'
        );
        if ($arrParam) {
            $questoes->where($arrParam);
        }
        return $questoes;
    }

    public function quantidadeQuestoes($arrParam = [])
    {
        $quantidadeQuestoes = $this->questoes($arrParam)->count();
        $filhos = $this->filhos()->get();
        if ($filhos->isNotEmpty()) {
            foreach ($filhos as $filho) {
                $quantidadeQuestoes += $filho->quantidadeQuestoes($arrParam);
            }
        }
        return $quantidadeQuestoes;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAssuntosRaiz($query)
    {
        return $query->doesntHave('pai');
    }
}
