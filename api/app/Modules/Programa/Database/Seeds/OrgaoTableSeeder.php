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
                'no_orgao' => 'Polícia Civil do Distrito Federal',
                'sg_orgao' => 'PC-DF'
            ],
            [
                'no_orgao' => 'Tribunal de Contas da União',
                'sg_orgao' => 'TCU'
            ],
            [
                'no_orgao' => 'Senado Federal',
                'sg_orgao' => 'SF'
            ],
            [
                'no_orgao' => 'Instituto Nacional do Seguro Social',
                'sg_orgao' => 'INSS'
            ],
        ];
    }
}
