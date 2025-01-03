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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
        	$table->unsignedBigInteger('article_id');
        	$table->unsignedBigInteger('user_id')->nullable();
        	$table->string('email');
        	$table->string('ip');
        	$table->string('name')->nullable()->default('*anonymous*');
        	$table->text('content');
            $table->timestamps();
        	$table->softDeletes();
        	$table->foreign('article_id')->references('id')->on('articles');
        	$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
