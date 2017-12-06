<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('materias')->insert(['nome' => "Operações Básicas"]);
        DB::table('materias')->insert(['nome' => "Operações com Frações"]);
        DB::table('materias')->insert(['nome' => "Potênciação"]);
        DB::table('materias')->insert(['nome' => "Radicais"]);
    }
}
