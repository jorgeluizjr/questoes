<?php


namespace App\Modules\Programa\Database\Seeds;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramaDatabaseSeeder extends Seeder
{
    public function run()
    {
        try{
            DB::beginTransaction();
            $this->call(BancaTableSeeder::class);
            $this->call(OrgaoTableSeeder::class);
            $this->call(AssuntoTableSeeder::class);
            $this->call(QuestaoTableSeeder::class);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }


    }
}
