<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('discriptorder');
            $table->smallInteger('count')->unsigned();
            $table->smallInteger('count_goot')->unsigned()->default(0);
            $table->enum('valid', ['no', 'yes'])->default('no');
            
            $table->integer('user_id')->unsigned()->index()->default(0);
            $table->foreign('user_id')->references('id')->on('users')->
            onDelite('restrict')->onUpdate('restrict');
            
            $table->integer('product_id')->unsigned()->default(0);
            $table->foreign('product_id')->references('id')->on('products')->
            onDelite('restrict')->onUpdate('restrict');
            
            $table->integer('zakaz_id')->unsigned()->default(0);
            $table->foreign('zakaz_id')->references('id')->on('zakazs')->
            onDelite('restrict')->onUpdate('restrict'); 
           
            $table->integer('otdel_id')->unsigned()->default(0);
            $table->foreign('otdel_id')->references('id')->on('otdels')->
            onDelite('restrict')->onUpdate('restrict');  

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
        Schema::dropIfExists('orders');
    }
}
