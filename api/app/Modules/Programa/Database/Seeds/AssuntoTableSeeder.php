<?php

namespace App\Modules\Programa\Database\Seeds;

use App\Modules\Programa\Models\Assunto;
use Illuminate\Database\Seeder;
use App\Modules\Conta\Model\Funcionalidade as FuncionalidadeModel;

class AssuntoTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getAssuntos() as $arrAssunto) {
            $assuntosFilhos = array_pop($arrAssunto);
            $assuntoPai = Assunto::firstOrCreate($arrAssunto);
            foreach ($assuntosFilhos as $assuntoFilho) {
                $assuntoPai->filhos()->attach(Assunto::firstOrCreate($assuntoFilho)->id_assunto);
            }
        }
    }

    private function getAssuntos()
    {
        return [
            [
                'no_assunto' => 'Português',
                'filhos' => [
                    ['no_assunto' => 'Morfologia'],
                    ['no_assunto' => 'Morfologia - Verbos'],
                    ['no_assunto' => 'Morfologia - Pronomes'],
                ]
            ],
            [
                'no_assunto' => 'Raciocínio Lógico - RLM',
                'filhos' => [
                    ['no_assunto' => 'Proposições Simples e Compostas'],
                    ['no_assunto' => 'Análise Combinatória'],
                    ['no_assunto' => 'Probabilidade'],
                ]
            ],
            [
                'no_assunto' => 'Noções de Informática',
                'filhos' => [
                    ['no_assunto' => 'Sistema Operacional'],
                    ['no_assunto' => 'Pacote de Aplicativos'],
                    ['no_assunto' => 'Softwares'],
                ],
            ],
            [
                'no_assunto' => 'Segurança da Informação',
                'filhos' => [
                    ['no_assunto' => 'Assinatura Digital'],
                    ['no_assunto' => 'Ataques e ameaças'],
                    ['no_assunto' => 'Backup'],
                ],
            ],
        ];
    }
}
