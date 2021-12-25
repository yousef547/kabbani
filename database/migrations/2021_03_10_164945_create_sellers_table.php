<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('seller_name',100);
            $table->string('seller_ar',100);
            $table->string('store_name',100);
            $table->string('store_ar',100);
            $table->foreignId('main_category_id')->constrained('main_categories');
            $table->boolean('active',1)->default('0');
            $table->string('email',100);
            $table->string('password',100);
            $table->integer('phone');
            $table->string('address',150);
            $table->string('photo',100);
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
        Schema::dropIfExists('sellers');
    }
}
