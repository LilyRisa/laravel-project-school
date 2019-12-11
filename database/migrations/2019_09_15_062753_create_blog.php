<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    use SoftDeletes;
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('blog_id');
            $table->string('blog_title',100);
            $table->text('blog_meta');
            $table->longText('blog_body',100);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_child_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_child_id')->references('id')->on('category_child')->onDelete('cascade')->unsigned();
            $table->unsignedBigInteger('img_id');
            $table->foreign('img_id')->references('id')->on('images')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('blog');
    }
}
