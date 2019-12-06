<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakazs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zakazname', 30)->default('Плановая заявка');
            $table->boolean('zakazactiv');
            $table->date('dodate');
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
        Schema::dropIfExists('zakazs');
    }
}
