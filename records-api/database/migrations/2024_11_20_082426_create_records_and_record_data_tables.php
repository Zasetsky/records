<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Основная таблица записей
        Schema::create('records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('access')->default(0);
            $table->timestamps();
        });

        // Таблица атрибутов записей
        Schema::create('record_attributes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('record_id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();

            // Внешний ключ с каскадным удалением
            $table->foreign('record_id')
                ->references('id')
                ->on('records')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('record_attributes');
        Schema::dropIfExists('records');
    }
};


