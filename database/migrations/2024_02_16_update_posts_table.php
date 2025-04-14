<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Adicionar colunas que faltam se não existirem
            if (!Schema::hasColumn('posts', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }
            if (!Schema::hasColumn('posts', 'excerpt')) {
                $table->text('excerpt')->after('slug');
            }
            // Renomear coluna 'text' para 'content' se existir
            if (Schema::hasColumn('posts', 'text')) {
                $table->renameColumn('text', 'content');
            }
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['slug', 'excerpt']);
            if (Schema::hasColumn('posts', 'content')) {
                $table->renameColumn('content', 'text');
            }
        });
    }
};
