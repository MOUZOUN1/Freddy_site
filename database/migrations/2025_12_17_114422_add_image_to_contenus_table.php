<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contenus', function (Blueprint $table) {
            $table->string('image')->nullable()->after('texte'); // ajout du champ image après le texte
        });
    }

    public function down(): void
    {
        Schema::table('contenus', function (Blueprint $table) {
            $table->dropColumn('image'); // supprime le champ si rollback
        });
    }
};
