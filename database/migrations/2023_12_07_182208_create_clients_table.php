<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('nu_seq_client');
            $table->string('ds_nome');
            $table->string('ds_nome_social');
            $table->string('nu_cpf_cnpj')->unique();
            $table->date('dt_nascimento')->nullable();
            $table->string('ds_foto_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
