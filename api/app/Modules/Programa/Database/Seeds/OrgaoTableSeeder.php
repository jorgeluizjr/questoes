<?php

namespace App\Modules\Programa\Database\Seeds;

use App\Modules\Programa\Models\Orgao;
use App\Modules\Projeto\Models\Etapa;
use Illuminate\Database\Seeder;


class OrgaoTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getOrgaos() as $orgao) {
            Orgao::firstOrCreate($orgao);
        }
    }

    private function getOrgaos()
    {
        return [
            [
                'no_orgao' => 'Polícia Federal',
                'sg_orgao' => 'PF'
            ],
            [
                'no_orgao' => 'Polícia Rodoviária Federal',
                'sg_orgao' => 'PRF'
            ],
            [
                'no_orgao' => 'Polícia Militar do Distrito Federal',
                'sg_orgao' => 'PM-DF'
            ],
            [
                'no_orgao' => 'Polícia Civil do Distrito Federal',
                'sg_orgao' => 'PC-DF'
            ],
            [
                'no_orgao' => 'Tribunal de Contas da União',
                'sg_orgao' => 'TCU'
            ],
            [
                'no_orgao' => 'Advocacia Geral da União',
                'sg_orgao' => 'AGU'
            ],
            [
                'no_orgao' => 'Senado Federal',
                'sg_orgao' => 'SF'
            ],
            [
                'no_orgao' => 'Câmera Legislativa do Distrito Federal',
                'sg_orgao' => 'CLDF'
            ],
            [
                'no_orgao' => 'Instituto Nacional do Seguro Social',
                'sg_orgao' => 'INSS'
            ],
            [
                'no_orgao' => 'Ministério da Justiça',
                'sg_orgao' => 'MJ'
            ],
            [
                'no_orgao' => 'Ministério da Educação',
                'sg_orgao' => 'ME'
            ],
            [
                'no_orgao' => 'Superior Tribunal Federal',
                'sg_orgao' => 'STF'
            ],
            [
                'no_orgao' => 'Superior Tribunal de Justiça',
                'sg_orgao' => 'STJ'
            ],
            [
                'no_orgao' => 'Ministério Público da União',
                'sg_orgao' => 'MPU'
            ],
            [
                'no_orgao' => 'Agência Nacional de Aviação Civil',
                'sg_orgao' => 'ANAC'
            ],
        ];
    }
}
