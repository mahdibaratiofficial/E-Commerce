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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
        });

        Schema::create('attribute_value',function(Blueprint $table){
            $table->id();

            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->cascadeOnDelete();

            $table->string('value');
        });

        Schema::create('attribute_product',function(Blueprint $table){
            
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();

            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->cascadeOnDelete();

            $table->unsignedBigInteger('value_id');
            $table->foreign('value_id')->references('id')->on('attribute_value')->cascadeOnDelete();

            $table->primary(['product_id','value_id','attribute_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_value');

        Schema::dropIfExists('attribute_product');
        
        Schema::dropIfExists('attributes');
    }
};
