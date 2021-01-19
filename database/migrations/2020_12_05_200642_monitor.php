<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Monitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitor', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('price');
            $table->text('content')->nullable();
            $table->text('quantity')->nullable();
            $table->text('origin')->nullable();
            $table->text('warranty_period')->nullable();
            $table->text('model')->nullable();//Hãng sx
            $table->text('resoluton')->nullable();//độ phân giải
            $table->text('screen_curvature')->nullable();// Độ cong
            $table->text('brightness')->nullable();// Độ sáng
            $table->text('contrast_ratio_static')->nullable();//Tỉ lệ tương phản
            $table->text('response_time')->nullable();//Tốc độ phản hồi                
            $table->text('classify')->nullable();
            $table->integer('status')->default(1);
            $table->integer('idcategory')->unsigned()->nullable();
            $table->foreign('idcategory')->references('id')->on('category');
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
        Schema::dropIfExists('monitor');
    }
}
