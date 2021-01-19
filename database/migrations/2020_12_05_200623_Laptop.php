<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laptop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Laptop', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('price');
            $table->text('content')->nullable();
            $table->text('quantity')->nullable();
            $table->text('origin')->nullable();
            $table->text('warranty_period')->nullable();
            $table->text('cpu')->nullable();
            $table->text('ram')->nullable();
            $table->text('vga')->nullable();
            $table->text('hard_drive')->nullable();
            $table->text('display')->nullable();
            $table->text('connector')->nullable();
            $table->text('audio')->nullable();
            $table->text('wifi')->nullable();
            $table->text('bluetooth')->nullable();
            $table->text('operating_system')->nullable();             
            $table->text('battery')->nullable();  
            $table->text('weight')->nullable();  
            $table->text('color')->nullable();  
            $table->text('size')->nullable();
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
        Schema::dropIfExists('Laptop');
    }
}
