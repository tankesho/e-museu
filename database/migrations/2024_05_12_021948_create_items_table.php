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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('history')->nullable();
            $table->text('detail')->nullable();
            $table->date('date');
            $table->string('identification_code');
            $table->string('image');
            $table->boolean('validation')->default(0);
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->foreignId('proprietary_id')->constrained('proprietaries')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
