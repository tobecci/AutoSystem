<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommpayableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commpayable', function (Blueprint $table) {
            $table->id();
            $table->integer('commrecord_id')->unsigned();
            $table->integer('total_amount')->default(0);
            $table->integer('adjuster_fee')->default(0);
            $table->integer('claim')->default(0);
            $table->integer('service_charge')->default(0);
            $table->integer('document_fee')->default(0);
            $table->integer('comm')->default(0);
            $table->integer('deduct_amount')->default(0);
            $table->integer('payable_to_workshop')->default(0);
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
        Schema::dropIfExists('commpayable');
    }
}
