<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_kebaktian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('liturgis')->nullable();
            $table->string('pengkhotbah')->nullable();
            $table->string('pemusik')->nullable();
            $table->string('kolektan')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kebaktian');
    }
};
