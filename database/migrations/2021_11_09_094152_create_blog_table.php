<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_blogCate')->references('id')->on('blog_category');
            $table->unsignedInteger('poster')->references('id')->on('users');
            $table->string('blog_title')->nullable();
            $table->string('blog_description')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('blog_content')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('blog_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
