<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudents', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('carnet');
            $table->boolean('sexo');
            $table->string('imagen')->default('');
            $table->date('fechanac');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudents');
    }
}
