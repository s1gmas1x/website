<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('page_visits', function (Blueprint $table) {
            $table->string('event_type')->nullable();
            $table->string('event_label')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('page_visits', function (Blueprint $table) {
            $table->dropColumn(['event_type', 'event_label']);
        });
    }
};