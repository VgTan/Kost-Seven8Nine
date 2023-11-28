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
            Schema::create('branch_rooms', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('branch_id');
                $table->string('branch_name');
                $table->unsignedBigInteger('room_id');
                $table->string('room_type');
                $table->string('room_size');
                $table->string('room_equipment');
                $table->string('room_desc');
                $table->foreign('branch_id')->references('id')->on('branches');
                $table->foreign('room_id')->references('id')->on('rooms');
                $table->string('img');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_rooms');
    }
};