<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistosCriminaisTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registos_criminais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cidadao_id')->constrained();
            $table->string('numero_processo');
            $table->date('data_ocorrencia');
            $table->string('tipo_ocorrencia');
            $table->string('tribunal');
            $table->text('sentenca');
            $table->date('data_sentenca');
            $table->boolean('cumprido')->default(false);
            $table->text('observacoes')->nullable();
            $table->foreignId('registado_por')->constrained('funcionarios');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverte as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registos_criminais');
    }
}