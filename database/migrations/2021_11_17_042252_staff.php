<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Staff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Staff', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name');
            $table->string('Phone');
            $table->string('Image');
            $table->string('Description');
            $table->string('_Rename');
            $table->integer('Type');
            $table->boolean('Deleted');
            $table->string('Yahoo');
            $table->string('Skype');
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
        Schema::dropIfExists('Staff');
    }
}
