<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->integer('order_id')->unique();
            $table->integer('order_number')->unique();
            $table->string('created_on',100)->nullable();
            $table->string('closed_at',100)->nullable();
            $table->string('currency',3);
            $table->text('order_status_url');
            $table->string('token',64);
            $table->double('total_discounts');
            $table->double('total_price');
            $table->string('contact_email',100)->nullable();
            $table->string('vendor',100)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
