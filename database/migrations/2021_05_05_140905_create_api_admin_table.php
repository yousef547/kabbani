<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_admin', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('password',255);
            $table->string('access_token',64)->nullable();
            $table->string('oauth_token',255)->nullable();
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
        Schema::dropIfExists('api_admin');
    }
}
