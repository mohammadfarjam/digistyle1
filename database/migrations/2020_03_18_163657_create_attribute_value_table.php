<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Attribute_Value', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('attribute_group_id');
            $table->foreign('attribute_group_id')->references('id')->on('attribute_group')->ondelete('cascade');
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
        Schema::dropIfExists('AttributeValue');
    }
}
