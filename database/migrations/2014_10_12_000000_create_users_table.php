<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('adsoyad');
            $table->string('il')->nullable();
            $table->string('ilce')->nullable();
            $table->string('mahalle')->nullable();
            $table->string('sokak')->nullable();
            $table->string('apartman_no')->nullable();
            $table->string('kapi_no')->nullable();
            $table->boolean('user_type')->default(0);
            $table->string('email')->unique();
            $table->string('telefon')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('aktif_mi')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
