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
        Schema::create('web_messages', function (Blueprint $table) {
            $table->id();
            $table->string('polestar_id')->nullable();
            $table->string('message_title')->nullable();
            $table->string('message_file_path')->nullable();
            $table->text('message_body')->nullable();
            $table->string('others')->nullable();
            $table->timestamp('message_time')->nullable();
            $table->string('status')->comment('success, error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_messages');
    }
};
