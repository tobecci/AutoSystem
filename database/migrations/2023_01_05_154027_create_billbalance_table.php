<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillbalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billbalance', function (Blueprint $table) {
            $table->id();
			$table->integer('billrecord_id')->unsigned();
			$table->integer('balreceive1')->unsigned()->default(0);
			$table->integer('balreceive2')->unsigned()->default(0);
			$table->integer('balreceive3')->unsigned()->default(0);
			$table->integer('balance')->unsigned()->default(0);
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
        Schema::dropIfExists('billbalance');
    }
}
