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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title')->default('unknown');

            $table->string('slug')->unique();

            $table->tinyInteger('rate')->default(0);

            $table->text('description');

            $table->unsignedBigInteger('vendor_id')->default(0);
            $table->foreign('vendor_id')->references('id')->on('vendors')->cascadeOnDelete();

            $table->integer('quantity')->default(0);

            $table->integer('price');

            $table->integer('views')->default(0);

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
        Schema::dropIfExists('products');
    }
};
