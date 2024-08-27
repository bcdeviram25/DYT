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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('banner_image')->nullable();
            $table->string('page_title')->nullable();
            $table->integer('page_type');
            $table->foreignId('related_page')->nullable()->constrained('pages')->onDelete('cascade');
            $table->string('page_style');
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->integer('order_number')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
