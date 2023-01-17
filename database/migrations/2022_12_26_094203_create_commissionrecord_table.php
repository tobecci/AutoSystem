<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionrecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissionrecord', function (Blueprint $table) {
            $table->id();
			$table->string('car_no')->nullable();
			$table->string('model')->nullable();
			$table->string('company')->nullable();
			$table->integer('claim')->default(0);
			$table->string('checker')->nullable();
			$table->datetime('checkerdate')->nullable();
			$table->integer('commission')->default(0);
			$table->integer('payable')->default(0);
			$table->string('status')->nullable();
			$table->datetime('statusdate')->nullable();
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
        Schema::dropIfExists('commissionrecord');
    }
}
