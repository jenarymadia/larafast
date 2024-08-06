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
        Schema::create('client_jobs', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('address');
            $table->dateTime('scheduled_date_time');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_jobs');
    }
};
