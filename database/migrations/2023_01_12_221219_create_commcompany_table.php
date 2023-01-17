<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommcompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commcompany', function (Blueprint $table) {
            $table->id();
            $table->integer('commrecord_id')->unsigned();
            $table->string('company_name')->nullable();
            $table->string('referrer_name')->nullable();
            $table->integer('commission')->default(0);
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
        Schema::dropIfExists('commcompany');
    }
}
