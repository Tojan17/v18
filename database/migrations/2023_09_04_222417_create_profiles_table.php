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

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('fb');
            $table->string('tw');
            $table->string('li');
            $table->string('in');
            $table->string('phone');
            $table->text('address');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            // $table->bigInteger('user_id')->nullable();
            // $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            // $table->foreign('user_id')->on('users')->references('id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
