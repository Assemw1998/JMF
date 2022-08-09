<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('last_name');
            $table->string('nationality_id');
            $table->string('mother_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('address_1');
            $table->string('address_2');
            $table->integer('city_id');
            $table->integer('birth_city_id');
            $table->date('date_of_birth');
            $table->string('id_number');
            $table->date('id_expiry_date');
            $table->string('license_number');
            $table->date('license_issue_date');
            $table->date('license_expiry_date');
            $table->integer('status')->default(1);
            $table->integer('created_by_id')->default(NULL);  
            $table->integer('updated_by_id')->default(NULL);  
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
        Schema::dropIfExists('customers');
    }
}
