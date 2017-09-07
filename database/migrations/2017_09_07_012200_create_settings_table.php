<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')
                ->nullable()
                ->default('')
                ->comment('网站标题');
            $table->longText('keywords')
                ->nullable()
//                ->default('')
                ->comment('SEO关键词');
            $table->longText('description')
                ->nullable()
//                ->default('')
                ->comment('SEO描述');
            $table->string('logo')
                ->nullable()
                ->default('')
                ->comment('网站logo背景图');
            $table->string('banner')
                ->nullable()
                ->default('')
                ->comment('网站banner');
            $table->string('copyright')
                ->nullable()
                ->default('')
                ->comment('网站底部-版权信息');
            $table->string('mobile')
                ->nullable()
                ->default('')
                ->comment('网站底部-联系电话');
            $table->string('address')
                ->nullable()
                ->default('')
                ->comment('网站底部-地址');
            $table->string('icp')
                ->nullable()
                ->default('')
                ->comment('网站底部-备案信息');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `settings` comment '网站设置'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
