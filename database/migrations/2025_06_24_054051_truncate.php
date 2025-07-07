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
        DB::table('employer')->truncate();
        DB::table('materiel')->truncate();
        DB::table('stock')->truncate();



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
