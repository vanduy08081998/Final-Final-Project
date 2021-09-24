<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) { // Khi tạo bảng thì tên bảng nên là danh từ số nhiều nha :3
            $table->bigIncrements('id');
            $table->string('brand_name');
            $table->text('brand_slug');
            $table->string('brand_image', 225);
            $table->text('meta_keywords');
            $table->text('meta_title');
            $table->text('meta_desc');
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
        Schema::dropIfExists('brand');
    }
}
