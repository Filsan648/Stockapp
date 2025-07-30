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
     Schema::table('users', function (Blueprint $table) {
            $table->integer('isadmin');
            $table->string('stockatribue')->default("usine");
        });
         Schema::table('materiel', function (Blueprint $table) {
            $table->string('image')->default("null");
            $table->string('categorie')->default("Piece detache");
        });


        Schema::table('stock', function (Blueprint $table) {

            $table->string('stock')->default("usine");
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
