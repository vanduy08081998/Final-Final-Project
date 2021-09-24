<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id_cate');
            $table->string('category_name')->nullable();
            $table->text('category_slug')->nullable();
            $table->foreignId('category_parent_id')->nullable()->references('id_cate')->on('categories'); // Được quyền để trống nếu không có danh mục kế thừa
            // $table->Integer('brand_id'); Liên kết này chỉ cần 1 khóa phụ thôi, về sau làm 1 bảng Center (Category_Brand) chia ra 2 nhánh 1-n
            $table->text('meta_keywords')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
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
        Schema::dropIfExists('category');
    }
}
