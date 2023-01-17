<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillrecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billrecord', function (Blueprint $table) {
            $table->id();
			$table->string('car_no')->nullable();
			$table->string('model')->nullable();
			$table->integer('total')->default(0);
			$table->integer('cost')->default(0);
			$table->integer('profitloss')->default(0);
			$table->string('referrer')->nullable();
			$table->integer('ref_fee')->default(0);
			$table->integer('outstanding')->default(0);
			$table->integer('balance')->default(0);
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
        Schema::dropIfExists('billrecord');
    }
}
