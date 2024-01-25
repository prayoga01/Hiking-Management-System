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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('mountain_id');
            $table->foreignId('mountainAble_id');
            $table->string('name');
            $table->date('birth');
            $table->string('address');
            $table->string('gender');
            $table->string('no_tlp');
            $table->string('nationality');
            $table->string('idn_numb');
            $table->string('idn_img');
            // $table->string('team_status');
            $table->string('checkIn');
            $table->string('checkOut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};