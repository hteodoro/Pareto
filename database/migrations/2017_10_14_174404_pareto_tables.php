<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParetoTables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      // TODO:: Create all the tables
      Schema::create('alunos', function(Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->string('senha');
        $table->integer('sala_id');
        $table->integer('escola_id');
      });

      Schema::create('professores', function(Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->string('senha');
        $table->integer('escola_id');
      });

      Schema::create('escolas', function(Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->string('senha');
        $table->string('identificador');
      });

      Schema::create('salas', function(Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->integer('escola_id');
      });

      Schema::create('materias', function(Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
      });

      Schema::create('dificuldade', function(Blueprint $table) {
        $table->increments('relacao_id');
        $table->integer('aluno_id');
        $table->integer('materia_id');
        $table->integer('dificuldade_nivel');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::drop('alunos');
      Schema::drop('professores');
      Schema::drop('escolas');
      Schema::drop('salas');
      Schema::drop('materias');
      Schema::drop('dificuldade');
    }

}
