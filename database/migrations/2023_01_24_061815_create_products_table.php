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
            $table->string("name");
            $table->longText("desc");
            $table->longText("short_description");
            $table->string("image");
            $table->dateTime("offer_to")->nullable();
            $table->dateTime("offer_from")->nullable();
            $table->double("offer_price");
            $table->double("mrp");
            $table->integer("quantity");
            $table->integer("category");
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
