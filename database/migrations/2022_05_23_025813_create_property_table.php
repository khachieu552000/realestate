<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('investor')->nullable();
            $table->string('address')->nullable();
            $table->text('image')->nullable();
            $table->text('description');
            $table->double('price');
            $table->string('acreage');
            $table->bigInteger('floors')->nullable();
            $table->bigInteger('bedrooms')->nullable();
            $table->bigInteger('bathrooms')->nullable();
            $table->string('juridical');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('property_type_id');
            $table->integer('direction_id');
            $table->integer('account_id');
            $table->integer('categories_id');
            $table->integer('street_id');
            $table->integer('post_type_id');
            $table->string('status',32)->default('deactive');
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
        Schema::dropIfExists('property');
    }
}
