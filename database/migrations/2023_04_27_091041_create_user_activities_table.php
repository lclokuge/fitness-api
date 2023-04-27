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
        Schema::create('user_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('duration');
            $table->string('calories');
            $table->string('distance');
            $table->string('note');
            $table->timestamps();
            $table->foreignId('user_id')->constrained(table: 'users', indexName: 'id');
            $table->foreignId('activity_id')->constrained(table: 'activities', indexName: 'activity_id');

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};
