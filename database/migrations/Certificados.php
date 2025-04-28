<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosRegistoTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados_registo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitacao_id')->constrained('solicitacoes_registo');
            $table->dateTime('data_emissao');
            $table->date('data_validade');
            $table->string('numero_referencia')->unique();
            $table->text('conteudo');
            $table->enum('estado_certificado', ['valido', 'expirado', 'revogado'])->default('valido');
            $table->foreignId('funcionario_emissor')->constrained('funcionarios');
            $table->string('codigo_verificacao')->unique();
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
        Schema::dropIfExists('certificados_registo');
    }
}