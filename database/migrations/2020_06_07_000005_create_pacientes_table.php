<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('sexo')->nullable();
            $table->longText('padecimiento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
