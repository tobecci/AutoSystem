<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilloutstandingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billoutstanding', function (Blueprint $table) {
            $table->id();
            $table->integer('billrecord_id')->unsigned();
            $table->integer('opayment1')->unsigned()->default(0);
            $table->integer('opayment2')->unsigned()->default(0);
            $table->integer('opayment3')->unsigned()->default(0);
            $table->integer('outstanding')->unsigned()->default(0);
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
        Schema::dropIfExists('billoutstanding');
    }
}
