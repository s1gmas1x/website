<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up(): void
    {
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('page');                // the URL or route visited
            $table->string('ip')->nullable();      // visitor IP (optional)
            $table->string('user_agent')->nullable(); // browser / OS info
            $table->string('referrer')->nullable();   // where they came from, if any
            $table->string('session_id')->nullable(); // optional session identifier
            $table->timestamps();                  // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};
