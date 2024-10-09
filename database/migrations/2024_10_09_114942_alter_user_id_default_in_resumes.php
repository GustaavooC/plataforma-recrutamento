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
        Schema::table('resumes', function (Blueprint $table) {
            // Definir o valor padrão para a coluna user_id
            $table->unsignedBigInteger('user_id')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            // Caso queira reverter a alteração, pode tornar o campo nullable ou remover o valor padrão
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
    }
};