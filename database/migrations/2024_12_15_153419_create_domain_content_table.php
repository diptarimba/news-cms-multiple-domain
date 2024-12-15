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
        Schema::create('domain_content', function (Blueprint $table) {
            $table->id();
            $table->uuid('domain_uuid');
            $table->foreign('domain_uuid')->references('id')->on('u_r_l_mappings')->onDelete('cascade');
            $table->uuid('content_uuid');
            $table->foreign('content_uuid')->references('id')->on('contents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_content');
    }
};
