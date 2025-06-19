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
    {  Schema::create('employer', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('fonction')->unique();
        $table->string('Departement')->nullable();
        $table->timestamps();

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
