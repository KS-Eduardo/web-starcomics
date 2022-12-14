<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->nullable(false);
            $table->string('autor',100)->nullable(false);
            $table->string('portada',1000)->nullable(false);
            $table->string('categoria',100)->nullable(false);
            $table->string('genero',100)->nullable(false);
            $table->text('sinopsis')->nullable(false);

            $table->integer('codigo')->default(0);
            $table->integer('cantidad')->default(0);
            $table->integer('estado')->default(1);
            $table->double('precio',9,2)->default(999999.99);
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
        Schema::dropIfExists('productos');
    }
}
