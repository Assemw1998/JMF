<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorcyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id();
            $table->integer('make_id');
            $table->integer('model_id');
            $table->string('chassis');
            $table->date('year');
            $table->integer('cylinder_id');
            $table->string('engine_serial_number');
            $table->integer('color_id');
            $table->string('extra_information');
            $table->integer('created_by_id');  
            $table->integer('updated_by_id');        
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
        Schema::dropIfExists('motorcycles');
    }
}
