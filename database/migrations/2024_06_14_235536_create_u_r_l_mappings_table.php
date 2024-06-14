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
        Schema::create('u_r_l_mappings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sub');
            $table->string('domain');
            $table->string('name');
            $table->uuid('template_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_r_l_mappings');
    }
};
