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
        Schema::table('commande', function (Blueprint $table) {
          $table->integer('quantite')->default(0);

        });
         Schema::table('stock', function (Blueprint $table) {
           $table->string('categorie')->default("Usine");

        });
          Schema::table('employer', function (Blueprint $table) {
           $table->string('categorie')->default("Usine");
           $table->string('Responsable')->default(" ");
        });

        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
