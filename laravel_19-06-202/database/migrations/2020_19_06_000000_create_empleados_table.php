<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula');
            $table->string('email')->unique();
            $table->string('lugar_nacimiento');
            $table->enum('sexo',['masculina','femenino','no definido']);
            $table->enum('estado_civil',['soltero','casado']);
            $table->integer('telefono');
            $table->timestamps();
        });
    }
}