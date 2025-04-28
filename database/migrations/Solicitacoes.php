<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacoesRegistoTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes_registo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cidadao_id')->constrained();
            $table->dateTime('data_solicitacao');
            $table->string('finalidade');
            $table->enum('estado', ['pendente', 'em_analise', 'aprovado', 'rejeitado', 'concluido', 'cancelado'])
                  ->default('pendente');
            $table->boolean('urgencia')->default(false);
            $table->enum('forma_pagamento', ['mpesa', 'emola', 'deposito_bancario', 'presencial'])
                  ->nullable();
            $table->boolean('pago')->default(false);
            $table->foreignId('funcionario_id')->nullable()->constrained();
            $table->text('observacoes')->nullable();
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
        Schema::dropIfExists('solicitacoes_registo');
    }
}