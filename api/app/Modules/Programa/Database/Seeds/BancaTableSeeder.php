<?php

namespace App\Modules\Programa\Database\Seeds;

use App\Modules\Programa\Models\Banca;
use Illuminate\Database\Seeder;


class BancaTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getBancas() as $banca) {
            Banca::firstOrCreate($banca);
        }
    }

    private function getBancas()
    {
        return [
            ['no_banca' => 'CESPE'],
            ['no_banca' => 'IADES'],
            ['no_banca' => 'FGV'],
            ['no_banca' => 'ESAF'],
            ['no_banca' => 'QUADRIX'],
            ['no_banca' => 'FCC'],
        ];
    }
}
