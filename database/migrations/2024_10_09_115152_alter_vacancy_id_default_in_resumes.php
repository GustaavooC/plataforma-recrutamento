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
            // Definir o valor padrão para a coluna vacancy_id
            $table->unsignedBigInteger('vacancy_id')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            // Caso queira reverter, defina como nullable ou remova o valor padrão
            $table->unsignedBigInteger('vacancy_id')->nullable()->change();
        });
    }
};