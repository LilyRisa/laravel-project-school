<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Homedetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homedetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('contentText');
            $table->text('keyword');
            $table->text('phone');
            $table->text('email');
            $table->text('address');
            $table->text('recommend');
            $table->text('description');
            $table->text('logoSite');
            $table->text('mapIframe');
            $table->text('linkFB');
            $table->text('linkTW');
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
