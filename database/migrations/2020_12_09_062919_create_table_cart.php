<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('id_user');
            $table->string('id_laptop')->nullable();
            $table->string('quantity_laptop')->default(1);
            $table->integer('id_pc')->nullable();
            $table->integer('quantity_pc')->default(1);
            $table->integer('id_monitor')->nullable();
            $table->integer('quantity_monitor')->default(1);
            $table->string('total_money')->default(0);
            $table->integer('status')->default(1);    
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
        Schema::dropIfExists('cart');
    }
}
