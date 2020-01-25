<?php

namespace App\Modules\Programa\Database\Seeds;

use App\Modules\Programa\Models\Assunto;
use App\Modules\Programa\Models\Banca;
use App\Modules\Programa\Models\Orgao;
use App\Modules\Programa\Models\Questao;
use App\Modules\Projeto\Models\Etapa;
use Illuminate\Database\Seeder;


class QuestaoTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getQuestoes() as $questao) {
            Questao::firstOrCreate([
                'no_questao' => $questao['no_questao'],
                'id_orgao' => Orgao::firstOrCreate(['sg_orgao' => $questao['sg_orgao']])->id_orgao,
                'id_banca' => Banca::firstOrCreate(['no_banca' => $questao['no_banca']])->id_banca,
                'id_assunto' => Assunto::firstOrCreate(['no_assunto' => $questao['no_assunto']])->id_assunto,
            ]);
        }
    }

    private function getQuestoes()
    {
        return [
            [
                'no_questao' => 'Os termos “série” e “história” acentuam-se em conformidade com a mesma regra ortográfica.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Fonologia',

            ],
            [
                'no_questao' => 'As palavras “indivíduos”, “vulneráveis”, “incidência” e “neurônios”, contidas no texto, apresentam acento gráfico com base na mesma regra.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Fonologia',
            ],
            [
                'no_questao' => 'Os termos “série” e “história” acentuam-se em conformidade com a mesma regra ortográfica.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Ortografia',

            ],
            [
                'no_questao' => 'Uma opção de grafia igualmente correta para substituir a palavra “afora” (L.2) é a expressão a fora.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Ortografia',
            ],
            [
                'no_questao' => 'A inserção de uma vírgula imediatamente após a palavra “Assim” (l.2) alteraria os sentidos do texto.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Morfologia',

            ],
            [
                'no_questao' => 'A substituição do termo “do futuro”, em “modelos do futuro” (l. 5 e 6), pelo adjetivo futuristas manteria os sentidos originais do texto.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Morfologia',
            ],
            [
                'no_questao' => 'A expressão “Dir-se-á” (l.40) poderia ser corretamente substituída por Será dito.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Morfologia - Verbos',

            ],
            [
                'no_questao' => 'As palavras “indivíduos”, “vulneráveis”, “incidência” e “neurônios”, contidas no texto, apresentam acento gráfico com base na mesma regra.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Morfologia - Verbos',
            ],
            [
                'no_questao' => 'No trecho “ao procurar alguma coisa que se ache escondida” (l. 30 e 31), o pronome “que” exerce a função de complemento da forma verbal “ache”.',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Morfologia - Pronomes',

            ],
            [
                'no_questao' => 'As expressões “dessa busca sem fim” (l.15) e “dessa aventura” (l. 18 e 19) retomam, por coesão, o mesmo referente: “compreender o novo” (l.15).',
                'sg_orgao' => 'PF',
                'no_banca' => 'CESPE',
                'no_assunto' => 'Morfologia - Pronomes',
            ],
        ];
    }
}
