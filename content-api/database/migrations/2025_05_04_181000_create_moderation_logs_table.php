<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('moderation_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->enum('action', ['approved', 'rejected']);
            $table->string('moderator_note');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('moderation_logs');
    }
};
