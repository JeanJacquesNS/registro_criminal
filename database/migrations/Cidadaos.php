<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadaosTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidadaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('numero_bi_nuit')->unique();
            $table->string('endereco');
            $table->string('provincia');
            $table->string('distrito');
            $table->date('data_nascimento');
            $table->string('local_nascimento');
            $table->enum('genero', ['M', 'F']);
            $table->string('nome_pai')->nullable();
            $table->string('nome_mae')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidadaos');
    }
}