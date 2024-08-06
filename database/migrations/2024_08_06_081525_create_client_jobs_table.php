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
            $table->text('notes')->nullable();
            $table->string('client_name');
            $table->text('address');
            $table->date('schedule_date');
            $table->time('schedule_time');
            $table->decimal('price', 11, 2);
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
