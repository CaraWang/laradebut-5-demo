<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->comments('商品流水號');
            $table->string('name')->comments('商品名稱');
            $table->string('brand')->comments('品牌');
            $table->string('type')->default('')->comments('商品型號');
            $table->float('price')->comments('商品的價格');
            $table->float('discount')->default('1')->comments('折扣率');
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
        Schema::dropIfExists('products');
    }
}
