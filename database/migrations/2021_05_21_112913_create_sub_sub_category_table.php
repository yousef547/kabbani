<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_category', function (Blueprint $table) {
            $table->id();
            $table->string('sub_sub_category_name',100);
            $table->string('sub_sub_category_name_ar',100);
            $table->string('photo',100)->nullable();
            $table->foreignId('main_category_id')->constrained('main_categories');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
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
        Schema::dropIfExists('sub_sub_category');
    }
}
