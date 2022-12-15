<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacaos', function (Blueprint $table) {
            $table->id();
            $table->float('valor', 14, 2);
            $table->date('data_venc')->nullable();
            $table->string('descricao', 100);
            $table->string('frequencia', 45);
            $table->boolean('recorrente');
            $table->foreignId('users_id')->constrained();
            $table->foreignId('tipo_movimentacoes_id')->constrained('tipo_movimentacoes');
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
        Schema::dropIfExists('movimentacaos');
    }
};
