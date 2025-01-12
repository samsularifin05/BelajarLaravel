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
        Schema::create('tbl_member', function (Blueprint $table) {
            $table->id();
            $table->string('nama_member');
            $table->string('email_member')->unique();
            $table->string('no_telp_member')->unique();
            $table->string('alamat_member');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_member');
    }
};