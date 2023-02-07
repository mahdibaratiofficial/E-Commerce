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

            $table->string('name')->nullable();

            $table->string('username')->nullable()->unique();
            
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('number', 11)->unique()->nullable();
            $table->timestamp('number_verified_at')->nullable();

            $table->string('password')->nullable();

            $table->timestamp('birth_day')->nullable();

            // c:client
            // v:vendor
            // a:admin
            $table->enum('type',['c','v','a']);

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
