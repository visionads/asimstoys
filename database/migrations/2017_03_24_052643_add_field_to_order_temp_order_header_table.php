<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToOrderTempOrderHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_tmp', function (Blueprint $table) {
            
            $table->string('localpickup')->nullable();
          
        });

        Schema::table('order_head', function (Blueprint $table) {
            
            $table->string('localpickup')->nullable();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
