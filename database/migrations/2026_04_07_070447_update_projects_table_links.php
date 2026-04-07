<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['url', 'github_url']);
            $table->string('link_url')->nullable();
            $table->string('link_label')->nullable();
        });
    }

    public function down(): void
    {
        
    }
};
