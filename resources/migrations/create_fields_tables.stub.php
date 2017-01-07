<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fieldable_type');
            $table->string('name');
            $table->string('impl');
            $table->string('view')->nullable();
        });

        Schema::create('field_value', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('field_id')->unsigned();
            $table->integer('fieldable_id');
            $table->string('value')->nullable();
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
        Schema::dropIfExists('fields');
        Schema::dropIfExists('field_value');
    }
}
