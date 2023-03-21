<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdventureTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adventure_tickets', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("description");
            $table->string("image");
            $table->double("price");
            $table->integer("quantity");
            $table->integer("category");
            $table->longText("description_img");
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
        Schema::dropIfExists('adventure_tickets');
    }
}
