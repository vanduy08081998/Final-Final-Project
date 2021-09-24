<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_brand', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('category_id_cate')->nullable()->references('id_cate')->on('categories'); // Tên cột đặt theo quy tắc tên_bảng(Không thêm s cuối)_Khóa_chính
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands');
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
        Schema::dropIfExists('category_brand');
    }
}
