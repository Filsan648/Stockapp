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
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->string('expediteur');
            $table->string('recepteur');
            $table->dateTime('date');
            $table->string('NommItem');
            $table->char('Description');
            $table->string('status')->default("En attente");
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
