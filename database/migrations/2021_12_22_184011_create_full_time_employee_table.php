<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullTimeEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_time_employee', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identity');
            $table->string('mobile')->nullable()->unique();
            $table->bigInteger('bank_account_number')->nullable()->unique();
            $table->bigInteger('salary')->unsigned();
            $table->bigInteger('attend')->unsigned()->default(0);
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
        Schema::dropIfExists('full_time_employee');
    }
}
