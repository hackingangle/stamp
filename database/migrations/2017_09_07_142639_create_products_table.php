<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')
                ->nullable()
                ->default('')
                ->comment('描述');
            $table->string('image')
                ->nullable()
                ->default('')
                ->comment('产品图片');
            $table->tinyInteger('status')
                ->nullable()
                ->default(0)
                ->comment('状态：0-正常，1-已经删除');
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
