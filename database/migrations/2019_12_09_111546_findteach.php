<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class Findteach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('findteach', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->text('address')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('stclass')->nullable();
            $table->string('school')->nullable();
            $table->string('sex')->nullable();
            $table->string('learning')->nullable();
            $table->text('subject')->nullable();
            $table->string('sl')->nullable();
            $table->string('purpose')->nullable();
            $table->text('ask')->nullable();
            $table->string('status')->nullable();
            $table->SoftDeletes();
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
        //
    }
}
