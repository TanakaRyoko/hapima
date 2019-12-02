<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TimeSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('time_schedules', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('content');
            
            
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
        Schema::dropIfExists('time_schedules');
        //
    }
}
