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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            // $table->unsignedBigInteger('cart_id');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
            // $table->foreign('cart_id')->references('id')->on('carts')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('order_items');
    }
};
