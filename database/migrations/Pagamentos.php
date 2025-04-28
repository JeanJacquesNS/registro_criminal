<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitacao_id')->constrained('solicitacoes_registo');
            $table->decimal('valor', 10, 2);
            $table->enum('metodo', ['mpesa', 'emola', 'deposito_bancario', 'presencial']);
            $table->string('referencia')->unique();
            $table->dateTime('data_pagamento')->nullable();
            $table->enum('estado', ['pendente', 'confirmado', 'cancelado', 'reembolsado'])->default('pendente');
            $table->text('detalhes_transacao')->nullable();
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
        Schema::dropIfExists('pagamentos');
    }
}