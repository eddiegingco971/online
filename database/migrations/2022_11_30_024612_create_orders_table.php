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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tracking_number');
            $table->date('order_date');
            $table->integer('quantity');
            $table->string('total_amount');
            $table->enum('payment_method',['cod','scan_gcash'])->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('status',['new','process','delivered','cancel'])->default('new');
            // $table->bigInteger('customer_id')->unsigned();
            // $table->bigInteger('processed_by');
            $table->timestamps();

            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('SET NULL');
            // $table->foreign('processed_by')->references('id')->on('payments');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
