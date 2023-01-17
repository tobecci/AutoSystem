<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillreferrerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billreferrer', function (Blueprint $table) {
            $table->id();
            $table->integer('billrecord_id')->unsigned();
            $table->string('refcompany')->default('');
            $table->string('refname')->default('');
            $table->integer('refcomm')->unsigned()->default(0);
            $table->integer('refpaid')->unsigned()->default(0);
            $table->integer('refoutstanding')->unsigned()->default(0);
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
        Schema::dropIfExists('billreferrer');
    }
}
