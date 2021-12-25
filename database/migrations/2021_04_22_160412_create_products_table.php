<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name',300);
            $table->string('name_ar',300);
            $table->foreignId('main_category_id')->constrained('main_categories');
            $table->foreignId('seller_id')->constrained('sellers');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
            $table->double('quant');
            $table->double('min_quant');
            $table->double('price');
            $table->double('compare_price');
            $table->string('description',300);
            $table->string('description_ar',300);
            $table->text('specification');
            $table->text('specification_ar');
            $table->string('deliv_time',50)->default('60 Minutes');
            $table->boolean('deliv_free',1)->default('0');
            $table->boolean('active',1)->default('1');
            $table->string('photo',300);
            $table->boolean('deals',1)->default('0');
            $table->double('deals_price')->nullable();
            $table->json('allTags')->nullable();
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
}
