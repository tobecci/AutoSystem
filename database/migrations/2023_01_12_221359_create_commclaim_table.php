<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommclaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commclaim', function (Blueprint $table) {
            $table->id();
            $table->integer('commrecord_id')->unsigned();
            $table->integer('total_amount')->default(0);
            $table->integer('lawyer_commission')->default(0);
            $table->integer('adjuster_fee')->default(0);
            $table->integer('from_lawyer')->default(0);
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
        Schema::dropIfExists('commclaim');
    }
}
