<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilltotalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billtotal', function (Blueprint $table) {
            $table->id();
			$table->integer('billrecord_id')->unsigned();
			$table->string('totaldate')->nullable();
			$table->integer('gross')->unsigned()->default(0);
			$table->integer('cart')->unsigned()->default(0);
			$table->integer('adj')->unsigned()->default(0);
			$table->integer('total')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->engine = "ARIA";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billtotal');
    }
}
