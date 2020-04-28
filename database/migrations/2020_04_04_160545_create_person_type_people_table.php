<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTypePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_type_person', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_person_id');
            $table->unsignedInteger('person_id');
            $table->foreign('type_person_id')->references('id')->on('type_persons');
            $table->foreign('person_id')->references('id')->on('persons');
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
        Schema::dropIfExists('person_type_people');
    }
}
